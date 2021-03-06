<?php
/**
 * Atoz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package atoz
 */

 if ( ! function_exists( 'atoz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function atoz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on atoz use a find and replace
	 * to change atoz to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'atoz', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'atoz' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'atoz_custom_background_args', array(
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
		'height'      => 80,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );    
}
endif;
add_action( 'after_setup_theme', 'atoz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function atoz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'atoz_content_width', 640 );
}
add_action( 'after_setup_theme', 'atoz_content_width', 0 );

/**
 * Post Thumbnails & Sizes
 */
add_image_size( 'atoz_slider', 1920, 1000,  array( 'top', 'center' ) );
add_image_size( 'atoz_home_posts', 358, 240,  array( 'top', 'center' ) );
add_image_size( 'atoz_related_posts', 358, 240,  array( 'top', 'center' ) );
add_image_size( 'atoz_recent_post', 65, 65,  array( 'top', 'center' ) );
add_image_size( 'atoz_single_post', 1920, 560,  array( 'top', 'center' ) );

/**
 * Output color schemes as internal css
 */
if (!function_exists('atoz_print_all_head_styles')) {
	function atoz_print_all_head_styles() {
		echo '<style type="text/css" id="head-css">';
		$quote_bg_color = get_theme_mod('atoz_quote_bg_color');
		if ($quote_bg_color) {
			echo esc_attr("\n" . '#service:before{ background-color: ' . $quote_bg_color . '}');
		}
		$atoz_transparnt = get_theme_mod('atoz_transparnt');
		if ($atoz_transparnt) {
			echo esc_attr("\n" . '#service:before{ opacity: ' . $atoz_transparnt . '}');
		}
		$accent_color = get_theme_mod('atoz_accent_color');
		if ($accent_color) {
			echo esc_attr("\n" . '.post-categories a, .fnav a, .nav a, a.page-numbers, a , #sb-imgbox .blog-box-inn p { color: ' . $accent_color . '}');
			echo esc_attr("\n" . '.search, .btn-outline-primary, .btn-default, #single-banner .tag, .author-box .author-box-title a, #single-banner .category{ background-color: ' . $accent_color . '}');
			echo esc_attr("\n" . '.btn-default:hover{ background-color: ' . $accent_color . '}');
			echo esc_attr("\n" . '.nav-links span.current{ background-color: ' . $accent_color . '; border: ' . $accent_color . '}');
			echo esc_attr("\n" . '.nav-links a:hover{ background-color: ' . $accent_color . '; border: ' . $accent_color . '}');
			echo esc_attr("\n" . '.nav-links a.page-numbers{border-color: ' . $accent_color . '}');
		}
		$fontawesome_icons = get_theme_mod('atoz_fontawesome_icons');
		if ($fontawesome_icons) {
			echo esc_attr("\n" . 'i.fa { color: ' . $fontawesome_icons . '}');
		}
		$social_icon_color = get_theme_mod('atoz_social_icon_color');
		if ($social_icon_color) {
			echo esc_attr("\n" . 'footer i.fa { color: ' . $social_icon_color . '}');
		}
		$nav_text_color = get_theme_mod('atoz_nav_text_color');
		if ($nav_text_color) {
			echo esc_html("\n" . '#tf-menu.navbar-default .navbar-nav a { color: ' . $nav_text_color . '}');
		}
		$submenu_bg = get_theme_mod('atoz_submenu_bg');
		if ($submenu_bg) {
			echo esc_attr("\n" . '#tf-menu ul ul { background-color: ' . $submenu_bg . '}');
		}
		$menu_hover = get_theme_mod('atoz_menu_hover');
		if ($menu_hover) {
			echo esc_attr("\n" . '#tf-menu.navbar-default ul li a:hover { background-color: ' . $menu_hover . '}');
		}
		$footer_text_color= get_theme_mod('atoz_footer_text_color');
		if($footer_text_color){
			echo esc_attr("\n" . '.footer-bottom .widget-title { color: ' . $footer_text_color . '}');
		}
		echo "\n" . "</style>" . "\n";
	}
}
add_action( 'wp_head', 'atoz_print_all_head_styles' );

/**
 * Outputs footer background color
 */
if (!function_exists('atoz_footer_bck_color')) {
	function atoz_footer_bck_color() {
		echo '<style type="text/css" id="rijo-css">';
		$footer_bck_color_value = get_theme_mod('atoz_footer_bck_color', 'atoz');
		$append_color = sprintf('color: %s;', $footer_bck_color_value);
		// Output the styles.
		if ($footer_bck_color_value) {
			echo esc_attr("\n" . '.footer-bottom li{' . $append_color . '}' . "\n". '.footer-bottom h2{' . $append_color . '}' . "\n");
		}
		echo "\n". "</style>" . "\n";
	}
}
 // Add custom styles to `<head>`.
add_action( 'wp_head', 'atoz_footer_bck_color' );

// Globals variables.
global $atoz_options_categories;
$atoz_options_categories = array();
$atoz_options_categories_obj = get_categories();
foreach ($atoz_options_categories_obj as $category) {
     $atoz_options_categories[$category->cat_ID] = $category->cat_name;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function atoz_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'atoz'),
		'id' => 'sidebar-1',
		'description' => esc_html__('Add widgets here.', 'atoz'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => esc_html__('Footer Widgets 1', 'atoz'),
		'id' => 'widget-footer1',
		'description' => esc_html__('Add Widgets Here.', 'atoz'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',

	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widgets 2', 'atoz'),
		'id' => 'widget-footer2',
		'description' => esc_html__('Add widgets here.', 'atoz'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widgets 3', 'atoz'),
		'id' => 'widget-footer3',
		'description' => esc_html__('Add widgets here.', 'atoz'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widgets 4', 'atoz'),
		'id' => 'widget-footer4',
		'description' => esc_html__('Add widgets here.', 'atoz'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'atoz_widgets_init');


/**
 * Registers social widget
 */
function atoz_widgets_register() {
	require get_template_directory() . '/inc/widgets/social.php';
}
add_action('widgets_init', 'atoz_widgets_register');

// Recent Post Widgets.
require get_template_directory() . '/inc/widgets/recentpost.php';

// Related Posts.
require get_template_directory() . '/inc/lib/related-post.php';

// Breadcrumbs.
require get_template_directory() . '/inc/lib/breadcrumb.php';

/**
 * Post Excerpt length
 *
 * $length is set to return 10 words
 */
function atoz_custom_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 10;
}
add_filter( 'excerpt_length', 'atoz_custom_excerpt_length', 999 );

/**
 * Read more link
 *
 * $more add a read more link to all posts.
 */
function atoz_excerpt_more( $more ) {
	if ( is_admin() ) {
		return '&hellip; <br> <a class="read-more" href="' . esc_url(get_permalink(get_the_ID())) . '">' . esc_html__('Read more', 'atoz') . '</a>';
	}
}
add_filter( 'excerpt_more', 'atoz_excerpt_more' );

/**
 * Enqueue css styles.
 */
function atoz_styles(){    
    wp_enqueue_style( 'atoz-bootstrap',get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style( 'atoz-font-awesome',get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style( 'atoz-owl-carousel',get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style( 'atoz-owl-theme',get_template_directory_uri() . '/css/owl.theme.css');
    wp_enqueue_style( 'atoz-responsive',get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style( 'atoz-animate',get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style( 'atoz-style',get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'atoz-roboto', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');
    wp_enqueue_style( 'atoz-oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,400,700');
}
add_action( 'wp_enqueue_scripts', 'atoz_styles' );

/**
 * Enqueue js scripts.
 */
function atoz_scripts() {
	wp_enqueue_script( 'atoz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'atoz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}    
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'atoz-jquery-isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array(), '20151215', true );
    wp_enqueue_script( 'atoz-modernizr-custom', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '20151215', true );
    wp_enqueue_script( 'atoz-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '20151215', true );
    wp_enqueue_script( 'atoz-smoothscroll', get_template_directory_uri() . '/js/SmoothScroll.js', array(), '20151215', true );
    wp_enqueue_script( 'atoz-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), '20151215', true );
    wp_enqueue_script( 'atoz-wow-min', get_template_directory_uri() . '/js/wow.min.js', array(), '20151215', true );
    wp_enqueue_script( 'atoz-main', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );
    wp_add_inline_script('atoz-wow-min','new WOW().init();');
}
add_action( 'wp_enqueue_scripts', 'atoz_scripts' );

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
require get_template_directory() . '/inc/jetpack.php';

