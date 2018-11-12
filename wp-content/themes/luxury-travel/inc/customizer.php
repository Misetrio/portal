<?php
/**
 * Luxury Travel Theme Customizer
 * @package Luxury Travel
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function luxury_travel_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'luxury_travel_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'TG Settings', 'luxury-travel' ),
	    'description' => __( 'Description of what this panel does.', 'luxury-travel' ),
	) );

	//layout setting
	$wp_customize->add_section( 'luxury_travel_theme_layout', array(
    	'title'      => __( 'Layout Settings', 'luxury-travel' ),
		'priority'   => 30,
		'panel' => 'luxury_travel_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('luxury_travel_layout',array(
	        'default' => __( 'Right Sidebar', 'luxury-travel' ),
	        'sanitize_callback' => 'luxury_travel_sanitize_choices'	        
	) );
	$wp_customize->add_control('luxury_travel_layout',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'luxury-travel' ),
	        'section' => 'luxury_travel_theme_layout',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','luxury-travel'),
	            'Right Sidebar' => __('Right Sidebar','luxury-travel'),
	            'One Column' => __('One Column','luxury-travel'),
	            'Three Columns' => __('Three Columns','luxury-travel'),
	            'Four Columns' => __('Four Columns','luxury-travel'),
	            'Grid Layout' => __('Grid Layout','luxury-travel')
	        ),
	    )
    );

	//Topbar section
	$wp_customize->add_section('luxury_travel_topbar_icon',array(
		'title'	=> __('Topbar Section','luxury-travel'),
		'description'	=> __('Add Header Content here','luxury-travel'),
		'priority'	=> null,
		'panel' => 'luxury_travel_panel_id',
	));

	$wp_customize->add_setting('luxury_travel_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('luxury_travel_call',array(
		'label'	=> __('Add Contact Url','luxury-travel'),
		'section'	=> 'luxury_travel_topbar_icon',
		'setting'	=> 'luxury_travel_call',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('luxury_travel_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('luxury_travel_mail',array(
		'label'	=> __('Add Email Url','luxury-travel'),
		'section'	=> 'luxury_travel_topbar_icon',
		'setting'	=> 'luxury_travel_mail',
		'type'		=> 'url'
	));


	//Social Icons(topbar)
	$wp_customize->add_section('luxury_travel_topbar_header',array(
		'title'	=> __('Social Icon Section','luxury-travel'),
		'description'	=> __('Add Header Content here','luxury-travel'),
		'priority'	=> null,
		'panel' => 'luxury_travel_panel_id',
	));	

	$wp_customize->add_setting('luxury_travel_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('luxury_travel_facebook_url',array(
		'label'	=> __('Add Facebook link','luxury-travel'),
		'section'	=> 'luxury_travel_topbar_header',
		'setting'	=> 'luxury_travel_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('luxury_travel_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('luxury_travel_twitter_url',array(
		'label'	=> __('Add Twitter link','luxury-travel'),
		'section'	=> 'luxury_travel_topbar_header',
		'setting'	=> 'luxury_travel_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('luxury_travel_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('luxury_travel_insta_url',array(
		'label'	=> __('Add Instagram link','luxury-travel'),
		'section'	=> 'luxury_travel_topbar_header',
		'setting'	=> 'luxury_travel_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('luxury_travel_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('luxury_travel_youtube_url',array(
		'label'	=> __('Add Youtube link','luxury-travel'),
		'section'	=> 'luxury_travel_topbar_header',
		'setting'	=> 'luxury_travel_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('luxury_travel_pintrest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('luxury_travel_pintrest_url',array(
		'label'	=> __('Add Pintrest link','luxury-travel'),
		'section'	=> 'luxury_travel_topbar_header',
		'setting'	=> 'luxury_travel_pintrest_url',
		'type'	=> 'url'
	));


	//home page slider
	$wp_customize->add_section( 'luxury_travel_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'luxury-travel' ),
		'priority'   => 30,
		'panel' => 'luxury_travel_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'luxury_travel_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'luxury_travel_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'luxury-travel' ),
			'section'  => 'luxury_travel_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Trending Product
	$wp_customize->add_section('luxury_travel_products',array(
		'title'	=> __('Deal And Discount','luxury-travel'),
		'description'=> __('This section will appear below the slider.','luxury-travel'),
		'panel' => 'luxury_travel_panel_id',
	));	
	
	$wp_customize->add_setting('luxury_travel_maintitle',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('luxury_travel_maintitle',array(
		'label'	=> __('Section Title','luxury-travel'),
		'section'=> 'luxury_travel_products',
		'setting'=> 'luxury_travel_maintitle',
		'type'=> 'text'
	));	

	for ( $count = 0; $count <= 0; $count++ ) {

		$wp_customize->add_setting( 'luxury_travel_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'luxury_travel_page' . $count, array(
			'label'    => __( 'Select Page', 'luxury-travel' ),
			'section'  => 'luxury_travel_products',
			'type'     => 'dropdown-pages'
		));
	}

	//About
	$wp_customize->add_section('luxury_travel_about1',array(
		'title'	=> __('About Section','luxury-travel'),
		'description'	=> __('Add About sections below.','luxury-travel'),
		'panel' => 'luxury_travel_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('luxury_travel_about_setting',array(
		'sanitize_callback' => 'luxury_travel_sanitize_choices',
	));
	$wp_customize->add_control('luxury_travel_about_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','luxury-travel'),
		'section' => 'luxury_travel_about1',
	));

	//footer text
	$wp_customize->add_section('luxury_travel_footer_section',array(
		'title'	=> __('Footer Text','luxury-travel'),
		'description'	=> __('Add some text for footer like copyright etc.','luxury-travel'),
		'panel' => 'luxury_travel_panel_id'
	));
	
	$wp_customize->add_setting('luxury_travel_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('luxury_travel_text',array(
		'label'	=> __('Copyright Text','luxury-travel'),
		'section'	=> 'luxury_travel_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'luxury_travel_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class luxury_travel_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Luxury_Travel_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Luxury_Travel_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Upgrade to Pro', 'luxury-travel' ),
					'pro_text' => esc_html__( 'Go Pro',         'luxury-travel' ),
					'pro_url'  => esc_url( 'https://www.themesglance.com/themes/premium-travel-agency-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'luxury-travel-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'luxury-travel-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
luxury_travel_customize::get_instance();