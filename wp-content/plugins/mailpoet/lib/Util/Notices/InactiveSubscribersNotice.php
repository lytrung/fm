<?php

namespace MailPoet\Util\Notices;

if (!defined('ABSPATH')) exit;


use MailPoet\Models\Subscriber;
use MailPoet\Settings\SettingsController;
use MailPoet\Util\Helpers;
use MailPoet\WP\Functions as WPFunctions;
use MailPoet\WP\Notice;

class InactiveSubscribersNotice {
  const OPTION_NAME = 'inactive-subscribers-notice';
  const MIN_INACTIVE_SUBSCRIBERS_COUNT = 50;

  /** @var SettingsController */
  private $settings;

  /** @var WPFunctions */
  private $wp;

  public function __construct(SettingsController $settings, WPFunctions $wp) {
    $this->settings = $settings;
    $this->wp = $wp;
  }

  public function init($should_display) {
    if (!$should_display || !$this->settings->get(self::OPTION_NAME, true)) {
      return;
    }

    // don't display notice if user has changed the default inactive time range
    $inactive_days = $this->settings->get('deactivate_subscriber_after_inactive_days');
    if ($inactive_days !== SettingsController::DEFAULT_DEACTIVATE_SUBSCRIBER_AFTER_INACTIVE_DAYS) {
      return;
    }

    $inactive_subscribers_count = Subscriber::getInactiveSubscribersCount();
    if ($inactive_subscribers_count < self::MIN_INACTIVE_SUBSCRIBERS_COUNT) {
      return;
    }
    return $this->display($inactive_subscribers_count);
  }

  public function disable() {
    $this->settings->set(self::OPTION_NAME, false);
  }

  private function display($inactive_subscribers_count) {
    $go_to_settings_string = __('Go to the Advanced Settings', 'mailpoet');

    $notice = sprintf(
      __('Good news! MailPoet won’t send emails to your %s inactive subscribers. This is a standard practice to maintain good deliverability and open rates. But if you want to disable it, you can do so in settings. [link]Read more.[/link]', 'mailpoet'),
      $this->wp->numberFormatI18n($inactive_subscribers_count)
    );
    $notice = Helpers::replaceLinkTags($notice, 'https://kb.mailpoet.com/article/264-inactive-subscribers', [
      'target' => '_blank',
      'data-beacon-article' => '5cbf19622c7d3a026fd3efe1',
    ]);
    $notice = "<p>$notice</p>";
    $notice .= '<p><a href="admin.php?page=mailpoet-settings#advanced" class="button button-primary">' . $go_to_settings_string . '</a></p>';

    $extra_classes = 'mailpoet-dismissible-notice is-dismissible';

    Notice::displaySuccess($notice, $extra_classes, self::OPTION_NAME, false);
    return $notice;
  }
}
