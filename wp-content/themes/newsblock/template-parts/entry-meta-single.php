<div class="entry-meta clear">

	<span class="entry-author"><?php esc_html_e('Posted by', 'newsblock'); ?> <?php the_author_posts_link(); ?></span>
	<span class="entry-date"> &#8212; <?php echo get_the_date(); ?></span>
	<span class="entry-category"> <?php esc_html_e('in', 'newsblock'); ?> <?php newsblock_first_category(); ?></span>
	<span class="entry-comment"> &#8212; <?php comments_popup_link( 'Leave a reply', '1 Comment', '% Comments', 'comments-link', ''); ?></span>

</div><!-- .entry-meta -->