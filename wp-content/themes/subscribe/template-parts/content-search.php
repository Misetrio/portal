<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clear last' : 'clear'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	

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
		<?php get_template_part( 'template-parts/entry', 'meta' ); ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div><!-- .entry-header -->

	<div class="entry-summary">
		<?php
			echo wp_trim_words( get_the_content(), get_theme_mod('loop-excerpt-length', '70'), '...' );
		?>
	</div><!-- .entry-summary -->

	<div class="entry-footer">

		<div class="read-more">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue reading', 'subscribe'); ?></a>
		</div>

		<span class='entry-comment'>
			<?php comments_popup_link( __('0 Comment', 'subscribe'), __('1 Comment', 'subscribe'), __('% Comments', 'subscribe'), 'comments-link', __('Comments off', 'subscribe') ); ?>
		</span>	

	</div><!-- .entry-footer -->	

</div><!-- #post-<?php the_ID(); ?> -->