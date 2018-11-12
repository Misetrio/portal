<?php 
	global $post;	
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	

	<?php if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('post-thumb'); 
				?>
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>	

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">
			<span class="entry-date"><?php echo get_the_date('M d, Y'); ?></span>
			<span class="entry-views"><?php echo videohost_get_post_views(get_the_ID()); ?></span>
		</div><!-- .entry-meta -->
	</div><!-- .entry-header -->

</div><!-- #post-<?php the_ID(); ?> -->