<div class="entry-meta clear">

	<span class="entry-date"><?php esc_html_e('Last updated on', 'course'); ?> <?php the_modified_date(); ?></span>

	<span class="entry-author"><?php esc_html_e('by', 'course'); ?> <?php the_author_posts_link(); ?></span> 	

	<span class="meta-right">
		<span class='entry-comment'><?php comments_popup_link( __('0 Comment', 'course'), __('1 Comment', 'course'), __('% Comments', 'course'), 'comments-link', __('Comments off', 'course') ); ?></span>		
	</span>

</div><!-- .entry-meta -->