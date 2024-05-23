<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://trailblazecreative.com/
 * @since      1.0.0
 *
 * @package    Trailblaze_Divi_Modules
 * @subpackage Trailblaze_Divi_Modules/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Trailblaze_Divi_Modules
 * @subpackage Trailblaze_Divi_Modules/includes
 * @author     TrailBlaze Creative <websupport@trailblazecreative.com>
 */
class Trailblaze_Divi_Modules_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'trailblaze-divi-modules',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
