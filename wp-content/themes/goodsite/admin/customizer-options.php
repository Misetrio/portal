<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#ff4422';
	$secondary_color = '#222222';

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

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Theme Settings', 'goodsite' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'goodsite' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'goodsite' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'goodsite' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);

	$options['header-social-on'] = array(
		'id' => 'header-social-on',
		'label'   => __( 'Display social icons on site header', 'goodsite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'goodsite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['primary-nav-heading'] = array(
		'id' => 'primary-nav-heading',
		'label'   => __( 'Mobile Primary Menu Heading Text', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Pages', 'goodsite'),
	);

	$options['secondary-nav-heading'] = array(
		'id' => 'secondary-nav-heading',
		'label'   => __( 'Mobile Secondary Menu Heading Text', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Categories', 'goodsite'),
	);					

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( 'Display featured content on homepage', 'goodsite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['all-posts-url'] = array(
		'id' => 'all-posts-url',
		'label'   => __( 'Page URL to display latest posts', 'goodsite' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url() . '/latest',
	);	

	$options['list-excerpt-length'] = array(
		'id' => 'list-excerpt-length',
		'label'   => __( 'Excerpt length of list posts', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '37',		
	);	

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( 'Display featured image on single posts', 'goodsite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'goodsite' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['facebook-url'] = array(
		'id' => 'facebook-url',
		'label'   => __( 'Your Facebook URL', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);

	$options['twitter-url'] = array(
		'id' => 'twitter-url',
		'label'   => __( 'Your Twitter URL', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['google-plus-url'] = array(
		'id' => 'google-plus-url',
		'label'   => __( 'Your Google+ URL', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['youtube-url'] = array(
		'id' => 'youtube-url',
		'label'   => __( 'Your YouTube URL', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['linkedin-url'] = array(
		'id' => 'linkedin-url',
		'label'   => __( 'Your LinkedIn URL', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['pinterest-url'] = array(
		'id' => 'pinterest-url',
		'label'   => __( 'Your Pinterest URL', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['rss-url'] = array(
		'id' => 'rss-url',
		'label'   => __( 'Your RSS feed URL', 'goodsite' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);					

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'goodsite' ),
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