<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clear last' : 'clear'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	

	<div class="entry-overview">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
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
	
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<div class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'makemoney'); ?></a></div>

	</div><!-- .entry-overview -->

</div><!-- #post-<?php the_ID(); ?> -->