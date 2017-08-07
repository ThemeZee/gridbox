<?php
/**
 * Blog Settings
 *
 * Register Blog Settings section, settings and controls for Theme Customizer
 *
 * @package Gridbox
 */

/**
 * Adds blog settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gridbox_customize_register_blog_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'gridbox_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'gridbox' ),
		'priority' => 25,
		'panel' => 'gridbox_options_panel',
	) );

	// Add Post Layout Settings for archive posts.
	$wp_customize->add_setting( 'gridbox_theme_options[post_layout]', array(
		'default'           => 'three-columns',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'gridbox_sanitize_select',
		)
	);
	$wp_customize->add_control( 'gridbox_theme_options[post_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'gridbox' ),
		'section'  => 'gridbox_section_blog',
		'settings' => 'gridbox_theme_options[post_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'two-columns'   => esc_html__( 'Two Columns', 'gridbox' ),
			'three-columns' => esc_html__( 'Three Columns', 'gridbox' ),
			'four-columns'  => esc_html__( 'Four Columns', 'gridbox' ),
		),
	) );

	// Add Blog Title setting and control.
	$wp_customize->add_setting( 'gridbox_theme_options[blog_title]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'gridbox' ),
		'section'  => 'gridbox_section_blog',
		'settings' => 'gridbox_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 20,
	) );

	// Add Blog Description setting and control.
	$wp_customize->add_setting( 'gridbox_theme_options[blog_description]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'gridbox' ),
		'section'  => 'gridbox_section_blog',
		'settings' => 'gridbox_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 30,
	) );
}
add_action( 'customize_register', 'gridbox_customize_register_blog_settings' );
