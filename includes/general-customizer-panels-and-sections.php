<?php
/**
 * Astra Filters - Panels & Sections
 *
 * @package Astra Filters for Astra Theme and Astra Pro
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sanitizes the checkbox field
 */
if ( ! function_exists( 'astra_filters_sanitize_checkbox' ) ) {

	function astra_filters_sanitize_checkbox( $checked ) {

		if( isset( $checked ) && true == $checked ) {
			return true;
		}

		return false;
	}
}

/**
 * Layout Panel and Sections
 */
$wp_customize->add_panel(
	'panel-astra-filters', array(
		'title'    => __( 'Astra Filters', 'astra-filters' ),
		'priority' => 150,
	)
);

$wp_customize->add_section(
	'section-astra-filters-blog', array(
		'panel'    => 'panel-astra-filters',
		'title'    => __( 'Blog', 'astra-filters' ),
		'priority' => 5,
	)
);

$wp_customize->add_section(
	'section-astra-filters-woo', array(
		'panel'    => 'panel-astra-filters',
		'title'    => __( 'WooCommerce', 'astra-filters' ),
		'priority' => 10,
	)
);

$wp_customize->add_section(
	'section-astra-filters-lifterlms', array(
		'title'    => __( 'LifterLMS', 'astra-filters' ),
		'panel'    => 'panel-astra-filters',
		'priority' => 15,
	)
);

$wp_customize->add_section(
	'section-astra-filters-general', array(
		'title'    => __( 'General', 'astra-filters' ),
		'panel'    => 'panel-astra-filters',
		'priority' => 15,
	)
);

/**
 * Option: Add Settings for Blog posts page
 */

// On Blog page meta separator for all posts.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-blog-post-meta-separator]', array(
		'default'           => astra_get_option( 'ast-theme-blog-post-meta-separator' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-blog-post-meta-separator]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-blog',
		'label'    => __( 'Blog Post Meta Separator', 'astra-filters' ),
		'description'	=> __( 'Field to change the separator on blog page meta details.', 'astra-filters' ),
		'priority' => 5,
	)
);

// On Blog page Read More text for all posts.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-blog-post-read-more-text]', array(
		'default'           => astra_get_option( 'ast-theme-blog-post-read-more-text' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-blog-post-read-more-text]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-blog',
		'label'    => __( 'Blog Page - Read More Text', 'astra-filters' ),
		'description'	=> __( 'Field to change the Read More text on blog page posts.', 'astra-filters' ),
		'priority' => 10,
	)
);

// For Blog page change published date to last updated date.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-blog-enable-updated-date]', array(
		'default'           => astra_get_option( 'ast-theme-blog-enable-updated-date' ),
		'type'              => 'option',
		'sanitize_callback' => 'astra_filters_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-blog-enable-updated-date]', array(
		'type' => 'checkbox',
		'section' => 'section-astra-filters-blog',
		'label' => __( 'Enable Last Updated Date Format', 'astra-filters' ),
		'description'    => __( 'Display Last Updated date instead of Published Date on blog page posts meta.', 'astra-filters' ),
		'priority' => 30,
	)
);

// For Blog page hide previous and next page links.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-post-hide-prev-next-links]', array(
		'default'           => astra_get_option( 'ast-theme-post-hide-prev-next-links' ),
		'type'              => 'option',
		'sanitize_callback' => 'astra_filters_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-post-hide-prev-next-links]', array(
		'type' => 'checkbox',
		'section' => 'section-astra-filters-blog',
		'label' => __( 'Hide Previous and Next Post Links', 'astra-filters' ),
		'description'    => __( 'Check this option to hide previous post and next post link on single post page.', 'astra-filters' ),
		'priority' => 35,
	)
);

/**
 * Option: Add Settings for WooCommerce Shop page
 */

// For header Woo-widget hover text and logo title.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-header-woo-logo-title]', array(
		'default'           => astra_get_option( 'ast-theme-header-woo-logo-title' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-header-woo-logo-title]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-woo',
		'label'    => __( 'Header Cart Icon Title', 'astra-filters' ),
		'description'	=> __( 'Field to change text after hover header WooCommerce cart icon.', 'astra-filters' ),
		'priority' => 10,
	)
);

// For Out of Stock text on shop page.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-woo-out-of-stock-label]', array(
		'default'           => astra_get_option( 'ast-theme-woo-out-of-stock-label' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-woo-out-of-stock-label]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-woo',
		'label'    => __( 'Out of Stock Text', 'astra-filters' ),
		'description'	=> __( 'Field to change Out Of Stock text on WooCommerce shop page.', 'astra-filters' ),
		'priority' => 10,
	)
);

/**
 * General Options started 
 */

