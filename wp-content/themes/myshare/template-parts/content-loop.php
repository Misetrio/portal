<?php $class = ( $wp_query->current_post + 1 === 1 ) ? 'clear first' : 'clear'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	

	<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

	<?php if ( has_post_thumbnail() ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('post_thumb'); 
				?>
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>	

	<div class="entry-header">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
	</div><!-- .entry-header -->
		
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<span class="entry-comment"><?php comments_popup_link( '0 Comment', '1 Comment', '% Comments', 'comments-link', 'comments off');?></span>
	</div><!-- .entry-summary -->

</div><!-- #post-<?php the_ID(); ?> -->