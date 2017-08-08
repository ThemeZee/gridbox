<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package Gridbox
 */

/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gridbox_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'gridbox_section_general', array(
		'title'    => esc_html__( 'General Settings', 'gridbox' ),
		'priority' => 10,
		'panel'    => 'gridbox_options_panel',
	) );

	// Add Settings and Controls for Sidebar Position.
	$wp_customize->add_setting( 'gridbox_theme_options[layout]', array(
		'default'           => 'right-sidebar',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gridbox_sanitize_select',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'gridbox' ),
		'section'  => 'gridbox_section_general',
		'settings' => 'gridbox_theme_options[layout]',
		'type'     => 'radio',
		'priority' => 10,
		'choices'  => array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'gridbox' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'gridbox' ),
		),
	) );

	// Add Sticky Header title.
	$wp_customize->add_control( new Gridbox_Customize_Header_Control(
		$wp_customize, 'gridbox_theme_options[sticky_header_title]', array(
			'label'    => esc_html__( 'Sticky Header', 'gridbox' ),
			'section'  => 'gridbox_section_general',
			'settings' => array(),
			'priority' => 20,
		)
	) );

	// Add Setting and Control for sticky header.
	$wp_customize->add_setting( 'gridbox_theme_options[sticky_header]', array(
		'default'           => false,
		'type'              => 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'gridbox_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridbox_theme_options[sticky_header]', array(
		'label'    => esc_html__( 'Enable sticky header feature', 'gridbox' ),
		'section'  => 'gridbox_section_general',
		'settings' => 'gridbox_theme_options[sticky_header]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );
}
add_action( 'customize_register', 'gridbox_customize_register_general_settings' );
