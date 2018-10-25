<?php
/**
 * Template part for displaying the most recent post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
					wprig_posted_on();
				?>
			</div><!-- .entry-meta -->
			<?php
		endif;
		?>
	</header><!-- .entry-header -->

	<?php wprig_post_thumbnail(); ?>
	
	<div class="entry-content margin-top">
		<?php
		the_excerpt();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wprig' ),
				'after'  => '</div>',
			)
		);
		?>
		<a id="readmore-bubble" class="readmore-bubble" href="<?php echo get_permalink(); ?>" alt="Read More about this article"></a>
	</div><!-- .entry-content -->

</article><!-- #post--->


