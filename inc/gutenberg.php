<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package Gridbox
 */

/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function gridbox_gutenberg_support() {

	// Add theme support for dimension controls.
	add_theme_support( 'custom-spacing' );

	// Add theme support for custom line heights.
	add_theme_support( 'custom-line-height' );

	// Define block color palette.
	$color_palette = apply_filters(
		'gridbox_color_palette',
		array(
			'primary_color'    => '#4477aa',
			'secondary_color'  => '#114477',
			'tertiary_color'   => '#111133',
			'accent_color'     => '#117744',
			'highlight_color'  => '#aa445e',
			'light_gray_color' => '#dddddd',
			'gray_color'       => '#999999',
			'dark_gray_color'  => '#222222',
		)
	);

	// Add theme support for block color palette.
	add_theme_support(
		'editor-color-palette',
		apply_filters(
			'gridbox_editor_color_palette_args',
			array(
				array(
					'name'  => esc_html_x( 'Primary', 'block color', 'gridbox' ),
					'slug'  => 'primary',
					'color' => esc_html( $color_palette['primary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Secondary', 'block color', 'gridbox' ),
					'slug'  => 'secondary',
					'color' => esc_html( $color_palette['secondary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Tertiary', 'block color', 'gridbox' ),
					'slug'  => 'tertiary',
					'color' => esc_html( $color_palette['tertiary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Accent', 'block color', 'gridbox' ),
					'slug'  => 'accent',
					'color' => esc_html( $color_palette['accent_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Highlight', 'block color', 'gridbox' ),
					'slug'  => 'highlight',
					'color' => esc_html( $color_palette['highlight_color'] ),
				),
				array(
					'name'  => esc_html_x( 'White', 'block color', 'gridbox' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
				array(
					'name'  => esc_html_x( 'Light Gray', 'block color', 'gridbox' ),
					'slug'  => 'light-gray',
					'color' => esc_html( $color_palette['light_gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Gray', 'block color', 'gridbox' ),
					'slug'  => 'gray',
					'color' => esc_html( $color_palette['gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Dark Gray', 'block color', 'gridbox' ),
					'slug'  => 'dark-gray',
					'color' => esc_html( $color_palette['dark_gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Black', 'block color', 'gridbox' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
			)
		)
	);

	// Check if block style functions are available.
	if ( function_exists( 'register_block_style' ) ) {

		// Register Widget Title Block style.
		register_block_style(
			'core/heading',
			array(
				'name'         => 'widget-title',
				'label'        => esc_html__( 'Widget Title', 'gridbox' ),
				'style_handle' => 'gridbox-stylesheet',
			)
		);
	}
}
add_action( 'after_setup_theme', 'gridbox_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function gridbox_block_editor_assets() {

	// Enqueue Editor Styling.
	wp_enqueue_style( 'gridbox-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), '20210306', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'gridbox_block_editor_assets' );
