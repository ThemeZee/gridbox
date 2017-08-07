<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Gridbox
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gridbox_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'gridbox_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'gridbox' ),
		'priority' => 30,
		'panel' => 'gridbox_options_panel',
	) );

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'gridbox_theme_options[excerpt_length]', array(
		'default'           => 25,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'gridbox' ),
		'section'  => 'gridbox_section_post',
		'settings' => 'gridbox_theme_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 10,
	) );

	// Add Post Meta Settings.
	$wp_customize->add_setting( 'gridbox_theme_options[postmeta_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Gridbox_Customize_Header_Control(
		$wp_customize, 'gridbox_theme_options[postmeta_headline]', array(
			'label' => esc_html__( 'Post Meta', 'gridbox' ),
			'section' => 'gridbox_section_post',
			'settings' => 'gridbox_theme_options[postmeta_headline]',
			'priority' => 20,
		)
	) );

	$wp_customize->add_setting( 'gridbox_theme_options[meta_date]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gridbox_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display post date', 'gridbox' ),
		'section'  => 'gridbox_section_post',
		'settings' => 'gridbox_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'gridbox_theme_options[meta_author]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gridbox_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display post author', 'gridbox' ),
		'section'  => 'gridbox_section_post',
		'settings' => 'gridbox_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'gridbox_theme_options[meta_category]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gridbox_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[meta_category]', array(
		'label'    => esc_html__( 'Display post categories', 'gridbox' ),
		'section'  => 'gridbox_section_post',
		'settings' => 'gridbox_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 50,
	) );

	// Add Single Post Settings.
	$wp_customize->add_setting( 'gridbox_theme_options[single_post_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Gridbox_Customize_Header_Control(
		$wp_customize, 'gridbox_theme_options[single_post_headline]', array(
			'label' => esc_html__( 'Single Posts', 'gridbox' ),
			'section' => 'gridbox_section_post',
			'settings' => 'gridbox_theme_options[single_post_headline]',
			'priority' => 60,
		)
	) );

	// Featured Image Setting.
	$wp_customize->add_setting( 'gridbox_theme_options[featured_image]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'gridbox_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[featured_image]', array(
		'label'    => esc_html__( 'Display featured image on single posts', 'gridbox' ),
		'section'  => 'gridbox_section_post',
		'settings' => 'gridbox_theme_options[featured_image]',
		'type'     => 'checkbox',
		'priority' => 70,
	) );

	$wp_customize->add_setting( 'gridbox_theme_options[meta_tags]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gridbox_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display post tags on single posts', 'gridbox' ),
		'section'  => 'gridbox_section_post',
		'settings' => 'gridbox_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 80,
	) );

	$wp_customize->add_setting( 'gridbox_theme_options[post_navigation]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gridbox_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display post navigation on single posts', 'gridbox' ),
		'section'  => 'gridbox_section_post',
		'settings' => 'gridbox_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 90,
	) );
}
add_action( 'customize_register', 'gridbox_customize_register_post_settings' );
