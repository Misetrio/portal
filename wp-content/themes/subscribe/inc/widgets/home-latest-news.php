<?php

class subscribe_Latest_News extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'subscribe_latest_news_widget', 'description' => __( 'Show the latest news from your blog.', 'subscribe') );
        parent::__construct(false, $name = __('Home - Latest News', 'subscribe'), $widget_ops);
		$this->alt_option_name = 'subscribe_latest_news_widget';
	
    }
	
	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$category  		= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : 3;
		$see_all_text  	= isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : '';											
	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'subscribe'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'subscribe' ); ?></label>
	<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Enter the slug for your category or leave empty to show posts from all categories.', 'subscribe' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo $category; ?>" size="3" /></p>	
    <p><label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php _e('Add the text for the button here if you want to change the default <em>See all our news</em>', 'subscribe'); ?></label>
	<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'see_all_text' ); ?>" name="<?php echo $this->get_field_name( 'see_all_text' ); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" /></p>		

	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['number'] 		= strip_tags($new_instance['number']);
		$instance['category'] 		= strip_tags($new_instance['category']);
		$instance['see_all_text'] 	= strip_tags($new_instance['see_all_text']);						

		return $instance;
	}

	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number 		= ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : 3;
		if ( ! $number )
			$number 	= 3;		
		$category = isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$see_all_text = isset( $instance['see_all_text'] ) ? esc_html($instance['see_all_text']) : __( 'See all our news', 'subscribe' );
		if ($see_all_text == '') {
			$see_all_text = __( 'See all our news', 'subscribe' );
		}

		$r = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'category_name'		  => $category,
			'posts_per_page'	  => $number,			
		) );

		echo $args['before_widget'];

		if ($r->have_posts()) :
?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>

		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<div class="blog-post ht_grid ht_grid_1_3">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumb">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail('grid_thumb'); ?>
						</a>			
					</div>	
				<?php endif; ?>	
				<div class="content-wrap">					
				<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
					<div class="entry-meta">
						<span class="entry-category"><?php subscribe_first_category(); ?></span>
						<span class="sep">/</span>
						<span class="entry-date"><?php echo get_the_date('M d, Y'); ?></span>
					</div>
				</div>
			</div>
		<?php endwhile; ?>

		<div class="blog-button clear">
		<?php $cat = get_term_by('slug', $category, 'category') ?>
		<?php if ($category) : //Link to the category page instead of blog page if a category is selected ?>
			<a href="<?php echo esc_url(get_category_link(get_cat_ID($cat -> name))); ?>" class="more-button"><?php echo $see_all_text; ?></a>
		<?php elseif ( get_option( 'page_for_posts' ) ) : ?>
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="more-button"><?php echo $see_all_text; ?></a>
		<?php endif; ?>	
		</div>
	<?php
		echo $args['after_widget'];
		wp_reset_postdata();

		endif;

	}
	
}