<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package newsblock
 */
/*
 * Get Post Views.
 */
if ( ! function_exists( 'newsblock_get_post_views' ) ) :

function newsblock_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span> View';
    }
    return '<span class="view-count">' . number_format($count) . '</span> ' . __('Views', 'newsblock');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'newsblock_set_post_views' ) ) :

function newsblock_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

endif;

/**
 * Search Filter 
 */
if ( ! function_exists( 'newsblock_search_filter' ) ) :

function newsblock_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','newsblock_search_filter');

endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'newsblock_custom_excerpt_length' ) ) :

function newsblock_custom_excerpt_length( $length ) {
    return get_theme_mod('entry-excerpt-length', '15');
}
add_filter( 'excerpt_length', 'newsblock_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'newsblock_excerpt_more' ) ) :

function newsblock_excerpt_more( $more ) {
   return '... ';
}
add_filter( 'excerpt_more', 'newsblock_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'newsblock_first_category' ) ) :
function newsblock_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'newsblock' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'newsblock_categorized_blog' ) ) :

function newsblock_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'newsblock_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'newsblock_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so newsblock_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so newsblock_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in newsblock_categorized_blog.
 */
if ( ! function_exists( 'newsblock_category_transient_flusher' ) ) :

function newsblock_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'newsblock_categories' );
}
add_action( 'edit_category', 'newsblock_category_transient_flusher' );
add_action( 'save_post',     'newsblock_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
if ( ! function_exists( 'newsblock_disable_specified_widgets' ) ) :

function newsblock_disable_specified_widgets( $sidebars_widgets ) {

    if ( isset($sidebars_widgets['header-ad']) ) {
        if ( is_array($sidebars_widgets['header-ad']) ) {
               foreach($sidebars_widgets['header-ad'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['header-ad'][$i]);
                    }
               }
        }     
    }

    if ( isset($sidebars_widgets['footer-ad']) ) {
        if ( is_array($sidebars_widgets['footer-ad']) ) {
               foreach($sidebars_widgets['footer-ad'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['footer-ad'][$i]);
                    }
               }
        }
    }

    if ( isset($sidebars_widgets['content-ad-1']) ) {
        if ( is_array($sidebars_widgets['content-ad-1']) ) {
               foreach($sidebars_widgets['content-ad-1'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['content-ad-1'][$i]);
                    }
               }
        }  
    }

    if ( isset($sidebars_widgets['content-ad-2']) ) {
        if ( is_array($sidebars_widgets['content-ad-2']) ) {
               foreach($sidebars_widgets['content-ad-2'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['content-ad-2'][$i]);
                    }
               }
        }  
    }

    if ( isset($sidebars_widgets['content-ad-3']) ) {
        if ( is_array($sidebars_widgets['content-ad-3']) ) {
               foreach($sidebars_widgets['content-ad-3'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['content-ad-3'][$i]);
                    }
               }
        }                                    
    }

    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'newsblock_disable_specified_widgets' );

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'newsblock_custom_toolbar_link' ) ) :

function newsblock_custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'happythemes',
        'title' => 'Upgrade to Pro Theme', 
        'href' => 'https://www.happythemes.com/wordpress-themes/newsblock/', 
        'meta' => array(
            'class' => 'happythemes', 
            'title' => '',
            'target'=> '_blank',
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'newsblock_custom_toolbar_link', 999);

endif;