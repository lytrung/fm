<?php

namespace MailPoet\Cron\Workers\SendingQueue;

if (!defined('ABSPATH')) exit;


use MailPoet\Cron\CronHelper;
use MailPoet\Cron\Workers\SimpleWorker;
use MailPoet\Mailer\MailerLog;
use MailPoet\Models\ScheduledTask;
use MailPoet\Models\ScheduledTaskSubscriber;
use MailPoet\Models\SendingQueue as SendingQueueModel;
use MailPoet\WP\Functions as WPFunctions;
use MailPoetVendor\Carbon\Carbon;

class Migration extends SimpleWorker {
  const TASK_TYPE = 'migration';
  const BATCH_SIZE = 20;

  public function checkProcessingRequirements() {
    // if migration was completed, don't run it again
    $completed_tasks = $this->getCompletedTasks();
    return empty($completed_tasks);
  }

  public function prepareTaskStrategy(ScheduledTask $task, $timer) {
    $unmigrated_columns = $this->checkUnmigratedColumnsExist();
    $unmigrated_queues_count = 0;
    $unmigrated_queue_subscribers = [];

    if ($unmigrated_columns) {
      $unmigrated_queues_count = $this->getUnmigratedQueues()->count();
      $unmigrated_queue_subscribers = $this->getTaskIdsForUnmigratedSubscribers();
    }

    if (!$unmigrated_columns ||
      ($unmigrated_queues_count == 0
      && count($unmigrated_queue_subscribers) == 0)
    ) {
      // nothing to migrate, complete task
      $task->processed_at = WPFunctions::get()->currentTime('mysql');
      $task->status = ScheduledTask::STATUS_COMPLETED;
      $task->save();
      $this->resumeSending();
      return false;
    }

    // pause sending while the migration is in process
    $this->pauseSending();
    return true;
  }

  public function pauseSending() {
    $mailer_log = MailerLog::getMailerLog();
    if (MailerLog::isSendingPaused($mailer_log)) {
      // sending is already paused
      return false;
    }
    $mailer_log = MailerLog::setError(
      $mailer_log,
      'migration',
      WPFunctions::get()->__('Your sending queue data is being migrated to allow better performance, sending is paused while the migration is in progress and will resume automatically upon completion. This may take a few minutes.')
    );
    return MailerLog::pauseSending($mailer_log);
  }

  public function resumeSending() {
    $mailer_log = MailerLog::getMailerLog();
    if (!MailerLog::isSendingPaused($mailer_log)) {
      // sending is not paused
      return false;
    }
    $error = MailerLog::getError($mailer_log);
    // only resume sending if it was paused by migration
    if (isset($error['operation']) && $error['operation'] === 'migration') {
      return MailerLog::resumeSending();
    }
  }

  public function processTaskStrategy(ScheduledTask $task, $timer) {
    $this->migrateSendingQueues($timer);
    $this->migrateSubscribers($timer);
    $this->resumeSending();
    return true;
  }

  private function checkUnmigratedColumnsExist() {
    global $wpdb;
    $existing_columns = $wpdb->get_col('DESC ' . SendingQueueModel::$_table);
    return in_array('type', $existing_columns);
  }

  public function getUnmigratedQueues() {
    return SendingQueueModel::where('task_id', 0)
      ->whereNull('type');
  }

  public function getTaskIdsForUnmigratedSubscribers() {
    global $wpdb;
    $query = sprintf(
      'SELECT queues.`task_id` FROM %1$s queues INNER JOIN %2$s tasks ON queues.`task_id` = tasks.`id` ' .
      'WHERE tasks.`type` = "sending" AND (tasks.`status` IS NULL OR tasks.`status` = "paused") ' .
      'AND queues.`subscribers` != "" AND queues.`subscribers` != "N;"' .
      'AND queues.`count_total` > (SELECT COUNT(*) FROM %3$s subs WHERE subs.`task_id` = queues.`task_id`)',
      MP_SENDING_QUEUES_TABLE,
      MP_SCHEDULED_TASKS_TABLE,
      MP_SCHEDULED_TASK_SUBSCRIBERS_TABLE
    );
    return $wpdb->get_col($query);
  }

