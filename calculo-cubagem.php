<?php

/*
Plugin Name: Calculo Cubagem
Description: Cálculo de cubagem de cargas para transporte rodoviário
Version: 1.0
Author: Eduardo Tourinho
License: GPL2
*/
define ( 'CALCULO_CUBAGEM_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );

require (CALCULO_CUBAGEM_DIR . '/inc/class.widget.php');


// Init Simple Tags
function init_cubagem() {
	// Load client
	new Calculo_Cubagem_Widget();

	add_action( 'widgets_init', create_function( '', 'return register_widget("Calculo_Cubagem_Widget");' ) );
}

/**
 * Never worry about cache again!
 */
function load_scripts($hook) {

	// create my own version codes
	$my_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/cubagem.js' ));
	$my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'stylesheet/cubagem.css' ));

	//
	wp_enqueue_script( 'cubagem_js', plugins_url( 'js/cubagem.js', __FILE__ ), array('jquery'), $my_js_ver );
	wp_register_style( 'cubagem_css',    plugins_url( 'stylesheet/cubagem.css',    __FILE__ ), false,   $my_css_ver );
	wp_enqueue_style ( 'cubagem_css' );

}

add_action('wp_enqueue_scripts', 'load_scripts');
add_action( 'plugins_loaded', 'init_cubagem' );