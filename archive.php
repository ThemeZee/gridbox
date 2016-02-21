<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gridbox
 */
 
get_header(); ?>
	
	<header class="page-header clearfix">
		
		<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

	</header>

	<section id="primary" class="content-area">
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