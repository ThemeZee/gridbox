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

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">
			
			<?php if ( have_posts() ) : ?>
			
				<div id="archive-posts" class="post-wrapper clearfix">
						
					<?php while (have_posts()) : the_post();
				
						get_template_part( 'template-parts/content' );
				
					endwhile; ?>
				
				</div>
			
				<?php gridbox_pagination(); ?>

			<?php endif; ?>
			
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>