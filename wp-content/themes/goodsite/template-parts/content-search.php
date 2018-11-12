<?php $class = ( $wp_query->current_post + 1 === 1 ) ? 'clear first' : 'clear'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	

	<div class="entry-header">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	</div><!-- .entry-header -->
		
	<div class="entry-summary">
		<?php echo goodsite_custom_excerpt(get_theme_mod('list-excerpt-length','37')); ?> 
	</div><!-- .entry-summary -->

	<div class="entry-link">
		<?php 
			echo goodsite_truncate_text(get_permalink(), 85);
		?>
		<span><?php echo get_the_date('Y-m-d'); ?></span> 
	</div>

</div><!-- #post-<?php the_ID(); ?> -->