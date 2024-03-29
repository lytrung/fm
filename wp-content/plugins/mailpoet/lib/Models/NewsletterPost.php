<?php

namespace MailPoet\Models;

if (!defined('ABSPATH')) exit;


/**
 * @property int $newsletter_id
 * @property int $post_id
 * @property string $updated_at
 */
class NewsletterPost extends Model {
  public static $_table = MP_NEWSLETTER_POSTS_TABLE;

  public static function getNewestNewsletterPost($newsletter_id) {
    return self::where('newsletter_id', $newsletter_id)
      ->orderByDesc('created_at')
      ->findOne();
  }
}
