<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travelers_widgets_init() {
    // Register Right Sidebar
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'travelers' ),
        'id'            => 'dt-sidebar',
        'description'   => __( 'Add widgets to Show widgets at sidebar', 'travelers' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    // Header Widget Location
    register_sidebar( array(
        'name'          => __( 'Header Widget', 'travelers' ),
        'id'            => 'dt-header-widget',
        'description'   => __( 'Add widgets to Show widgets at header beside Logo', 'travelers' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    // Register Footer Position 1
    register_sidebar( array(
        'name'          => __( 'Footer Position 1', 'travelers' ),
        'id'            => 'dt-footer1',
        'description'   => __( 'Add widgets to Show widgets at Footer Position 1', 'travelers' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );
    // Register Footer Position 2
    register_sidebar( array(
        'name'          => __( 'Footer Position 2', 'travelers' ),
        'id'            => 'dt-footer2',
        'description'   => __( 'Add widgets to Show widgets at Footer Position 2', 'travelers' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );
    // Register Footer Position 3
    register_sidebar( array(
        'name'          => __( 'Footer Position 3', 'travelers' ),
        'id'            => 'dt-footer3',
        'description'   => __( 'Add widgets to Show widgets at Footer Position 3', 'travelers' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );
    // Register Footer Position 4
    register_sidebar( array(
        'name'          => __( 'Footer Position 4', 'travelers' ),
        'id'            => 'dt-footer4',
        'description'   => __( 'Add widgets to Show widgets at Footer Position 4', 'travelers' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'travelers_widgets_init' );
/**
 * Enqueue Admin Scripts
 */
function travelers_media_script( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'travelers-widgets', get_template_directory_uri() . '/inc/widgets/widgets.css' );
    wp_enqueue_media();
    wp_enqueue_script( 'travelers-media-upload', get_template_directory_uri() . '/inc/widgets/widgets.js', array( 'jquery' ), '', true );
}
add_action( 'admin_enqueue_scripts', 'travelers_media_script' );
/**
 * Social Icons widget.
 */
class travelers_social_icons extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'travelers_social_icons',
            __( 'Fame: Social Icons', 'travelers' ),
            array(
                'description'   => __( 'Social Icons', 'travelers' )
            )
        );
    }
    public function widget( $args, $instance ) {
        $title      = isset( $instance['title'] ) ? $instance['title'] : '';
        $facebook   = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
        $twitter    = isset( $instance['twitter'] ) ? $instance['twitter'] : '';
        $g_plus     = isset( $instance['g-plus' ] ) ? $instance['g-plus'] : '';
        $instagram  = isset( $instance['instagram'] ) ? $instance['instagram'] : '';
        $github     = isset( $instance['github'] ) ? $instance['github'] : '';
        $flickr     = isset( $instance['flickr'] ) ? $instance['flickr'] : '';
        $pinterest  = isset( $instance['pinterest'] ) ? $instance['pinterest'] : '';
        $wordpress  = isset( $instance['wordpress'] ) ? $instance['wordpress'] : '';
        $youtube    = isset( $instance['youtube'] ) ? $instance['youtube'] : '';
        $vimeo      = isset( $instance['vimeo'] ) ? $instance['vimeo'] : '';
        $linkedin   = isset( $instance['linkedin'] ) ? $instance['linkedin'] : '';
        $behance    = isset( $instance['behance'] ) ? $instance['behance'] : '';
        $dribbble   = isset( $instance['dribbble'] ) ? $instance['dribbble'] : '';
        ?>
        <aside class="widget dt-social-icons">
            <?php if( ! empty( $title ) ) { ?><h2 class="widget-title"><?php echo esc_attr( $title ); ?><span></span></h2><?php } ?>
            <ul>
                <?php if( ! empty( $facebook ) ) { ?>
                    <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $twitter ) ) { ?>
                    <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $g_plus ) ) { ?>
                    <li><a href="<?php echo esc_url( $g_plus ); ?>" target="_blank"><i class="fa fa-google-plus transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $instagram ) ) { ?>
                    <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fa fa-instagram transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $github ) ) { ?>
                    <li><a href="<?php echo esc_url( $github ); ?>" target="_blank"><i class="fa fa-github transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $flickr ) ) { ?>
                    <li><a href="<?php echo esc_url( $flickr ); ?>" target="_blank"><i class="fa fa-flickr transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $pinterest ) ) { ?>
                    <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><i class="fa fa-pinterest transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $wordpress ) ) { ?>
                    <li><a href="<?php echo esc_url( $wordpress ); ?>" target="_blank"><i class="fa fa-wordpress transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $youtube ) ) { ?>
                    <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fa fa-youtube transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $vimeo ) ) { ?>
                    <li><a href="<?php echo esc_url( $vimeo ); ?>" target="_blank"><i class="fa fa-vimeo transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $linkedin ) ) { ?>
                    <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fa fa-linkedin transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $behance ) ) { ?>
                    <li><a href="<?php echo esc_url( $behance ); ?>" target="_blank"><i class="fa fa-behance transition35"></i></a> </li>
                <?php } ?>
                <?php if( ! empty( $dribbble ) ) { ?>
                    <li><a href="<?php echo esc_url( $dribbble ); ?>" target="_blank"><i class="fa fa-dribbble transition35"></i></a> </li>
                <?php } ?>
                <div class="clearfix"></div>
            </ul>
        </aside>
        <?php
    }
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance, array(
                'title'             => '',
                'facebook'          => '',
                'twitter'           => '',
                'g-plus'            => '',
                'instagram'         => '',
                'github'            => '',
                'flickr'            => '',
                'pinterest'         => '',
                'wordpress'         => '',
                'youtube'           => '',
                'vimeo'             => '',
                'linkedin'          => '',
                'behance'           => '',
                'dribbble'          => ''
            )
        );
        ?>
        <div class="dt-social-icons">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e( 'Title', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" placeholder="<?php _e( 'https://www.facebook.com/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" placeholder="<?php _e( 'https://twitter.com/', 'travelers' ); ?>" >
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'g-plus' ); ?>"><?php _e( 'G plus', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'g-plus' ); ?>" name="<?php echo $this->get_field_name( 'g-plus' ); ?>" value="<?php echo esc_attr( $instance['g-plus'] ); ?>" placeholder="<?php _e( 'https://plus.google.com/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>" placeholder="<?php _e( 'https://instagram.com/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e( 'Github', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo esc_attr( $instance['github'] ); ?>" placeholder="<?php _e( 'https://github.com/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo esc_attr( $instance['flickr'] ); ?>" placeholder="<?php _e( 'https://www.flickr.com/"', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" placeholder="<?php _e( 'https://www.pinterest.com/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'wordpress' ); ?>"><?php _e( 'WordPress', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'wordpress' ); ?>" name="<?php echo $this->get_field_name( 'wordpress' ); ?>" value="<?php echo esc_attr( $instance['wordpress'] ); ?>" placeholder="<?php _e( 'https://wordpress.org/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" placeholder="<?php _e( 'https://www.youtube.com/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" placeholder="<?php _e( 'https://vimeo.com/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" placeholder="<?php _e( 'https://linkedin.com', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e( 'Behance', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo esc_attr( $instance['behance'] ); ?>" placeholder="<?php _e( 'https://www.behance.net/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble', 'travelers' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo esc_attr( $instance['dribbble'] ); ?>" placeholder="<?php _e( 'https://dribbble.com/', 'travelers' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
        </div><!-- .dt-social-icons -->
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance               = $old_instance;
        $instance['title']     = esc_attr( $new_instance['title'] );
        $instance['facebook']  = esc_url_raw( $new_instance['facebook'] );
        $instance['twitter']   = esc_url_raw( $new_instance['twitter'] );
        $instance['g-plus']    = esc_url_raw( $new_instance['g-plus'] );
        $instance['instagram'] = esc_url_raw( $new_instance['instagram'] );
        $instance['github']    = esc_url_raw( $new_instance['github'] );
        $instance['flickr']    = esc_url_raw( $new_instance['flickr'] );
        $instance['pinterest'] = esc_url_raw( $new_instance['pinterest'] );
        $instance['wordpress'] = esc_url_raw( $new_instance['wordpress'] );
        $instance['youtube']   = esc_url_raw( $new_instance['youtube'] );
        $instance['vimeo']     = esc_url_raw( $new_instance['vimeo'] );
        $instance['linkedin']  = esc_url_raw( $new_instance['linkedin'] );
        $instance['behance']   = esc_url_raw( $new_instance['behance'] );
        $instance['dribbble']  = esc_url_raw( $new_instance['dribbble'] );
        return $instance;
    }
}
/**
 * About
 */
class travelers_about extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'travelers_about',
            __( 'Fame: About Widget', 'travelers'),
            array(
                'description'   => __( 'Show a single page', 'travelers' )
            )
        );
    }
    public function widget( $args, $instance ) {
        $dt_about_page = isset( $instance['dt_about_page'] ) ? $instance['dt_about_page'] : '';
        $dt_about_page_id = $dt_about_page['0']['page'];
        ?>
        <article class="widget dt-about-holder">
            <figure>
                <a href="<?php echo esc_url( get_the_permalink( $dt_about_page_id ) ); ?>">
                    <?php
                    $image = '';
                    $title_attribute = get_the_title( $dt_about_page_id );
                    $image .= '<a href="'. esc_url( get_permalink( $dt_about_page_id ) ) . '" title="' . the_title( '', '', false ) .'">';
                    $image .= get_the_post_thumbnail( $dt_about_page_id, 'dt-about-thumbnail', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
                    echo $image;
                    ?>
                </a>
            </figure>
            <div class="dt-about-cont">
                <h2 class="widget-title"><?php echo esc_html( get_the_title( $dt_about_page_id ) ); ?></h2>
                <p>
                    <?php
                    $dt_service_post = get_post( $dt_about_page_id );
                    $dt_about_page_content = apply_filters( 'the_content', $dt_service_post->post_content );
                    $postOutput = preg_replace( '/<img[^>]+./','', $dt_about_page_content );
                    $dt_about_page_trimmed_content = wp_trim_words( $postOutput, 45, '...' );
                    echo esc_attr( $dt_about_page_trimmed_content );
                    ?>
                </p>
            </div><!-- .dt-about-cont -->
            <div class="clearfix"></div>
        </article><!-- .dt-about-holder -->
        <?php
    }
    public function form( $instance ) {
        $dt_about_page = isset( $instance['dt_about_page'] ) ? $instance['dt_about_page'] : '';
        if ( ! empty( $dt_about_page ) ) {
            foreach ( $dt_about_page as $dt_about_page_key => $dt_about_page_value ) { ?>
                <div class="dt-admin-input-wrap">
                    <label for="<?php echo $this->get_field_id( 'dt_about_page' ).$dt_about_page_key; ?>"><?php _e( 'Select a Page', 'travelers' ); ?></label>
                    <?php
                    $arg = array(
                        'name' => $this->get_field_name( "dt_about_page" ).'['.esc_attr( $dt_about_page_key ).'][page]',
                        'id'   => $this->get_field_id( "dt_about_page" ).$dt_about_page_key,
                        'selected' => $dt_about_page_value['page'],
                    );
                    wp_dropdown_pages( $arg );
                    ?>
                </div><!-- .dt-admin-input-wrap -->
            <?php }
        } else {
            for ( $dt_service_counter = 0; $dt_service_counter < 1; $dt_service_counter++ ) { ?>
                <div class="dt-admin-input-wrap">
                    <label for="<?php echo $this->get_field_id( 'dt_about_page' ).$dt_service_counter; ?>"><?php _e( 'Select a Page', 'travelers' ); ?></label>
                    <?php
                    $arg = array(
                        'name' => $this->get_field_name( "dt_about_page" ).'['.esc_attr( $dt_service_counter ).'][page]',
                        'id'   => $this->get_field_id( "dt_about_page" ).$dt_service_counter,
                    );
                    wp_dropdown_pages($arg);
                    ?>
                </div><!-- .dt-admin-input-wrap -->
                <?php
            }
        }
    }
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['dt_about_page'] = array();
        if ( isset( $new_instance['dt_about_page'] ) ) {
            foreach ( $new_instance['dt_about_page'] as $stream_source ) {
                $instance['dt_about_page'][] = $stream_source;
            }
        }
        return $instance;
    }
}
// Register widgets
function travelers_register_widgets() {
    register_widget( 'travelers_about' );
    register_widget( 'travelers_social_icons' );
}
add_action( 'widgets_init', 'travelers_register_widgets' );
