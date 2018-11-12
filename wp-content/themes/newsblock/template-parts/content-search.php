<div id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>	

	<?php if ( has_post_thumbnail() ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('post_thumb'); 
				?>
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>

	<div class="entry-category">
		<?php newsblock_first_category(); ?>
	</div><!-- .entry-category -->

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

</div><!-- #post-<?php the_ID(); ?> -->