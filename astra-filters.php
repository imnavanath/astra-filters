<?php
/**
 * Plugin Name: Astra Filters
 * Description: Astra Filter allows you to modify the static text that comes with Astra theme and Astra Pro addon.
 * Version: 1.0.0
 * Author: Brainstorm Force, Navanath Bhosale
 * Author URI: http://www.brainstormforce.com
 * Text Domain: astra-filters
 *
 * @package Astra Filters
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Set constants.
 */
define( 'ASTRA_FILTERS_FILE', __FILE__ );
define( 'ASTRA_FILTERS_BASE', plugin_basename( ASTRA_FILTERS_FILE ) );
define( 'ASTRA_FILTERS_DIR', plugin_dir_path( ASTRA_FILTERS_FILE ) );
define( 'ASTRA_FILTERS_URL', plugins_url( '/', ASTRA_FILTERS_FILE ) );
define( 'ASTRA_FILTERS_VER', '1.0.0' );

if ( ! function_exists( 'execute_astra_filters' ) ) :

	/**
	 * Astra Filters Setup
	 *
	 * @since 1.0.0
	 */
	function execute_astra_filters() {
		require_once ASTRA_FILTERS_DIR . 'classes/class-astra-filters-loader.php';
	}

	add_action( 'plugins_loaded', 'execute_astra_filters' );

endif;

if ( ! function_exists( 'customize_navigation_link' ) ) :

	/**
	 * Astra Filters navigation to customizer
	 *
	 * @since 1.0.0
	 */
	function customize_navigation_link( $links ) {

		$links = array_merge( array( '<a href="customize.php">' . __( 'Customize', 'astra-filters' ) . '</a>' ), $links );
		return $links;
	}

	add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'customize_navigation_link' );

endif;
