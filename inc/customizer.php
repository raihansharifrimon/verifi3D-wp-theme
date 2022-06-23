<?php
/**
 * BSS Verifi3D Theme Customizer
 *
 * @package BSS_Verifi3D
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bss_verifi3d_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'bss_verifi3d_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'bss_verifi3d_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_setting('sticky_header_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sticky_header_logo', array(
        'label' => 'Sticky Header Logo',
        'section' => 'title_tagline', 
        'settings' => 'sticky_header_logo',
        'priority' => 8 
    )));
}
add_action( 'customize_register', 'bss_verifi3d_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bss_verifi3d_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bss_verifi3d_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bss_verifi3d_customize_preview_js() {
	wp_enqueue_script( 'bss_verifi3d-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'bss_verifi3d_customize_preview_js' );
