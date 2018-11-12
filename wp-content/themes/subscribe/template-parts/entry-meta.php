<div class="entry-meta">

	<span class="entry-author"><em><?php esc_html_e('Written by', 'subscribe'); ?></em> <?php the_author_posts_link(); ?></span> 
	<span class="sep">|</span>	
	<span class="entry-date"><em><?php esc_html_e('Posted on', 'subscribe'); ?></em> <time><?php echo get_the_date(); ?></time></span>		
	<span class="sep">|</span>	
	<span class="entry-category">
		<em><?php esc_html_e('Filed in', 'subscribe'); ?></em> <?php subscribe_first_category(); ?>
	</span>	

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'subscribe' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="sep">|</span><span class="edit-link">',
			'</span>'
		);
	?>	

</div><!-- .entry-meta -->