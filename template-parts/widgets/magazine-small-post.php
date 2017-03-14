<?php
/**
 * The template for displaying small posts in Magazine Post widgets
 *
 * @package Gridbox
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-post clearfix' ); ?>>

	<?php gridbox_post_image(); ?>

	<div class="small-post-content">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php gridbox_entry_meta(); ?>

	</div>

</article>
