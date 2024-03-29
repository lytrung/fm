<?php

namespace MailPoet\Cron\Workers\SendingQueue\Tasks;

if (!defined('ABSPATH')) exit;


use MailPoet\Models\NewsletterLink as NewsletterLinkModel;
use MailPoet\Models\Subscriber;
use MailPoet\Newsletter\Links\Links as NewsletterLinks;
use MailPoet\Router\Endpoints\Track;
use MailPoet\Router\Router;
use MailPoet\Settings\SettingsController;
use MailPoet\Subscribers\LinkTokens;
use MailPoet\Subscription\SubscriptionUrlFactory;
use MailPoet\Util\Helpers;

class Links {
  public static function process($rendered_newsletter, $newsletter, $queue) {
    list($rendered_newsletter, $links) =
      self::hashAndReplaceLinks($rendered_newsletter, $newsletter->id, $queue->id);
    self::saveLinks($links, $newsletter, $queue);
    return $rendered_newsletter;
  }

  public static function hashAndReplaceLinks($rendered_newsletter, $newsletter_id, $queue_id) {
    // join HTML and TEXT rendered body into a text string
    $content = Helpers::joinObject($rendered_newsletter);
    list($content, $links) = NewsletterLinks::process($content, $newsletter_id, $queue_id);
    $links = NewsletterLinks::ensureUnsubscribeLink($links);
    // split the processed body with hashed links back to HTML and TEXT
    list($rendered_newsletter['html'], $rendered_newsletter['text'])
      = Helpers::splitObject($content);
    return [
      $rendered_newsletter,
      $links,
    ];
  }

  public static function saveLinks($links, $newsletter, $queue) {
    return NewsletterLinks::save($links, $newsletter->id, $queue->id);
  }

  public static function getUnsubscribeUrl($queue, $subscriber_id) {
    $subscriber = Subscriber::where('id', $subscriber_id)->findOne();
    $settings = SettingsController::getInstance();
    if ((boolean)$settings->get('tracking.enabled')) {
      $link_hash = NewsletterLinkModel::where('queue_id', $queue->id)
        ->where('url', NewsletterLinkModel::UNSUBSCRIBE_LINK_SHORT_CODE)
        ->findOne();
      if (!$link_hash instanceof NewsletterLinkModel) {
        return '';
      }
      $link_tokens = new LinkTokens;
      $data = NewsletterLinks::createUrlDataObject(
        $subscriber->id,
        $link_tokens->getToken($subscriber),
        $queue->id,
        $link_hash->hash,
        false
      );
      $url = Router::buildRequest(
        Track::ENDPOINT,
        Track::ACTION_CLICK,
        $data
      );
    } else {
      $subscription_url_factory = SubscriptionUrlFactory::getInstance();
      $url = $subscription_url_factory->getUnsubscribeUrl($subscriber);
    }
    return $url;
  }
}
