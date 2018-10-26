<?php
/**
 * Template Name: General Conference Review
 * Tempate Post Type: post
 * 
 * Template part for displaying Genral Confrence Review posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package t2m
 */
get_header();
wp_print_styles( array( 'wprig-content' ) );
?>
<main id="primary" class="site-main">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<div class="gc-header">
			<h3>A Biblical response to the Semi-Annual LDS General Conferences talks</h3>
			<a href="\">Learn More</a>
		</div>
		<div class="gc-titles">
			<?php echo('<h1>' . get_the_title() . '</h1>');?>
			<div class="gc-sub-titles">
			<?php
			if( get_field('LDS_Title') ): ?>
				<h6>LDS Conference Talk Title-</h6>
				<h3><?php echo get_field('LDS_Title'); ?></h3>
			<?php endif;
			if( get_field('LDS_Speaker') ): ?>
				<h6>Conference Speaker-</h6>
				<h4><?php echo get_field('LDS_Speaker'); ?></h4>
			<?php endif; ?>
				<h6>Reviewed by-</h6>
				<?php 
				if ( have_posts() ) { the_post();
					$reviewAuthorurl = get_author_posts_url(get_the_author_meta( 'ID' ));
					$reviewAuthor = get_the_author_meta( 'nickname' );
					echo '<h4><a href="' . get_author_posts_url(get_the_author_meta( 'ID' )) . '">' . get_the_author_meta( 'nickname' ) . '</a></h4>';
				} ?>
			</div>
		</div>
	</div> 

	<section class="LDS-highlights-section">
		<div class="instructions">
			<p>Watch or read the following video snippit then read the corresponding review below.</p>
		</div>
		<?php
			if ( get_field('LDS_YouTube_code') ) {
				?>
				<div id="<?php echo ( get_field ( 'lds_youtube_start_time' ) ); ?>" class="youtube-player" data-id="<?php echo ( get_field ( 'LDS_YouTube_code' ) ); ?>"></div>

				<div class="play-btn" id="<?php echo ( get_field ( 'LDS_YouTube_code' ) ); ?>" data-id="<?php echo ( get_field ( 'lds_youtube_start_time' ) ); ?>" >
				
				</div>
			<?php
			} 
			if( get_field('LDS_Message_summary') ){ ?>
				<h4 class="has-red-color">LDS Message Highlights -</h4>
				<?php echo get_field('LDS_Message_summary');
			}
			if( get_field('lds_website_link') ){ 
				 echo '<div class="gc-LDS-link"><a href="' . get_field('lds_website_link') . '">' . 'Read More on</a>';?>
				<h6>LDS.org</h6>
			</div> <!-- End of LDS-link -->
				<?php
			}
			?>
			

	</section> <!-- LDS-highlights-section -->

	<div class="entry-content">
		<div class="review-header">
				<?php 
					echo('<h3>' . get_the_title() . '</h3>');
					echo '<h6>Review by - <span class="reviwee"><a href="' . $reviewAuthorurl . '">' . $reviewAuthor . '</a></span></h6>';
				?>
		</div>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 't2m' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		); ?>
	
		
		<?php if( have_rows('article_resources') ): ?>
		<div class="related-links">
			<h4>Article Resources</h4>
			<div class="line"></div>
			<ul>
				<?php while( have_rows('article_resources') ): the_row(); 
					$linky = get_sub_field('resource_link');
					?>
					<li class="links-list">
					<a class="button" href="<?php echo $linky['url']; ?>" target="<?php echo $linky['target']; ?>"><?php echo $linky['title']; ?></a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>	
		<?php endif; ?>
	<div class="two-column">
		<!-- Related Articles -->
			<?php
				$tags = wp_get_post_tags( $post->ID );
				if (has_tag()) { 
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				
				$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>8,  // Number of related posts that will be shown.
				'caller_get_posts'=>1
				);
				
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {?>
					<div class="related-articles">
					
					<div class="container-right">
					<h4>Related Articles</h4>
					<div class="line"></div> <?php
				echo '<div id="relatedposts"><ul>';
				while ($my_query->have_posts()) {
				$my_query->the_post();
				?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				
				<?php
				}
				echo '</ul></div></div></div>';
				}
				}
				$post = $backup;
				wp_reset_query();
				?>
		<!-- General Conference More -->
			<?php
				$categorys = wp_get_post_cats( $post->ID );
				if (has_category()) { 
				$category_ids = array();
				foreach($categorys as $individual_category) $category_ids[] = $individual_category->term_id;
				
				$args=array(
				'category_name' => 'g-conference',
				'post__not_in' => array($post->ID),
				'showposts'=>8,  // Number of related posts that will be shown.
				'caller_get_posts'=>1
				);
				
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {?>
					<div class="general-c-latest">
						<div class="container-right">
							<h4>More</h4>
							<h3>LDS General Confernce</h3>
							<h3>Talks Reviews</h3>
						<div class="line"></div>
						<div id="relatedposts">
							<ul>
								<?php
								while ($my_query->have_posts()) {
								$my_query->the_post();
								?>
								<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li> 
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php
				}
				}
				$post = $backup;
				wp_reset_query();
				?>
	</div>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 't2m' ),
				'after'  => '</div>',
			)
		);
		?>
		
	</div><!-- .entry-content -->

	

	<!-- <footer class="entry-footer">
	</footer> .entry-footer -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php
	if ( is_singular() ) :
		the_post_navigation(
			array(
				'prev_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Previous:', 't2m' ) . '</span></div>%title',
				'next_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Next:', 't2m' ) . '</span></div>%title',
			)
		);

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endif; ?>
</main><!-- #primary I said-->	

<?php
get_sidebar();
get_footer();