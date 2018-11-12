<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package course
 */

/**
 * Truncate Text.
 */

function course_truncate_text($string, $limit, $break=" ", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  $string = substr($string, 0, $limit);
  if(false !== ($breakpoint = strrpos($string, $break))) {
    $string = substr($string, 0, $breakpoint);
  }

  return $string . $pad;
}

/**
 * Custom Number Format.
 */
function course_custom_number_format($n, $precision = 3) {
    if ($n < 1000) {
        // Anything less than a thousand
        $n_format = number_format($n);
    } else if ($n < 1000000) {
        // Anything less than a million
        $n_format = round( number_format($n / 1000, $precision) ) . 'K';
    } else if ($n < 1000000000) {
        // Anything less than a billion
        $n_format = round( number_format($n / 1000000, $precision) ) . 'M';
    } else {
        // At least a billion
        $n_format = round( number_format($n / 1000000000, $precision) ) . 'B';
    }

    return $n_format;
}

/**
 * Get Post Views.
 */
if ( ! function_exists( 'course_get_post_views' ) ) :

function course_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span>';
    }
    return '<span class="view-count">' . course_custom_number_format($count) . '</span> ';
}

endif;

/**
 * Get Post Views 2.
 */
if ( ! function_exists( 'course_get_post_views2' ) ) :

function course_get_post_views2($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span>' . __('views', 'course');;
    }
    return '<span class="view-count">' . number_format($count) . '</span> ' . __('views', 'course');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'course_set_post_views' ) ) :

function course_set_post_views($postID) {
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
if ( ! function_exists( 'course_search_filter' ) && ( ! is_admin() ) ) :

function course_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','course_search_filter');

endif;


/**
 * Custom Excerpt
 */
if ( ! function_exists( 'course_custom_excerpt' ) ) :

function course_custom_excerpt($limit) {

    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {

    $excerpt = implode(" ",$excerpt);

    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}
endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'course_excerpt_more' ) ) :

function course_excerpt_more( $more ) {
   return '... ';
}
add_filter( 'excerpt_more', 'course_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'course_first_category' ) ) :
function course_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'course' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'course_categorized_blog' ) ) :

function course_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'course_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'course_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so course_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so course_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in course_categorized_blog.
 */
if ( ! function_exists( 'course_category_transient_flusher' ) ) :

function course_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'course_categories' );
}
add_action( 'edit_category', 'course_category_transient_flusher' );
add_action( 'save_post',     'course_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
/**
 * Enqueues scripts and styles.
 */
if ( ! function_exists( 'course_disable_specified_widgets' ) ) :

function course_disable_specified_widgets( $sidebars_widgets ) {

    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'course_disable_specified_widgets' );

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'course_custom_toolbar_link' ) ) :

function course_custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'happythemes',
        'title' => 'Upgrade to Pro Theme', 
        'href' => 'https://www.happythemes.com/wordpress-themes/course/', 
        'meta' => array(
            'class' => 'happythemes', 
            'title' => '',
            'target'=> '_blank',
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'course_custom_toolbar_link', 999);

endif;

/**
 * Detect if post content has video embed.
 */
if ( ! function_exists( 'course_has_embed' ) ) :

function course_has_embed( $post_id = false ) {
    if( !$post_id )
        $post_id = get_the_ID();
    else
        $post_id = absint( $post_id );
    if( !$post_id )
        return false;
 
    $post_meta = get_post_custom_keys( $post_id );
 
    foreach( $post_meta as $meta ) {
        if( '_oembed' != substr( trim( $meta ) , 0 , 7 ) )
            continue;
        return true;
    }
    return false;
}

endif;

/**
 * Custom date format.
 */
if ( ! function_exists( 'course_entry_date' ) ) :

function course_entry_date() {

    //if (get_theme_mod('date-format', 'choice-1') == 'choice-1') {
    //    echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'course');
    //} else {
        echo get_the_date();
    //}
}

endif;

function course_has_embed_code() {

    $content = get_the_content();

    $has_embed =false;

    preg_match  ('/<iframe(.+)\"/', $content, $matches);
    if (!empty($matches)) {
        return true;
    }

    preg_match  ('/<object(.+)\"/', $content, $matches);
    if (!empty($matches)) {
        return true;
    }

    preg_match  ('/<embed(.+)\"/', $content, $matches);
    if (!empty($matches)) {
        return true;
    }

    if (strpos($content, '[embed]') !== false) {
        return true;
    }

    preg_match  ('/<video(.+)\"/', $content, $matches);
    if (!empty($matches)) {
        return true;
    }
    
}
