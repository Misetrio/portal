<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#0091cd';

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

	$featured_num_choices = array(
		'choice-1' => '1',
		'choice-2' => '5'
	);
	$layout_choices = array(
		'choice-1' => 'Responsive Layout',
		'choice-2' => 'Fixed Layout'
	);

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Theme Settings', 'revolution' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'revolution' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'revolution' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'revolution' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);		

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'revolution' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['header-link-text1'] = array(
		'id' => 'header-link-text1',
		'label'   => __( 'Header Right - Link Text 1', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Login',		
	);

	$options['header-link-url1'] = array(
		'id' => 'header-link-url1',
		'label'   => __( 'Header Right - Link URL 1', 'revolution' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url().'/wp-admin/',		
	);

	$options['header-link-text2'] = array(
		'id' => 'header-link-text2',
		'label'   => __( 'Header Right - Link Text 2', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Contact',		
	);	

	$options['header-link-url2'] = array(
		'id' => 'header-link-url2',
		'label'   => __( 'Header Right - Link URL 2', 'revolution' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url().'/contact/',		
	);	
	$options['featured-content-on'] = array(
		'id' => 'featured-content-on',
		'label'   => __( 'Display featured content on homepage', 'revolution' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['entry-excerpt-length'] = array(
		'id' => 'entry-excerpt-length',
		'label'   => __( 'Number of words to show on excerpt', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '30',		
	);

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( 'Display featured image on single posts', 'revolution' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'revolution' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['header-social-on'] = array(
		'id' => 'header-social-on',
		'label'   => __( 'Display social icons on site header', 'revolution' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['facebook-url'] = array(
		'id' => 'facebook-url',
		'label'   => __( 'Your Facebook URL', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);

	$options['twitter-url'] = array(
		'id' => 'twitter-url',
		'label'   => __( 'Your Twitter URL', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['google-plus-url'] = array(
		'id' => 'google-plus-url',
		'label'   => __( 'Your Google+ URL', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['youtube-url'] = array(
		'id' => 'youtube-url',
		'label'   => __( 'Your YouTube URL', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['instagram-url'] = array(
		'id' => 'instagram-url',
		'label'   => __( 'Your Instagram URL', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['pinterest-url'] = array(
		'id' => 'pinterest-url',
		'label'   => __( 'Your Pinterest URL', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);	

	$options['rss-url'] = array(
		'id' => 'rss-url',
		'label'   => __( 'Your RSS feed URL', 'revolution' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '',		
	);			

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'revolution' ),
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