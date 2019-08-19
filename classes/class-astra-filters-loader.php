<?php
/**
 * Initialize Astra Filters
 *
 * @package Astra Filters
 * @since 1.0.0
 */

if ( ! class_exists( 'Astra_Filters_Loader' ) ) :

	/**
	 * Astra Filters
	 *
	 * @since 1.0.0
	 */
	class Astra_Filters_Loader {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object Class Instance.
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object initialized object of class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			if ( 'astra' !== get_template() ) {
				add_action( 'admin_notices', array( $this, 'add_install_theme_notice' ), 1 );
				return;
			}

			require_once ASTRA_FILTERS_DIR . 'classes/astra-filters-common-functions.php';

			add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ) );

			require_once ASTRA_FILTERS_DIR . 'classes/astra-filters-helper.php';
		}		

		/**
		 * Add Admin Notice.
		 */
		public function add_install_theme_notice() {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				
				$plugin_name = 'Astra Filters';

				printf( __( '<div class="notice notice-error is-dismissible"><p>Astra Theme needs to be active for you to use currently installed "%1$s" plugin. <a href="%2$s">Install & Activate Now</a></p></div>', 'astra-filters' ), $plugin_name, esc_url( admin_url( 'themes.php?theme=astra' ) ) );
			}
		}

		/**
		 * Set Options Default Values
		 *
		 * @param  array $defaults  Astra options default value array.
		 * @return array
		 */
		public function theme_defaults( $defaults ) {

			$defaults['ast-theme-blog-post-meta-separator'] = '/';
			$defaults['ast-theme-blog-post-read-more-text'] = __( 'Read More &raquo;', 'astra-filters' );
			$defaults['ast-theme-shop-no-more-products'] = __( 'No more products to show.', 'astra-filters' );
			$defaults['ast-theme-blog-no-more-posts'] = __( 'No more posts to show.', 'astra-filters' );
			$defaults['ast-theme-header-woo-logo-title'] = __( 'View your shopping cart', 'astra-filters' );
			$defaults['ast-theme-woo-out-of-stock-label'] = __( 'Out of stock', 'astra-filters' );
			$defaults['ast-theme-blog-enable-updated-date'] = false;
			$defaults['ast-theme-post-hide-prev-next-links'] = false;
			$defaults['ast-theme-sidebar-widget-title-tag'] = 'h4';

			// Astra Pro options started.
			$defaults['ast-pro-hide-page-header-title'] = false;
			$defaults['ast-pro-lifterlms-review-title'] = __( 'What Others Have Said', 'astra-filters' );
			$defaults['ast-pro-lifterlms-review-thankyou-text'] = __( 'Thank you for your review!', 'astra-filters' );
			$defaults['ast-pro-woo-header-cart-label'] = __( 'Cart', 'astra-filters' );
			$defaults['ast-pro-above-menu-flyout-width'] = 325;
			$defaults['ast-pro-below-menu-flyout-width'] = 325;
			$defaults['ast-pro-primary-menu-flyout-width'] = 325;
			$defaults['ast-pro-scroll-to-top-icon-class'] = 'ast-scroll-top-icon';
			$defaults['ast-pro-woo-filter-icon-class'] = 'astra-woo-filter-icon';
			$defaults['ast-theme-menu-toggle-class'] = 'menu-toggle-icon';
			$defaults['ast-pro-below-menu-toggle-class'] = 'menu-toggle-icon';
			$defaults['ast-pro-above-menu-toggle-class'] = 'menu-toggle-icon';
			$defaults['ast-pro-woo-header-cart-total'] = false;
			$defaults['ast-pro-woo-shop-quick-view-label'] = __( 'Quick View', 'astra-filters' );
			$defaults['ast-pro-woo-shop-quick-view-summary-label'] = __( 'Quick View', 'astra-filters' );

			return $defaults;
		}

		/**
		 * Register new panel for Astra Filters and their settings.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register( $wp_customize ) {

			if ( ! defined( 'ASTRA_THEME_SETTINGS' ) ) {
				return;
			}

			/**
			 * Register Sections & Panels
			 */
			require_once ASTRA_FILTERS_DIR . 'includes/general-customizer-panels-and-sections.php';
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Astra_Filters_Loader::get_instance();

endif;
