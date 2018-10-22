<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package t2m
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php
	$available_video_sizes = get_field('available_video_sizes');
	if ( $available_video_sizes != 'No Video' ){ ?>
		<div class="article-header">
			<header class="entry-header">
			<?php
				the_title( '<h1 class="entry-title">', '</h1>' );

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
						t2m_posted_on();
						t2m_comments_link();
					?>
				</div><!-- .entry-meta -->
				<?php
			endif;
			?>
		</header><!-- .entry-header --> 
		<div class="video-box"><?php
			if ( $available_video_sizes === 'Square and 16x9' ){
				if ( have_rows ('square_episode_video') ) {
					the_row();
					if ( get_row_layout() == 'add_square_video' ) {
						$ep_video_host = get_sub_field('video_host');
					}
					if ( $ep_video_host === 'YouTube' ) {
						?>
						<div id="<?php echo ( get_sub_field ( 'square_youtube_start_end' ) ); ?>" class="youtube-player-square  sq-video" data-id="<?php echo ( get_sub_field ( 'youtube_url_code' ) ); ?>"></div>
						<div id="<?php echo ( get_sub_field ( 'youtube_url_code' ) ); ?>" class="play-btn sq-video">Play
						<div class="play-btn-circle"></div>
						</div>
					<?php
					}
					if ( $ep_video_host === 'Facebook' ) {
						$fb_vid_code = get_sub_field( 'facebook_url_code' );
						?>
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
							fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>
						<!-- Your embedded video player code -->
						<div class="fb-video sq-video" data-href="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/" data-width="500" data-show-text="false">
							<div class="fb-xfbml-parse-ignore">
								<blockquote cite="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/">
									<a href="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/">How to Share With Just Friends</a>
									<p>How to share with just friends.</p>
									Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December 5, 2014
								</blockquote>
							</div>
						</div>
						<?php
					}
				}
				if ( have_rows ('16_9_episode_video') ) {
					the_row();
					if ( get_row_layout() == 'add_16_9_video' ) {
						$ep_video_host = get_sub_field('video_host'); 
					}
					if ( $ep_video_host === 'YouTube' ){
						?>
						<div id="<?php echo ( get_sub_field ( 'youtube_16x9_start_end' ) ); ?>" class="youtube-player desktop-16x9" data-id="<?php echo ( get_sub_field ( 'youtube_url_code' ) ); ?>"></div>
						<div id="<?php echo ( get_sub_field ( 'youtube_url_code' ) ); ?>" class="play-btn desktop-16x9">Play
						<div class="play-btn-circle desktop-16x9"></div>
						</div>
					<?php
					}
					if ( $ep_video_host === 'Facebook' ) {
						$fb_vid_code = get_sub_field( 'facebook_url_code' );
						?>
						<div id="fb-root desktop-16x9"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
							fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>
						<!-- Your embedded video player code -->
						<div class="fb-video" data-href="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/" data-width="500" data-show-text="false">
							<div class="fb-xfbml-parse-ignore">
								<blockquote cite="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/">
									<a href="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/">How to Share With Just Friends</a>
									<p>How to share with just friends.</p>
									Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December 5, 2014
								</blockquote>
							</div>
						</div>
						<?php
					}/* end of facebook */
				} 
			}
			elseif ( $available_video_sizes === '16x9 Only' ){
				if ( have_rows ('16_9_episode_video') ) {
					the_row();
					if ( get_row_layout() == 'add_16_9_video' ) {
						$ep_video_host = get_sub_field('video_host');
					}
					if ( $ep_video_host === 'YouTube' ){
						?>
						<div class="youtube-player" data-id="<?php echo ( get_sub_field ( 'youtube_url_code' ) ); ?>"></div>
						<div id="<?php echo ( get_sub_field ( 'youtube_url_code' ) ); ?>" class="play-btn">Play
						<div class="play-btn-circle"></div>
						</div>
					<?php
					}
					if ( $ep_video_host === 'Facebook' ) {
						$fb_vid_code = get_sub_field( 'facebook_url_code' );
						?>
						<div id="fb-root desktop-16x9"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
							fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>
						<!-- Your embedded video player code -->
						<div class="fb-video" data-href="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/" data-width="500" data-show-text="false">
							<div class="fb-xfbml-parse-ignore">
								<blockquote cite="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/">
									<a href="https://www.facebook.com/facebook/videos/<?php echo ($fb_vid_code); ?>/">How to Share With Just Friends</a>
									<p>How to share with just friends.</p>
									Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December 5, 2014
								</blockquote>
							</div>
						</div>
						<?php
					} /* end of facebook */
				}
			} /* end of 16x9 ONLY */ ?>
			</div>
		</div> <?php
	}/* end of $available_video_sizes != 'No Video' */
	else{ ?>
		<div class="article-header">
				<header class="entry-header-lonely">
						<?php
							the_title( '<h1 class="entry-title">', '</h1>' );
				
						if ( 'post' === get_post_type() ) :
							?>
							<div class="entry-meta">
								<?php
									t2m_posted_on();
									t2m_comments_link();
								?>
							</div><!-- .entry-meta -->
							<?php
						endif;
						?>
					</header><!-- .entry-header -->
			<?php t2m_post_thumbnail(); ?>
		</div> <?php
	}
			?>
	<div class="entry-content">
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
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 't2m' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	
		
	<?php 
	$count = 0;
	if( have_rows('related_audio') ): ?>
		<section class="article-bible-refs">
		<h4>Audio Resources</h4>
		<div class="line"></div>
		<ul>
			<?php while( have_rows('related_audio') ): the_row();
				$title = get_sub_field('track_title');
				$linky = get_sub_field('track_url');
				$aSource = get_sub_field('track_source');
				?>
				<li class="a-refs">
					<h3><?php echo $title; ?></h3>
					<p>Audio Source - <a href="<?php echo $aSource['url']; ?>" target="<?php echo $aSource['target']; ?>"><?php echo $aSource['title']; ?></a></p>
					<audio id="audio-<?php echo $count; ?>" controls>
						<source src="<?php echo $linky; ?>" type="audio/mpeg">
						Your browser does not support this audio element.
					</audio>
					<script>
						var aud = document.getElementById("audio-<?php echo $count++; ?>");
						aud.currentTime=<?php echo get_sub_field('start_time'); ?>;
					</script>
				
				</li>
			<?php endwhile; ?>
		</ul>
	</section>	
	<?php endif; ?>
	

	<section class="related-links">
		
		<?php if( have_rows('related_url_links') ): ?>
			<h4>Article Resources</h4>
			<div class="line"></div>
			<ul>
				<?php while( have_rows('related_url_links') ): the_row(); 
					$linky = get_sub_field('link_title');
					?>
					<li class="links-list">
					<a class="button" href="<?php echo $linky['url']; ?>" target="<?php echo $linky['target']; ?>"><?php echo $linky['title']; ?></a>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</section>

	
		
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
			<section class="related-articles">
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
			echo '</ul></div></section>';

			}
			}
			$post = $backup;
			wp_reset_query();
			?>
		
	<section class="related-audio">
		
		<?php if( have_rows('related_url_links') ): ?>
			<h4>Article Resources</h4>
			<div class="line"></div>
			<ul>
				<?php while( have_rows('related_url_links') ): the_row(); 
					$linky = get_sub_field('link_title');
					?>
					<li class="links-list">
					<a class="button" href="<?php echo $linky['url']; ?>" target="<?php echo $linky['target']; ?>"><?php echo $linky['title']; ?></a>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</section>

	<section class="related-videos">
		
		<?php if( have_rows('related_videos') ): ?>
			<h4>Related Videos</h4>
			<div class="line"></div>
			<div class="videos-contaner">

				<?php while( have_rows('related_videos') ): the_row(); 
					echo '<div class="rVid-wrapper">';
					$vSource = get_sub_field('video_source');
					if ( $vSource === "YouTube" ) { ?>
						<div id="<?php echo ( get_sub_field ( 'youtube_start_end_time' ) ); ?>" class="youtube-player related-v" data-id="<?php echo ( get_sub_field ( 'youtube_video_code' ) ); ?>"></div>
						<div id="<?php echo ( get_sub_field ( 'youtube_video_code' ) ); ?>" class="play-btn">Play
						<div class="play-btn-circle"></div>
						</div> <?php
					}
					echo '</div>';?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</section>

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
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
endif;
