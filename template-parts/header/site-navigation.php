<?php
/**
 * Main Navigation
 *
 * @version 1.1
 * @package Gridbox
 */
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<?php do_action( 'gridbox_header_search' ); ?>

	<button class="primary-menu-toggle menu-toggle" aria-controls="primary-menu" aria-expanded="false" <?php gridbox_amp_menu_toggle(); ?>>
		<?php
		echo gridbox_get_svg( 'menu' );
		echo gridbox_get_svg( 'close' );
		?>
		<span class="menu-toggle-text screen-reader-text"><?php esc_html_e( 'Menu', 'gridbox' ); ?></span>
	</button>

	<div class="primary-navigation">

		<nav id="site-navigation" class="main-navigation" role="navigation" <?php gridbox_amp_menu_is_toggled(); ?> aria-label="<?php esc_attr_e( 'Primary Menu', 'gridbox' ); ?>">

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
				)
			);
			?>
		</nav><!-- #site-navigation -->

	</div><!-- .primary-navigation -->

<?php endif; ?>

<?php do_action( 'gridbox_after_navigation' ); ?>
