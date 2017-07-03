<?php
/**
 * Template Name: Magazine Homepage
 *
 * Description: A custom page template for displaying the magazine homepage widgets.
 *
 * @package Gridbox
 */

get_header();

// Get Theme Options from Database.
$theme_options = gridbox_theme_options();

// Display Featured Posts.
if ( true == $theme_options['featured_magazine'] ) :

	get_template_part( 'template-parts/featured-content' );

endif;
?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Display Magazine Homepage Widgets.
		gridbox_magazine_widgets();
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
