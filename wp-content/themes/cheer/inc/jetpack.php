<?php
/**
 * Compatibility settings and functions for Jetpack.
 * See http://jetpack.me/support/infinite-scroll/
 *
 * @package Cheer
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function cheer_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'scroll',
		'container' => 'content',
		'footer'    => 'main',
	) );
}
add_action( 'after_setup_theme', 'cheer_jetpack_setup' );
