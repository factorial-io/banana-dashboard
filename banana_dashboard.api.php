<?php
/**
 * @file
 * Hooks provided by the banana_dashboard module.
 */

/**
 * Overwrite the banana_dashboard yaml file.
 */
function hook_banana_dashboard_yaml_file_path_alter() {
    return $filepath;
}

/**
 * Alter the banana_dashboard settings array.
 */
function hook_banana_dashboard_settings_alter($settings) {

}