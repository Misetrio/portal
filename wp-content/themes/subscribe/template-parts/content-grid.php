
<div id="post-<?php the_ID(); ?>" <?php post_class('blog-post ht_grid ht_grid_1_3'); ?>>	

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('grid_thumb'); ?>
			</a>			
		</div>	
	<?php endif; ?>	

	<div class="content-wrap">			

	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta">
			<span class="entry-category"><?php subscribe_first_category(); ?></span>
			<span class="sep">/</span>
			<span class="entry-date"><?php echo get_the_date('M d, Y'); ?></span>
		</div>

		<div class="entry-summary">
			<?php
				echo wp_trim_words( get_the_content(), get_theme_mod('grid-excerpt-length', '38'), '...' );
			?>
		</div><!-- .entry-summary -->

		<div class="read-more">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading', 'subscribe'); ?></a>
		</div>

	</div>

</div><!-- #post-<?php the_ID(); ?> -->