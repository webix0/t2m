<?php
/**
 * WP Rig functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wprig
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wprig_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wprig, use a find and replace
		* to change 'wprig' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wprig', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'wprig' ),
		)
	);
	register_nav_menus(
		array(
			'footer-1' => esc_html__( 'footer-1', 'wprig' ),
		)
	);
	register_nav_menus(
		array(
			'footer-2' => esc_html__( 'footer-2', 'wprig' ),
		)
	);
	register_nav_menus(
		array(
			'footer-3' => esc_html__( 'footer-bottom', 'wprig' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background', apply_filters(
			'wprig_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo', array(
			'height'      => 194,
			'width'       => 1000,
			'flex-width'  => false,
			'flex-height' => false,
		)
	);

	/**
	 * Add support for wide aligments.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Add support for block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 */
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Yellow', 'wprig' ),
			'slug'  => 'yellow',
			'color' => '#FDBB0D',
		),
		array(
			'name'  => __( 'Light Blue', 'wprig' ),
			'slug'  => 'light-blue',
			'color' => '#35A1CF',
		),
		array(
			'name'  => __( 'Blue', 'wprig' ),
			'slug'  => 'blue',
			'color' => '#2A80B9',
		),
		array(
			'name'  => __( 'Red', 'wprig' ),
			'slug'  => 'red',
			'color' => '#BF3A2B',
		),
		array(
			'name'  => __( 'Turquoise', 'wprig' ),
			'slug'  => 'turquoise',
			'color' => '#32C3D0',
		),
		array(
			'name'  => __( 'Purple', 'wprig' ),
			'slug'  => 'purple',
			'color' => '#7F47DD',
		),
		array(
			'name'  => __( 'Green', 'wprig' ),
			'slug'  => 'green',
			'color' => '#88A80D',
		),
		array(
			'name'  => __( 'Rust', 'wprig' ),
			'slug'  => 'rust',
			'color' => '#E06C1E',
		),
		array(
			'name'  => __( 'orange', 'wprig' ),
			'slug'  => 'orange',
			'color' => '#FF9E01',
		),
		array(
			'name'  => __( 'Gray', 'wprig' ),
			'slug'  => 'gray',
			'color' => '#707070',
		),
		array(
			'name'  => __( 'White', 'wprig' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
	) );

	/**
	 * Optional: Disable custom colors in block color palettes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 *
	 * add_theme_support( 'disable-custom-colors' );
	 */

	/**
	 * Add support for font sizes.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
	 */
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => __( 'small', 'wprig' ),
			'shortName' => __( 'S', 'wprig' ),
			'size'      => 16,
			'slug'      => 'small',
		),
		array(
			'name'      => __( 'regular', 'wprig' ),
			'shortName' => __( 'M', 'wprig' ),
			'size'      => 20,
			'slug'      => 'regular',
		),
		array(
			'name'      => __( 'large', 'wprig' ),
			'shortName' => __( 'L', 'wprig' ),
			'size'      => 36,
			'slug'      => 'large',
		),
		array(
			'name'      => __( 'larger', 'wprig' ),
			'shortName' => __( 'XL', 'wprig' ),
			'size'      => 48,
			'slug'      => 'larger',
		),
	) );

	/**
	 * Enqueue block editor style
	 */
	function wprig_block_editor_styles() {
		wp_enqueue_style( 'wprig-block-editor-styles', get_theme_file_uri( '/style-editor.css' ), false, '1.0', 'all' );
	}

	add_action( 'enqueue_block_editor_assets', 'wprig_block_editor_styles' );

	/**
	 * Optional: Add AMP support.
	 *
	 * Add built-in support for the AMP plugin and specific AMP features.
	 * Control how the plugin, when activated, impacts the theme.
	 *
	 * @link https://wordpress.org/plugins/amp/
	 */
	add_theme_support( 'amp', array(
		'comments_live_list' => true,
	) );

}

add_action( 'after_setup_theme', 'wprig_setup' );

/**
 * Set the embed width in pixels, based on the theme's design and stylesheet.
 *
 * @param array $dimensions An array of embed width and height values in pixels (in that order).
 * @return array
 */
function wprig_embed_dimensions( array $dimensions ) {
	$dimensions['width'] = 720;
	return $dimensions;
}
add_filter( 'embed_defaults', 'wprig_embed_dimensions' );

/**
 * Register Google Fonts
 */
