<?php

namespace MailPoet\API\JSON\v1;

if (!defined('ABSPATH')) exit;


use MailPoet\API\JSON\Endpoint as APIEndpoint;
use MailPoet\API\JSON\Error as APIError;
use MailPoet\Config\AccessControl;
use MailPoet\Settings\UserFlagsController;
use MailPoet\WP\Functions as WPFunctions;

class UserFlags extends APIEndpoint {

  /** @var UserFlagsController */
  private $user_flags;

  public $permissions = [
    'global' => AccessControl::ALL_ROLES_ACCESS,
  ];

  public function __construct(UserFlagsController $user_flags) {
    $this->user_flags = $user_flags;
  }

  public function set(array $flags = []) {
    if (empty($flags)) {
      return $this->badRequest(
        [
          APIError::BAD_REQUEST =>
            WPFunctions::get()->__('You have not specified any user flags to be saved.', 'mailpoet'),
        ]);
    } else {
      foreach ($flags as $name => $value) {
        $this->user_flags->set($name, $value);
      }
      return $this->successResponse([]);
    }
  }
}