  /*
   * Migrate all sending queues without converting subscriber data
   */
  public function migrateSendingQueues($timer) {
    global $wpdb;

    $queues = $this->getUnmigratedQueues()
      ->select('id')
      ->findArray();

    $column_list = [
      'status',
      'priority',
      'scheduled_at',
      'processed_at',
      'created_at',
      'updated_at',
      'deleted_at',
    ];

    if (!empty($queues)) {
      foreach (array_chunk($queues, self::BATCH_SIZE) as $queue_batch) {
        // abort if execution limit is reached
        $this->cron_helper->enforceExecutionLimit($timer);

        foreach ($queue_batch as $queue) {
          // create a new scheduled task of type "sending"
          $wpdb->query(sprintf(
            'INSERT IGNORE INTO %1$s (`type`, %2$s) ' .
            'SELECT "sending", %2$s FROM %3$s WHERE `id` = %4$s',
            MP_SCHEDULED_TASKS_TABLE,
            '`' . join('`, `', $column_list) . '`',
            MP_SENDING_QUEUES_TABLE,
            $queue['id']
          ));
          // link the queue with the task via task_id
          $new_task_id = $wpdb->insert_id;
          $wpdb->query(sprintf(
            'UPDATE %1$s SET `task_id` = %2$s WHERE `id` = %3$s',
            MP_SENDING_QUEUES_TABLE,
            $new_task_id,
            $queue['id']
          ));
        }
      }
    }

    return true;
  }

  /*
   * Migrate subscribers for in-progress sending tasks from the `subscribers` field to a separate table
   */
  public function migrateSubscribers($timer) {
    global $wpdb;

    // find in-progress queues that have serialized subscribers
    $task_ids = $this->getTaskIdsForUnmigratedSubscribers();

    // check if subscribers for each one were already migrated
    if (!empty($task_ids)) {
      $task_ids = $wpdb->get_col(sprintf(
        'SELECT queues.`task_id` FROM %1$s queues WHERE queues.`task_id` IN(' . join(',', array_map('intval', $task_ids)) . ') ' .
        'AND queues.`count_total` > (SELECT COUNT(*) FROM %2$s subs WHERE subs.`task_id` = queues.`task_id`)',
        MP_SENDING_QUEUES_TABLE,
        MP_SCHEDULED_TASK_SUBSCRIBERS_TABLE
      ));
    }

    if (!empty($task_ids)) {
      foreach ($task_ids as $task_id) {
        // abort if execution limit is reached
        $this->cron_helper->enforceExecutionLimit($timer);

        $this->migrateTaskSubscribers($task_id, $timer);
      }
    }

    return true;
  }

  public function migrateTaskSubscribers($task_id, $timer) {
    global $wpdb;

    $migrated_unprocessed_count = ScheduledTaskSubscriber::getUnprocessedCount($task_id);
    $migrated_processed_count = ScheduledTaskSubscriber::getProcessedCount($task_id);

    $subscribers = $wpdb->get_var(sprintf(
      'SELECT `subscribers` FROM %1$s WHERE `task_id` = %2$d ' .
      'AND (`count_processed` > %3$d OR `count_to_process` > %4$d)',
      MP_SENDING_QUEUES_TABLE,
      $task_id,
      $migrated_unprocessed_count,
      $migrated_processed_count
    ));

    // sanity check
    if (empty($subscribers)) {
      return false;
    }

    $subscribers = unserialize($subscribers);

    if (!empty($subscribers['to_process'])) {
      $subscribers_to_migrate = array_slice($subscribers['to_process'], $migrated_unprocessed_count);
      foreach ($subscribers_to_migrate as $sub_id) {
        // abort if execution limit is reached
        $this->cron_helper->enforceExecutionLimit($timer);

        ScheduledTaskSubscriber::createOrUpdate([
          'task_id' => $task_id,
          'subscriber_id' => $sub_id,
          'processed' => ScheduledTaskSubscriber::STATUS_UNPROCESSED,
        ]);
      }
    }

    if (!empty($subscribers['processed'])) {
      $subscribers_to_migrate = array_slice($subscribers['processed'], $migrated_processed_count);
      foreach ($subscribers_to_migrate as $sub_id) {
        // abort if execution limit is reached
        $this->cron_helper->enforceExecutionLimit($timer);

        ScheduledTaskSubscriber::createOrUpdate([
          'task_id' => $task_id,
          'subscriber_id' => $sub_id,
          'processed' => ScheduledTaskSubscriber::STATUS_PROCESSED,
        ]);
      }
    }

    return true;
  }

  public function getNextRunDate($wp = null) {
    if (is_null($wp)) {
      $wp = new WPFunctions();
    }
    // run migration immediately
    return Carbon::createFromTimestamp($wp->currentTime('timestamp'));
  }
}
