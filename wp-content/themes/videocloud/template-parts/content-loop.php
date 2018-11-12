<div id="post-<?php the_ID(); ?>" <?php post_class('ht_grid_1_3'); ?>>	

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
		<?php if (!is_category()) { ?>
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

</div><!-- #post-<?php the_ID(); ?> -->