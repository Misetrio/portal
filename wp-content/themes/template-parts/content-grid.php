<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'ht_grid_1_2 last' : 'ht_grid_1_2'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

	<?php if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('grid-thumb'); 
				?>
				<?php if( (course_has_embed_code() || course_has_embed()) ) {?>
					<div class="video-icon"></div>
				<?php } ?>					
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>	

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">
			<span class="entry-category"><?php course_first_category(); ?></span>
			<span class="entry-date"><?php course_entry_date(); ?></span>
		</div><!-- .entry-meta -->
	</div><!-- .entry-header -->

	<div class="entry-summary">
		<?php
			echo wp_trim_words( get_the_content(), get_theme_mod('grid-excerpt-length','18'), '...' );
		?>
	</div><!-- .entry-summary -->

	<div class="entry-footer">

		<span class="entry-more">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'course'); ?></a>
		</span> 

		<span class='entry-comment'>
			<?php comments_popup_link( __('0', 'course'), __('1', 'course'), __('%', 'course'), 'comments-link', __('Comments off', 'course') ); ?>
		</span>		

	</div><!-- .entry-footer -->

</div><!-- #post-<?php the_ID(); ?> -->