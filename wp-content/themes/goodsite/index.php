<?php get_header(); ?>
	
	<div id="primary" class="content-area">	

		<main id="main" class="site-main clear">

		<?php if (get_theme_mod('home-featured-on', 'true') == true ) { ?>

		<div id="featured-content" class="clear">

		<?php		

			$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 3,
		    'meta_query' => array(
		        array(
		            'key'   => 'is_featured',
		            'value' => 'true'
		        	)
		    	)				
			);

			// The Query
			$the_query = new WP_Query( $args );

			$i = 1;

			if ( $the_query->have_posts() && (!get_query_var('paged')) ) {	

			while ( $the_query->have_posts() ) : $the_query->the_post();

			?>	

			<?php if ($i == 1) { ?>

			<div class="featured-large hentry">

					<a class="thumbnail-link" href="<?php the_permalink(); ?>">
						
						<div class="thumbnail-wrap">
							<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('featured-large-thumb');  
							} else {
								echo '<img src="' . get_template_directory_uri() . '/assets/img/featured-large-thumb.png" alt="" />';
							}
							?>
						</div><!-- .thumbnail-wrap -->
						<span class="gradient"></span>
					</a>

					<div class="entry-header">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-meta">
							<span class="entry-category"><?php goodsite_first_category(); ?></span>
							<span class="entry-date"><?php echo get_the_date(); ?></span>
							<span class="entry-comment"><?php comments_popup_link( '0', '1', '%', 'comments-link', __('comments off', 'goodsite')); ?></span>
						</div><!-- .entry-meta -->							
					</div><!-- .entry-header -->	
				
			</div><!-- .featured-large -->			

			<?php } else { ?>

			<div class="featured-small hentry <?php echo( $the_query->current_post + 1 === $the_query->post_count ) ? 'last' : ''; ?>">

					<a class="thumbnail-link" href="<?php the_permalink(); ?>">
						
						<div class="thumbnail-wrap">
							<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('featured-small-thumb');  
							} else {
								echo '<img src="' . get_template_directory_uri() . '/assets/img/featured-small-thumb.png" alt="" />';
							}
							?>
						</div><!-- .thumbnail-wrap -->
						<span class="gradient"></span>
					</a>

				<div class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-meta">
						<span class="entry-category"><?php goodsite_first_category(); ?></span>					
						<span class="entry-date"><?php echo get_the_date(); ?></span>
						<span class="entry-comment"><?php comments_popup_link( '0', '1', '%', 'comments-link', __('comments off', 'goodsite')); ?></span>
					</div><!-- .entry-meta -->							
				</div><!-- .entry-header -->	

			</div><!-- .featured-small -->

			<?php

				}
				$i++;
				endwhile;
			?>
			<?php
				} elseif  ( !$the_query->have_posts() && (!get_query_var('paged')) ) { // else has no featured posts
			?>
				<div class="notice">
					<p><?php echo __('Please edit posts and set "Featured Posts" for this section.', 'goodsite'); ?></p>
					<p><a href="<?php echo home_url(); ?>/wp-admin/edit.php"><?php echo __('Okay, I\'m doing now &raquo;', 'goodsite'); ?></a> | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-featured.png" target="_blank"><?php echo __('How To &raquo;', 'goodsite'); ?></a></p>
				</div>

			<?php
				} //end if has featured posts
				wp_reset_postdata();				
			?>

			</div><!-- #featured-content -->
			
			<?php } ?>
			
			<div id="recent-content">
			
			<?php if ( is_active_sidebar( 'homepage' ) ) { ?>

				<?php dynamic_sidebar( 'homepage' ); ?>

			<?php } else { ?>

				<div class="notice">
					<p><?php echo __('Put the "Home Three/Four Columns" and "Advertisement" widgets to the <strong>Homepage Content</strong> widget area.', 'goodsite'); ?></p>
					<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('Okay, I\'m doing now &raquo;', 'goodsite'); ?></a>  | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-home-widgets.png" target="_blank"><?php echo __('How To &raquo;', 'goodsite'); ?></a></p>
				</div>

			<?php } ?>		

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
