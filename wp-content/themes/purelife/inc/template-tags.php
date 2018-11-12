<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package purelife
 */

if ( ! function_exists( 'is_happy_coupons_activated' ) ) :
/**
 * Query Happy Coupons activation
 *
 * @since  1.0.0
 */
function is_happy_coupons_activated() {
    return class_exists( 'Happy_Coupons' ) ? true : false;
}
endif;

/**
 * Get Post Views.
 */
if ( ! function_exists( 'purelife_get_post_views' ) ) :

function purelife_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<strong class="view-count">0</strong> Views';
    }
    return '<strong class="view-count">' . number_format($count) . '</strong> ' . __('Views', 'purelife');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'purelife_set_post_views' ) ) :

function purelife_set_post_views($postID) {
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
if ( ! function_exists( 'purelife_search_filter' ) ) :

function purelife_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','purelife_search_filter');

endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'purelife_custom_excerpt_length' ) ) :

function purelife_custom_excerpt_length( $length ) {
    return get_theme_mod('entry-excerpt-length', '38');
}
add_filter( 'excerpt_length', 'purelife_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'purelife_excerpt_more' ) ) :

function purelife_excerpt_more( $more ) {
   return '... ';
}
add_filter( 'excerpt_more', 'purelife_excerpt_more' );

endif;

/**
 * Add custom meta box.
 */
if ( ! function_exists( 'purelife_add_custom_meta_box' ) ) :

function purelife_add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Post Options", "purelife_custom_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "purelife_add_custom_meta_box");

endif;
/**
 * Displaying fields in a custom meta box.
 */
if ( ! function_exists( 'purelife_custom_meta_box_markup' ) ) :

function purelife_custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="is_featured"><?php echo __('Featured this post on homepage', 'purelife'); ?> </label>
            <?php
                $checkbox_value = get_post_meta($object->ID, "is_featured", true);

                if($checkbox_value == "")
                {
                    ?>
                        <input name="is_featured" type="checkbox" value="true">
                    <?php
                }
                else if($checkbox_value == "true")
                {
                    ?>  
                        <input name="is_featured" type="checkbox" value="true" checked>
                    <?php
                }
            ?>
        </div>
    <?php  
}

endif;

/**
 * Storing Meta Data.
 */
if ( ! function_exists( 'purelife_save_custom_meta_box' ) ) :

function purelife_save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";
    $meta_box_textarea_value = "";
    $meta_box_checkbox_value = "";

    if(isset($_POST["is_featured"]))
    {
        $meta_box_checkbox_value = $_POST["is_featured"];
    }   
    update_post_meta($post_id, "is_featured", $meta_box_checkbox_value);
}

add_action("save_post", "purelife_save_custom_meta_box", 10, 3);

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'purelife_first_category' ) ) :
function purelife_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'purelife' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'purelife_categorized_blog' ) ) :

function purelife_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'purelife_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'purelife_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so purelife_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so purelife_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in purelife_categorized_blog.
 */
if ( ! function_exists( 'purelife_category_transient_flusher' ) ) :

function purelife_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'purelife_categories' );
}
add_action( 'edit_category', 'purelife_category_transient_flusher' );
add_action( 'save_post',     'purelife_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
if ( ! function_exists( 'purelife_disable_specified_widgets' ) ) :

function purelife_disable_specified_widgets( $sidebars_widgets ) {

    if ( isset($sidebars_widgets['header-ad']) ) {
        if ( is_array($sidebars_widgets['header-ad']) ) {
               foreach($sidebars_widgets['header-ad'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['header-ad'][$i]);
                    }
               }
        }                    
    }

    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'purelife_disable_specified_widgets' );

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'purelife_custom_toolbar_link' ) ) :

function purelife_custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'happythemes',
        'title' => 'Upgrade to Pro Theme', 
        'href' => 'https://www.happythemes.com/wordpress-themes/purelife/', 
        'meta' => array(
            'class' => 'happythemes', 
            'title' => '',
            'target'=> '_blank',
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'purelife_custom_toolbar_link', 999);

endif;