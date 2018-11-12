<div class="section-heading">

	<?php
		if ( $cat_id == 0 ) {
			$heading_url = get_theme_mod('all-posts-url', home_url().'/latest');
			$heading_text = get_theme_mod('recent-heading', __('Recent videos', 'videocloud'));
		} else {
			$heading_url = $cat_link;
			$heading_text = $category->name;		
		}
	?>

	<h3 class="section-title">
		<a href="<?php echo esc_url($heading_url); ?>"><?php echo $heading_text; ?></a>
	</h3>
	
	<div class="section-more">
		<a href="<?php echo esc_url($heading_url); ?>"><?php esc_html_e('More', 'videocloud'); ?></a>
	</div>

</div><!-- .section-heading -->			

<div class="content-loop">

<?php
	// The Loop
	while ( $posts->have_posts() ) : $posts->the_post();
	global $post;	
	if(get_theme_mod('content-layout','choice-1') == 'choice-2') { 
		$post_col = "ht_grid_1_4"; 
	} else { 
		$post_col = "ht_grid_1_3"; 
	}		
?>	

<div id="block-post-<?php the_ID(); ?>" <?php post_class($post_col); ?>>	

	<?php if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('post-thumb');  
				?>
				<?php if (!empty($video_length)) { ?>
					<span class="video-length"><?php echo $video_length; ?></span>
				<?php } ?>		
				<?php if( (videocloud_has_embed_code() || videocloud_has_embed()) ) {?>
					<div class="video-icon"></div>
				<?php } ?>						
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>

	<div class="entry-header">

		<?php if ( $cat_id == 0 ) { ?>
			<span class="entry-category"><?php videocloud_first_category(); ?></span>
		<?php } ?>

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">
			<span class="entry-date"><?php videocloud_entry_date(); ?></span>	
			<span class="meta-right">
				<span class="entry-like"><?php echo get_simple_likes_button( get_the_ID() ); ?></span>			
				<span class="entry-views"><?php echo videocloud_get_post_views(get_the_ID()); ?></span>
			</span>			
		</div><!-- .entry-meta -->							
	</div><!-- .entry-header -->		

</div><!-- .hentry -->

<?php

	$i++;
	endwhile;
?>

</div><!-- .content-loop -->