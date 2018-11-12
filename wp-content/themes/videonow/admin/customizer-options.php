<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#5bc08c';
	$secondary_color = '#666';

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

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Theme Settings', 'videonow' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'videonow' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'videonow' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$layout_choices = array(
		'choice-1' => 'Responsive Layout',
		'choice-2' => 'Fixed Layout'
	);

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'videonow' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);

	$options['featured-on'] = array(
		'id' => 'featured-on',
		'label'   => __( 'Display featured content on homepage', 'videonow' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['home-button-on'] = array(
		'id' => 'home-button-on',
		'label'   => __( 'Display a button under home blocks', 'videonow' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['home-button-text'] = array(
		'id' => 'home-button-text',
		'label'   => __( 'Button Text', 'videonow' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Explore all categoires',
	);	

	$options['home-button-url'] = array(
		'id' => 'home-button-url',
		'label'   => __( 'Button URL', 'videonow' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url() . '/all-categories',
	);			

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'videonow' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$video_style_choices = array(
		'choice-1' => 'Before post title',
		'choice-2' => 'After post title'
	);

	$options['video-styles'] = array(
		'id' => 'video-styles',
		'label'   => __( 'Single Post Video Position', 'videonow' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $video_style_choices,
		'default' => 'choice-1'
	);		

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'videonow' ),
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