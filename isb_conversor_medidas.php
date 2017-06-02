<?php

/*
Plugin Name:Conversor de Medidas
Description: Conversor de diferentes medidas (peso, distância, volume e temperatura)
Version: 1.0
Author: Eduardo Tourinho
License: GPL2
*/
define ( 'ISB_CONVERSOR_MEDIDAS_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );

require (ISB_CONVERSOR_MEDIDAS_DIR . '/inc/class.widget.php');


// Init Simple Tags
function init_conversor() {
	// Load client
	new ISB_Conversor_Medidas_Widget();

	add_action( 'widgets_init', create_function( '', 'return register_widget("ISB_Conversor_Medidas_Widget");' ) );
}

/**
 * Never worry about cache again!
 */
function load_scripts_conversor($hook) {

	// create my own version codes
	$my_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/conversor.js' ));
	$my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'stylesheet/styles.css' ));

	//
	wp_enqueue_script( 'conversor_js', plugins_url( 'js/conversor.js', __FILE__ ), array('jquery'), $my_js_ver );
	wp_register_style( 'conversor_css',    plugins_url( 'stylesheet/styles.css',    __FILE__ ), false,   $my_css_ver );
	wp_enqueue_style ( 'conversor_css' );
}

add_action('wp_enqueue_scripts', 'load_scripts_conversor');
add_action( 'plugins_loaded', 'init_conversor' );