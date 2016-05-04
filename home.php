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

// Display Featured Posts
if ( true == $theme_options['featured_blog'] ) :

	get_template_part( 'template-parts/featured-content' );
	
endif;

// Display Blog Title
if ( isset( $theme_options['blog_title'] ) and $theme_options['blog_title'] <> '' ) : ?>
		
	<header class="page-header clearfix">
		
		<h1 class="blog-title page-title"><?php echo wp_kses_post( $theme_options['blog_title'] ); ?></h1>
		<p class="blog-description"><?php echo wp_kses_post( $theme_options['blog_description'] ); ?></p>
		
	</header>

<?php endif; ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">
			
			<?php if ( have_posts() ) : ?>
			
				<div id="homepage-posts" class="post-wrapper clearfix">
						
					<?php while (have_posts()) : the_post();
				
						get_template_part( 'template-parts/content' );
				
					endwhile; ?>
				
				</div>
			
				<?php gridbox_pagination(); ?>

			<?php endif; ?>
			
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>