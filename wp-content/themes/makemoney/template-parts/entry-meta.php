<div class="entry-meta clear">

	<span class="entry-author"><?php esc_html_e('Posted by', 'makemoney'); ?> <?php the_author_posts_link(); ?></span> 
	&#8212; <span class="entry-date"><?php echo get_the_date(); ?></span>
	<span class="entry-category"> <?php esc_html_e('in', 'makemoney'); ?> <?php makemoney_first_category(); ?></span>
	<span class="entry-comment-number"><?php comments_popup_link( '0', '1', '%', 'comments-link', ''); ?></span>

</div><!-- .entry-meta -->