<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Gridbox
 */

/**
* Get a single theme option
*
* @return mixed
*/
function gridbox_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = gridbox_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function gridbox_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'gridbox_theme_options', array() ), gridbox_default_options() );

	// Return theme options.
	return $theme_options;
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function gridbox_default_options() {

	$default_options = array(
		'site_title'            => true,
		'site_description'      => false,
		'custom_header_link'    => '',
		'custom_header_hide'    => false,
		'layout'                => 'right-sidebar',
		'sticky_header'         => false,
		'blog_title'            => '',
		'blog_description'      => '',
		'post_layout'           => 'three-columns',
		'read_more_text'        => esc_html__( 'Read more', 'gridbox' ),
		'blog_magazine_widgets' => true,
		'excerpt_length'        => 25,
		'meta_date'             => true,
		'meta_author'           => true,
		'meta_category'         => true,
		'meta_tags'             => true,
		'post_navigation'       => true,
		'featured_image'        => true,
		'post_image_archives'   => true,
		'featured_magazine'     => false,
		'featured_blog'         => false,
		'featured_category'     => 0,
	);

	return $default_options;
}
