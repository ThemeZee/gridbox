<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package Gridbox
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php gridbox_post_image_archives(); ?>
		
		<header class="entry-header">

			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			
			<?php gridbox_entry_meta(); ?>
		
		</header><!-- .entry-header -->

		<div class="entry-content entry-excerpt clearfix">
			<?php the_excerpt(); ?>
			<?php gridbox_more_link(); ?>
		</div><!-- .entry-content -->

	</article>