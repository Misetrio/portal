<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#cc0000';

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
		'title' => __( 'Theme Settings', 'goodpress' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'goodpress' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'goodpress' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);		

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'goodpress' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);	

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'goodpress' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['primary-nav-heading'] = array(
		'id' => 'primary-nav-heading',
		'label'   => __( 'Mobile Primary Menu Heading Text', 'goodpress' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Pages', 'goodpress'),
	);

	$options['secondary-nav-heading'] = array(
		'id' => 'secondary-nav-heading',
		'label'   => __( 'Mobile Secondary Menu Heading Text', 'goodpress' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Categories', 'goodpress'),
	);					

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( 'Display featured content on homepage', 'goodpress' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['all-posts-url'] = array(
		'id' => 'all-posts-url',
		'label'   => __( 'Page URL to display all latest posts', 'goodpress' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url() . '/latest',
	);	

	$options['home-excerpt-length'] = array(
		'id' => 'home-excerpt-length',
		'label'   => __( 'Number of excerpt words (home)', 'goodpress' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '18',		
	);

	$options['archive-excerpt-length'] = array(
		'id' => 'archive-excerpt-length',
		'label'   => __( 'Number of excerpt words (archive)', 'goodpress' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '33',		
	);

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( 'Display featured image on single posts', 'goodpress' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	
	
	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'goodpress' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);
		
	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'goodpress' ),
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