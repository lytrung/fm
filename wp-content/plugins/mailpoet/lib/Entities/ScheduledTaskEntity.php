<?php

namespace MailPoet\Entities;

if (!defined('ABSPATH')) exit;


use DateTimeInterface;
use MailPoet\Doctrine\EntityTraits\AutoincrementedIdTrait;
use MailPoet\Doctrine\EntityTraits\CreatedAtTrait;
use MailPoet\Doctrine\EntityTraits\DeletedAtTrait;
use MailPoet\Doctrine\EntityTraits\UpdatedAtTrait;
use MailPoetVendor\Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="scheduled_tasks")
 */
class ScheduledTaskEntity {
  const STATUS_COMPLETED = 'completed';
  const STATUS_SCHEDULED = 'scheduled';
  const STATUS_PAUSED = 'paused';
  const VIRTUAL_STATUS_RUNNING = 'running'; // For historical reasons this is stored as null in DB
  const PRIORITY_HIGH = 1;
  const PRIORITY_MEDIUM = 5;
  const PRIORITY_LOW = 10;

  use AutoincrementedIdTrait;
  use CreatedAtTrait;
  use UpdatedAtTrait;
  use DeletedAtTrait;

  /**
   * @ORM\Column(type="string")
   * @var string|null
   */
  private $type;

  /**
   * @ORM\Column(type="string")
   * @var string|null
   */
  private $status;

  /**
   * @ORM\Column(type="integer")
   * @var int
   */
  private $priority = 0;

  /**
   * @ORM\Column(type="datetimetz")
   * @var DateTimeInterface|null
   */
  private $scheduled_at;

  /**
   * @ORM\Column(type="datetimetz")
   * @var DateTimeInterface|null
   */
  private $processed_at;

  /**
   * @ORM\Column(type="json")
   * @var array|null
   */
  private $meta;

  /**
   * @return string|null
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string|null $type
   */
  public function setType($type) {
    $this->type = $type;
  }

  /**
   * @return string|null
   */
  public function getStatus() {
    return $this->status;
  }

  /**
   * @param string|null $status
   */
  public function setStatus($status) {
    $this->status = $status;
  }

  /**
   * @return int
   */
  public function getPriority() {
    return $this->priority;
  }

  /**
   * @param int $priority
   */
  public function setPriority($priority) {
    $this->priority = $priority;
  }

  /**
   * @return DateTimeInterface|null
   */
  public function getScheduledAt() {
    return $this->scheduled_at;
  }

  /**
   * @param DateTimeInterface|null $scheduled_at
   */
  public function setScheduledAt($scheduled_at) {
    $this->scheduled_at = $scheduled_at;
  }

  /**
   * @return DateTimeInterface|null
   */
  public function getProcessedAt() {
    return $this->processed_at;
  }

  /**
   * @param DateTimeInterface|null $processed_at
   */
  public function setProcessedAt($processed_at) {
    $this->processed_at = $processed_at;
  }

  /**
   * @return array|null
   */
  public function getMeta() {
    return $this->meta;
  }

  /**
   * @param array|null $meta
   */
  public function setMeta($meta) {
    $this->meta = $meta;
  }
}
