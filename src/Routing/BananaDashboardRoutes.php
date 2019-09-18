<?php

namespace Drupal\banana_dashboard\Routing;

use Symfony\Component\Routing\Route;

/**
 * Defines a route subscriber to register a url for serving image styles.
 */
class BananaDashboardRoutes {

  /**
   * Returns an array of route objects.
   *
   * @return \Symfony\Component\Routing\Route[]
   *   An array of route objects.
   */
  public function routes() {
    $routes = [];
    $dashboard = banana_dashboard_get('dashboard');
    $dashboard = empty($dashboard) ? [] : $dashboard;
    $defaults = [
      'url' => '/admin/dashboard',
      'title' => 'Dashboard',
      'permission' => 'access banana dashboard',
    ];
    $dashboard = array_merge( $defaults, $dashboard);
    $routes['banana_dashboard.banana_dash'] = new Route(
      $dashboard['url'],
      [
        '_controller' => '\Drupal\banana_dashboard\Controller\BananaDashboardController::getBananaDashboard',
        '_title' => $dashboard['title'],
      ],
      [
        '_permission' => $dashboard['permission'],
      ]
    );
    return $routes;
  }

}
