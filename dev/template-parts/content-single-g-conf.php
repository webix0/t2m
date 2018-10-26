<?php
/**
 * Template part for displaying the most recent post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

?>
<section class="recent-general-conf d-grid">
	<?php
	$cats = get_categories( array(
		'orderby' => 'rand',
		'order'   => 'ASC',
		'post_count' => 1,
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
		query_posts("cat=$cat_id&posts_per_page=1&orderby=rand");
		// start the wordpress loop!
		
		if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php // create our link now that the post is setup ?>
			
			<div class="article">
				<div class="gc-titles">
				<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
				<div class="gc-sub-titles">
				<?php if( get_field('LDS_Speaker') ): ?>
					<h6>Conference Speaker-</h6>
					<h4><?php echo get_field('LDS_Speaker'); ?></h4>
				<?php endif; ?>
				<h6>Reviewed by-</h6>
				<?php 
					$reviewAuthorurl = get_author_posts_url(get_the_author_meta( 'ID' ));
					$reviewAuthor = get_the_author_meta( 'nickname' );
					echo '<h4><a href="' . get_author_posts_url(get_the_author_meta( 'ID' )) . '">' . get_the_author_meta( 'nickname' ) . '</a></h4>';
				 ?>
				 </div>
				 </div>
				<a href="<?php the_permalink();?>">
				<?php echo get_the_post_thumbnail(); ?>
				</a>
				<p class="thin has-red-color">Review Highlights -</p>
				<?php
				the_excerpt();	?>
				<a class="right-link" href="<?php the_permalink();?>">Read More</a>
			</div>
			

		<?php endwhile; endif; // done our wordpress loop. Will start again for each category 
		++$s;
		if ( $s == 4 ) {
			$s = 0; 
		}
		
	} // done the foreach statement ?>


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
	</div> <!--End of .content -->
</section>
