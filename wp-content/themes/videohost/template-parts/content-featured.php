<?php 
	if ( (get_theme_mod('home-featured-on', 'true') == true ) && (!get_query_var('paged')) ) {
?>

<div id="featured-content" class="clear">

<?php		

	$args = array(
	'post_type'      => 'post',
	'posts_per_page' => '8',
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

	if ( $the_query->have_posts() ) {	
	?>

	<div id="slider" class="flexslider">
		<ul class="slides">
		<?php 
			while ( $the_query->have_posts() ) : $the_query->the_post();

			global $post;	

			$content = get_the_content();

			global $has_embed;

			preg_match  ('/<iframe(.+)\"/', $content, $matches);
			if (!empty($matches)) {
				$has_embed = true;
			}

			preg_match  ('/<object(.+)\"/', $content, $matches);
			if (!empty($matches)) {
				$has_embed = true;
			}

			preg_match  ('/<embed(.+)\"/', $content, $matches);
			if (!empty($matches)) {
				$has_embed = true;
			}

			if (strpos($content, '[embed]') !== false) {
			    $has_embed = true;
			}

		?>	

		<li class="hentry">

			<?php if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) { ?>
				<a class="thumbnail-link" href="<?php the_permalink(); ?>">
					<div class="thumbnail-wrap">
						<?php 
							the_post_thumbnail('featured-large-thumb');  
						?>
						<?php if( ($has_embed == true || videohost_has_embed()) ) {?>
							<span class="genericon genericon-youtube"></span>
						<?php } ?>
					</div><!-- .thumbnail-wrap -->
				</a>
			<?php } ?>

			<div class="entry-header">
				<span class="entry-category"><?php videohost_first_category(); ?></span>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-meta">
					<span class="entry-date"><?php echo get_the_date('M d, Y'); ?></span>
					<span class="entry-views"><?php echo videohost_get_post_views(get_the_ID()); ?></span>
				</div><!-- .entry-meta -->
			</div><!-- .entry-header -->

			<div class="entry-summary">
				<?php echo videohost_custom_excerpt(get_theme_mod('excerpt-length','35')); ?>
				<div class="entry-more">
					<a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'videohost'); ?> &raquo;</a>
				</div>							 
			</div>		
		</li><!-- .featured-large -->			

		<?php
			$i++;
			endwhile;
		?>

		</ul>
	</div>

	<div id="carousel" class="flexslider">
	  <ul class="slides">
		<?php 
			while ( $the_query->have_posts() ) : $the_query->the_post();
		?>			  
	    <li>
			<?php 
			if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) {
				the_post_thumbnail('featured-small-thumb');  
			} else {
				echo '<img src="' . get_template_directory_uri() . '/assets/img/featured-small-thumb.png" alt="" />';
			}
			?>
	    </li>
		<?php endwhile; ?>
	  </ul>
	</div>

	<?php
		} elseif  ( !$the_query->have_posts() && (!get_query_var('paged')) ) { // else has no featured posts
	?>
		<div class="notice">
			<p><?php echo __('Please edit posts and set "Featured Posts" for this section.', 'videohost'); ?></p>
			<p><a href="<?php echo home_url(); ?>/wp-admin/edit.php"><?php echo __('Okay, I\'m doing now &raquo;', 'videohost'); ?></a> | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-featured.png" target="_blank"><?php echo __('How To &raquo;', 'videohost'); ?></a></p>
		</div>

	<?php
		} //end if has featured posts
		wp_reset_postdata();				
	?>

</div><!-- #featured-content -->
	
<?php } ?>