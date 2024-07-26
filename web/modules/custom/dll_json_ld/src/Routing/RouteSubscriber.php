<?php

namespace Drupal\dll_json_ld\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Define dynamic routes for each content type based on URL aliases.
    $routes = [
      'dll_json_ld.json_ld_author_authorities' => '/dll-author/{id}',
      'dll_json_ld.json_ld_work' => '/dll-work/{id}',
      'dll_json_ld.json_ld_item_record' => '/dll-item-record/{id}',
      'dll_json_ld.json_ld_web_page' => '/dll-web-page/{id}',
    ];

    foreach ($routes as $name => $path) {
      if ($route = $collection->get($name)) {
        $route->setPath($path);
        $route->setDefault('_controller', '\Drupal\dll_json_ld\Controller\\' . ucfirst(str_replace('dll_json_ld.json_ld_', '', $name)) . 'Controller::view');
        $route->setRequirements(['_access' => 'TRUE']);
      }
    }
  }
}
