	<?php if (get_theme_mod('featured-content-on', 'true') == true ) { ?>

	<?php		

		$args = array(
		'post_type'      => 'post',
		'posts_per_page' => '1',
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

	?>

	<div id="featured-content" class="clear">

	<?php
		// The Loop
		while ( $the_query->have_posts() ) : $the_query->the_post();

		if ($i == 1) {
	?>	

	<div class="featured-large hentry">

		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			
			<div class="thumbnail-wrap">
				<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('featured_thumb');  
				} else {
					echo '<img src="' . get_template_directory_uri() . '/assets/img/no-featured.png" alt="" />';
				}
				?>
			</div><!-- .thumbnail-wrap -->
			<div class="gradient">
			</div>
		</a>

		<div class="entry-header clear">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
		<div class="entry-meta">
			<span class="entry-category"><?php revolution_first_category(); ?></span>			
			<span class="entry-date"><?php echo get_the_date(); ?></span>
			<span class="entry-comment"><?php comments_popup_link( '0 Comment', '1 Comment', '% Comments', 'comments-link', 'comments off'); ?></span>
		</div><!-- .entry-meta -->		
			
		</div><!-- .entry-header -->

	</div><!-- .featured-large .hentry -->

	<?php } else { ?>

	<?php
		}
		$i++;
		endwhile;
	?>

	</div><!-- #featured-content -->

	<?php
		} elseif  ( !$the_query->have_posts() && (!get_query_var('paged')) ) { // else has no featured posts
	?>


	<?php
		} //end if has featured posts
		wp_reset_postdata();				
	?>

	<?php } ?>