<?php
/**
 * Relaxed Axolotl Clone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Relaxed_Axolotl_Clone
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function relaxed_axolotl_clone_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Relaxed Axolotl Clone, use a find and replace
		* to change 'relaxed-axolotl-clone' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'relaxed-axolotl-clone', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in several locations.
	register_nav_menus(
		array(
			'primary_menu'       => esc_html__( 'Primary Menu', 'relaxed-axolotl-clone' ),
			'footer_quick_links' => esc_html__( 'Footer Quick Links', 'relaxed-axolotl-clone' ),
			'footer_connect_links' => esc_html__( 'Footer Connect Links', 'relaxed-axolotl-clone' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'relaxed_axolotl_clone_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'relaxed_axolotl_clone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function relaxed_axolotl_clone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'relaxed_axolotl_clone_content_width', 640 );
}
add_action( 'after_setup_theme', 'relaxed_axolotl_clone_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function relaxed_axolotl_clone_scripts() {
	wp_enqueue_style( 'relaxed-axolotl-clone-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'relaxed-axolotl-clone-style', 'rtl', 'replace' );

	wp_enqueue_script( 'relaxed-axolotl-clone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'relaxed_axolotl_clone_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Create template-parts directory if it doesn't exist
 */
if ( ! file_exists( get_template_directory() . '/template-parts' ) ) {
    wp_mkdir_p( get_template_directory() . '/template-parts' );
}

/**
 * Create content.php and content-none.php if they don't exist
 */
if ( ! file_exists( get_template_directory() . '/template-parts/content.php' ) ) {
    $content_php_content = "<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Relaxed_Axolotl_Clone
 */

?>

<article id=\"post-<?php the_ID(); ?>\" <?php post_class(); ?>>
	<header class=\"entry-header\">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class=\"entry-title\">', '</h1>' );
		else :
			the_title( '<h2 class=\"entry-title\"><a href=\"' . esc_url( get_permalink() ) . '\" rel=\"bookmark\">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class=\"entry-meta\">
				<?php
				// relaxed_axolotl_clone_posted_on(); - Function to be defined in template-tags.php
				// relaxed_axolotl_clone_posted_by(); - Function to be defined in template-tags.php
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php // relaxed_axolotl_clone_post_thumbnail(); - Function to be defined in template-tags.php ?>

	<div class=\"entry-content\">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class=\"screen-reader-text\"> \"%s\"</span>', 'relaxed-axolotl-clone' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class=\"page-links\">' . esc_html__( 'Pages:', 'relaxed-axolotl-clone' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class=\"entry-footer\">
		<?php // relaxed_axolotl_clone_entry_footer(); - Function to be defined in template-tags.php ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
";
    file_put_contents( get_template_directory() . '/template-parts/content.php', $content_php_content );
}

if ( ! file_exists( get_template_directory() . '/template-parts/content-none.php' ) ) {
    $content_none_php_content = "<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Relaxed_Axolotl_Clone
 */

?>

<section class=\"no-results not-found\">
	<header class=\"page-header\">
		<h1 class=\"page-title\"><?php esc_html_e( 'Nothing Found', 'relaxed-axolotl-clone' ); ?></h1>
	</header><!-- .page-header -->

	<div class=\"page-content\">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href=\"%1\$s\">Get started here</a>.', 'relaxed-axolotl-clone' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'relaxed-axolotl-clone' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'relaxed-axolotl-clone' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
";
    file_put_contents( get_template_directory() . '/template-parts/content-none.php', $content_none_php_content );
}

/**
 * Create inc directory and necessary files if they don't exist
 */
if ( ! file_exists( get_template_directory() . '/inc' ) ) {
    wp_mkdir_p( get_template_directory() . '/inc' );
}

// Create empty placeholder files for includes if they don't exist
$inc_files = array(
    'custom-header.php',
    'template-tags.php',
    'template-functions.php',
    'customizer.php',
    'jetpack.php'
);

foreach ( $inc_files as $file ) {
    if ( ! file_exists( get_template_directory() . '/inc/' . $file ) ) {
        file_put_contents( get_template_directory() . '/inc/' . $file, "<?php\n/**\n * Placeholder for {$file}\n *\n * @package Relaxed_Axolotl_Clone\n */\n" );
    }
}

?>
