<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#037ef3';
	$secondary_color = '#2c9f45';
	$footer_bg_color ="#4d626e";

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
		'choice-1' => 'Grid Layout',
		'choice-2' => 'Loop Layout',
	);	

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Theme Settings', 'subscribe' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Default Logo', 'subscribe' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'subscribe' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$options['body-font-size'] = array(
		'id' => 'body-font-size',
		'label'   => __( 'Body Font Size (in px)', 'subscribe' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '17',		
	);

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'subscribe' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);		

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'subscribe' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['projects-page-title'] = array(
		'id' => 'projects-page-title',
		'label'   => __( 'Projects Page Title', 'subscribe' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Work',		
	);	

	$options['services-page-title'] = array(
		'id' => 'services-page-title',
		'label'   => __( 'Services Page Title', 'subscribe' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Services',		
	);

	$options['employees-page-title'] = array(
		'id' => 'employees-page-title',
		'label'   => __( 'Employees Page Title', 'subscribe' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Meet Our Team',		
	);

	$options['blog-page-title'] = array(
		'id' => 'blog-page-title',
		'label'   => __( 'Blog Page Title', 'subscribe' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'News from Our Blog',		
	);	

	$options['grid-excerpt-length'] = array(
		'id' => 'grid-excerpt-length',
		'label'   => __( 'Post excerpt length - Grid Layout', 'subscribe' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '38',		
	);	

	$options['employee-excerpt-length'] = array(
		'id' => 'employee-excerpt-length',
		'label'   => __( 'Employee excerpt length', 'subscribe' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '20',		
	);		

	$options['full-project-on'] = array(
		'id' => 'full-project-on',
		'label'   => __( 'Make single project page full width', 'subscribe' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);

	$options['single-breadcrumbs-on'] = array(
		'id' => 'single-breadcrumbs-on',
		'label'   => __( 'Display breadcrumbs on single posts', 'subscribe' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( 'Display featured image on single posts', 'subscribe' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['author-box-on'] = array(
		'id' => 'author-box-on',
		'label'   => __( 'Display author box on single posts', 'subscribe' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'subscribe' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['back-top-on'] = array(
		'id' => 'back-top-on',
		'label'   => __( 'Display "back to top" icon link on the site bottom', 'subscribe' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);		

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'subscribe' ),
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