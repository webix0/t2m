<?php
/**
 * Template Name: Archive by topic
 * Tempate Post Type: page
 * 
 * Template part for displaying Genral Confrence Review posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wprig
 */

get_header(); ?>

	<main id="primary" class="site-main">
	<link rel="stylesheet" id="t2m-archive-css" href="<?php echo get_theme_file_uri( '/css/archive.css' ) ?>" type="text/css" media="all"> 

	<section class="cat-sqs">
		<?php
		$solidColor = array( "redS", "blueS", "orangeS", "purpleS", "turquoiseS" );
		$s = 0;
		$titleColor = array( "red50", "blue50", "orange50", "purple50", "turquoise50" );
		$transpColor = array( "orange50", "green50", "turquoise50",  "blue50", "purple50" );
		$s = 0;

		$cats = get_categories( array(
				'orderby' => 'name',
				'order'   => 'ASC',
				'exclude' => '1'
			) ); 

		// loop through the categries
		foreach ($cats as $cat) {
			// setup the cateogory ID
			$cat_id= $cat->term_id;
			// Make a header for the cateogry
			?>
		
				
			<?php
			echo '<a href="#' . $cat->term_id . '"> <h2 class="' . $solidColor[$s] . '">' . $cat->name . '</h2></a>'; 
			++$s;
			if ( $s == 5 ) {
				$s = 0; 
			}
		} ?>
	</section>

	<section class="articles-by-cat">
	<?php

		// loop through the categries
		foreach ($cats as $cat) {
			// setup the cateogory ID
			$cat_id= $cat->term_id;
			// Make a header for the cateogry
			$i = 0;
			?>
			<div id="<?php echo $cat->term_id ?>" class="cat-section">
			<div class="bckg-color <?php echo $transpColor[$s] ?>"></div>
			<div class="content">
				
			<?php
			
			
			echo '<h2 class="' . $solidColor[$s] . '">' . $cat->name . '</h2>';
			// create a custom wordpress query
			query_posts("cat=$cat_id&posts_per_page=100");
			// start the wordpress loop!
			
			if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php // create our link now that the post is setup ?>
				<?php 
				if ( $i == 3 ) { ?>
					<p>More in <?php echo $cat->name ?></p>
					<div class="display-none">
				<?php } ?>
				<div class="article show-description">
					<h3 class="<?php echo $titleColor[$s] ?>"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
					<?php 
					echo '<p>' . get_the_excerpt() . '</p>' ;
					++$i; 
					?>
					<a class="more-link" href="<?php the_permalink();?>"></a>
				</div>

			<?php endwhile; endif; // done our wordpress loop. Will start again for each category 
			++$s;
			if ( $s == 5 ) {
				$s = 0; 
			}
			if ( $i > 3 ) { 
					echo '</div>';
			}
			echo '</div></div>'; // done class cat-section
		} // done the foreach statement ?>

	</section>



	</main><!-- #primary -->
	<script type="javascript" href="<?php echo get_theme_file_uri( '/js/smooth-scroll.js' ) ?>"> </script>
<?php
get_footer();
