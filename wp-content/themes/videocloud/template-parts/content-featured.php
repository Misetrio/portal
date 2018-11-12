
<?php		

	$sticky = get_option( 'sticky_posts' );
	$args = array(
	    'posts_per_page' => get_theme_mod('featured-num', '9'),
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

		<div id="slider" class="flexslider">
			<ul class="slides">
			<?php 
				while ( $the_query->have_posts() ) : $the_query->the_post();
			?>	

			<li class="hentry">

				<a class="thumbnail-link" href="<?php the_permalink(); ?>">
					<div class="thumbnail-wrap">
						<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('featured-large-thumb');  
							} else {
								echo '<img src="' . get_template_directory_uri() . '/assets/img/no-featured.png" alt="" />';
							}
						?>
						<?php if( videocloud_has_embed_code() || videocloud_has_embed() ) {?>
							<div class="video-icon"></div>
						<?php } ?>
					</div><!-- .thumbnail-wrap -->
					<div class="gradient"></div>					
				</a>

				<div class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-meta">
						<span class="entry-date"><?php videocloud_entry_date(); ?></span>					
						<span class="meta-right">
							<span class="entry-like"><?php echo get_simple_likes_button( get_the_ID() ); ?></span>			
							<span class="entry-views"><?php echo videocloud_get_post_views(get_the_ID()); ?></span>
						</span>					
					</div><!-- .entry-meta -->
				</div><!-- .entry-header -->	
			</li><!-- .featured-large -->			

			<?php
				$i++;
				endwhile;
			?>

			</ul>
		</div><!-- #slider -->

	</div><!-- #featured-content -->

<?php
	} //end if featured content enable			
?>

<?php
	} else { // else has no featured posts
?>
	<div class="notice">
		<p><?php echo __('Please edit posts and set "Sticky Posts" for this section.', 'videocloud'); ?></p>
		<p><a href="<?php echo home_url(); ?>/wp-admin/edit.php"><?php echo __('Okay, I\'m doing now', 'videocloud'); ?></a> | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-featured.png" target="_blank"><?php echo __('How To (method 1)', 'videocloud'); ?></a> | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-featured2.png" target="_blank"><?php echo __('(method 2)', 'videocloud'); ?></a></p>
	</div>

<?php
	wp_reset_query();
	wp_reset_postdata();	
	} //end if has sticky posts 
?>