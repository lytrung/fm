<?php

namespace MailPoet\API;

if (!defined('ABSPATH')) exit;


use MailPoet\DI\ContainerWrapper;
use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;

class API {

  /**
   * @param string $version
   * @return \MailPoet\API\MP\v1\API
   * @throws \Exception
   */
  public static function MP($version) {
    $api_class = sprintf('%s\MP\%s\API', __NAMESPACE__, $version);
    try {
      return ContainerWrapper::getInstance()->get($api_class);
    } catch (ServiceNotFoundException $e) {
      throw new \Exception(__('Invalid API version.', 'mailpoet'));
    }
  }
}
