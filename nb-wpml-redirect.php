<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.strong.no
 * @since             1.0.0
 * @package           Nb_Wpml_Redirect
 *
 * @wordpress-plugin
 * Plugin Name:       WPML Redirect
 * Plugin URI:        http://netblast.no/wordpress/plugins/nb-wpml-redirect/
 * Description:       Login redirect based on language defined on user. Access to pages and posts based on language and limited if page or post is for leaders only. 
 * Version:           1.0.0
 * Author:            AMBIO Strong AS
 * Author URI:        http://www.strong.no
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nb-wpml-redirect
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if(!function_exists('_log')){
  function _log( $message ) {
    if( WP_DEBUG === true ){
      if( is_array( $message ) || is_object( $message ) ){
        error_log( print_r( $message, true ) );
      } else {
        error_log( $message );
      }
    }
  }
}

require 'plugin-updates/plugin-update-checker.php';
$MyUpdateChecker = PucFactory::buildUpdateChecker(
    'http://netblast.no/wordpress/plugins/nb-wpml-redirect/metadata.json?timestamp='.time(),
    __FILE__,
    'nb-wpml-redirect'
);

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nb-wpml-redirect-activator.php
 */
function activate_nb_wpml_redirect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nb-wpml-redirect-activator.php';
	Nb_Wpml_Redirect_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nb-wpml-redirect-deactivator.php
 */
function deactivate_nb_wpml_redirect() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nb-wpml-redirect-deactivator.php';
	Nb_Wpml_Redirect_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nb_wpml_redirect' );
register_deactivation_hook( __FILE__, 'deactivate_nb_wpml_redirect' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nb-wpml-redirect.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nb_wpml_redirect() {

	$plugin = new Nb_Wpml_Redirect();
	$plugin->run();

}
run_nb_wpml_redirect();
