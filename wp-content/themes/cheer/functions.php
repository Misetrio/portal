<?php
/**
 * Cheer functions and definitions
 *
 * @package Cheer
 * @since Cheer 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Cheer 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 650; /* pixels */

if ( ! function_exists( 'cheer_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Cheer 1.0
 */
function cheer_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'cheer' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cheer', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add support for custom backgrounds
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'f3efe3',
		'default-image' => get_template_directory_uri() . '/img/background.jpg',
	) );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cheer' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // cheer_setup
add_action( 'after_setup_theme', 'cheer_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Cheer 1.0
 */
function cheer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cheer' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cheer_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function cheer_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'cheer-maiden-orange' );
	wp_enqueue_style( 'cheer-rye' );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if ( is_singular() && wp_attachment_is_image() )
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
}
add_action( 'wp_enqueue_scripts', 'cheer_scripts' );

/**
 * Enqueue Google Fonts
 */

function cheer_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';

	/*	translators: If there are characters in your language that are not supported
		by Maiden Orange, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Maiden Orange font: on or off', 'cheer' ) )
		wp_register_style( 'cheer-maiden-orange', "$protocol://fonts.googleapis.com/css?family=Maiden+Orange&subset=latin" );

	/*	translators: If there are characters in your language that are not supported
		by Rye, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Rye font: on or off', 'cheer' ) )
		wp_register_style( 'cheer-rye', "$protocol://fonts.googleapis.com/css?family=Rye&subset=latin,latin-ext" );
}
add_action( 'init', 'cheer_fonts' );

/**
 * Enqueue font styles in custom header admin
 */

function cheer_admin_fonts( $hook_suffix ) {
	if ( 'appearance_page_custom-header' != $hook_suffix )
		return;

	wp_enqueue_style( 'cheer-maiden-orange' );
	wp_enqueue_style( 'cheer-rye' );
}
add_action( 'admin_enqueue_scripts', 'cheer_admin_fonts' );

/**
 * Add theme options in the Customizer
 */

function cheer_customize( $wp_customize ) {
	$wp_customize->add_section( 'cheer_settings', array(
		'title'    => __( 'Theme Options', 'cheer' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'cheer_color_scheme', array(
		'default' => 'traditional',
	) );

	$wp_customize->add_control( 'cheer_color_scheme', array(
		'label'    => __( 'Color Scheme', 'cheer' ),
		'section'  => 'cheer_settings',
		'settings' => 'cheer_color_scheme',
		'type'     => 'radio',
		'choices'  => array(
			'modern'      => __( 'Modern', 'cheer' ),
			'traditional' => __( 'Traditional', 'cheer' ),
			),
	) );
}
add_action( 'customize_register', 'cheer_customize' );


/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require( get_template_directory() . '/inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates
 */
require( get_template_directory() . '/inc/tweaks.php' );

/**
 * Jetpack-specific functions and definitions
 */
require( get_template_directory() . '/inc/jetpack.php' );