function wprig_fonts_url() {
	$fonts_url = '';

	/**
	 * Translator: If Slackey does not support characters in your language, translate this to 'off'.
	 */
	$slackey = esc_html_x( 'on', 'Slackey font: on or off', 'wprig' );
	/**
	 * Translator: If Raleway Sans does not support characters in your language, translate this to 'off'.
	 */
	$raleway = esc_html_x( 'on', 'Raleway font: on or off', 'wprig' );
	/**
	 * Translator: If EB Garamond does not support characters in your language, translate this to 'off'.
	 */
	$eb_garamond = esc_html_x( 'on', 'EB Garamond font: on or off', 'wprig' );

	$font_families = array();

	if ( 'off' !== $slackey ) {
		$font_families[] = 'Slackey';
	}

	if ( 'off' !== $raleway ) {
		$font_families[] = 'Raleway:100,300,300i,400,500,600,700,700i,800';
	}

	if ( 'off' !== $eb_garamond ) {
		$font_families[] = 'EB Garamond:400,400i,500i,700';
	}

	if ( in_array( 'on', array( $slackey, $raleway, $eb_garamond ) ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function wprig_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'wprig-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'wprig_resource_hints', 10, 2 );

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function wprig_gutenberg_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'wprig-fonts', wprig_fonts_url(), array(), null );

	// Enqueue main stylesheet.
	wp_enqueue_style( 'wprig-base-style', get_theme_file_uri( '/css/editor-styles.css' ), array(), '20180514' );
}
add_action( 'enqueue_block_editor_assets', 'wprig_gutenberg_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wprig_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wprig' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wprig' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Recent Articles Widget', 'wprig' ),
		'id'            => 'recent-articles-widget',
		'description'   => esc_html__( 'Add widgets here.', 'wprig' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wprig_widgets_init' );

/**
 * Enqueue styles.
 */
function wprig_styles() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'wprig-fonts', wprig_fonts_url(), array(), null );

	// Enqueue main stylesheet.
	wp_enqueue_style( 'wprig-base-style', get_stylesheet_uri(), array(), '20180514' );

	// Register component styles that are printed as needed.
	wp_register_style( 'wprig-comments', get_theme_file_uri( '/css/comments.css' ), array(), '20180514' );
	wp_register_style( 'wprig-content', get_theme_file_uri( '/css/content.css' ), array(), '20180514' );
	wp_register_style( 'wprig-sidebar', get_theme_file_uri( '/css/sidebar.css' ), array(), '20180514' );
	wp_register_style( 'wprig-widgets', get_theme_file_uri( '/css/widgets.css' ), array(), '20180514' );
	wp_register_style( 'wprig-front-page', get_theme_file_uri( '/css/front-page.css' ), array(), '20180514' );
	wp_register_style( 'wprig-archive', get_theme_file_uri( '/css/archive.css' ), array(), '20181019' );
}
add_action( 'wp_enqueue_scripts', 'wprig_styles' );

/**
 * Enqueue scripts.
 */
function wprig_scripts() {

	// If the AMP plugin is active, return early.
	if ( wprig_is_amp() ) {
		return;
	}

	// Enqueue JQurey.
	wp_enqueue_script( 'wprig-jquery3.3.1', 'https://code.jquery.com/jquery-3.3.1.min.js', false, false );
	wp_script_add_data( 'wprig-jquery3.3.1', 'defer', true );

	// Enqueue the navigation script.
	wp_enqueue_script( 'wprig-navigation', get_theme_file_uri( '/js/navigation.js' ), array(), '20180514', false );
	wp_script_add_data( 'wprig-navigation', 'async', true );
	wp_localize_script( 'wprig-navigation', 'wprigScreenReaderText', array(
		'expand'   => __( 'Expand child menu', 'wprig' ),
		'collapse' => __( 'Collapse child menu', 'wprig' ),
	));

	// Enqueue skip-link-focus script.
	wp_enqueue_script( 'wprig-skip-link-focus-fix', get_theme_file_uri( '/js/skip-link-focus-fix.js' ), array(), '20180514', false );
	wp_script_add_data( 'wprig-skip-link-focus-fix', 'defer', true );

	// Enqueue comment script on singular post/page views only.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue YouTube Video Thumbnail script.
	wp_enqueue_script( 'wprig-youtube-video-thumbnail', get_theme_file_uri( '/js/youtube-video-thumbnail.js' ), array(), '20180823', false );
	wp_script_add_data( 'wprig-youtube-video-thumbnail', 'defer', true );

	// Enqueue Read-More-Article script.
	wp_enqueue_script( 'wprig-read-more', get_theme_file_uri( '/js/read-more-article.js' ), array(), '20181004', false );
	wp_script_add_data( 'wprig-read-more', 'async', true );

}
add_action( 'wp_enqueue_scripts', 'wprig_scripts' );

/**
 * Custom responsive image sizes.
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/pluggable/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Optional: Add theme support for lazyloading images.
 *
 * @link https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
 */
require get_template_directory() . '/pluggable/lazyload/lazyload.php';





add_filter( 'single_template', function ( $template )
{
    // Get the current single post object
    $post = get_queried_object();
    // Set our 'constant' folder path
    $path = 'template-parts/';

    // Set our variable to hold our templates
    $templates = array();

    // Lets handle the custom post type section
    if ( 'post' !== $post->post_type ) {
        $templates[] = $path . 'content-' . $post->post_type . '-' . $post->post_name . '.php';
        $templates[] = $path . 'content-' . $post->post_type . '.php';
    }

    // Lets handle the post post type stuff
    if ( 'post' === $post->post_type ) {
        // Get the post categories
        $categories = get_the_category( $post->ID );
        // Just for incase, check if we have categories
        if ( $categories ) {
            foreach ( $categories as $category ) {
                // Create possible template names
                $templates[] = $path . 'content-' . $category->slug . '.php';
                $templates[] = $path . 'content-' . $category->term_id . '.php';
            } //endforeach
        } //endif $categories
    } // endif  

    // Set our fallback templates
    $templates[] = $path . 'single.php';
    $templates[] = 'index.php';

    /**
     * Now we can search for our templates and load the first one we find
     * We will use the array ability of locate_template here
     */
    $template = locate_template( $templates );

    // Return the template rteurned by locate_template
    return $template;
});
