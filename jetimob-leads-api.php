<?php
/**
 * API de Leads Jetimob
 *
 *
 * @link
 * @since             1.0.2
 * @package           jetimob_leads_api
 *
 * @wordpress-plugin
 * Plugin Name:       API de Leads Jetimob
 * Plugin URI:        http://opaweb.net
 * Description:       Envia dados do Contact Form 7 para a API de Leads Jetimob
 * Version:           1.0.2
 * Author:            Opaweb
 * Author URI: 		  https://opaweb.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jetimob-leads-api
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
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
