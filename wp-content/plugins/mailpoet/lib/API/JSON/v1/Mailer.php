<?php

namespace MailPoet\API\JSON\v1;

if (!defined('ABSPATH')) exit;


use MailPoet\API\JSON\Endpoint as APIEndpoint;
use MailPoet\API\JSON\Error as APIError;
use MailPoet\Config\AccessControl;
use MailPoet\Mailer\MailerLog;
use MailPoet\Mailer\MetaInfo;
use MailPoet\Services\AuthorizedEmailsController;
use MailPoet\Services\Bridge;
use MailPoet\Settings\SettingsController;
use MailPoet\WP\Functions as WPFunctions;

class Mailer extends APIEndpoint {

  /** @var AuthorizedEmailsController */
  private $authorized_emails_controller;

  /** @var Bridge */
  private $bridge;

  /** @var SettingsController */
  private $settings;

  /** @var MetaInfo */
  private $mailerMetaInfo;

  public $permissions = [
    'global' => AccessControl::PERMISSION_MANAGE_EMAILS,
  ];

  public function __construct(AuthorizedEmailsController $authorized_emails_controller, SettingsController $settings, Bridge $bridge, MetaInfo $mailerMetaInfo) {
    $this->authorized_emails_controller = $authorized_emails_controller;
    $this->settings = $settings;
    $this->bridge = $bridge;
    $this->mailerMetaInfo = $mailerMetaInfo;
  }

  public function send($data = []) {
    try {
      $mailer = new \MailPoet\Mailer\Mailer();
      $mailer->init(
        (isset($data['mailer'])) ? $data['mailer'] : false,
        (isset($data['sender'])) ? $data['sender'] : false,
        (isset($data['reply_to'])) ? $data['reply_to'] : false
      );
      // report this as 'sending_test' in metadata since this endpoint is only used to test sending methods for now
      $extra_params = [
        'meta' => $this->mailerMetaInfo->getSendingTestMetaInfo(),
      ];
      $result = $mailer->send($data['newsletter'], $data['subscriber'], $extra_params);
    } catch (\Exception $e) {
      return $this->errorResponse([
        $e->getCode() => $e->getMessage(),
      ]);
    }

    if ($result['response'] === false) {
      $error = sprintf(
        WPFunctions::get()->__('The email could not be sent: %s', 'mailpoet'),
        $result['error']->getMessage()
      );
      return $this->errorResponse([APIError::BAD_REQUEST => $error]);
    } else {
      return $this->successResponse(null);
    }
  }

  public function resumeSending() {
    if ($this->settings->get(AuthorizedEmailsController::AUTHORIZED_EMAIL_ADDRESSES_ERROR_SETTING)) {
      $this->authorized_emails_controller->checkAuthorizedEmailAddresses();
    }
    MailerLog::resumeSending();
    return $this->successResponse(null);
  }

  public function getAuthorizedEmailAddresses() {
    $authorized_emails = $this->bridge->getAuthorizedEmailAddresses();
    return $this->successResponse($authorized_emails);
  }
}
