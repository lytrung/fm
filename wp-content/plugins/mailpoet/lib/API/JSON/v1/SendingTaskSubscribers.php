<?php

namespace MailPoet\API\JSON\v1;

if (!defined('ABSPATH')) exit;


use MailPoet\API\JSON\Endpoint as APIEndpoint;
use MailPoet\API\JSON\Error as APIError;
use MailPoet\Config\AccessControl;
use MailPoet\Cron\CronHelper;
use MailPoet\Listing;
use MailPoet\Models\Newsletter;
use MailPoet\Models\ScheduledTask;
use MailPoet\Models\ScheduledTaskSubscriber;
use MailPoet\Models\SendingQueue as SendingQueueModel;
use MailPoet\Settings\SettingsController;
use MailPoet\WP\Functions as WPFunctions;

class SendingTaskSubscribers extends APIEndpoint {
  public $permissions = [
    'global' => AccessControl::PERMISSION_MANAGE_EMAILS,
  ];

  /** @var Listing\Handler */
  private $listing_handler;

  /** @var SettingsController */
  private $settings;

  /** @var CronHelper */
  private $cron_helper;

  /** @var WPFunctions */
  private $wp;

  public function __construct(
    Listing\Handler $listing_handler,
    SettingsController $settings,
    CronHelper $cron_helper,
    WPFunctions $wp
  ) {
    $this->listing_handler = $listing_handler;
    $this->settings = $settings;
    $this->cron_helper = $cron_helper;
    $this->wp = $wp;
  }

  public function listing($data = []) {
    $newsletter_id = !empty($data['params']['id']) ? (int)$data['params']['id'] : false;
    $tasks_ids = SendingQueueModel::select('task_id')
      ->where('newsletter_id', $newsletter_id)
      ->findArray();
    if (empty($tasks_ids)) {
      return $this->errorResponse([
        APIError::NOT_FOUND => __('This email has not been sent yet.', 'mailpoet'),
      ]);
    }
    $data['params']['task_ids'] = array_column($tasks_ids, 'task_id');
    $listing_data = $this->listing_handler->get('\MailPoet\Models\ScheduledTaskSubscriber', $data);

    $items = [];
    foreach ($listing_data['items'] as $item) {
      $items[] = $item->asArray();
    }

    return $this->successResponse($items, [
      'count' => $listing_data['count'],
      'filters' => $listing_data['filters'],
      'groups' => $listing_data['groups'],
      'mta_log' => $this->settings->get('mta_log'),
      'mta_method' => $this->settings->get('mta.method'),
      'cron_accessible' => $this->cron_helper->isDaemonAccessible(),
      'current_time' => $this->wp->currentTime('mysql'),
    ]);
  }

  public function resend($data = []) {
    $task_id = !empty($data['taskId']) ? (int)$data['taskId'] : false;
    $subscriber_id = !empty($data['subscriberId']) ? (int)$data['subscriberId'] : false;
    $task_subscriber = ScheduledTaskSubscriber::where('task_id', $task_id)
      ->where('subscriber_id', $subscriber_id)
      ->findOne();
    $task = ScheduledTask::findOne($task_id);
    $sending_queue = SendingQueueModel::where('task_id', $task_id)->findOne();
    if (
      !($task instanceof ScheduledTask)
      || !($task_subscriber instanceof ScheduledTaskSubscriber)
      || !($sending_queue instanceof SendingQueueModel)
      || $task_subscriber->failed != 1
    ) {
      return $this->errorResponse([
        APIError::NOT_FOUND => __('Failed sending task not found!', 'mailpoet'),
      ]);
    }
    $newsletter = Newsletter::findOne($sending_queue->newsletter_id);
    if (!($newsletter instanceof Newsletter)) {
      return $this->errorResponse([
        APIError::NOT_FOUND => __('Newsletter not found!', 'mailpoet'),
      ]);
    }

    $task_subscriber->error = '';
    $task_subscriber->failed = 0;
    $task_subscriber->processed = 0;
    $task_subscriber->save();

    $task->status = null;
    $task->save();

    $newsletter->status = Newsletter::STATUS_SENDING;
    $newsletter->save();

    return $this->successResponse([]);
  }
}
