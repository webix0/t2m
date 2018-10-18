<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vault17
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			
			<nav id="footer-navigation">
				<div class="footer1-nav">
					<p>More</p>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-1',
						'menu_id'        => 'footer-1',
					) );
					?>
				</div>
				
			</nav><!-- #Footer-navigation -->
			<nav id="footer-navigation">
				<div class="footer2-nav">
					<p>Information</p>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-2',
						'menu_id'        => 'Footer-2',
					) );
					?>
				</div>
			</nav>
			

			<div class="site-branding">
				<a href="<?php echo(get_site_url()); ?>" class="custom-logo-link" rel="home" itemprop="url"><img width="1000" height="194" src="<?php echo(get_site_url()); ?>/wp-content/uploads/2018/08/T2M-Logo-150x150.png" class="custom-logo" alt="Talking to Mormons" itemprop="logo" data-src="<?php echo(get_site_url()); ?>/wp-content/uploads/2018/08/T2M-Logo-300x270.png" data-srcset="<?php echo(get_site_url()); ?>/wp-content/uploads/2018/08/T2M-Logo-1024x923.png 1000w, <?php echo(get_site_url()); ?>/wp-content/uploads/2018/08/T2M-Logo-300x270.png 300w, <?php echo(get_site_url()); ?>/wp-content/uploads/2018/08/T2M-Logo-300x270.png 768w" data-sizes="(min-width: 960px) 75vw, 100vw" srcset="<?php echo(get_site_url()); ?>/wp-content/uploads/2018/08/T2M-Logo-768x692.png 1000w, <?php echo(get_site_url()); ?>/wp-content/uploads/2018/08/T2M-Logo-768x692.png 300w, <?php echo(get_site_url()); ?>/wp-content/uploads/2018/08/T2M-Logo-300x270.png 768w" sizes="(min-width: 960px) 75vw, 100vw"></a>
			</div><!-- .site-branding -->
			
			<nav id="footer-navigation">
				<div class="footer3-nav">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-3',
						'menu_id'        => 'Footer-3',
					) );
					?>
					<div class="copy-footer"> 
						<p> &copy; 2017 - <?php echo date("Y"); ?> </p>
					</div>
				</div>
			</nav>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script> 
				var refTagger = {
					settings: {
						bibleVersion: "KJV",			
						roundCorners: true,
						socialSharing: [],
						customStyle : {
							heading: {
								backgroundColor : "#2A80B9",
								color : "#ffffff",
								fontSize : "1.2em",
								fontFamily : "Raleway"
							},
							body   : {
								backgroundColor : "#ffe69e",
								fontSize : "1.2em",
								fontFamily : "EB Garamond"
							}
						}
					}
				}; 
				(function(d, t) { 
					var g = d.createElement(t), s = d.getElementsByTagName(t)[0]; 
					g.src = 'https://api.reftagger.com/v2/RefTagger.js'; 
					s.parentNode.insertBefore(g, s); 
				}(document, 	'script')); 
			</script>
</body>
</html>
