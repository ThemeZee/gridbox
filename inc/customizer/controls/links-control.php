<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Gridbox
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Gridbox_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'gridbox' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/gridbox/', 'gridbox' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=gridbox&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'gridbox' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=gridbox&utm_source=customizer&utm_campaign=gridbox" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'gridbox' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/gridbox-documentation/', 'gridbox' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=gridbox&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'gridbox' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=gridbox/', 'gridbox' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'gridbox' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/gridbox/reviews/', 'gridbox' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'gridbox' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
