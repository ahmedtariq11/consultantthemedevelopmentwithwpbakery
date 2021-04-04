<?php
/*
 * Plugin Name: CW Service
 * Version: 1.0.1
 * Plugin URI: http://ahmedwp.com
 * Description: Create and manage services in the easiest way.
 * Author: Ahmed Ali
 * Author URI: http://creativewp.com/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Define constants **/
define( 'CW_SERVICE_VER', '1.0.0' );
define( 'CW_SERVICE_DIR', plugin_dir_path( __FILE__ ) );
define( 'CW_SERVICE_URL', plugin_dir_url( __FILE__ ) );

/** Load files **/
require_once CW_SERVICE_DIR . '/inc/class-service.php';
require_once CW_SERVICE_DIR . '/inc/frontend.php';

new CW_Service;

/**
 * Load language file
 *
 * @since  1.0.0
 *
 * @return void
 */
function cw_service_load_text_domain() {
	load_plugin_textdomain( 'cw-service', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}

add_action( 'init', 'cw_service_load_text_domain' );
