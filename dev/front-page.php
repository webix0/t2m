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
		dynamic_sidebar( 'recent-articles-widget' );
		?>
		<a href="<?php echo get_page_link(1971); ?>">Full List of Articles</a>
		<?php
		get_template_part( 'template-parts/content-recent-g-conf', get_post_type() ); 
		
		dynamic_sidebar( 'cat-sqs' );

		get_template_part( 'template-parts/content-single-g-conf', get_post_type() ); 

		get_template_part( 'template-parts/content-social-media', get_post_type() );
		?>


		

	</main><!-- #primary -->

<?php
get_footer();
