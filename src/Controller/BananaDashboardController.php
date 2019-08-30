<?php
/**
 * Created by PhpStorm.
 * User: Ashmika
 * Date: 2019-08-28
 * Time: 10:04
 */
namespace Drupal\banana_dashboard\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Banana Dashboard module.
 */
class BananaDashboardController extends ControllerBase
{
    /**
     * Returns a simple page.
     *
     * @return array
     *   A simple renderable array.
     */
    public function getBananaDashboard() {
        //$path = drupal_get_path('module', 'banana_dashboard');
        //drupal_add_css($path . '/css/banana_dashboard.css'); //TODO: Add css later
        $dashboard_menu = banana_dashboard_get('dashboard_menu', array());
        foreach ($dashboard_menu as $key => $value) {
            if ($value['url'] == FALSE || !\Drupal::service('path.validator')->isValid(substr($value['url'], 1))) {
                unset($dashboard_menu[$key]);
            }
        }

        $dashboard = banana_dashboard_get('dashboard', array());
        $groups = banana_dashboard_get('dashboard_menu_groups', array('System'));
        $menu_group = array();
        foreach ($groups as $group) {
            $menu_group[$group] = array();
        }

        $legacy_icons_map = _banana_dashboard_legacy_icon_map();

        foreach ($dashboard_menu as $menu) {
            $group = isset($menu['group']) ? $menu['group'] : 'System';
            // Replace the legacy icons with fa-icons.
            if (isset($legacy_icons_map[$menu['icon']])) {
                $menu['icon'] = $legacy_icons_map[$menu['icon']];
            }
            // Handle domain prefixes.
            $menu['url'] = \Drupal\core\Url::fromRoute($menu['url']); //instead of url($menu['url']) in D7
            $menu_group[$group][] = $menu;
        }
        foreach ($menu_group as $group => $menu) {
            if (empty($menu)) {
                unset($menu_group[$group]);
            }
        }
        //kint($dashboard_menu);
        return array(
            '#theme' => 'banana_dashboard',
            '#title' => $dashboard['title'],
            '#dashboard_menu' => $menu_group
        );
    }
}