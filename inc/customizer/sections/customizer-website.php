<?php
/**
 * Site Identity Settings
 *
 * Register settings to hide site title and tagline in Site Identity section
 *
 * @package Gridbox
 */

/**
 * Adds Site Title settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gridbox_customize_register_website_settings( $wp_customize ) {

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Add selective refresh for site title and description.
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'gridbox_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'gridbox_customize_partial_blogdescription',
		)
	);

	// Add Retina Logo Headline.
	$wp_customize->add_control(
		new Gridbox_Customize_Header_Control(
			$wp_customize,
			'gridbox_theme_options[retina_logo_title]',
			array(
				'label'    => esc_html__( 'Retina Logo', 'gridbox' ),
				'section'  => 'title_tagline',
				'settings' => array(),
				'priority' => 8,
			)
		)
	);

	// Add Retina Logo Setting.
	$wp_customize->add_setting(
		'gridbox_theme_options[retina_logo]',
		array(
			'default'           => false,
			'type'              => 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'gridbox_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'gridbox_theme_options[retina_logo]',
		array(
			'label'    => esc_html__( 'Scale down logo image for retina displays', 'gridbox' ),
			'section'  => 'title_tagline',
			'settings' => 'gridbox_theme_options[retina_logo]',
			'type'     => 'checkbox',
			'priority' => 9,
		)
	);

	// Add Display Site Title Setting.
	$wp_customize->add_setting(
		'gridbox_theme_options[site_title]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'gridbox_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'gridbox_theme_options[site_title]',
		array(
			'label'    => esc_html__( 'Display Site Title', 'gridbox' ),
			'section'  => 'title_tagline',
			'settings' => 'gridbox_theme_options[site_title]',
			'type'     => 'checkbox',
			'priority' => 10,
		)
	);

	// Add Display Tagline Setting.
	$wp_customize->add_setting(
		'gridbox_theme_options[site_description]',
		array(
			'default'           => false,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'gridbox_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'gridbox_theme_options[site_description]',
		array(
			'label'    => esc_html__( 'Display Tagline', 'gridbox' ),
			'section'  => 'title_tagline',
			'settings' => 'gridbox_theme_options[site_description]',
			'type'     => 'checkbox',
			'priority' => 11,
		)
	);

	// Add Header Image Link.
	$wp_customize->add_setting(
		'gridbox_theme_options[custom_header_link]',
		array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url',
		)
	);
	$wp_customize->add_control(
		'gridbox_control_custom_header_link',
		array(
			'label'    => esc_html__( 'Header Image Link', 'gridbox' ),
			'section'  => 'header_image',
			'settings' => 'gridbox_theme_options[custom_header_link]',
			'type'     => 'url',
			'priority' => 10,
		)
	);

	// Add Custom Header Hide Checkbox.
	$wp_customize->add_setting(
		'gridbox_theme_options[custom_header_hide]',
		array(
			'default'           => false,
			'type'              => 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'gridbox_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'gridbox_control_custom_header_hide',
		array(
			'label'    => esc_html__( 'Hide header image on front page', 'gridbox' ),
			'section'  => 'header_image',
			'settings' => 'gridbox_theme_options[custom_header_hide]',
			'type'     => 'checkbox',
			'priority' => 15,
		)
	);
}
add_action( 'customize_register', 'gridbox_customize_register_website_settings' );


/**
 * Render the site title for the selective refresh partial.
 */
function gridbox_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 * Render the site tagline for the selective refresh partial.
 */
function gridbox_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
