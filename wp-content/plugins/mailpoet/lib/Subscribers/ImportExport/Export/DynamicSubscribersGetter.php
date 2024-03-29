<?php

namespace MailPoet\Subscribers\ImportExport\Export;

if (!defined('ABSPATH')) exit;


use MailPoet\Models\Segment;
use MailPoet\Models\Subscriber;
use MailPoet\WP\Functions as WPFunctions;

/**
 * Gets batches of subscribers from dynamic segments.
 */
class DynamicSubscribersGetter extends SubscribersGetter {

  protected $segment_index = 0;

  /** @var WPFunctions */
  private $wp;

  public function __construct($segments_ids, $batch_size, WPFunctions $wp = null) {
    parent::__construct($segments_ids, $batch_size);
    if ($wp == null) {
      $wp = new WPFunctions;
    }
    $this->wp = $wp;
  }

  public function reset() {
    parent::reset();
    $this->segment_index = 0;
  }

  protected function filter($subscribers) {
    $segment_id = $this->segments_ids[$this->segment_index];

    $filters = $this->wp->applyFilters(
      'mailpoet_get_segment_filters',
      $segment_id
    );

    if (!is_array($filters) || empty($filters)) {
      return [];
    }

    $segment = Segment::findOne($segment_id);
    if (!$segment instanceof Segment) {
      return [];
    }
    $name = $segment->name;

    foreach ($filters as $filter) {
      $subscribers = $filter->toSql($subscribers);
    }

    return $subscribers
      ->selectMany([
        'list_status' => Subscriber::$_table . '.status',
      ])
      ->selectExpr("'" . $name . "' AS segment_name")
      ->offset($this->offset)
      ->limit($this->batch_size)
      ->findArray();
  }

  public function get() {
    if ($this->segment_index >= count($this->segments_ids)) {
      $this->finished = true;
    }

    $subscribers = parent::get();

    if ($subscribers !== false && count($subscribers) < $this->batch_size) {
      $this->segment_index ++;
      $this->offset = 0;
      $this->finished = false;
    }

    return $subscribers;
  }

}
