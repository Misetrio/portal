<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#f65a5b';
	$secondary_color = '';

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

	$loop_style_choices = array(
		'choice-1' => 'List Layout',
		'choice-2' => 'Blog Layout',
		'choice-3' => 'Grid Layout'
	);	

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Theme Settings', 'greatwall' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'greatwall' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'greatwall' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'greatwall' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);	

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'greatwall' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['projects-page-title'] = array(
		'id' => 'projects-page-title',
		'label'   => __( 'Projects Page Title', 'greatwall' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Work',		
	);	

	$options['services-page-title'] = array(
		'id' => 'services-page-title',
		'label'   => __( 'Services Page Title', 'greatwall' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Services',		
	);

	$options['employees-page-title'] = array(
		'id' => 'employees-page-title',
		'label'   => __( 'Employees Page Title', 'greatwall' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Leadership Team',		
	);

	$options['blog-page-title'] = array(
		'id' => 'blog-page-title',
		'label'   => __( 'Blog Page Title', 'greatwall' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'News from Our Blog',		
	);	

	$options['featured-content-on'] = array(
		'id' => 'featured-content-on',
		'label'   => __( 'Display featured content on homepage', 'greatwall' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['entry-excerpt-length'] = array(
		'id' => 'entry-excerpt-length',
		'label'   => __( 'Number of words to show on excerpt', 'greatwall' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '30',		
	);

	$options['full-project-on'] = array(
		'id' => 'full-project-on',
		'label'   => __( 'Make single project page full width', 'greatwall' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( 'Display featured image on single posts', 'greatwall' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'greatwall' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'greatwall' ),
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