/**
 * jQuery Slider JS
 *
 * Adds the Flexslider Plugin for the Featured Post Slideshow
 *
 * @package Gridbox
 */

jQuery(document).ready(function($) {

	/* Add flexslider to #post-slider div */ 
	$("#post-slider").flexslider({
		animation: gridbox_slider_params.animation,
		slideshowSpeed: gridbox_slider_params.speed,
		namespace: "zeeflex-",
		selector: ".zeeslides > li",
		smoothHeight: true,
		pauseOnHover: true,
		controlNav: false,
		controlsContainer: ".post-slider-controls"
	});
	
});