// For sidebar widget heading tag.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-sidebar-widget-title-tag]', array(
		'default'           => astra_get_option( 'ast-theme-sidebar-widget-title-tag' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-sidebar-widget-title-tag]', array(
		'type'     => 'select',
		'section'  => 'section-astra-filters-general',
		'label'    => __( 'Sidebar Widget Title Tag', 'astra-filters' ),
		'description'	=> __( 'Choose the sidebar title tag for Astra sidebar widget.', 'astra-filters' ),
		'choices'  => array(
			'h1' => __( 'H1', 'astra-filters' ),		
			'h2' => __( 'H2', 'astra-filters' ),
			'h3' => __( 'H3', 'astra-filters' ),
			'h4' => __( 'H4', 'astra-filters' ),		
			'h5' => __( 'H5', 'astra-filters' ),
			'h6' => __( 'H6', 'astra-filters' ),
			'p' => __( 'p', 'astra-filters' ),
		),
		'priority' => 30,
	)
);

// For responsive primary menu toggle class.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-menu-toggle-class]', array(
		'default'           => astra_get_option( 'ast-theme-menu-toggle-class' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-menu-toggle-class]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-general',
		'label'    => __( 'Primary Header Toggle Menu Icon Class', 'astra-filters' ),
		'description'	=> __( 'Field to change class name for primary header responsive toggle menu icon, can be replace by any font-awesome icon.', 'astra-filters' ),
		'priority' => 35,
	)
);

/**
 * Option: Add Settings for LifterLMS
 */

// For LifterLMS review title.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-lifterlms-review-title]', array(
		'default'           => astra_get_option( 'ast-pro-lifterlms-review-title' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-lifterlms-review-title]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-lifterlms',
		'label'    => __( 'Review Title', 'astra-filters' ),
		'description'	=> __( 'Field to change title for LifterLMS review title.', 'astra-filters' ),
		'priority' => 5,
	)
);

// For LifterLMS review thank you text.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-lifterlms-review-thankyou-text]', array(
		'default'           => astra_get_option( 'ast-pro-lifterlms-review-thankyou-text' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-lifterlms-review-thankyou-text]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-lifterlms',
		'label'    => __( 'Review Thank You Text', 'astra-filters' ),
		'description'	=> __( 'Field to change thank you text for LifterLMS review.', 'astra-filters' ),
		'priority' => 10,
	)
);

/*
 *
 * Astra Pro customization options started here
 *
 */

if ( ! _is_astra_pro_activate() ) {
	return;
}

/**
 * Option: For Blog page
 */

// For Blog page no more posts option for infinte scroll.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-blog-no-more-posts]', array(
		'default'           => astra_get_option( 'ast-theme-blog-no-more-posts' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-blog-no-more-posts]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-blog',
		'label'    => __( 'Blog Page - Infinite Scroll Text', 'astra-filters' ),
		'description'	=> __( 'Field to change the No More Posts to Show text on infinite scroll Blog page.', 'astra-filters' ),
		'priority' => 20,
	)
);

// Hide page title from page header.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-hide-page-header-title]', array(
		'default'           => astra_get_option( 'ast-pro-hide-page-header-title' ),
		'type'              => 'option',
		'sanitize_callback' => 'astra_filters_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-hide-page-header-title]', array(
		'type' => 'checkbox',
		'section' => 'section-astra-filters-general',
		'label' => __( 'Hide Page Title from Page Headers', 'astra-filters' ),
		'description'    => __( 'Check this option if you want to hide the page title from custom page header.', 'astra-filters' ),
		'priority' => 5,
	)
);

// For above menu flyout sidebar width size.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-above-menu-flyout-width]', array(
		'default'           => astra_get_option( 'ast-pro-above-menu-flyout-width' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-above-menu-flyout-width]', array(
		'type'     => 'number',
		'section'  => 'section-astra-filters-general',
		'label'    => __( 'Above Menu Flyout Menu Width', 'astra-filters' ),
		'description'	=> __( 'Field to change the width of flyout sidebar for above menu.', 'astra-filters' ),
		'priority' => 15,
	)
);

// For below menu flyout sidebar width size.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-below-menu-flyout-width]', array(
		'default'           => astra_get_option( 'ast-pro-below-menu-flyout-width' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-below-menu-flyout-width]', array(
		'type'     => 'number',
		'section'  => 'section-astra-filters-general',
		'label'    => __( 'Below Menu Flyout Menu Width', 'astra-filters' ),
		'description'	=> __( 'Field to change the width of flyout sidebar for below menu.', 'astra-filters' ),
		'priority' => 20,
	)
);

