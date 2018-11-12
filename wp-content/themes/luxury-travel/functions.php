<?php
/**
 * Luxury Travel functions and definitions
 * @package Luxury Travel
 */

/* Breadcrumb Begin */
function luxury_travel_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}


/* Theme Setup */
if ( ! function_exists( 'luxury_travel_setup' ) ) :

function luxury_travel_setup() {

	$GLOBALS['content_width'] = apply_filters( 'luxury_travel_content_width', 640 );
	
	load_theme_textdomain( 'luxury-travel', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('luxury-travel-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'luxury-travel' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', luxury_travel_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'luxury_travel_activation_notice' );
	}
}
endif;
add_action( 'after_setup_theme', 'luxury_travel_setup' );

// Notice after Theme Activation
function luxury_travel_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome">';
		echo '<h3>'. esc_html__( 'Greetings from Themeglance!!', 'luxury-travel' ) .'</h3>';
		echo '<p>'. esc_html__( 'A heartful thank you for choosing Themeglance. We promise to deliver only the best to you. Please proceed towards welcome section to get started.', 'luxury-travel' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=luxury_travel_guide' ) ) .'" class="button button-primary">'. esc_html__( 'About Theme', 'luxury-travel' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function luxury_travel_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'luxury-travel' ),
		'description'   => __( 'Appears on blog page sidebar', 'luxury-travel' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'luxury-travel' ),
		'description'   => __( 'Appears on page sidebar', 'luxury-travel' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'luxury-travel' ),
		'description'   => __( 'Appears on page sidebar', 'luxury-travel' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'luxury-travel' ),
		'description'   => __( 'Appears on footer', 'luxury-travel' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'luxury-travel' ),
		'description'   => __( 'Appears on footer', 'luxury-travel' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'luxury-travel' ),
		'description'   => __( 'Appears on footer', 'luxury-travel' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'luxury-travel' ),
		'description'   => __( 'Appears on footer', 'luxury-travel' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'luxury_travel_widgets_init' );

/* Theme Font URL */
function luxury_travel_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Ubuntu';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/*radio button sanitization*/
 function luxury_travel_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Theme enqueue scripts */
function luxury_travel_scripts() {
	wp_enqueue_style( 'luxury-travel-font', luxury_travel_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'luxury-travel-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'luxury-travel-style', 'rtl', 'replace' );
	wp_enqueue_style( 'luxury-travel-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'css-nivo-slider', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('luxury-travel-ie', get_template_directory_uri().'/css/ie.css', array('luxury-travel-basic-style'));
	wp_style_add_data( 'luxury-travel-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'luxury_travel_scripts' );

/* Theme Credit link */
define('LUXURY_TRAVEL_PRO_THEME_URL','https://www.themesglance.com/themes/premium-travel-agency-wordpress-theme/','luxury-travel');
define('LUXURY_TRAVEL_THEME_DOC','https://www.themesglance.com/docs/luxury-travel-pro/','luxury-travel');
define('LUXURY_TRAVEL_LIVE_DEMO','https://themesglance.com/luxury-travel/','luxury-travel');
define('LUXURY_TRAVEL_FREE_THEME_DOC','https://www.themesglance.com/docs/free-luxury-travel/','luxury-travel');
define('LUXURY_TRAVEL_SUPPORT','https://wordpress.org/support/theme/luxury-travel/','luxury-travel');
define('LUXURY_TRAVEL_REVIEW','https://www.themesglance.com/support/?view=forum&id=5','luxury-travel');
define('LUXURY_TRAVEL_SITE_URL','https://www.themesglance.com/');

function luxury_travel_credit_link() {
    echo "<a href=".esc_url(LUXURY_TRAVEL_SITE_URL)." target='_blank'>".esc_html__('ThemesGlance','luxury-travel')."</a>";
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* About Theme. */	
require get_template_directory() . '/inc/getting-started/getting-started.php';