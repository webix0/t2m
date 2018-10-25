<?php
/**
 * Template part for displaying the most recent post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

?>
<section class="recent-general-conf">
		<?php
		$cats = get_categories( array(
			'orderby' => 'name',
			'order'   => 'ASC',
			'number'  => '6',
			'include' => '221'
		) ); 
		// loop through the categries
		foreach ($cats as $cat) {
			// setup the cateogory ID
			$cat_id= $cat->term_id;
			// Make a header for the cateogry
			$i = 0;
			?>
			<div class="bckg-color <?php echo $transpColor[$s] ?>"></div>
			<div class="content">
				<h2>A Biblical response to the Semi-Annual LDS General Conferences Talks</h2>
				<a class="right-link" href="<?php echo get_page_link(1971); ?>">Learn More</a>
			<?php
			// create a custom wordpress query
			query_posts("cat=$cat_id&posts_per_page=100");
			// start the wordpress loop!
			
			if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php // create our link now that the post is setup ?>
				
				<div class="article yt-cropped-pic gc-grid">
					<a href="<?php the_permalink();?>">
					<?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'yt-cropped-pic' ) ); ?>
					</a>
					<div class="titles">
						<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
						<h4><?php echo get_field('LDS_Speaker'); ?></h4>
					</div>
				</div>

			<?php endwhile; endif; // done our wordpress loop. Will start again for each category 
			++$s;
			if ( $s == 4 ) {
				$s = 0; 
			}
			
			echo '</div>'; // done class cat-section
		} // done the foreach statement ?>

	</section>

