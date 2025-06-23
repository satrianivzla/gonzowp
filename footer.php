<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Relaxed_Axolotl_Clone
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-container">
			<div class="footer-branding">
				<?php
				if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
					// Display the logo if it's set, make it link to home
					echo '<div class="footer-logo">';
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
					the_custom_logo();
					echo '</a>';
					echo '</div>';
				} else {
					// Display site title if no logo, make it link to home
					echo '<div class="footer-site-title">';
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a>';
					echo '</div>';
				}
				?>
				<p class="footer-description">
					<?php // This could be a theme option in the future ?>
					Creating peaceful soundscapes for meditation, relaxation, and inner harmony. Join our community of mindful listeners.
				</p>
			</div>

			<div class="footer-navigation">
				<div class="quick-links">
					<h4><?php esc_html_e( 'Quick Links', 'relaxed-axolotl-clone' ); ?></h4>
					<?php
					if ( has_nav_menu( 'footer_quick_links' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer_quick_links',
								'menu_class'     => 'footer-quick-links-menu',
								'container'      => false,
								'depth'          => 1,
							)
						);
					}
					?>
				</div>

				<div class="connect-links">
					<h4><?php esc_html_e( 'Connect', 'relaxed-axolotl-clone' ); ?></h4>
					<?php
					if ( has_nav_menu( 'footer_connect_links' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer_connect_links',
								'menu_class'     => 'footer-connect-links-menu',
								'container'      => false,
								'depth'          => 1,
							)
						);
					}
					?>
				</div>
			</div>

			<div class="footer-legal">
				<p class="copyright">
					&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved. Made with ♥ for peaceful minds.', 'relaxed-axolotl-clone' ); ?>
				</p>
				<nav class="footer-legal-nav">
					<?php // These could be dynamically populated or managed via theme options later ?>
					<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'relaxed-axolotl-clone' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>"><?php esc_html_e( 'Terms of Service', 'relaxed-axolotl-clone' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/copyright/' ) ); ?>"><?php esc_html_e( 'Copyright', 'relaxed-axolotl-clone' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/cookie-policy/' ) ); ?>"><?php esc_html_e( 'Cookie Policy', 'relaxed-axolotl-clone' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/dmca/' ) ); ?>"><?php esc_html_e( 'DMCA', 'relaxed-axolotl-clone' ); ?></a>
				</nav>
			</div>
		</div><!-- .footer-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
