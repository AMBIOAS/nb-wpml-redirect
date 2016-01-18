<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.strong.no
 * @since      1.0.0
 *
 * @package    Nb_Wpml_Redirect
 * @subpackage Nb_Wpml_Redirect/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nb_Wpml_Redirect
 * @subpackage Nb_Wpml_Redirect/public
 * @author     AMBIO Strong AS <support@strong.no>
 */
class Nb_Wpml_Redirect_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nb_Wpml_Redirect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nb_Wpml_Redirect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nb-wpml-redirect-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Nb_Wpml_Redirect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Nb_Wpml_Redirect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nb-wpml-redirect-public.js', array( 'jquery' ), $this->version, false );

	}
    
     // ==========================================
    function page_access(  ){

        global $user;
        global $sitepress;
       
        // the the language in use now
        _log("> page_access() to ");
        
        
        $current_language = $sitepress->get_current_language();
        global $current_user;
        get_currentuserinfo();
       // _log($current_user);
        
        if ( is_user_logged_in() ) {
            _log("language on this page: ".$current_language);
            _log("default language: ".$sitepress->get_default_language() );

            $can_access_sectors = types_render_usermeta_field( "access-to-sector", array( 
                "separator" => "," ,
                "output" => "raw",
                "user_current" => true
            ) );
            _log("logged in user as: ".$current_user->user_login);
            _log("user can access these sectors: ".$can_access_sectors );
            $can_access_sectors_array = explode(", ", $can_access_sectors);
            _log("is current language OK to access: ".(in_array($current_language,$can_access_sectors_array)?"yes":"no") );
            // check if 
            if ( !in_array($current_language,$can_access_sectors_array) ) {
                _log("go to alternative language or front-page");
                // TODO
                
            }

            $can_access_leader_pages = types_render_usermeta_field( "access-to-leader-pages", array( 
                "output" => "raw",
                "user_current" => true
            ) );
            _log( "access to leader pages: ".($can_access_leader_pages==1?"yes":"no") );
            
            if ( !$can_access_leader_pages ) {
                _log("go back or to front-page");
                
                // TODO
                
            }

        } else {
            _log("visitor");
            // no access!!??
            // go to register page?
            
            // TODO
            
        }
        
        
        
        
          
        
        // _log($sitepress);
        
        // default:
        //_log(&$this);
        // no return
        
    }

}
