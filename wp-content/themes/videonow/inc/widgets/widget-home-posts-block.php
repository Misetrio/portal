<?php
/**
 * Home Grid/List widget.
 *
 * @package    videonow
 * @author     HappyThemes
 * @copyright  Copyright (c) 2016, HappyThemes
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class videonow_Posts_Block_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-videonow-home-post-block',
			'description' => __( 'Use for "Home Content Area" only.', 'videonow' )
		);

		// Create the widget.s
		parent::__construct(
			// Please DO NOT change 'videonow', it needs to have different prefix from other widgets!
			// I do so because other widgets need to be removed from homepage
			'happythemes-home-post-block',               // $this->id_base
			__( '&raquo; Home Posts Block', 'videonow' ), // $this->name
			$widget_options                              // $this->widget_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo $before_widget;

			// Theme prefix
			$prefix = 'videonow-';

			// Posts query arguments.
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => (int) $instance['limit']
			);

			// Limit to category based on user selected.
			if ( ! $instance['cat'] == 0 ) {
				$args['cat'] = $instance['cat'];
			}

			// Allow dev to filter the post arguments.
			$query = apply_filters( 'videonow_home_post_block_args', $args );

			// The post query.
			$posts = new WP_Query( $query );

			if ( $posts->have_posts() ) : ?>

				<?php

					$class = 'post-block';

					$i = 1; // counter for blog grid
				?>
					<div class="section-header">

						<?php 
							/*
							if ( $instance['image'] ) {
									echo '<a href="' . esc_url( videonow_home_widget_title_link( $instance ) ) . '">' . "<img src='" . $instance['image'] ."' alt=''" . "/>" . '</a>';
							}
							*/
						?>

						<?php
							if ( $instance['title'] ) {
								echo $before_title . '<a href="' . esc_url( videonow_home_widget_title_link( $instance ) ) . '">';

								echo apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</a>' . $after_title;
							} else {
								echo $before_title . '<a href="' . esc_url( videonow_home_widget_title_link( $instance ) ) . '">';

								echo get_cat_name( $instance['cat'] ) . '</a>' . $after_title;
							}
						?>

						<?php 
							$term_description = term_description($instance['cat']);
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
						?>

						<?php
							if( $instance['cat'] ) { 
						?>

							<div class="section-more">
								<a class="more-url" href="<?php echo esc_url( videonow_home_widget_title_link( $instance ) ); ?>"><span class="genericon genericon-play"></span> <?php echo __('View More', 'videonow'); ?></a>
							</div>

						<?php 
							}
						?>
					</div>
					<div class="<?php echo $class; ?>">
					<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

						<?php
						global $post;
						      					
						// 'last' class for Blog Grid
						$classes = array();

						if ( 0 == ( $i % 4 ) )
							$classes[] = 'last';
						$i++;
						?>
						
						<div <?php post_class( $classes ); ?>>

							<?php if($instance['showthumb']) : ?>

								<a class="thumbnail-link" href="<?php the_permalink(); ?>">
									<div class="thumbnail-wrap">
										<?php 
											if ( has_post_thumbnail() ) {
												the_post_thumbnail( 'general-thumb' ); 
											} else { 
												echo '<img src="' . get_template_directory_uri() . '/assets/img/thumbnail-default.png" alt="" />';
					        				}	
				        				?>
									</div>
								</a>

							<?php endif; ?>

							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="entry-meta">							

								<?php if($instance['showmeta']) : ?>

									<span class="entry-views"><?php echo videonow_get_post_views(get_the_ID()); ?></span>
									<span class="entry-date"><?php echo get_the_date(); ?></span>

								<?php endif; ?>

							</div>

						</div><!-- .hentry .post -->	

					<?php endwhile; ?>
				</div><!-- .post -->
			<?php endif;

			// Restore original Post Data.
			wp_reset_postdata();

		// Close the theme's widget wrapper.
		echo $after_widget;

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;

		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['desc']     = strip_tags( $new_instance['desc'] );
		//$instance['layout']    = strip_tags( $new_instance['layout'] );
		$instance['limit']     = (int) $new_instance['limit'];
		$instance['cat']       = (int) $new_instance['cat'];
		//$instance['format']    = strip_tags( $new_instance['format'] );
		$instance['showthumb']   = isset( $new_instance['showthumb'] ) ? (bool) $new_instance['showthumb'] : false;
		$instance['showcat']   = isset( $new_instance['showcat'] ) ? (bool) $new_instance['showcat'] : false;
		$instance['showexcerpt'] = isset( $new_instance['showexcerpt'] ) ? (bool) $new_instance['showexcerpt'] : false;
		//$instance['excerpt_limit']     = (int) $new_instance['excerpt_limit'];
		$instance['showmeta']   = isset( $new_instance['showmeta'] ) ? (bool) $new_instance['showmeta'] : false;
		//$instance['showreview']   = isset( $new_instance['showreview'] ) ? (bool) $new_instance['showreview'] : false;

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'title'         => '',
			'desc'          => '',
			'image'			=> get_template_directory_uri().'/assets/img/favicon.png',
			//'layout'        => 'grid',
			'limit'         => 4,
			'cat'           => '',
			//'format'        => '',
			'showthumb'     => true,
			'showcat'       => true,
			'showexcerpt'   => false,
			'excerpt_limit' => 15,
			'showmeta'      => true,
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title (optional)', 'videonow' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'Choose Category', 'videonow' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" style="width:100%;">
				<?php $categories = get_terms( 'category' ); ?>
				<?php foreach( $categories as $category ) { ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $instance['cat'], $category->term_id ); ?>><?php echo esc_html( $category->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showthumb'] ); ?> id="<?php echo $this->get_field_id( 'showthumb' ); ?>" name="<?php echo $this->get_field_name( 'showthumb' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'showthumb' ); ?>">
				<?php _e( 'Display thumbnail?', 'videonow' ); ?>
			</label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['showmeta'] ); ?> id="<?php echo $this->get_field_id( 'showmeta' ); ?>" name="<?php echo $this->get_field_name( 'showmeta' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'showmeta' ); ?>">
				<?php _e( 'Display post views/date?', 'videonow' ); ?>
			</label>
		</p>	

	<?php

	}

}