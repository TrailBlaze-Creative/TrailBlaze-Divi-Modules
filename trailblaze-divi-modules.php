<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://trailblazecreative.com/
 * @since             1.0.0
 * @package           Trailblaze_Divi_Modules
 *
 * @wordpress-plugin
 * Plugin Name:       TrailBlaze Divi Modules
 * Plugin URI:        https://github.com/TrailBlaze-Creative/TrailBlaze-Divi-Modules
 * Description:       A TrailBlaze plugin that contains all custom Divi modules and Divi module extentions.
 * Version:           1.0.3
 * Author:            TrailBlaze Creative
 * Author URI:        https://https://trailblazecreative.com//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       trailblaze-divi-modules
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TRAILBLAZE_DIVI_MODULES_VERSION', '1.0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-trailblaze-divi-modules-activator.php
 */
function activate_trailblaze_divi_modules() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-trailblaze-divi-modules-activator.php';
	Trailblaze_Divi_Modules_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-trailblaze-divi-modules-deactivator.php
 */
function deactivate_trailblaze_divi_modules() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-trailblaze-divi-modules-deactivator.php';
	Trailblaze_Divi_Modules_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_trailblaze_divi_modules' );
register_deactivation_hook( __FILE__, 'deactivate_trailblaze_divi_modules' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-trailblaze-divi-modules.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_trailblaze_divi_modules() {

	$plugin = new Trailblaze_Divi_Modules();
	$plugin->run();

}

require plugin_dir_path( __FILE__ ) . 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/TrailBlaze-Creative/TrailBlaze-Divi-Modules',
    __FILE__,
    'TrailBlaze-Divi-Modules'
);

$myUpdateChecker->setBranch('main');

run_trailblaze_divi_modules();
