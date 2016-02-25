<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gridbox
 */
 
get_header(); 

// Get Theme Options from Database
$theme_options = gridbox_theme_options();

// Display Homepage Title
if ( isset( $theme_options['homepage_title'] ) and $theme_options['homepage_title'] <> '' ) : ?>
		
	<header class="page-header clearfix">
		
		<h1 class="page-title"><?php echo wp_kses_post( $theme_options['homepage_title'] ); ?></h1>
		<p class="homepage-description"><?php echo wp_kses_post( $theme_options['homepage_description'] ); ?></p>
		
	</header>

<?php endif; ?>

	<section id="primary" class="content-full content-area">
		<main id="main" class="site-main" role="main">
		
			<div id="homepage-posts" class="post-columns clearfix">
					
			<?php if (have_posts()) : while (have_posts()) : the_post();
		
				get_template_part( 'template-parts/content' );
		
				endwhile;

			endif; ?>
			
			</div>
			
			<?php gridbox_pagination(); ?>
			
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>