<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package videocloud
 */

/**
 * Truncate Text.
 */

if ( ! function_exists( 'is_woocommerce_activated' ) ) :
/**
 * Query WooCommerce activation
 *
 * @since  1.0.0
 */
function is_woocommerce_activated() {
    return class_exists( 'woocommerce' ) ? true : false;
}
endif;


function videocloud_truncate_text($string, $limit, $break=" ", $pad="...")
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
function videocloud_custom_number_format($n, $precision = 3) {
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
if ( ! function_exists( 'videocloud_get_post_views' ) ) :

function videocloud_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span>';
    }
    return '<span class="view-count">' . videocloud_custom_number_format($count) . '</span> ';
}

endif;

/**
 * Get Post Views 2.
 */
if ( ! function_exists( 'videocloud_get_post_views2' ) ) :

function videocloud_get_post_views2($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span>' . __('views', 'videocloud');;
    }
    return '<span class="view-count">' . number_format($count) . '</span> ' . __('views', 'videocloud');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'videocloud_set_post_views' ) ) :

function videocloud_set_post_views($postID) {
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
if ( ! function_exists( 'videocloud_search_filter' ) && ( ! is_admin() ) ) :

function videocloud_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','videocloud_search_filter');

endif;


/**
 * Custom Excerpt
 */
if ( ! function_exists( 'videocloud_custom_excerpt' ) ) :

function videocloud_custom_excerpt($limit) {

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
if ( ! function_exists( 'videocloud_excerpt_more' ) ) :

function videocloud_excerpt_more( $more ) {
   return '... ';
}
add_filter( 'excerpt_more', 'videocloud_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'videocloud_first_category' ) ) :
function videocloud_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'videocloud' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'videocloud_categorized_blog' ) ) :

function videocloud_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'videocloud_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'videocloud_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so videocloud_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so videocloud_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in videocloud_categorized_blog.
 */
if ( ! function_exists( 'videocloud_category_transient_flusher' ) ) :

function videocloud_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'videocloud_categories' );
}
add_action( 'edit_category', 'videocloud_category_transient_flusher' );
add_action( 'save_post',     'videocloud_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
/**
 * Enqueues scripts and styles.
 */
if ( ! function_exists( 'videocloud_disable_specified_widgets' ) ) :

function videocloud_disable_specified_widgets( $sidebars_widgets ) {

    if ( isset($sidebars_widgets['homepage']) ) {
        if ( is_home() && is_array($sidebars_widgets['homepage']) ) {
            foreach($sidebars_widgets['homepage'] as $i => $widget) {
                if( (strpos($widget, 'happythemes-') === false) ) {
                    unset($sidebars_widgets['homepage'][$i]);
                }
            }

        }
    }

    if ( isset($sidebars_widgets['footer-1']) ) {
        if ( is_array($sidebars_widgets['footer-1']) ) {
            foreach($sidebars_widgets['footer-1'] as $i => $widget) {
                if(strpos($widget, 'happythemes-home-') !== false) {
                    unset($sidebars_widgets['footer-1'][$i]);
                }
            }
        } 
    }

    if ( isset($sidebars_widgets['footer-2']) ) {
        if ( is_array($sidebars_widgets['footer-2']) ) {
            foreach($sidebars_widgets['footer-2'] as $i => $widget) {
                if(strpos($widget, 'happythemes-home-') !== false) {
                    unset($sidebars_widgets['footer-2'][$i]);
                }
            }

        }   
    }

    if ( isset($sidebars_widgets['footer-3']) ) {

        if ( is_array($sidebars_widgets['footer-3']) ) {
            foreach($sidebars_widgets['footer-3'] as $i => $widget) {
                if(strpos($widget, 'happythemes-home-') !== false) {
                    unset($sidebars_widgets['footer-3'][$i]);
                }
            }

        }   
    }

    if ( isset($sidebars_widgets['sidebar-1']) ) {
        if ( is_array($sidebars_widgets['sidebar-1']) ) {
            foreach($sidebars_widgets['sidebar-1'] as $i => $widget) {
                if(strpos($widget, 'happythemes-home-') !== false) {
                    unset($sidebars_widgets['sidebar-1'][$i]);
                }
            }
        }                    
    }

    if ( isset($sidebars_widgets['header-ad']) ) {
        if ( is_array($sidebars_widgets['header-ad']) ) {
            foreach($sidebars_widgets['header-ad'] as $i => $widget) {
                if(strpos($widget, 'happythemes-home-') !== false) {
                    unset($sidebars_widgets['header-ad'][$i]);
                }
            }
        }                    
    }

    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'videocloud_disable_specified_widgets' );

endif;

/** 
 * Create a new page on theme activation.
 */
if (isset($_GET['activated']) && is_admin()){
    add_action('init', 'videocloud_create_initial_pages');
}

if ( ! function_exists( 'videocloud_create_initial_pages' ) ) :

function videocloud_create_initial_pages() {

    $pages = array( 
         // Page Title and URL (a blank space will end up becomeing a dash "-")
    //   'All Categories' => array(
    //      // Page Content           // Template to use (if left blank the default template will be used)
    //     'Browse our latest videos by category' => 'page-templates/all-categories.php'),

        'Latest' => array(
            'Browse our latest posts' => 'page-templates/all-posts.php'),

    );

    foreach($pages as $page_url_title => $page_meta) {

        $id = get_page_by_title($page_url_title);

        foreach ($page_meta as $page_content=>$page_template){

            $page = array(
                'post_type'   => 'page',
                'post_title'  => $page_url_title,
                'post_name'   => $page_url_title,
                'post_status' => 'publish',
                'post_content' => $page_content,
                'post_author' => 1,
                'post_parent' => ''
            );

            if(!isset($id->ID)){
                $new_page_id = wp_insert_post($page);
                if(!empty($page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $page_template);
                }
            }
        }
    }
}

endif;

/**
 * Detect if post content has video embed.
 */
if ( ! function_exists( 'videocloud_has_embed' ) ) :

function videocloud_has_embed( $post_id = false ) {
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
if ( ! function_exists( 'videocloud_entry_date' ) ) :

function videocloud_entry_date() {

    if (get_theme_mod('date-format', 'choice-1') == 'choice-1') {
        echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'videocloud');
    } else {
        echo get_the_date();
    }
}

endif;

function videocloud_has_embed_code() {

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

/**
 * Add link to Admin Bar.
 */
if ( ! function_exists( 'videocloud_custom_toolbar_link' ) ) :

function videocloud_custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'happythemes',
        'title' => 'Upgrade to Pro Theme', 
        'href' => 'https://www.happythemes.com/wordpress-themes/videocloud/', 
        'meta' => array(
            'class' => 'happythemes', 
            'title' => '',
            'target'=> '_blank',
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'videocloud_custom_toolbar_link', 999);

endif;
