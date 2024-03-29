<?php

namespace MailPoet\AdminPages\Pages;

if (!defined('ABSPATH')) exit;


use MailPoet\AdminPages\PageRenderer;
use MailPoet\Config\Menu;
use MailPoet\WP\Functions as WPFunctions;

class RevenueTrackingPermission {
  /** @var PageRenderer */
  private $page_renderer;

  /** @var WPFunctions */
  private $wp;

  public function __construct(
    PageRenderer $page_renderer,
    WPFunctions $wp
  ) {
    $this->page_renderer = $page_renderer;
    $this->wp = $wp;
  }

  public function render() {
    if ((bool)(defined('DOING_AJAX') && DOING_AJAX)) return;
    $data = [
      'finish_wizard_url' => $this->wp->adminUrl('admin.php?page=' . Menu::MAIN_PAGE_SLUG),
    ];
    $this->page_renderer->displayPage('revenue_tracking_permission.html', $data);
  }
}
