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

	<section class="articles-by-cat">
	<?php
		wp_print_styles( array( 'wprig-archive' ) ); 
		// get all the categories from the database
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
			echo "<h2>".$cat->name."</h2>";
			// create a custom wordpress query
			query_posts("cat=$cat_id&posts_per_page=100");
			// start the wordpress loop!
			$i = 0;
			if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php // create our link now that the post is setup ?>
				<div class="article show-description">
				<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
				<?php 
				echo '<p>' . get_the_excerpt() . '</p>' ;
				++$i;
				?>
				</div>
				<?php 
				if ( $i == 3 ) { ?>
					<p>More in <?php echo $cat->name ?></p>
					<div class="display-none">
				<?php	
				}
				?>


			<?php endwhile; endif; // done our wordpress loop. Will start again for each category 
			if ( $i > 3 ) { 
					echo '</div>';
			}
		} // done the foreach statement ?>

	</section>



	</main><!-- #primary -->

<?php
get_footer();
