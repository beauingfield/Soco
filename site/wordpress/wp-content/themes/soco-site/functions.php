<?php
/**
 * Soco Site functions and definitions
 *
 * @package Soco Site
 */

/** INCLUDE CUSTOM POST TYPES */
include 'inc/post-types/press_pt/press_pt.php';
include 'inc/post-types/culture_pt/culture_pt.php';
include 'inc/post-types/events_pt/events_pt.php';
include 'inc/post-types/awards_pt/awards_pt.php';
include 'inc/post-types/menu_pt/menu_pt.php';

/** INCLUDE CUSTOM PAGES  */

include 'inc/admin-pages/admin-pages.php';

/** INCLUDE SHORTCODES */

include 'inc/shortcodes/shortcodes.php';

// Add Featured Images to Pages
$postTypes = array(
    'post',
    'page',
    'post-image'
);

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'soco_site_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function soco_site_setup() {

	add_theme_support('post-thumbnails',
		array(
			'post',
			'pages',
			'soco_culture_pt',
			'soco_events_pt'
			)
	);

	add_image_size( 'post-image', 650, 366, true );
	add_image_size( 'single-post-image', 650, 366, true );
	add_image_size( 'event', 450, 252, true );
	add_image_size( 'big', 1000, 561, true );
	add_image_size('culture', 319 );
	set_post_thumbnail_size( 50, 50, array( 'center', 'center')  );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'soco-site' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

}
endif; // soco_site_setup
add_action( 'after_setup_theme', 'soco_site_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function soco_site_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'soco-site' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'soco_site_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function soco_site_scripts() {
	wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	wp_enqueue_style('red-jquery-style', get_template_directory_uri(). '/_assets/css/jquery-ui.css' );
	wp_enqueue_style('red-jquery-style-theme', get_template_directory_uri(). '/_assets/css/jquery-ui.theme.css' );
	wp_enqueue_script( 'jquery-google', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array() , '1.11.1', true);
	wp_enqueue_script( 'map-google', '//maps.googleapis.com/maps/api/js', array(), '', true);
	wp_enqueue_script( 'soco-script', get_template_directory_uri() . '/_assets/js/main.js', array(), '0.1.0', true );
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('maps-soco', get_template_directory_uri(). '/_assets/js/maps.js', array(), '', true );
}

add_action( 'wp_enqueue_scripts', 'soco_site_scripts' );

?>