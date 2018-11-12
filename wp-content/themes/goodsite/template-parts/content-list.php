<div id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>	


	<?php if ( has_post_thumbnail() ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('general-thumb'); 
				?>
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>	

	<div class="entry-header">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">

			<span class="entry-author"><?php esc_html_e("Posted by", 'goodsite'); ?> <?php the_author_posts_link(); ?></span> 
			<span class="entry-date"> &#8212; <?php echo get_the_date(); ?></span>

			<span class="entry-category"> <?php esc_html_e('in', 'goodsite'); ?> <?php goodsite_first_category(); ?></span>

		</div><!-- .entry-meta -->		
	</div><!-- .entry-header -->
		
	<div class="entry-summary">
		<?php echo goodsite_custom_excerpt(get_theme_mod('list-excerpt-length','37')); ?> 
	</div><!-- .entry-summary -->

</div><!-- #post-<?php the_ID(); ?> -->