
<?php		

	$sticky = get_option( 'sticky_posts' );
	$args = array(
	    'posts_per_page' => 3,
	    'post__in'  => $sticky,
	    'ignore_sticky_posts' => 1
	);

	// The Query
	$the_query = new WP_Query( $args );

	$i = 1;

	if ( (isset($sticky[0])) && ($the_query->have_posts()) ) {	
	?>

<?php 
	if ( (get_theme_mod('home-featured-on', 'true') == true ) && (!get_query_var('paged')) ) {
?>

	<div id="featured-content" class="clear">

		<div id="slider" class="flexslider loading">
			<ul class="slides">
			<?php 
				while ( $the_query->have_posts() ) : $the_query->the_post();

				global $post;	

			?>	

			<li class="hentry">

				<a class="thumbnail-link" href="<?php the_permalink(); ?>">
					<div class="thumbnail-wrap">
						<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('large-thumb');  
							} else {
								echo '<img src="' . get_template_directory_uri() . '/assets/img/no-featured.png" alt="" />';
							}
						?>
						<?php if( course_has_embed_code() || course_has_embed() ) {?>
							<div class="video-icon"></div>
						<?php } ?>
					</div><!-- .thumbnail-wrap -->
					<div class="gradient"></div>					
				</a>

				<div class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-meta">
						<span class="entry-category"><?php course_first_category(); ?></span>		
						<span class="entry-date"><?php course_entry_date(); ?></span>
					</div><!-- .entry-meta -->
				</div><!-- .entry-header -->	
			</li><!-- .featured-large -->			

			<?php
				$i++;
				endwhile;
			?>

			</ul>
		</div><!-- #slider -->

		<div class="ribbon"><span><?php echo get_theme_mod('featured-text', __('Featured')); ?></span></div>

	</div><!-- #featured-content -->

<?php
	} //end if featured content enable			
?>

<?php
	} else { // else has no featured posts
?>
	<div class="notice">
		<p><?php echo __('Please edit posts and set "Sticky Posts" for this section.', 'course'); ?></p>
		<p><a href="<?php echo home_url(); ?>/wp-admin/edit.php"><?php echo __('OK, I\'m doing now', 'course'); ?></a> | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-featured.png" target="_blank"><?php echo __('How To (method 1)', 'course'); ?></a> | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-featured2.png" target="_blank"><?php echo __('(method 2)', 'course'); ?></a></p>
	</div>

<?php
	wp_reset_query();
	wp_reset_postdata();	
	} //end if has sticky posts 
?>