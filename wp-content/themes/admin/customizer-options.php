<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

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
		'title' => __( 'Theme Settings', 'course' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'course' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'course' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Responsive Design', 'course' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'course' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['mobile-nav-heading'] = array(
		'id' => 'mobile-nav-heading',
		'label'   => __( 'Mobile Menu Heading Text', 'course' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Menu', 'course'),
	);			

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( 'Display featured content on homepage', 'course' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	


	$options['featured-text'] = array(
		'id' => 'featured-text',
		'label'   => __( 'Featured Ribbon Text', 'course' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Featured', 'course'),
	);	

	$options['recent-heading'] = array(
		'id' => 'recent-heading',
		'label'   => __( 'Recent content heading text', 'course' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('Recent Posts', 'course'),
	);	

	$options['blog-excerpt-length'] = array(
		'id' => 'blog-excerpt-length',
		'label'   => __( 'Excerpt length of blog layout', 'course' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '40',		
	);	

	$options['grid-excerpt-length'] = array(
		'id' => 'grid-excerpt-length',
		'label'   => __( 'Excerpt length of grid layout', 'course' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '18',		
	);		

	$options['list-excerpt-length'] = array(
		'id' => 'list-excerpt-length',
		'label'   => __( 'Excerpt length of list layout', 'course' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '24',		
	);				

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( 'Display featured image on single posts', 'course' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'course' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);				

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'course' ),
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