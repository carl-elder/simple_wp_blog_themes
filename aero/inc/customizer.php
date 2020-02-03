<?php
/**
 * aero Theme Customizer
 *
 * @package aero
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aero_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'aero_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'aero_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'aero_customize_register' );

function aero_customizer_addons($wp_customize){

    /*$wp_customize->add_section('slider', array(
        'title' => __('Homepage Carousel'),
        'description' => __('Add images and links for your homepage carousel here'),
        'priority'  => 21,
        'capability' => 'edit_theme_options'
    ));
    for($i = 0; $i < 5; $i++) {
        $wp_customize->add_setting('slider_img_'.$i, array(
            'type'                  => 'theme_mod',
            'capability'            => 'edit_theme_options',
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_js_callback'  => ''
        ));
        $wp_customize->add_setting('slider_txt_'.$i, array(
            'type'                  => 'theme_mod',
            'capability'            => 'edit_theme_options',
            'default'               => '',
            'transport'             => 'refresh',
        ));
        $wp_customize->add_setting('slider_url_'.$i, array(
            'type'                  => 'theme_mod',
            'capability'            => 'edit_theme_options',
            'default'               => '#',
            'transport'             => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Media_Control( $wp_customize, 'slider_img_'.$i, array(
            'label'         => __( 'Slider Image #'.($i + 1)),
            'section'       => 'slider',
            'setting'       => 'slider_img_'.$i,
            'mime_type'     => 'image',
        )));
        $wp_customize->add_control( 'slider_txt_'.$i, array(
            'label'         => __( 'Button Text' ),
            'type'          => 'text',
            'section'       => 'slider',
            'setting'       => 'slider_txt_'.$i,
            'input_attrs'   => array(
                'placeholder'   => __( 'Click Here' ),
            )
        ));
        $wp_customize->add_control( 'slider_url_'.$i, array(
            'label'         => __( 'Button URL' ),
            'type'          => 'url',
            'section'       => 'slider',
            'setting'       => 'slider_url_'.$i,
            'input_attrs'   => array(
                'placeholder'   => __( 'http://example.com' ),
            )
        ));
    }*/

}
add_action('customize_register', 'aero_customizer_addons');
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aero_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aero_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aero_customize_preview_js() {
	wp_enqueue_script( 'aero-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aero_customize_preview_js' );
