<?php
/**
 * The template for displaying medium posts in Magazine Post widgets
 *
 * @package Gridbox
 */

// Get widget settings.
$post_excerpt = get_query_var( 'gridbox_post_excerpt', false );
?>

<div class="magazine-grid-post clearfix">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php gridbox_post_image(); ?>

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php gridbox_entry_meta(); ?>

		</header><!-- .entry-header -->

		<?php // Display post excerpt if enabled.
		if ( $post_excerpt ) : ?>

			<div class="entry-content entry-excerpt clearfix">

				<?php the_excerpt(); ?>
				<?php gridbox_more_link(); ?>

			</div><!-- .entry-content -->

		<?php endif; ?>

	</article>

</div>
