<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.strong.no
 * @since      1.0.0
 *
 * @package    Nb_Wpml_Redirect
 * @subpackage Nb_Wpml_Redirect/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Nb_Wpml_Redirect
 * @subpackage Nb_Wpml_Redirect/includes
 * @author     AMBIO Strong AS <support@strong.no>
 */
class Nb_Wpml_Redirect_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'nb-wpml-redirect',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
