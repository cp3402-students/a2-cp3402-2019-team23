<?php
/**
 * EmsCustomTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EmsCustomTheme
 */

if ( ! function_exists( 'emscustomtheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function emscustomtheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EmsCustomTheme, use a find and replace
		 * to change 'emscustomtheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'emscustomtheme', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'emscustomtheme' ),
            'social' => esc_html__( 'Social', 'emscustomtheme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'emscustomtheme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

        // Add theme support for Custom Logo
        add_theme_support( 'custom-logo', array(
            'width' => 100,
            'height' => 100,
            'flex-width' => true,
        ));

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'emscustomtheme_setup' );

/**
 * Register custom fonts.
 */
//function emscustomtheme_fonts_url() {
//    $fonts_url = '';
//
//    /*
//     * Translators: If there are characters in your language that are not
//     * supported by Libre Franklin, translate this to 'off'. Do not translate
//     * into your own language.
//     */
//    $libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );
//
//    if ( 'off' !== $libre_franklin ) {
//        $font_families = array();
//
//        $font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
//
//        $query_args = array(
//            'family' => urlencode( implode( '|', $font_families ) ),
//            'subset' => urlencode( 'latin,latin-ext' ),
//        );
//
//        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
//    }
//
//    return esc_url_raw( $fonts_url );
//}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function emscustomtheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'emscustomtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'emscustomtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function emscustomtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'emscustomtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'emscustomtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'emscustomtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function emscustomtheme_scripts() {

    //enqueue google fonts: Source Sans Pro and PT Serif
    wp_enqueue_style('emsfonts', 'https://fonts.googleapis.com/css?family=Heebo|PT+Serif+Caption:400,400i|Source+Sans+Pro:400,400i,600,900|Wendy+One');

    wp_enqueue_style('bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');

	wp_enqueue_style( 'emscustomtheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'emscustomtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'emscustomtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'emscustomtheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

