<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gridbox
 */

get_header();

// Get Theme Options from Database.
$theme_options = gridbox_theme_options();

// Display Featured Posts.
if ( true === $theme_options['featured_blog'] ) :

	get_template_part( 'template-parts/featured-content' );

endif;

// Display Magazine Homepage Widgets.
gridbox_magazine_widgets();

do_action( 'gridbox_before_blog' );

// Display Blog Title.
gridbox_blog_title();
?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<div id="post-wrapper" class="post-wrapper clearfix">

					<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content' );

					endwhile; ?>

				</div>

				<?php gridbox_pagination(); ?>

			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
