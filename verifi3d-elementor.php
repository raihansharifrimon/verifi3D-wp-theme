<?php
/**
 * Plugin Name: verifi3D Elementor
 * Description: Verifi3D theme elementor widgets.
 * Plugin URI:  https://bsslon.com/
 * Version:     1.0.0
 * Author:      Bangladesh Software Solution
 * Author URI:  https://bsslon.com/
 * Text Domain: verifi3d-elementor
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_vefifi3d_elementor_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/hero-widget.php' );
	require_once( __DIR__ . '/widgets/section-heading.php' );
	require_once( __DIR__ . '/widgets/feature-section.php' );
	require_once( __DIR__ . '/widgets/home-about.php' );

	$widgets_manager->register( new \Banner_Widget() );
	$widgets_manager->register( new \Section_Heading_Widget() );
	$widgets_manager->register( new \Feature_Section_Widget() );
	$widgets_manager->register( new \Home_About_Section_Widget() );

}

add_action( 'elementor/widgets/register', 'register_vefifi3d_elementor_widget' );


function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'verifi3d',
		[
			'title' => esc_html__( 'Verifi3D', 'verifi3d-elementor' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

function verifi3d_widets_style() {
	wp_register_style( 'v3d-common-elementor-style', plugins_url( 'css/common.css', __FILE__ ) );
	wp_register_style( 'v3d-elementor-style', plugins_url( 'css/style.css', __FILE__ ) );
	wp_enqueue_style( 'v3d-common-elementor-style' );
	wp_enqueue_style( 'v3d-elementor-style' );
}
add_action( 'elementor/frontend/before_enqueue_styles', 'verifi3d_widets_style');