<?php

namespace MailPoet\Features;

if (!defined('ABSPATH')) exit;


use MailPoetVendor\Doctrine\DBAL\Exception\TableNotFoundException;

class FeaturesController {

  // Define features below in the following form:
  //   const FEATURE_NAME_OF_FEATURE = 'name-of-feature';
  const NEW_DEFAULT_LIST_NAME = 'new-default-list-name';
  const NEW_FORM_EDITOR = 'new-form-editor';

  // Define feature defaults in the array below in the following form:
  //   self::FEATURE_NAME_OF_FEATURE => true,
  private $defaults = [
    self::NEW_DEFAULT_LIST_NAME => false,
    self::NEW_FORM_EDITOR => false,
  ];

  /** @var array */
  private $flags;

  /** @var FeatureFlagsRepository */
  private $feature_flags_repository;

  public function __construct(FeatureFlagsRepository $feature_flags_repository) {
    $this->feature_flags_repository = $feature_flags_repository;
  }

  /** @return bool */
  public function isSupported($feature) {
    if (!$this->exists($feature)) {
      throw new \RuntimeException("Unknown feature '$feature'");
    }
    // ensure controller works even if used before migrator, return default value in such case
    try {
      $this->ensureFlagsLoaded();
    } catch (TableNotFoundException $e) {
      return $this->defaults[$feature];
    }
    return $this->flags[$feature];
  }

  /** @return bool */
  public function exists($feature) {
    return array_key_exists($feature, $this->defaults);
  }

  /** @return array */
  public function getDefaults() {
    return $this->defaults;
  }

  /** @return array */
  public function getAllFlags() {
    $this->ensureFlagsLoaded();
    return $this->flags;
  }

  private function ensureFlagsLoaded() {
    if ($this->flags !== null) {
      return;
    }

    $flagsMap = $this->getValueMap();
    $this->flags = [];
    foreach ($this->defaults as $name => $default) {
      $this->flags[$name] = isset($flagsMap[$name]) ? $flagsMap[$name] : $default;
    }
  }

  private function getValueMap() {
    $features = $this->feature_flags_repository->findAll();
    $featuresMap = [];
    foreach ($features as $feature) {
      $featuresMap[$feature->getName()] = (bool)$feature->getValue();
    }
    return $featuresMap;
  }
}
