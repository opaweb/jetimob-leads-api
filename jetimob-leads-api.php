<?php
/**
 * API de Leads Jetimob
 *
 *
 * @link
 * @since             1.0
 * @package           jetimob_leads_api
 *
 * @wordpress-plugin
 * Plugin Name:       API de Leads Jetimob
 * Plugin URI:        http://opaweb.net
 * Description:       Envia dados do Contact Form 7 para a API de Leads Jetimob
 * Version:           1.0.4
 * Author:            Opaweb
 * Author URI: 		  https://opaweb.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jetimob-leads-api
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
 /**
  * Plugin Activation hook function to check for Minimum PHP and WordPress versions
  * @param string $wp Minimum version of WordPress required for this plugin
  * @param string $php Minimum version of PHP required for this plugin
  */
 function activate( $wp = '4.8', $php = '7.2.24' ) {
    global $wp_version;
    if ( version_compare( PHP_VERSION, $php, '<' ) )
        $flag = 'PHP';
    elseif
        ( version_compare( $wp_version, $wp, '<' ) )
        $flag = 'WordPress';
    else
        return;
    $version = 'PHP' == $flag ? $php : $wp;
    deactivate_plugins( basename( __FILE__ ) );
    wp_die('<p>O plugin <strong>API de Leads Jetimob</strong> requer '.$flag.'  versão '.$version.' ou superior.</p>','Plugin Activation Error',  array( 'response'=>200, 'back_link'=>TRUE ) );
}
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'QS_CF7_API_PLUGIN_PATH' , plugin_dir_path( __FILE__ ) );
define( 'QS_CF7_API_INCLUDES_PATH' , plugin_dir_path( __FILE__ ). 'includes/' );
define( 'QS_CF7_API_TEMPLATE_PATH' , get_template_directory() );
define( 'QS_CF7_API_ADMIN_JS_URL' , plugin_dir_url( __FILE__ ). 'assets/js/' );
define( 'QS_CF7_API_ADMIN_CSS_URL' , plugin_dir_url( __FILE__ ). 'assets/css/' );
define( 'QS_CF7_API_FRONTEND_JS_URL' , plugin_dir_url( __FILE__ ). 'assets/js/' );
define( 'QS_CF7_API_FRONTEND_CSS_URL' , plugin_dir_url( __FILE__ ). 'assets/css/' );
define( 'QS_CF7_API_IMAGES_URL' , plugin_dir_url( __FILE__ ). 'assets/css/' );

add_action( 'plugins_loaded', 'qs_cf7_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function qs_cf7_textdomain() {
    load_plugin_textdomain( 'qs-cf7-api', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
/**
 * The core plugin class
 */
require_once QS_CF7_API_INCLUDES_PATH . 'class.cf7-api.php';

/**
 * Activation and deactivation hooks
 *
 */
register_activation_hook( __FILE__ ,  'cf7_api_activation_handler'  );
register_deactivation_hook( __FILE__ , 'cf7_api_deactivation_handler' );


function cf7_api_activation_handler(){
    do_action( 'cf7_api_activated' );
}

function cf7_api_deactivation_handler(){
    do_action( 'cf7_api_deactivated' );
}
/**
 * Begins execution of the plugin.
 *
 * Init the plugin process
 *
 * @since    1.0.0
 */
function qs_init_cf7_api() {
    global $qs_cf7_api;

	$qs_cf7_api = new QS_CF7_atp_integration();
	$qs_cf7_api->version = '1.1.1';
	$qs_cf7_api->plugin_basename = plugin_basename( __FILE__ );

	$qs_cf7_api->init();

}

qs_init_cf7_api();

include_once('updater.php');
if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $config = array(
      'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
      'proper_folder_name' => 'jetimob-leads-api', // this is the name of the folder your plugin lives in
      'api_url' => 'https://api.github.com/repos/opaweb/jetimob-leads-api', // the GitHub API url of your GitHub repo
      'raw_url' => 'https://raw.github.com/opaweb/jetimob-leads-api/master', // the GitHub raw url of your GitHub repo
      'github_url' => 'https://github.com/opaweb/jetimob-leads-api', // the GitHub url of your GitHub repo
      'zip_url' => 'https://github.com/opaweb/jetimob-leads-api/zipball/master', // the zip url of the GitHub repo
      'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
      'requires' => '4.8', // which version of WordPress does your plugin require?
      'tested' => '5.3', // which version of WordPress is your plugin tested up to?
      'readme' => 'README.md', // which file to use as the readme for the version number
      'access_token' => '', // Access private repositories by authorizing under Appearance > GitHub Updates when this example plugin is installed
    );
    new WP_GitHub_Updater($config);
  }
