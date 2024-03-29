<?php

namespace MailPoet\WooCommerce\TransactionalEmails;

if (!defined('ABSPATH')) exit;


use MailPoet\Models\Newsletter;
use MailPoet\Newsletter\Renderer\Preprocessor;
use MailPoet\Newsletter\Renderer\Renderer as NewsletterRenderer;
use MailPoetVendor\csstidy;
use MailPoetVendor\csstidy_print;

class Renderer {
  const CONTENT_CONTAINER_ID = 'mailpoet_woocommerce_container';

  /** @var csstidy */
  private $css_parser;

  /** @var string */
  private $html_before_content;

  /** @var string */
  private $html_after_content;

  public function __construct(csstidy $css_parser) {
    $this->css_parser = $css_parser;
    $this->html_before_content = '';
    $this->html_after_content = '';
  }

  public function render(Newsletter $newsletter, NewsletterRenderer $renderer = null) {
    $renderer = $renderer ?: new NewsletterRenderer($newsletter, true);
    $html = explode(Preprocessor::WC_CONTENT_PLACEHOLDER, $renderer->render('html'));
    $this->html_before_content = $html[0];
    $this->html_after_content = $html[1];
  }

  public function getHTMLBeforeContent($heading_text) {
    if (empty($this->html_before_content)) {
      throw new \Exception("You should call 'render' before 'getHTMLBeforeContent'");
    }
    $html = str_replace(Preprocessor::WC_HEADING_PLACEHOLDER, $heading_text, $this->html_before_content);
    return $html . '<div id="' . self::CONTENT_CONTAINER_ID . '"><div id="body_content_inner">';
  }

  public function getHTMLAfterContent() {
    if (empty($this->html_after_content)) {
      throw new \Exception("You should call 'render' before 'getHTMLAfterContent'");
    }
    return '</div></div>' . $this->html_after_content;
  }

  public function prefixCss($css) {
    $this->css_parser->settings['compress_colors'] = false;
    $this->css_parser->parse($css);
    foreach ($this->css_parser->css as $index => $rules) {
      $this->css_parser->css[$index] = [];
      foreach ($rules as $selectors => $properties) {
        $selectors = explode(',', $selectors);
        $selectors = array_map(function($selector) {
          return '#' . self::CONTENT_CONTAINER_ID . ' ' . $selector;
        }, $selectors);
        $selectors = implode(',', $selectors);
        $this->css_parser->css[$index][$selectors] = $properties;
      }
    }
    /** @var csstidy_print */
    $print = $this->css_parser->print;
    return $print->plain();
  }
}
