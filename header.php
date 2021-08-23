<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Gridbox
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<?php do_action( 'gridbox_before_site' ); ?>

	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gridbox' ); ?></a>

		<?php do_action( 'gridbox_header_bar' ); ?>

		<?php do_action( 'gridbox_before_header' ); ?>

		<header id="masthead" class="site-header clearfix" role="banner">

			<div class="header-main container clearfix">

				<div id="logo" class="site-branding clearfix">

					<?php gridbox_site_logo(); ?>
					<?php gridbox_site_title(); ?>
					<?php gridbox_site_description(); ?>

				</div><!-- .site-branding -->

				<?php get_template_part( 'template-parts/header/site', 'navigation' ); ?>

			</div><!-- .header-main -->

		</header><!-- #masthead -->

		<?php gridbox_header_image(); ?>

		<?php gridbox_breadcrumbs(); ?>

		<?php do_action( 'gridbox_after_header' ); ?>

		<div id="content" class="site-content container clearfix">
