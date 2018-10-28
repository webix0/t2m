<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wprig
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php wp_print_styles( array( 'wprig-sidebar', 'wprig-widgets' ) ); ?>
<link rel="stylesheet" id="t2m-archive-css" href="<?php echo get_theme_file_uri( '/css/archive.css' ) ?>" type="text/css" media="all">
<aside id="secondary" class="primary-sidebar widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

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
			echo '<a href="' . get_site_url() . '/archive-of-articles/#' . $cat->term_id . '"> <h2 class="' . $solidColor[$s] . '">' . $cat->name . '</h2></a>'; 
			++$s;
			if ( $s == 5 ) {
				$s = 0; 
			}
		} ?>
	</section>

</aside><!-- #secondary -->
