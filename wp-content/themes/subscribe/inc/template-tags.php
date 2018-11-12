<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package subscribe
 */

/**
 * Get Post Views.
 */
if ( ! function_exists( 'subscribe_get_post_views' ) ) :

function subscribe_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span> View';
    }
    return '<span class="view-count">' . number_format($count) . '</span> ' . __('Views', 'subscribe');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'subscribe_set_post_views' ) ) :

function subscribe_set_post_views($postID) {
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
if ( ! function_exists( 'subscribe_search_filter' ) && ( ! is_admin() ) ) :

function subscribe_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','subscribe_search_filter');

endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
//if ( ! function_exists( 'subscribe_custom_excerpt_length' ) ) :

//function subscribe_custom_excerpt_length( $length ) {
 //   return get_theme_mod('entry-excerpt-length', '20');
//}
//add_filter( 'excerpt_length', 'subscribe_custom_excerpt_length', 999 );

//endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'subscribe_excerpt_more' ) ) :

function subscribe_excerpt_more( $more ) {
   return '... ';
}
add_filter( 'excerpt_more', 'subscribe_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'subscribe_first_category' ) ) :
function subscribe_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'subscribe' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'subscribe_categorized_blog' ) ) :

function subscribe_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'subscribe_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'subscribe_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so subscribe_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so subscribe_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in subscribe_categorized_blog.
 */
if ( ! function_exists( 'subscribe_category_transient_flusher' ) ) :

function subscribe_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'subscribe_categories' );
}
add_action( 'edit_category', 'subscribe_category_transient_flusher' );
add_action( 'save_post',     'subscribe_category_transient_flusher' );

endif;

if ( ! function_exists( 'set_posts_per_page_for_projects_cpt' ) ) :

function set_posts_per_page_for_projects_cpt( $query ) {
  if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'projects' ) ) {
    $query->set( 'posts_per_page', '100' );
  }
}
add_action( 'pre_get_posts', 'set_posts_per_page_for_projects_cpt' );

endif;

/**
 * Preloader
 */
if ( ! function_exists( 'subscribe_preloader' ) ) :

function subscribe_preloader() {
?>

<div class="loader-wrap">
  <div class="loader"></div>
</div>

<?php
}
add_action('subscribe_before_site', 'subscribe_preloader');

endif;


if ( ! function_exists( 'subscribe_custom_toolbar_link' ) ) :

function subscribe_custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'happythemes',
        'title' => 'Upgrade to Pro Theme', 
        'href' => 'https://www.happythemes.com/wordpress-themes/subscribe/', 
        'meta' => array(
            'class' => 'happythemes', 
            'title' => '',
            'target'=> '_blank',
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'subscribe_custom_toolbar_link', 999);

endif;

/**
 * SiteOrigin Page Builder Content Check
 *
 * Conditionally check if the current page/post was created with
 * the SiteOrigin Page Builder editor.
 *
 * @return boolean
 */
if ( ! function_exists( 'subscribe_has_pagebuilder' ) ) :

function subscribe_has_pagebuilder( $post_id = null ){

    global $post;

    if( !$post_id ){
        $post_id = $post->ID;
    }

    $panels_data = get_post_meta( $post_id, 'panels_data', false );

    if( !empty($panels_data) ){
        return true;
    }
}

endif;


/**
 * Disable specified widgets.
 */
//if ( ! function_exists( 'subscribe_disable_specified_widgets' ) ) :

//function subscribe_disable_specified_widgets( $sidebars_widgets ) {


//   return $sidebars_widgets;
//}
//add_filter( 'sidebars_widgets', 'subscribe_disable_specified_widgets' );

//endif;
