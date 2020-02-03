<?php
/**
 * aero functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aero
 */

if ( ! function_exists( 'aero_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aero_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aero, use a find and replace
		 * to change 'aero' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aero', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'aero' ),
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
		add_theme_support( 'custom-background', apply_filters( 'aero_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

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

		add_image_size('slider', 960, 300, true);
		/*add_image_size('');*/
	}
endif;
add_action( 'after_setup_theme', 'aero_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aero_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aero_content_width', 640 );
}
add_action( 'after_setup_theme', 'aero_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aero_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'aero' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'aero' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s row"><div class="col-md-12">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left', 'aero'),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'aero'),
		'before_widget' => '<section id="%1s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle', 'aero'),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'aero'),
		'before_widget' => '<section id="%1s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right', 'aero'),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'aero'),
		'before_widget' => '<section id="%1s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}
add_action( 'widgets_init', 'aero_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aero_scripts() {
    wp_enqueue_style('bootstrap-style-cdn', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css'); //bootstrap style cdn
    wp_enqueue_style('font-awesome-cdn', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); //fontawesome style cdn
	wp_enqueue_style( 'aero-style', get_stylesheet_uri());

	wp_register_script('jquery_2', '//code.jquery.com/jquery-3.2.1.slim.min.js' );
    wp_register_script('popper-script-cdn', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array('jquery'));
	wp_register_script('bootstrap-script-cdn', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array('jquery'));//bootstrap script cdn - include jquery dependency

    wp_enqueue_script('aero-theme-js', get_template_directory_uri() . '/js/theme.js', array('jquery', 'jquery_2', 'popper-script-cdn', 'bootstrap-script-cdn'));//theme js  - include jquery dependency

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aero_scripts' );

/**
 * Enqueue ADMIN scripts and styles.
 */
function aero_admin_scripts() {

}
add_action( 'admin_enqueue_scripts', 'aero_admin_scripts');

/**
 * Universally required files
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/Aero_Walker_Nav.php';
require get_template_directory() . '/inc/Aero_Post_Meta.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
