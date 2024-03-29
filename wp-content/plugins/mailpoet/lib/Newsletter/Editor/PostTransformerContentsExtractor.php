<?php

namespace MailPoet\Newsletter\Editor;

if (!defined('ABSPATH')) exit;


use MailPoet\Config\Env;
use MailPoet\WooCommerce\Helper as WooCommerceHelper;
use MailPoet\WP\Functions as WPFunctions;

class PostTransformerContentsExtractor {

  private $args;

  /** @var WPFunctions */
  private $wp;

  /** @var WooCommerceHelper */
  private $woocommerce_helper;

  public function __construct($args) {
    $this->args = $args;
    $this->wp = new WPFunctions();
    $this->woocommerce_helper = new WooCommerceHelper();
  }

  public function getContent($post, $with_post_class, $display_type) {
    $content_manager = new PostContentManager();
    $meta_manager = new MetaInformationManager();

    $content = $content_manager->getContent($post, $this->args['displayType']);
    $content = $meta_manager->appendMetaInformation($content, $post, $this->args);
    $content = $content_manager->filterContent($content, $display_type, $with_post_class);

    $structure_transformer = new StructureTransformer();
    $content = $structure_transformer->transform($content, $this->args['imageFullWidth'] === true);

    if ($this->isProduct($post)) {
      $content = $this->addProductDataToContent($content, $post);
    }

    $read_more_btn = $this->getReadMoreButton($post);
    $blocks_count = count($content);
    if ($read_more_btn['type'] === 'text' && $blocks_count > 0 && $content[$blocks_count - 1]['type'] === 'text') {
      $content[$blocks_count - 1]['text'] .= $read_more_btn['text'];
    } else {
      $content[] = $read_more_btn;
    }
    return $content;
  }

  private function getImageInfo($id) {
    /*
     * In some cases wp_get_attachment_image_src ignore the second parameter
     * and use global variable $content_width value instead.
     * By overriding it ourselves when ensure a constant behaviour regardless
     * of the user setup.
     *
     * https://mailpoet.atlassian.net/browse/MAILPOET-1365
     */
    global $content_width; // default is NULL

    $content_width_copy = $content_width;
    $content_width = Env::NEWSLETTER_CONTENT_WIDTH;
    $image_info = $this->wp->wpGetAttachmentImageSrc($id, 'mailpoet_newsletter_max');
    $content_width = $content_width_copy;

    return $image_info;
  }

  public function getFeaturedImage($post) {
    $post_id = $post->ID;
    $post_title = $this->sanitizeTitle($post->post_title);
    $image_full_width = (bool)filter_var($this->args['imageFullWidth'], FILTER_VALIDATE_BOOLEAN);

    if (!has_post_thumbnail($post_id)) {
      return false;
    }

    $thumbnail_id = $this->wp->getPostThumbnailId($post_id);
    $image_info = $this->getImageInfo($thumbnail_id);

    // get alt text
    $alt_text = trim(strip_tags(get_post_meta(
      $thumbnail_id,
      '_wp_attachment_image_alt',
      true
    )));
    if (strlen($alt_text) === 0) {
      // if the alt text is empty then use the post title
      $alt_text = trim(strip_tags($post_title));
    }

    return [
      'type' => 'image',
      'link' => $this->wp->getPermalink($post_id),
      'src' => $image_info[0],
      'alt' => $alt_text,
      'fullWidth' => $image_full_width,
      'width' => $image_info[1],
      'height' => $image_info[2],
      'styles' => [
        'block' => [
          'textAlign' => 'center',
        ],
      ],
    ];
  }

  private function getReadMoreButton($post) {
    if ($this->args['readMoreType'] === 'button') {
      $button = $this->args['readMoreButton'];
      $button['url'] = $this->wp->getPermalink($post->ID);
      return $button;
    }

    $read_more_text = sprintf(
      '<p><a href="%s">%s</a></p>',
      $this->wp->getPermalink($post->ID),
      $this->args['readMoreText']
    );

    return [
      'type' => 'text',
      'text' => $read_more_text,
    ];
  }

  public function getTitle($post) {
    $title = $this->sanitizeTitle($post->post_title);

    if (filter_var($this->args['titleIsLink'], FILTER_VALIDATE_BOOLEAN)) {
      $title = '<a href="' . $this->wp->getPermalink($post->ID) . '">' . $title . '</a>';
    }

    if (in_array($this->args['titleFormat'], ['h1', 'h2', 'h3'])) {
      $tag = $this->args['titleFormat'];
    } elseif ($this->args['titleFormat'] === 'ul') {
      $tag = 'li';
    } else {
      $tag = 'h1';
    }

    $alignment = (in_array($this->args['titleAlignment'], ['left', 'right', 'center'])) ? $this->args['titleAlignment'] : 'left';

    $title = '<' . $tag . ' data-post-id="' . $post->ID . '" style="text-align: ' . $alignment . ';">' . $title . '</' . $tag . '>';
    return [
      'type' => 'text',
      'text' => $title,
    ];
  }

  private function getPrice($post) {
    $price = null;
    $product = null;
    if ($this->woocommerce_helper->isWooCommerceActive()) {
      $product = $this->woocommerce_helper->wcGetProduct($post->ID);
    }
    if ($product) {
      $price = '<h2>' . strip_tags($product->get_price_html(), '<span><del>') . '</h2>';
    }
    return $price;
  }

  private function addProductDataToContent($content, $post) {
    if (!isset($this->args['pricePosition']) || $this->args['pricePosition'] === 'hidden') {
      return $content;
    }
    $price = $this->getPrice($post);
    $blocks_count = count($content);
    if ($blocks_count > 0 && $content[$blocks_count - 1]['type'] === 'text') {
      if ($this->args['pricePosition'] === 'below') {
        $content[$blocks_count - 1]['text'] = $content[$blocks_count - 1]['text'] . $price;
      } else {
        $content[$blocks_count - 1]['text'] = $price . $content[$blocks_count - 1]['text'];
      }
    } else {
      $content[] = [
        'type' => 'text',
        'text' => $price,
      ];
    }
    return $content;
  }

  public function isProduct($post) {
    return $post->post_type === 'product';
  }

  /**
   * Replaces double quote character with a unicode
   * alternative to avoid problems when inlining CSS.
   * [MAILPOET-1937]
   *
   * @param  string $title
   * @return string
   */
  private function sanitizeTitle($title) {
    return str_replace('"', '＂', $title);
  }
}
