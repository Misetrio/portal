<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#2da6e9';
	$nav_bg_color = '#323946';
	$footer_bg_color = '#323946';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// More Examples
	$section = 'examples';

	// Arrays 

	$layout_choices = array(
		'choice-1' => 'Responsive Layout',
		'choice-2' => 'Fixed Layout'
	);

	$date_format_choices = array(
		'choice-1' => 'xx days ago',
		'choice-2' => 'WordPress Settings'
	);
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Theme Settings', 'videocloud' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'videocloud' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'videocloud' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'videocloud' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);

	$options['header-social-on'] = array(
		'id' => 'header-social-on',
		'label'   => __( 'Display social icons on site header', 'videocloud' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'videocloud' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['mobile-nav-heading'] = array(
		'id' => 'mobile-nav-heading',
		'label'   => __( 'Mobile Menu Heading Text', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Menu', 'videocloud'),
	);			

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( 'Display featured content on homepage', 'videocloud' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['featured-num'] = array(
		'id' => 'featured-num',
		'label'   => __( 'Number of featured posts', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '9',		
	);	

	$options['home-recent-on'] = array(
		'id' => 'home-recent-on',
		'label'   => __( 'Display recent content on homepage', 'videocloud' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['recent-heading'] = array(
		'id' => 'recent-heading',
		'label'   => __( 'Recent content heading text', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Recent videos', 'videocloud'),
	);	

	$options['all-posts-url'] = array(
		'id' => 'all-posts-url',
		'label'   => __( 'Page URL to display latest posts', 'videocloud' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url() . '/latest',
	);	

	$options['date-format'] = array(
		'id' => 'date-format',
		'label'   => __( 'Post date format', 'videocloud' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $date_format_choices,
		'default' => 'choice-1'
	);

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'videocloud' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['facebook-url'] = array(
		'id' => 'facebook-url',
		'label'   => __( 'Your Facebook URL', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);

	$options['twitter-url'] = array(
		'id' => 'twitter-url',
		'label'   => __( 'Your Twitter URL', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['google-plus-url'] = array(
		'id' => 'google-plus-url',
		'label'   => __( 'Your Google+ URL', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['youtube-url'] = array(
		'id' => 'youtube-url',
		'label'   => __( 'Your YouTube URL', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['linkedin-url'] = array(
		'id' => 'linkedin-url',
		'label'   => __( 'Your LinkedIn URL', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['pinterest-url'] = array(
		'id' => 'pinterest-url',
		'label'   => __( 'Your Pinterest URL', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['rss-url'] = array(
		'id' => 'rss-url',
		'label'   => __( 'Your RSS feed URL', 'videocloud' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);				

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'videocloud' ),
	//	'section' => $section,
	//	'type'    => 'range',
	//	'input_attrs' => array(
	//      'min'   => 0,
	//        'max'   => 10,
	//        'step'  => 1,
	//       'style' => 'color: #0a0',
	//	)
	//);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_demo_options' );