// For primary menu flyout sidebar width size.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-primary-menu-flyout-width]', array(
		'default'           => astra_get_option( 'ast-pro-primary-menu-flyout-width' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-primary-menu-flyout-width]', array(
		'type'     => 'number',
		'section'  => 'section-astra-filters-general',
		'label'    => __( 'Primary Menu Flyout Menu Width', 'astra-filters' ),
		'description'	=> __( 'Field to change the width of flyout sidebar for primary menu.', 'astra-filters' ),
		'priority' => 25,
	)
);

// For responsive below menu toggle class.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-below-menu-toggle-class]', array(
		'default'           => astra_get_option( 'ast-pro-below-menu-toggle-class' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-below-menu-toggle-class]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-general',
		'label'    => __( 'Below Header Toggle Menu Icon Class', 'astra-filters' ),
		'description'	=> __( 'Field to change class name for below header responsive toggle menu icon, can be replace by any font-awesome icon.', 'astra-filters' ),
		'priority' => 40,
	)
);

// For responsive above menu toggle class.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-above-menu-toggle-class]', array(
		'default'           => astra_get_option( 'ast-pro-above-menu-toggle-class' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-above-menu-toggle-class]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-general',
		'label'    => __( 'Above Header Toggle Menu Icon Class', 'astra-filters' ),
		'description'	=> __( 'Field to change class name for above header responsive toggle menu icon, can be replace by any font-awesome icon.', 'astra-filters' ),
		'priority' => 45,
	)
);

// For scroll to top icon class.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-scroll-to-top-icon-class]', array(
		'default'           => astra_get_option( 'ast-pro-scroll-to-top-icon-class' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-scroll-to-top-icon-class]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-general',
		'label'    => __( 'Scroll To Top Icon Class', 'astra-filters' ),
		'description'	=> __( 'Field to change class name for icon for scroll to top button, can be replace by any font-awesome icon.', 'astra-filters' ),
		'priority' => 50,
	)
);

/**
 * Option: For WooCommerce
 */

// For Shop page no more products text in case of infinite scroll.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-theme-shop-no-more-products]', array(
		'default'           => astra_get_option( 'ast-theme-shop-no-more-products' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-theme-shop-no-more-products]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-woo',
		'label'    => __( 'Shop Page Infinite Loop', 'astra-filters' ),
		'description'	=> __( 'Field to change text comes after infinite scroll on the shop.', 'astra-filters' ),
		'priority' => 5,
	)
);

// For WooCommerce header Cart text.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-header-cart-label]', array(
		'default'           => astra_get_option( 'ast-pro-woo-header-cart-label' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-header-cart-label]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-woo',
		'label'    => __( 'Header Cart Text', 'astra-filters' ),
		'description'	=> __( 'Field to change the header WooCommerce item Cart text.', 'astra-filters' ),
		'priority' => 15,
	)
);

// For Woo Filter button icon class.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-filter-icon-class]', array(
		'default'           => astra_get_option( 'ast-pro-woo-filter-icon-class' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-filter-icon-class]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-woo',
		'label'    => __( 'WooCommerce Filter Button Icon Class', 'astra-filters' ),
		'description'	=> __( 'Field to change class name for icon for WooCommerce offcanvas Filter button, can be replace by any font-awesome icon.', 'astra-filters' ),
		'priority' => 20,
	)
);

// For Quick View text on shop page (for image button option).
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-shop-quick-view-label]', array(
		'default'           => astra_get_option( 'ast-pro-woo-shop-quick-view-label' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-shop-quick-view-label]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-woo',
		'label'    => __( 'Quick View Label (On Image)', 'astra-filters' ),
		'description'	=> __( 'Field to change the Quick View text on WooCommerce shop page.', 'astra-filters' ),
		'priority' => 25,
	)
);

// For Quick View text on shop page (for after summary option).
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-shop-quick-view-summary-label]', array(
		'default'           => astra_get_option( 'ast-pro-woo-shop-quick-view-summary-label' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-shop-quick-view-summary-label]', array(
		'type'     => 'text',
		'section'  => 'section-astra-filters-woo',
		'label'    => __( 'Quick View Label (After Summary)', 'astra-filters' ),
		'description'	=> __( 'Field to change the Quick View text on WooCommerce shop page.', 'astra-filters' ),
		'priority' => 30,
	)
);

// For WooCommerce header cart items total.
$wp_customize->add_setting(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-header-cart-total]', array(
		'default'           => astra_get_option( 'ast-pro-woo-header-cart-total' ),
		'type'              => 'option',
		'sanitize_callback' => 'astra_filters_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	ASTRA_THEME_SETTINGS . '[ast-pro-woo-header-cart-total]', array(
		'type' => 'checkbox',
		'section' => 'section-astra-filters-woo',
		'label' => __( 'Disable Header Cart Item\'s Total', 'astra-filters' ),
		'description'    => __( 'Check this option to disable the header cart items total.', 'astra-filters' ),
		'priority' => 35,
	)
);
