<?php
/**
 * Custom functions that are not template related
 *
 * @package Gridbox
 */

 
if ( ! function_exists( 'gridbox_default_menu' ) ) :
/**
 * Display default page as navigation if no custom menu was set
 *
 */
function gridbox_default_menu() {
	
	echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
	
}
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gridbox_body_classes( $classes ) {
	
	// Get Theme Options from Database
	$theme_options = gridbox_theme_options();
		
	// Switch Sidebar Layout to left
	if ( 'left-sidebar' == $theme_options['layout'] ) {
		$classes[] = 'sidebar-left';
	}
	
	// Add Sticky Header class
	if ( true == $theme_options['sticky_header'] ) {
		$classes[] = 'sticky-header';
	}
	
	// Add Small Post Layout class
	if ( ( is_archive() or is_home() ) and 'left' == $theme_options['post_layout_archives'] ) {
		$classes[] = 'post-layout-small';
	}

	return $classes;
}
add_filter( 'body_class', 'gridbox_body_classes' );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words
 * @return int
 */
function gridbox_excerpt_length($length) {
	
	// Get Theme Options from Database
	$theme_options = gridbox_theme_options();

	// Return Excerpt Text
	if ( isset($theme_options['excerpt_length']) and $theme_options['excerpt_length'] >= 0 ) :
		return absint( $theme_options['excerpt_length'] );
	else :
		return 30; // number of words
	endif;
}
add_filter('excerpt_length', 'gridbox_excerpt_length');


/**
 * Function to change excerpt length for posts in category posts widgets
 *
 * @param int $length Length of excerpt in number of words
 * @return int
 */
function gridbox_magazine_posts_excerpt_length($length) {
    return 15;
}


/**
 * Set wrapper start for wooCommerce
 *
 */
function gridbox_wrapper_start() {
	echo '<section id="primary" class="content-area">';
	echo '<main id="main" class="site-main" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'gridbox_wrapper_start', 10);


/**
 * Set wrapper end for wooCommerce
 *
 */
function gridbox_wrapper_end() {
	echo '</main><!-- #main -->';
	echo '</section><!-- #primary -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'gridbox_wrapper_end', 10);