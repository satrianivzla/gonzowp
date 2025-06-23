<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Relaxed_Axolotl_Clone
 */

get_header();
?>

	<main id="primary" class="site-main front-page-main">

		<?php
		// Hero Section - Placeholder
		// This could be populated with custom fields, a static block, or other content.
		?>
		<section id="hero" class="front-page-section hero-section">
			<div class="container">
				<h2>Find Your Inner Peace</h2>
				<p>"Tranquility isn't found in the absence of noise, but in the presence of harmony. Let our sounds guide your journey to inner peace."</p>
				<a href="#" class="button">Start Listening</a>
				<a href="#" class="button">Explore Our Content</a>
			</div>
		</section>

		<?php
		// Meditation & Wellness Blog Section - Placeholder
		// This section will display recent blog posts.
		// We'll use a custom WP_Query later to fetch posts.
		?>
		<section id="blog" class="front-page-section blog-section">
			<div class="container">
				<h2>Meditation & Wellness Blog</h2>
				<p>Discover insights, tips, and stories to enhance your meditation practice and overall wellbeing</p>
				<?php
				$recent_posts_args = array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'post_status'    => 'publish',
					'orderby'        => 'date',
					'order'          => 'DESC',
				);
				$recent_posts_query = new WP_Query( $recent_posts_args );

				if ( $recent_posts_query->have_posts() ) :
					echo '<div class="posts-grid">';
					while ( $recent_posts_query->have_posts() ) :
						$recent_posts_query->the_post();
						get_template_part( 'template-parts/content', 'excerpt' );
					endwhile;
					echo '</div>';
					wp_reset_postdata(); // Important after a custom query

					// Add a link to the blog page if it exists
					$posts_page_id = get_option( 'page_for_posts' );
					if ( $posts_page_id ) {
						$blog_page_url = get_permalink( $posts_page_id );
						echo '<div class="button-center-wrapper"><a href="' . esc_url( $blog_page_url ) . '" class="button">View All Posts</a></div>';
					}
				else :
					echo '<p>' . esc_html__( 'No recent posts to display.', 'relaxed-axolotl-clone' ) . '</p>';
				endif;
				?>
			</div>
		</section>

		<?php
		// Featured Videos Section - Placeholder
		?>
		<section id="videos" class="front-page-section videos-section">
			<div class="container">
				<h2>Featured Videos</h2>
				<p>Explore our collection of meditation music, nature sounds, and relaxation guides</p>
				<?php
				$featured_videos_args = array(
					'post_type'      => 'post', // Or a custom post type like 'video' if created
					'posts_per_page' => 3,      // Show 3 videos
					'post_status'    => 'publish',
					'category_name'  => 'featured-videos', // SLUG of the category for featured videos
					'orderby'        => 'date',
					'order'          => 'DESC',
				);
				$featured_videos_query = new WP_Query( $featured_videos_args );

				if ( $featured_videos_query->have_posts() ) :
					echo '<div class="videos-grid">'; // You'll need CSS for this grid
					while ( $featured_videos_query->have_posts() ) :
						$featured_videos_query->the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('video-item'); ?>>
							<header class="entry-header">
								<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
							</header>
							<div class="entry-content">
								<?php
								// Display the content, which should ideally contain the video embed
								the_content( sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'relaxed-axolotl-clone' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );
								?>
							</div>
						</article>
						<?php
					endwhile;
					echo '</div>';
					wp_reset_postdata();

					// Link to YouTube channel (hardcoded for now, could be a theme option)
					$youtube_channel_url = "https://www.youtube.com/@RelaxedAxolotl"; // As per original site
					echo '<div class="button-center-wrapper"><a href="' . esc_url( $youtube_channel_url ) . '" class="button" target="_blank" rel="noopener noreferrer">View All Videos on YouTube</a></div>';

				else :
					echo '<p>';
					esc_html_e( 'No featured videos to display. Assign posts to the "Featured Videos" category.', 'relaxed-axolotl-clone' );
					echo '</p>';
				endif;
				?>
			</div>
		</section>

		<?php
		// Join Our Community Section - Placeholder
		?>
		<section id="community" class="front-page-section community-section">
			<div class="container">
				<h2>Join Our Community</h2>
				<p>Connect with like-minded individuals on our various platforms and be part of our growing community</p>
				<?php // Placeholder for community links (Newsletter, Substack, Reddit, Patreon) ?>
				<a href="#" class="button">Subscribe to Newsletter</a>
			</div>
		</section>

		<?php
		// Contact Us Section - Placeholder
		?>
		<section id="contact" class="front-page-section contact-section">
			<div class="container">
				<h2><?php esc_html_e( 'Contact Us', 'relaxed-axolotl-clone' ); ?></h2>
				<p><?php esc_html_e( 'Get in touch with us for custom services, collaborations, or any questions about our meditation music.', 'relaxed-axolotl-clone' ); ?></p>
				<?php
				// Placeholder for contact form.
				// Suggest using a contact form plugin and embedding its shortcode here.
				// Example: echo do_shortcode('[your-contact-form-shortcode]');
				?>
				<div class="contact-form-placeholder">
					<p><em><?php esc_html_e( 'To add a contact form here, please install a contact form plugin (e.g., Contact Form 7, WPForms) and place its shortcode in the front-page.php template file, or use a page builder if your theme supports it for this section.', 'relaxed-axolotl-clone' ); ?></em></p>
					<p style="margin-top:1em;"><strong><?php esc_html_e( 'For now, you can reach us at:', 'relaxed-axolotl-clone' ); ?></strong><br>
					hello@relaxedaxolotl.com</p> <?php // Email from original site ?>
				</div>
			</div>
		</section>

		<?php
		// About Relaxed Axolotl Section - Placeholder
		?>
		<section id="about" class="front-page-section about-section">
			<div class="container">
				<h2><?php esc_html_e( 'About Relaxed Axolotl', 'relaxed-axolotl-clone' ); ?></h2>
				<?php
				$about_page_slug = 'about-us-front-page'; // User should create a page with this slug
				$about_page = get_page_by_path( $about_page_slug );

				if ( $about_page ) :
					// Display the content of the 'about-us-front-page' page
					echo '<div class="about-content">' . apply_filters( 'the_content', $about_page->post_content ) . '</div>';

					// Optionally, link to a more detailed "About Us" page
					// For this example, let's assume the main "About" page is different or more comprehensive
					$main_about_page_url = get_permalink( get_page_by_path( 'about' ) ); // Or use an ID or another slug
					if ( $main_about_page_url ) {
						echo '<div class="button-center-wrapper mt-1"><a href="' . esc_url( $main_about_page_url ) . '" class="button">' . esc_html__( 'Learn More About Us', 'relaxed-axolotl-clone' ) . '</a></div>';
					}
				else :
					// Fallback content if the page doesn't exist
					echo '<p>' . esc_html__( 'Our story, mission, and the team behind the music. Create a page with slug "about-us-front-page" to customize this section.', 'relaxed-axolotl-clone' ) . '</p>';
					// Fallback button
					$main_about_page_url = get_permalink( get_page_by_path( 'about' ) );
					if ( $main_about_page_url ) {
						echo '<div class="button-center-wrapper mt-1"><a href="' . esc_url( $main_about_page_url ) . '" class="button">' . esc_html__( 'Learn More About Us', 'relaxed-axolotl-clone' ) . '</a></div>';
					} else {
            echo '<div class="button-center-wrapper mt-1"><a href="#" class="button">' . esc_html__( 'Learn More About Us (please set up an About page)', 'relaxed-axolotl-clone' ) . '</a></div>';
          }
				endif;
				?>
			</div>
		</section>


		<?php
		// Display page content if any was added in the editor for the Front Page
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				// Only display content if it's not one of the sections we've manually added above
				// This avoids duplicate content if the user adds, for example, an H2 with "Hero" to the page editor.
				// A more robust solution might involve checking if the_content is empty or only contains shortcodes.
				$content = get_the_content();
				if ( !empty(trim($content)) ) { // Check if content is not empty or just whitespace
					echo '<section id="page-content" class="front-page-section page-content-section">';
					echo '<div class="container">';
					the_content();
					echo '</div>';
					echo '</section>';
				}
			endwhile;
		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
?>
