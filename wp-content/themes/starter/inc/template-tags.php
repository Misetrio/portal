<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package starter
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
if ( ! function_exists( 'starter_get_post_views' ) ) :

function starter_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span> View';
    }
    return '<span class="view-count">' . number_format($count) . '</span> ' . __('Views', 'starter');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'starter_set_post_views' ) ) :

function starter_set_post_views($postID) {
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
if ( ! function_exists( 'starter_search_filter' ) ) :

function starter_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','starter_search_filter');

endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'starter_custom_excerpt_length' ) ) :

function starter_custom_excerpt_length( $length ) {
    return get_theme_mod('entry-excerpt-length', '38');
}
add_filter( 'excerpt_length', 'starter_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'starter_excerpt_more' ) ) :

function starter_excerpt_more( $more ) {
   return '... ';
}
add_filter( 'excerpt_more', 'starter_excerpt_more' );

endif;

/**
 * Add custom meta box.
 */
if ( ! function_exists( 'starter_add_custom_meta_box' ) ) :

function starter_add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Post Options", "starter_custom_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "starter_add_custom_meta_box");

endif;
/**
 * Displaying fields in a custom meta box.
 */
if ( ! function_exists( 'starter_custom_meta_box_markup' ) ) :

function starter_custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="is_featured"><?php echo __('Featured this post on homepage', 'starter'); ?> </label>
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
if ( ! function_exists( 'starter_save_custom_meta_box' ) ) :

function starter_save_custom_meta_box($post_id, $post, $update)
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

add_action("save_post", "starter_save_custom_meta_box", 10, 3);

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'starter_first_category' ) ) :
function starter_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'starter' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'starter_categorized_blog' ) ) :

function starter_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'starter_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'starter_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so starter_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so starter_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in starter_categorized_blog.
 */
if ( ! function_exists( 'starter_category_transient_flusher' ) ) :

function starter_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'starter_categories' );
}
add_action( 'edit_category', 'starter_category_transient_flusher' );
add_action( 'save_post',     'starter_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
if ( ! function_exists( 'starter_disable_specified_widgets' ) ) :

function starter_disable_specified_widgets( $sidebars_widgets ) {

    if ( isset($sidebars_widgets['header-newsletter']) ) {
        if ( is_array($sidebars_widgets['header-newsletter']) ) {
                foreach($sidebars_widgets['header-newsletter'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                        unset($sidebars_widgets['header-newsletter'][$i]);
                    }
                }
        }
    }

    if ( isset($sidebars_widgets['footer-1']) ) {
        if ( is_array($sidebars_widgets['footer-1']) ) {
                foreach($sidebars_widgets['footer-1'] as $i => $widget) {
                    if(strpos($widget, 'happythemes-') !== false) {
                        unset($sidebars_widgets['footer-1'][$i]);
                    }
                }
        } 
    }

    if ( isset($sidebars_widgets['footer-2']) ) {
        if ( is_array($sidebars_widgets['footer-2']) ) {
                foreach($sidebars_widgets['footer-2'] as $i => $widget) {
                    if(strpos($widget, 'happythemes-') !== false) {
                        unset($sidebars_widgets['footer-2'][$i]);
                    }
                }
        }  
    } 

    if ( isset($sidebars_widgets['footer-3']) ) {
        if ( is_array($sidebars_widgets['footer-3']) ) {
                foreach($sidebars_widgets['footer-3'] as $i => $widget) {
                    if(strpos($widget, 'happythemes-') !== false) {
                        unset($sidebars_widgets['footer-3'][$i]);
                    }
                }
        }   
    }

    if ( isset($sidebars_widgets['footer-4']) ) {
        if ( is_array($sidebars_widgets['footer-4']) ) {
                foreach($sidebars_widgets['footer-4'] as $i => $widget) {
                    if(strpos($widget, 'happythemes-') !== false) {
                        unset($sidebars_widgets['footer-4'][$i]);
                    }
                }
        } 
    }

    if ( isset($sidebars_widgets['sidebar-1']) ) {  
        if ( is_array($sidebars_widgets['sidebar-1']) ) {
                foreach($sidebars_widgets['sidebar-1'] as $i => $widget) {
                    if(strpos($widget, 'happythemes-') !== false) {
                        unset($sidebars_widgets['sidebar-1'][$i]);
                    }
                }
        }                    
    }
    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'starter_disable_specified_widgets' );

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'starter_custom_toolbar_link' ) ) :

function starter_custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'happythemes',
        'title' => 'Upgrade to Pro Theme', 
        'href' => 'https://www.happythemes.com/wordpress-themes/starter/', 
        'meta' => array(
            'class' => 'happythemes', 
            'title' => '',
            'target'=> '_blank',
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'starter_custom_toolbar_link', 999);

endif;