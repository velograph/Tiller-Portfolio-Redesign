<?php
/**
 * Gabriel Amadeus functions and definitions
 *
 * @package Gabriel Amadeus
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'grabrielamadeus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function grabrielamadeus_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Gabriel Amadeus, use a find and replace
	 * to change 'Gabriel Amadeus' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gabrielamadeus', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gabrielamadeus' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // grabrielamadeus_setup
add_action( 'after_setup_theme', 'grabrielamadeus_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function grabrielamadeus_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'gabrielamadeus' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'grabrielamadeus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function grabrielamadeus_scripts() {
	wp_enqueue_style( 'grabrielamadeus-style', get_stylesheet_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css') );

	wp_enqueue_script( 'grabrielamadeus-jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, true );

	wp_enqueue_script( 'grabrielamadeus-stickup', get_template_directory_uri() . '/js/jquery.sticky.js', false, filemtime( get_stylesheet_directory().'/js/jquery.sticky.js' ), true );

	wp_enqueue_script( 'grabrielamadeus-slick', get_template_directory_uri() . '/js/slick.js', false, filemtime( get_stylesheet_directory().'/js/slick.js' ), true );

	wp_enqueue_script( 'grabrielamadeus-lazySizes', get_template_directory_uri() . '/js/lazysizes.min.js', false, filemtime( get_stylesheet_directory().'/js/lazysizes.min.js' ), true );

	wp_enqueue_script( 'grabrielamadeus-siteScripts', get_template_directory_uri() . '/js/site_scripts.js', false, filemtime( get_stylesheet_directory().'/js/site_scripts.js' ), true );

	wp_enqueue_script( 'grabrielamadeus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'grabrielamadeus_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Register Custom Post Type
function testimonials() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'gabrielamadeus' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'gabrielamadeus' ),
		'menu_name'           => __( 'Testimonials', 'gabrielamadeus' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'gabrielamadeus' ),
		'all_items'           => __( 'All Testimonials', 'gabrielamadeus' ),
		'view_item'           => __( 'View Testimonial', 'gabrielamadeus' ),
		'add_new_item'        => __( 'Add New Testimonial', 'gabrielamadeus' ),
		'add_new'             => __( 'Add New', 'gabrielamadeus' ),
		'edit_item'           => __( 'Edit Testimonial', 'gabrielamadeus' ),
		'update_item'         => __( 'Update Testimonial', 'gabrielamadeus' ),
		'search_items'        => __( 'Search Testimonials', 'gabrielamadeus' ),
		'not_found'           => __( 'Not found', 'gabrielamadeus' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'gabrielamadeus' ),
	);
	$args = array(
		'label'               => __( 'testimonial', 'gabrielamadeus' ),
		'description'         => __( 'Testimonials', 'gabrielamadeus' ),
		'labels'              => $labels,
		'supports'            => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'testimonial', $args );

}

// Hook into the 'init' action
add_action( 'init', 'testimonials', 0 );

// Register Custom Post Type
function what_can_i_do() {

	$labels = array(
		'name'                => _x( 'Skills', 'Post Type General Name', 'gabrielamadeus' ),
		'singular_name'       => _x( 'Skill', 'Post Type Singular Name', 'gabrielamadeus' ),
		'menu_name'           => __( 'Skills', 'gabrielamadeus' ),
		'parent_item_colon'   => __( 'Parent Skill:', 'gabrielamadeus' ),
		'all_items'           => __( 'All Skills', 'gabrielamadeus' ),
		'view_item'           => __( 'View Skill', 'gabrielamadeus' ),
		'add_new_item'        => __( 'Add New Skill', 'gabrielamadeus' ),
		'add_new'             => __( 'Add New', 'gabrielamadeus' ),
		'edit_item'           => __( 'Edit Skill', 'gabrielamadeus' ),
		'update_item'         => __( 'Update Skill', 'gabrielamadeus' ),
		'search_items'        => __( 'Search Skills', 'gabrielamadeus' ),
		'not_found'           => __( 'Not found', 'gabrielamadeus' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'gabrielamadeus' ),
	);
	$args = array(
		'label'               => __( 'skill', 'gabrielamadeus' ),
		'description'         => __( 'What Can I Do For You?', 'gabrielamadeus' ),
		'labels'              => $labels,
		'supports'            => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'skill', $args );

}

// Hook into the 'init' action
add_action( 'init', 'what_can_i_do', 0 );

add_image_size( 'full-width-hero-2x', 5000, 1500, true);
add_image_size( 'full-width-hero-desktop', 2500, 650, true);
add_image_size( 'full-width-hero-tablet', 1250, 325, true);
add_image_size( 'full-width-hero-mobile', 625, 313, true);

add_image_size( 'case-study-2x', 5000, 2500, true);
add_image_size( 'case-study-desktop', 2500, 1250, true);
add_image_size( 'case-study-tablet', 1250, 625, true);
add_image_size( 'case-study-mobile', 625, 313, true);
