<?php

namespace MailPoet\DynamicSegments\Persistence\Loading;

if (!defined('ABSPATH')) exit;


use MailPoet\DynamicSegments\Mappers\DBMapper;
use MailPoet\Models\DynamicSegment;

class SingleSegmentLoader {

  /** @var DBMapper */
  private $mapper;

  public function __construct(DBMapper $mapper) {
    $this->mapper = $mapper;
  }

  /**
   * @param string|int $segment_id
   * @return DynamicSegment
   */
  public function load($segment_id) {

    $segment = DynamicSegment::findOne($segment_id);
    if (!$segment instanceof DynamicSegment) {
      throw new \InvalidArgumentException('Segment not found');
    }

    $filters = $segment->dynamicSegmentFilters()->findMany();

    return $this->mapper->mapSegment($segment, $filters);
  }



}
