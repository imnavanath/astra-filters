<?php
/**
 * Astra Theme & Addon Common function.
 *
 * @package Astra Filters
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Validate is Astra Pro plugin activate
 */
if ( ! function_exists( '_is_astra_pro_activate' ) ) {

	function _is_astra_pro_activate() {

		if ( defined( 'ASTRA_EXT_FILE' ) ) {
			return true;
		}

		return false;
	}
}
