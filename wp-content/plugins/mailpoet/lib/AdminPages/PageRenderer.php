<?php

namespace MailPoet\AdminPages;

if (!defined('ABSPATH')) exit;


use MailPoet\Config\Renderer;
use MailPoet\Features\FeaturesController;
use MailPoet\Referrals\ReferralDetector;
use MailPoet\Settings\SettingsController;
use MailPoet\Tracy\DIPanel\DIPanel;
use MailPoet\WP\Notice as WPNotice;
use Tracy\Debugger;

class PageRenderer {
  /** @var Renderer */
  private $renderer;

  /** @var FeaturesController */
  private $features_controller;

  /** @var SettingsController */
  private $settings;

  public function __construct(
    Renderer $renderer,
    FeaturesController $features_controller,
    SettingsController $settings
  ) {
    $this->renderer = $renderer;
    $this->features_controller = $features_controller;
    $this->settings = $settings;
  }

  /**
   * Set common data for template and display template
   * @param string $template
   * @param array $data
   */
  public function displayPage($template, array $data = []) {
    $defaults = [
      'feature_flags' => $this->features_controller->getAllFlags(),
      'referral_id' => $this->settings->get(ReferralDetector::REFERRAL_SETTING_NAME),
    ];
    try {
      if (class_exists(Debugger::class)) {
        DIPanel::init();
      }
      echo $this->renderer->render($template, $data + $defaults);
    } catch (\Exception $e) {
      $notice = new WPNotice(WPNotice::TYPE_ERROR, $e->getMessage());
      $notice->displayWPNotice();
    }
  }
}
