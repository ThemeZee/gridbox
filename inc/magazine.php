<?php
/**
 * Magazine Functions
 *
 * Custom Functions and Template tags used in the Magazine widgets and Magazine templates
 *
 * @package Gridbox
 */


if ( ! function_exists( 'gridbox_magazine_widget_title' ) ) :
	/**
	 * Displays the widget title with link to the category archive
	 *
	 * @param String $widget_title Widget Title.
	 * @param int    $category_id  Category ID.
	 * @return String Widget Title
	 */
	function gridbox_magazine_widget_title( $widget_title, $category_id ) {

		// Check if widget shows a specific category.
		if ( $category_id > 0 ) {

			// Set URL and Title for Category.
			$category_title = sprintf( esc_html__( 'View all posts from category %s', 'gridbox' ), get_cat_name( $category_id ) );
			$category_url = get_category_link( $category_id );

			// Set Widget Title with link to category archive.
			$widget_title = '<a class="category-archive-link" href="' . esc_url( $category_url ) . '" title="' . esc_attr( $category_title ) . '">' . $widget_title . '</a>';
		}

		return $widget_title;
	}
endif;


/**
* Function to change excerpt length for posts in category posts widgets
*
* @param int $length Length of excerpt in number of words.
* @return int
*/
function gridbox_magazine_posts_excerpt_length( $length ) {
	return 20; // Number of words.
}


/**
* Get Magazine Post IDs
*
* @param String $cache_id        Magazine Widget Instance.
* @param int    $category        Category ID.
* @param int    $number_of_posts Number of posts.
* @return array Post IDs
*/
function gridbox_get_magazine_post_ids( $cache_id, $category, $number_of_posts ) {

	$cache_id = sanitize_key( $cache_id );
	$post_ids = get_transient( 'gridbox_magazine_post_ids' );

	if ( ! isset( $post_ids[ $cache_id ] ) || is_customize_preview() ) {

		// Get Posts from Database.
		$query_arguments = array(
			'fields'              => 'ids',
			'cat'                 => (int) $category,
			'posts_per_page'      => (int) $number_of_posts,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		);
		$query = new WP_Query( $query_arguments );

		// Create an array of all post ids.
		$post_ids[ $cache_id ] = $query->posts;

		// Set Transient.
		set_transient( 'gridbox_magazine_post_ids', $post_ids );
	}

	return apply_filters( 'gridbox_magazine_post_ids', $post_ids[ $cache_id ], $cache_id );
}


/**
* Delete Cached Post IDs
*
* @return void
*/
function gridbox_flush_magazine_post_ids() {
	delete_transient( 'gridbox_magazine_post_ids' );
}
add_action( 'save_post', 'gridbox_flush_magazine_post_ids' );
add_action( 'deleted_post', 'gridbox_flush_magazine_post_ids' );
add_action( 'customize_save_after', 'gridbox_flush_magazine_post_ids' );
add_action( 'switch_theme', 'gridbox_flush_magazine_post_ids' );
