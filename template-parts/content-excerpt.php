<?php
/**
 * Template part for displaying post excerpts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Relaxed_Axolotl_Clone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-excerpt'); ?>>
	<header class="entry-header">
		<?php
		the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				// We would define relaxed_axolotl_clone_posted_on() in template-tags.php
				// For now, let's put a simple date.
				echo '<span class="posted-on">' . get_the_date() . '</span>';
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
	// We would define relaxed_axolotl_clone_post_thumbnail() in template-tags.php
	// For now, let's add a placeholder or basic thumbnail support.
	if ( has_post_thumbnail() ) {
		echo '<div class="post-thumbnail">';
		the_post_thumbnail( 'medium' ); // Or another appropriate size
		echo '</div>';
	}
	?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more">
			<?php esc_html_e( 'Read More', 'relaxed-axolotl-clone' ); ?>
		</a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
