<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Cheer
 * @since Cheer 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Cheer 1.0
 */
function cheer_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'cheer_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Cheer 1.0
 */
function cheer_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'custom-header';
	}

	if ( 'modern' == get_theme_mod( 'cheer_color_scheme', 'traditional' ) )
		$classes[] = 'theme-color-modern';
	else
		$classes[] = 'theme-color-traditional';

	return $classes;
}
add_filter( 'body_class', 'cheer_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since Cheer 1.0
 */
function cheer_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'cheer_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @since Cheer 1.0
 */
function cheer_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'cheer' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'cheer_wp_title', 10, 2 );

/**
 * Adjusts content_width value for the full width template.
 */
function cheer_content_width() {
	if ( is_page_template( 'nosidebar-page.php' ) ) {
		global $content_width;
		$content_width = 928;
	}
}
add_action( 'template_redirect', 'cheer_content_width' );
