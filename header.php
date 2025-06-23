<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Relaxed_Axolotl_Clone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'relaxed-axolotl-clone' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-container">
			<div class="site-branding">
				<?php
				if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
					the_custom_logo();
				} else {
					if ( is_front_page() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$relaxed_axolotl_clone_description = get_bloginfo( 'description', 'display' );
					if ( $relaxed_axolotl_clone_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $relaxed_axolotl_clone_description; /* WPCS: xss ok. */ ?></p>
						<?php
					endif;
				}
				?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'relaxed-axolotl-clone' ); ?></span>
					<span class="menu-toggle-icon"></span> <?php // Icon will be added via CSS ?>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary_menu', // Changed from 'menu-1' to 'primary_menu' for clarity
						'menu_id'        => 'primary-menu',
						'container'      => false, // Don't wrap in a div
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
