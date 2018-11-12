<?php
/**
 * Travelers Theme Customizer.
 *
 * @package Travelers
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function travelers_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// Load custom controls
	require get_template_directory() . '/inc/customizer-controls.php';
	// Home Page Featured posts
	$wp_customize->add_section( 'home_featured_posts', array(
		'title' 			=> __( 'Home Page Slider', 'travelers' )
	) );
	$wp_customize->add_setting( 'home_featured_posts', array(
		'default' 			=> '',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'travelers_checkbox_sanitize'
	) );
	$wp_customize->add_control( 'home_featured_posts', array(
		'type' 				=> 'checkbox',
		'label' 			=> __( 'Check to enable featured posts', 'travelers' ),
		'settings' 			=> 'home_featured_posts',
		'section' 			=> 'home_featured_posts'
	) );
	$cats = array();
	foreach ( get_categories() as $categories => $category ){
		$cats[$category->term_id] = $category->name;
	}
	$wp_customize->add_setting( 'home_featured_posts_select', array(
		'default' => '',
		'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 'home_featured_posts_select', array(
		'type'      => 'select',
		'label' 	=> __( 'Select Category', 'travelers' ),
		'choices'   => $cats,
		'settings'  => 'home_featured_posts_select',
		'section'   => 'home_featured_posts'
	) );
	$wp_customize->add_setting( 'dt_slide_number', array(
		'default' 			=> '3',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'travelers_sanitize_integer'
	) );
	$wp_customize->add_control( 'dt_slide_number', array(
		'type'			 	=> 'number',
		'label' 			=> __( 'No. of Slide', 'travelers' ),
		'section'			=> 'home_featured_posts',
		'settings' 			=> 'dt_slide_number'
	) );
 // end premium features
	// Primary Color
    $wp_customize->add_setting( 'travelers_primary_color', array(
			'priority' 			     => 4,
			'default' 			     => '#ff357b',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_primary_color', array(
			'label' 		=> __( 'Primary Color', 'travelers' ),
			'section' 		=> 'colors',
			'settings' 		=> 'travelers_primary_color'
	) ) );
    // Main Menu Color
    $wp_customize->add_setting( 'travelers_menu_color', array(
			'priority' 			     => 5,
			'default' 			     => '#ffffff',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_menu_color_picker', array(
			'label' 		=> __( 'Menu Font Color', 'travelers' ),
			'section' 		=> 'colors',
			'settings' 		=> 'travelers_menu_color'
	) ) );
    $wp_customize->add_setting( 'travelers_menu_bg_color', array(
			'priority' 				 => 6,
			'default' 				 => '#273039',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_menu_bg_color_picker', array(
			'label' 			=> __( 'Menu Background', 'travelers' ),
			'section' 			=> 'colors',
			'settings' 			=> 'travelers_menu_bg_color'
	) ) );
    $wp_customize->add_setting( 'travelers_menu_color_hover', array(
			'priority' 			     => 7,
			'default' 			     => '#ffffff',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_menu_hover_color_picker', array(
			'label' 			=> __( 'Menu Hover Font Color', 'travelers' ),
			'section' 			=> 'colors',
			'settings' 			=> 'travelers_menu_color_hover'
	) ) );
    $wp_customize->add_setting( 'travelers_menu_hover_bg_color', array(
			'priority' 			     => 8,
			'default' 			     => '#ff357b',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_menu_hover_bg_color_picker', array(
			'label' 			=> __( 'Menu Hover Background', 'travelers' ),
			'section' 			=> 'colors',
			'settings' 			=> 'travelers_menu_hover_bg_color'
	) ) );
	// Related Posts
	$wp_customize->add_section(
		'travelers_related_posts_section',
		array(
			'title' 			=> __( 'Related Posts', 'travelers' )
		)
	);
	$wp_customize->add_setting(
		'travelers_related_posts_setting',
		array(
			'default' 			=> 0,
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback'	=> 'travelers_checkbox_sanitize'
		)
	);
	$wp_customize->add_control(
		'travelers_related_posts',
		array(
			'type' 				=> 'checkbox',
			'label' 			=> __( 'Check to activate the related posts', 'travelers' ),
			'section' 			=> 'travelers_related_posts_section',
			'settings' 			=> 'travelers_related_posts_setting'
		)
	);
	// Footer Settings
	$wp_customize->add_section(
		'footer',
		array(
			'title' => esc_html__('Footer', 'travelers'),
		)
	);
		$wp_customize->add_setting( 'footer_credit', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control(
			new Travelers_Group_Settings_Heading_Control(
				$wp_customize,
				'footer_credit',
				array(
					'label'      => esc_html__( 'Footer Settings', 'travelers' ),
					'description' => sprintf( esc_html__( 'Upgrade to %1$s to change footer copyright and credit.', 'travelers' ), '<a href="https://www.famethemes.com/themes/travelers-pro/#download_pricing">'.esc_html__( 'Travelers Pro version', 'travelers' ).'</a>' ),
					'section'    => 'footer',
					'type'    => 'group_heading_message',
				)
			)
		);
	
		$wp_customize->add_section( 'travelers_premium' ,
			array(
				'title'       => esc_html__( 'Upgrade to Travelers Pro', 'travelers' ),
				'description' => '',
				'priority'  => 215,
			)
		);
		$wp_customize->add_setting( 'easymag_premium_features', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control(
			new Travelers_Group_Settings_Heading_Control(
				$wp_customize,
				'travelers_premium_features',
				array(
					'label'      => esc_html__( 'Travelers Pro Features', 'travelers' ),
					'description'   => '<span>Advanced Typography</span><span>600+ Google Fonts</span><span>Sticky Menu</span><span>Sticky Posts</span><span>Instagram Widget</span><span>Footer Instagram</span><span>Footer Copyright Editor</span><span>... and much more </span>',
					'section'    => 'travelers_premium',
					'type'    => 'group_heading_message',
				)
			)
		);
		$wp_customize->add_setting( 'easymag_premium_links', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control(
			new Travelers_Group_Settings_Heading_Control(
				$wp_customize,
				'travelers_premium_links',
				array(
					'description'   => '<a target="_blank" class="travelers-premium-buy-button" href="https://www.famethemes.com/themes/travelers-pro/#download_pricing">Buy Travelers Pro Now</a>',
					'section'    => 'travelers_premium',
					'type'    => 'group_heading_message',
				)
			)
		);
	
	// Checkbox Sanitize
	function travelers_checkbox_sanitize( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
	// Color Sanitizate
	function travelers_color_sanitize( $hex_color, $setting ) {
		// Sanitize $input as a hex value without the hash prefix.
		$hex_color = sanitize_hex_color( $hex_color );
		// If $input is a valid hex value, return it; otherwise, return the default.
		return ( ! empty( $hex_color ) ? $hex_color : $setting->default );
	}
	// Number Integer
	function travelers_sanitize_integer( $input ) {
		return absint( $input );
	}
}
add_action( 'customize_register', 'travelers_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travelers_customize_preview_js() {
	wp_enqueue_script( 'travelers_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'travelers_customize_preview_js' );
function travelers_customize_js_settings(){
	wp_register_style( 'travelers-customizer-controls',  get_template_directory_uri() . '/css/customizer.css' );
	wp_enqueue_style('travelers-customizer-controls');
}
add_action( 'customize_controls_enqueue_scripts', 'travelers_customize_js_settings' );