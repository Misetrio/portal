<?php
/**
 * subscribe functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package subscribe
 */

if ( ! function_exists( 'subscribe_setup' ) ) :

function subscribe_setup() {

	load_theme_textdomain( 'subscribe', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'subscribe' ),
		'footer' => esc_html__( 'Footer Menu', 'subscribe' ),		
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
	add_theme_support( 'custom-background', apply_filters( 'subscribe_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_editor_style( array( 'assets/css/editor-style.css', '' ) ); 
}
endif;
add_action( 'after_setup_theme', 'subscribe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function subscribe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'subscribe_content_width', 785 );
}
add_action( 'after_setup_theme', 'subscribe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function subscribe_sidebar_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'subscribe' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'subscribe' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Project Sidebar', 'subscribe' ),
		'id'            => 'sidebar-project',
		'description'   => esc_html__( 'Add widgets here.', 'subscribe' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '<span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'subscribe' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'subscribe' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'subscribe' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'subscribe' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'subscribe' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'subscribe' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'subscribe' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'subscribe' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'subscribe_sidebar_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */

require get_template_directory() . '/admin/customizer-library.php';

require get_template_directory() . '/admin/customizer-options.php';

require get_template_directory() . '/admin/styles.php';

require get_template_directory() . '/admin/mods.php';

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load plugins.
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Config Page Builder.
 */
require get_template_directory() . '/inc/page-builder.php';

/**
 * Enqueues scripts and styles.
 */
function subscribe_scripts() {

    // load jquery if it isn't

    //wp_enqueue_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '', true );

    //  Enqueues Javascripts     
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '', true );    
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20180501', true );

    // Enqueues CSS styles

    wp_enqueue_style( 'subscribe-style', get_stylesheet_uri(), array(), '20180523' );     
    wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'genericons-style',  get_template_directory_uri() . '/genericons/genericons.css' );
    
    if ( get_theme_mod( 'site-layout', 'choice-1' ) == 'choice-1' ) {
    	wp_enqueue_style( 'responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20180501' ); 
	}
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'subscribe_scripts' );

/* Admin CSS Style */
function subscribe_admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'subscribe_admin_style');


/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'post_thumb', 785, 439, true );  
    add_image_size( 'grid_thumb', 351, 233, true );
    add_image_size( 'full_thumb', 1170);
    add_image_size( 'project_medium_thumb', 785);
    add_image_size( 'employee_thumb', 220);
    add_image_size( 'project_thumb', 343, 236, true );
    add_image_size( 'widget_post_thumb', 80, 80, true );                                    
}

/**
 * Registers custom widgets.
 */
function subscribe_widgets_init() {

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-services-type-a.php';
	register_widget( 'subscribe_Services_Type_A' );			

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-services-type-b.php';
	register_widget( 'subscribe_Services_Type_B' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-latest-news.php';
	register_widget( 'subscribe_Latest_News' );				

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-testimonials.php';
	register_widget( 'subscribe_Testimonials' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-facts.php';
	register_widget( 'subscribe_Facts' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-skills.php';
	register_widget( 'subscribe_Skills' );						

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-portfolio.php';
	register_widget( 'subscribe_Portfolio' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-employees.php';
	register_widget( 'subscribe_Employees' );					

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-contact.php';
	register_widget( 'subscribe_Home_Contact_Info' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-clients.php';
	register_widget( 'subscribe_Clients' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-call-to-action.php';
	register_widget( 'subscribe_Action' );			

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-contact.php';
	register_widget( 'subscribe_Contact_Info' );				

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'subscribe_Popular_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'subscribe_Views_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-newsletter.php';
	register_widget( 'subscribe_Newsletter_Widget' );												

}
add_action( 'widgets_init', 'subscribe_widgets_init' );

/* Demo Content*/
require_once dirname( __FILE__ ) . '/demo-content/setup.php';

/* Fix PHP warning */
function _get($str){
    $val = !empty($_GET[$str]) ? $_GET[$str] : null;
    return $val;
}