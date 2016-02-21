<?php
/**
 * Post Slider Setup
 *
 * Enqueues scripts and styles for the slideshow
 * Sets slideshow excerpt length and slider animation parameter
 * 
 * The template for displaying the slideshow can be found under /template-parts/post-slider.php
 *
 * @package Gridbox
 */

 
/**
 * Enqueue slider scripts and styles.
 */
function gridbox_slider_scripts() {
	
	// Get Theme Options from Database
	$theme_options = gridbox_theme_options();
	
	// Register and Enqueue FlexSlider JS and CSS if necessary
	if ( true == $theme_options['slider_blog'] or true == $theme_options['slider_magazine'] or is_page_template('template-slider.php') ) :

		// FlexSlider CSS
		wp_enqueue_style( 'gridbox-flexslider', get_template_directory_uri() . '/css/flexslider.css' );

		// FlexSlider JS
		wp_enqueue_script( 'gridbox-flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'), '2.5.0' );

		// Register and enqueue slider.js
		wp_enqueue_script( 'gridbox-post-slider', get_template_directory_uri() .'/js/slider.js', array('gridbox-flexslider') );

	endif;
	
} // gridbox_slider_scripts
add_action( 'wp_enqueue_scripts', 'gridbox_slider_scripts' );


/**
 * Function to change excerpt length for post slider
 *
 * @param int $length Length of excerpt in number of words
 * @return int
 */
function gridbox_slider_excerpt_length($length) {
    return 25;
}


/**
 * Sets slider animation effect
 *
 * Passes parameters from theme options to the javascript files (js/slider.js)
 */
function gridbox_slider_options() { 
	
	// Get Theme Options from Database
	$theme_options = gridbox_theme_options();
	
	// Set Parameters array
	$params = array();
	
	// Define Slider Animation
	$params['animation'] = $theme_options['slider_animation'];
	
	// Define Slider Speed
	$params['speed'] = $theme_options['slider_speed'];
	
	// Passing Parameters to Javascript
	wp_localize_script( 'gridbox-post-slider', 'gridbox_slider_params', $params );
	
} // gridbox_slider_options
add_action('wp_enqueue_scripts', 'gridbox_slider_options');


/**
 * Display Post Slider
 */
function gridbox_slider() { 
	
	// Get Theme Options from Database
	$theme_options = gridbox_theme_options();

	// Display Featured Post Slideshow if activated
	if ( is_page_template( 'template-slider.php' )
		or ( true == $theme_options['slider_blog'] and is_home() ) 
		or ( true == $theme_options['slider_magazine'] and is_page_template( 'template-magazine.php' ) )
	) { 

		get_template_part( 'template-parts/post-slider' );

	}

}