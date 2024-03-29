<?php

namespace MailPoet\Mailer;

if (!defined('ABSPATH')) exit;


use MailPoet\Settings\SettingsController;

class MailerLog {
  const SETTING_NAME = 'mta_log';
  const STATUS_PAUSED = 'paused';
  const RETRY_ATTEMPTS_LIMIT = 3;
  const RETRY_INTERVAL = 120; // seconds

  public static function getMailerLog($mailer_log = false) {
    if ($mailer_log) return $mailer_log;
    $settings = SettingsController::getInstance();
    $mailer_log = $settings->get(self::SETTING_NAME);
    if (!$mailer_log) {
      $mailer_log = self::createMailerLog();
    }
    return $mailer_log;
  }

  public static function createMailerLog() {
    $mailer_log = [
      'sent' => null,
      'started' => time(),
      'status' => null,
      'retry_attempt' => null,
      'retry_at' => null,
      'error' => null,
    ];
    $settings = SettingsController::getInstance();
    $settings->set(self::SETTING_NAME, $mailer_log);
    return $mailer_log;
  }

  public static function resetMailerLog() {
    return self::createMailerLog();
  }

  public static function updateMailerLog($mailer_log) {
    $settings = SettingsController::getInstance();
    $settings->set(self::SETTING_NAME, $mailer_log);
    return $mailer_log;
  }

  public static function enforceExecutionRequirements($mailer_log = false) {
    $mailer_log = self::getMailerLog($mailer_log);
    if ($mailer_log['retry_attempt'] === self::RETRY_ATTEMPTS_LIMIT) {
      $mailer_log = self::pauseSending($mailer_log);
    }
    if (self::isSendingPaused($mailer_log)) {
      throw new \Exception(__('Sending has been paused.', 'mailpoet'));
    }
    if (!is_null($mailer_log['retry_at'])) {
      if (time() <= $mailer_log['retry_at']) {
        throw new \Exception(__('Sending is waiting to be retried.', 'mailpoet'));
      } else {
        $mailer_log['retry_at'] = null;
        self::updateMailerLog($mailer_log);
      }
    }
    // ensure that sending frequency has not been reached
    if (self::isSendingLimitReached($mailer_log)) {
      throw new \Exception(__('Sending frequency limit has been reached.', 'mailpoet'));
    }
  }

  public static function pauseSending($mailer_log) {
    $mailer_log['status'] = self::STATUS_PAUSED;
    $mailer_log['retry_attempt'] = null;
    $mailer_log['retry_at'] = null;
    return self::updateMailerLog($mailer_log);
  }

  public static function resumeSending() {
    return self::resetMailerLog();
  }

  /**
   * Process error, doesn't increase retry_attempt so it will not block sending
   *
   * @param string $operation
   * @param string $error_message
   * @param int $retry_interval
   *
   * @throws \Exception
   */
  public static function processNonBlockingError($operation, $error_message, $retry_interval = self::RETRY_INTERVAL) {
    $mailer_log = self::getMailerLog();
    $mailer_log['retry_at'] = time() + $retry_interval;
    $mailer_log = self::setError($mailer_log, $operation, $error_message);
    self::updateMailerLog($mailer_log);
    self::enforceExecutionRequirements();
  }

  /**
   * Process error, increase retry_attempt and block sending if it goes above RETRY_INTERVAL
   *
   * @param string $operation
   * @param string $error_message
   * @param string $error_code
   * @param bool $pause_sending
   *
   * @throws \Exception
   */
  public static function processError($operation, $error_message, $error_code = null, $pause_sending = false) {
    $mailer_log = self::getMailerLog();
    $mailer_log['retry_attempt']++;
    $mailer_log['retry_at'] = time() + self::RETRY_INTERVAL;
    $mailer_log = self::setError($mailer_log, $operation, $error_message, $error_code);
    self::updateMailerLog($mailer_log);
    if ($pause_sending) {
      self::pauseSending($mailer_log);
    }
    self::enforceExecutionRequirements();
  }

  public static function setError($mailer_log, $operation, $error_message, $error_code = null) {
    $mailer_log['error'] = [
      'operation' => $operation,
      'error_message' => $error_message,
    ];
    if ($error_code) {
      $mailer_log['error']['error_code'] = $error_code;
    }
    return $mailer_log;
  }

  public static function getError($mailer_log = false) {
    $mailer_log = self::getMailerLog($mailer_log);
    return isset($mailer_log['error']) ? $mailer_log['error'] : null;
  }

  public static function incrementSentCount() {
    $mailer_log = self::getMailerLog();
    // do not increment count if sending limit is reached
    if (self::isSendingLimitReached($mailer_log)) return;
    // clear previous retry count, errors, etc.
    if ($mailer_log['error']) {
      $mailer_log = self::clearSendingErrorLog($mailer_log);
    }
    (int)$mailer_log['sent']++;
    return self::updateMailerLog($mailer_log);
  }

  public static function clearSendingErrorLog($mailer_log) {
    $mailer_log['retry_attempt'] = null;
    $mailer_log['retry_at'] = null;
    $mailer_log['error'] = null;
    return self::updateMailerLog($mailer_log);
  }

  public static function isSendingLimitReached($mailer_log = false) {
    $settings = SettingsController::getInstance();
    $mailer_config = $settings->get(Mailer::MAILER_CONFIG_SETTING_NAME);
    // do not enforce sending limit for MailPoet's sending method
    if ($mailer_config['method'] === Mailer::METHOD_MAILPOET) return false;
    $mailer_log = self::getMailerLog($mailer_log);
    $elapsed_time = time() - (int)$mailer_log['started'];

    if (empty($mailer['frequency'])) {
      $default_settings = $settings->getAllDefaults();
      $mailer['frequency'] = $default_settings['mta']['frequency'];
    }
    $frequency_interval = (int)$mailer_config['frequency']['interval'] * Mailer::SENDING_LIMIT_INTERVAL_MULTIPLIER;
    $frequency_limit = (int)$mailer_config['frequency']['emails'];

    if ($mailer_log['sent'] >= $frequency_limit) {
      if ($elapsed_time <= $frequency_interval) return true;
      // reset mailer log as enough time has passed since the limit was reached
      self::resetMailerLog();
    }
    return false;
  }

  public static function isSendingPaused($mailer_log = false) {
    $mailer_log = self::getMailerLog($mailer_log);
    return $mailer_log['status'] === self::STATUS_PAUSED;
  }
}
