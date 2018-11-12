<div class="entry-meta clear">

	<span class="entry-author"><?php esc_html_e('Posted by', 'goodsite'); ?> <?php the_author_posts_link(); ?></span> 
	<span class="entry-date"> &#8212; <?php echo get_the_date(); ?></span>

	<span class="entry-category"> <?php esc_html_e('in', 'goodsite'); ?> <?php goodsite_first_category(); ?></span>

	<span class="meta-right">
		<span class="entry-comment"><?php comments_popup_link( '0', '1', '%', 'comments-link', 'comments off'); ?></span>
	</span>

</div><!-- .entry-meta -->