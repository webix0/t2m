<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wprig
 */

get_header();

/*
* Include the component stylesheet for the content.
* This call runs only once on index and archive pages.
* At some point, override functionality should be built in similar to the template part below.
*/
wp_print_styles( array( 'wprig-content', 'wprig-front-page' ) ); // Note: If this was already done it will be skipped.

?>
	<main id="primary" class="site-main">

		<?php
		get_template_part( 'template-parts/content-recent-article', get_post_type() );

		wp_print_styles( array( 'wprig-widgets' ) );
		echo '<link rel="stylesheet" href="'. site_url() . '/wp-content/themes/t2m/node_modules/sal.js/dist/sal.css">';
		dynamic_sidebar( 'recent-articles-widget' );
		?>
		<div class="fp-articles"
			data-sal="zoom-in"
			data-sal-delay="300"
			data-sal-easing="ease-out-bounce"
		>
			<h2><a href="<?php echo get_page_link(1971); ?>">Full List of Articles</a></h2>
		</div>
		<?php
		get_template_part( 'template-parts/content-recent-g-conf', get_post_type() ); ?>
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
					'exclude' => '1, 8s'
				) ); 
	
			// loop through the categries
			foreach ($cats as $cat) {
				// setup the cateogory ID
				$cat_id= $cat->term_id;
				// Make a header for the cateogry
				?>
			
				<?php
				echo '<a href="' . get_site_url() . '/archive-of-articles/#' . $cat->term_id . '"> <h2 class="' . $solidColor[$s] . '">' . $cat->name . '</h2></a>'; 
				++$s;
				if ( $s == 5 ) {
					$s = 0; 
				}
			} ?>
		</section>
		<?php
		get_template_part( 'template-parts/content-single-g-conf', get_post_type() ); 

		get_template_part( 'template-parts/content-social-media', get_post_type() );
		?>


		

	</main><!-- #primary -->
	<script src="<?php echo site_url() ?>/wp-content/themes/t2m/node_modules/sal.js/dist/sal.js"></script>
	<script>
		sal();
	</script>
<?php
get_footer();
