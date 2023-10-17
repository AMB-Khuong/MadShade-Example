<?php




/**
* Functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package Amoeba Group
*/
define('URL_THEME', get_stylesheet_directory_uri());

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );

}




/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Amoeba\\Inc\\Init' ) ) {
	Amoeba\Inc\Init::registerServices();
}