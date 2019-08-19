<?php
/**
 * Astra Filters Helper
 *
 * @package Astra Filters
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Astra_Filters_Helper' ) ) {

	/**
	 * Astra_Filters_Helper class.
	 */
	class Astra_Filters_Helper {

		/**
		 * Init filters.
		 */
		public static function init() {

			$filters = array(
				'astra_post_meta_separator' => __CLASS__ . '::astra_post_meta_separator_func',
				'astra_post_read_more' => __CLASS__ . '::astra_post_read_more_func',
				'astra_post_date' => __CLASS__ . '::astra_post_date_func',
				'astra_single_post_navigation_enabled' => __CLASS__ . '::astra_single_post_navigation_enabled_func',
				'astra_woo_view_shopping_cart_title' => __CLASS__ . '::astra_woo_view_shopping_cart_title_func',
				'lifterlms_reviews_section_title' => __CLASS__ . '::lifterlms_reviews_section_title_func',
				'astra_woo_shop_out_of_stock_string' => __CLASS__ . '::astra_woo_shop_out_of_stock_string_func',
				'astra_widgets_init' => __CLASS__ . '::astra_widgets_title_tag_change_func',
				'astra_main_menu_toggle_icon' => __CLASS__ . '::astra_main_menu_toggle_icon_func',
				'llms_review_thank_you_text' => __CLASS__ . '::llms_review_thank_you_text_func',

				// Astra Pro's filters started.

				'astra_above_header_menu_toggle_icon' => __CLASS__ . '::astra_above_header_menu_toggle_icon_func',
				'astra_below_header_menu_toggle_icon' => __CLASS__ . '::astra_below_header_menu_toggle_icon_func',
				'astra_header_cart_count' => __CLASS__ . '::astra_header_cart_count_func',
				'astra_scroll_top_icon' => __CLASS__ . '::astra_scroll_top_icon_func',
				'astra_woo_off_canvas_trigger_icon' => __CLASS__ . '::astra_woo_off_canvas_trigger_icon_func',
				'astra_above_flayout_sidebar_width' => __CLASS__ . '::astra_above_flayout_sidebar_width_func',
				'astra_below_flayout_sidebar_width' => __CLASS__ . '::astra_below_flayout_sidebar_width_func',
				'astra_flayout_sidebar_width' => __CLASS__ . '::astra_flayout_sidebar_width_func',
				'astra_header_cart_title' => __CLASS__ . '::astra_header_cart_title_func',
				'astra_advanced_header_title' => __CLASS__ . '::astra_advanced_header_title_func',
				'astra_blog_no_more_post_text' => __CLASS__ . '::astra_blog_no_more_post_text_func',
				'astra_shop_no_more_product_text' => __CLASS__ . '::astra_shop_no_more_product_text_func',
			);

			foreach ( $filters as $filter => $function ) {
				add_filter( $filter, $function );
			}

			add_filter( 'astra_woo_add_quick_view_text_html', __CLASS__ . '::astra_woo_add_quick_view_text_html_func', 10, 3 );

			add_filter( 'astra_woo_add_quick_view_button_html', __CLASS__ . '::astra_woo_add_quick_view_button_html_func', 10, 3 );
		}

		/**
		 * Blog Posts page meta field separator.
		 *
		 * @since 1.0.0
		 */
		public static function astra_post_meta_separator_func() {
			return astra_get_option( 'ast-theme-blog-post-meta-separator' );
		}

		/**
		 * Blog Posts page Read More Text.
		 *
		 * @since 1.0.0
		 */
		public static function astra_post_read_more_func() {
			return astra_get_option( 'ast-theme-blog-post-read-more-text' );
		}

		/**
		 * Woo shop page load no more text.
		 *
		 * @since 1.0.0
		 */
		public static function astra_shop_no_more_product_text_func() {
			return astra_get_option( 'ast-theme-shop-no-more-products' );
		}

		/**
		 * Woo cart header icon title.
		 *
		 * @since 1.0.0
		 */
		public static function astra_woo_view_shopping_cart_title_func() {
			return astra_get_option( 'ast-theme-header-woo-logo-title' );
		}

		/**
		 * Blog page load no more text.
		 *
		 * @since 1.0.0
		 */
		public static function astra_blog_no_more_post_text_func() {
			return astra_get_option( 'ast-theme-blog-no-more-posts' );
		}

		/**
		 * LifterLMS review title.
		 *
		 * @since 1.0.0
		 */
		public static function lifterlms_reviews_section_title_func() {
			return astra_get_option( 'ast-pro-lifterlms-review-title' );
		}

		/**
		 * LifterLMS review thank you text.
		 *
		 * @since 1.0.0
		 */
		public static function llms_review_thank_you_text_func() {
			return astra_get_option( 'ast-pro-lifterlms-review-thankyou-text' );
		}

		/**
		 * WooCommerce Shop page Out of Stock text.
		 *
		 * @since 1.0.0
		 */
		public static function astra_woo_shop_out_of_stock_string_func() {
			return astra_get_option( 'ast-theme-woo-out-of-stock-label' );
		}

		/**
		 * Blog page enable last updated date format.
		 *
		 * @since 1.0.0
		 */
		public static function astra_post_date_func( $output ) {

			if ( true == astra_get_option( 'ast-theme-blog-enable-updated-date' ) ) {
				$output        = '';
				$format        = apply_filters( 'astra_post_date_format', '' );
				$modified_date = esc_html( get_the_modified_date( $format ) );
				$modified_on   = sprintf(
					esc_html( '%s' ),
					$modified_date
				);
				$output       .= '<span class="posted-on">';
				$output       .= '<span class="post-updated" itemprop="dateModified"> ' . $modified_on . '</span>';
				$output       .= '</span>';
				return $output;
			}

			return $output;
		}

		/**
		 * Hide single post's previous and next post links.
		 *
		 * @param array $nav_bool navigation.
		 */
		public static function astra_single_post_navigation_enabled_func( $nav_bool ) {

			if ( true == astra_get_option( 'ast-theme-post-hide-prev-next-links' ) ) {
				$nav_bool = false;
				return $nav_bool;
			}

			return $nav_bool;
		}

		/**
		 * Hide page header's page title.
		 *
		 * @param array $title Attributes.
		 */
		public static function astra_advanced_header_title_func( $title ) {

			if ( true == astra_get_option( 'ast-pro-hide-page-header-title' ) ) {
				return false;
			}

			return $title;
		}

		/**
		 * Header WooCommerce menu item Cart text.
		 *
		 * @since 1.0.0
		 */
		public static function astra_header_cart_title_func() {
			return astra_get_option( 'ast-pro-woo-header-cart-label' );
		}

		/**
		 * Astra pro above menu flyout sidebar width
		 *
		 * @since 1.0.0
		 */
		public static function astra_above_flayout_sidebar_width_func() {
			return astra_get_option( 'ast-pro-above-menu-flyout-width' );
		}

		/**
		 * Astra pro below menu flyout sidebar width
		 *
		 * @since 1.0.0
		 */
		public static function astra_below_flayout_sidebar_width_func() {
			return astra_get_option( 'ast-pro-below-menu-flyout-width' );
		}

		/**
		 * Astra pro primary menu flyout sidebar width
		 *
		 * @since 1.0.0
		 */
		public static function astra_flayout_sidebar_width_func() {
			return astra_get_option( 'ast-pro-primary-menu-flyout-width' );
		}

		/**
		 * Astra widget sidebar heading tag
		 *
		 * @since 1.0.0
		 */
		public static function astra_widgets_title_tag_change_func( $atts ) {

			$widget_title_tag = astra_get_option( 'ast-theme-sidebar-widget-title-tag' );

			if ( isset( $widget_title_tag ) && ! empty( $widget_title_tag ) ) {
				$atts['before_title'] = '<'. $widget_title_tag .' class="widget-title">';
				$atts['after_title'] = '</'. $widget_title_tag .'>';
				return $atts;
			}

			return $atts;
		}

		/**
		 * Astra pro scroll to top icon class
		 *
		 * @since 1.0.0
		 */
		public static function astra_scroll_top_icon_func() {
			return astra_get_option( 'ast-pro-scroll-to-top-icon-class' );
		}

		/**
		 * Astra pro WooCommerce offcanvas filter icon class
		 *
		 * @since 1.0.0
		 */
		public static function astra_woo_off_canvas_trigger_icon_func() {
			return astra_get_option( 'ast-pro-woo-filter-icon-class' );
		}

		/**
		 * Astra pro - Primary header, Menu toggle icon class
		 *
		 * @since 1.0.0
		 */
		public static function astra_main_menu_toggle_icon_func() {
			return astra_get_option( 'ast-theme-menu-toggle-class' );
		}

		/**
		 * Astra pro - Below header, Menu toggle icon class
		 *
		 * @since 1.0.0
		 */
		public static function astra_below_header_menu_toggle_icon_func() {
			return astra_get_option( 'ast-pro-below-menu-toggle-class' );
		}

		/**
		 * Astra pro - Above header, Menu toggle icon class
		 *
		 * @since 1.0.0
		 */
		public static function astra_above_header_menu_toggle_icon_func() {
			return astra_get_option( 'ast-pro-below-menu-toggle-class' );
		}

		/**
		 * Disable header cart total count of items
		 *
		 * @since 1.0.0
		 */
		public static function astra_header_cart_count_func() {

			if ( true == astra_get_option( 'ast-pro-woo-header-cart-total' ) ) {
				return false;
			}

			return true;
		}

		/**
		 * Change Quick View text from the shop page (for on image button option)
		 *
		 * @since 1.0.0
		 */
		public static function astra_woo_add_quick_view_text_html_func( $button, $label, $product_id ) {

			global $product;
    		$product_id = $product->get_id();

			$label = astra_get_option( 'ast-pro-woo-shop-quick-view-label' );
			$button = '<a href="#" class="ast-quick-view-text" data-product_id="' . esc_attr( $product_id ) . '">' . esc_html( $label ) . '</a>';
			return $button;
		}

		/**
		 * Change Quick View text from the shop page (for after summary option)
		 *
		 * @since 1.0.0
		 */
		public static function astra_woo_add_quick_view_button_html_func( $button, $label, $product_id ) {

			global $product;
    		$product_id = $product->get_id();

			$label = astra_get_option( 'ast-pro-woo-shop-quick-view-summary-label' );
			$button  = '<div class="ast-qv-button-wrap">';
			$button .= '<a href="#" class="button ast-quick-view-button" data-product_id="' . esc_attr( $product_id ) . '">' . esc_html( $label ) . '</a>';
			$button .= '</div>';
			return $button;
		}
	}

	Astra_Filters_Helper::init();
}
