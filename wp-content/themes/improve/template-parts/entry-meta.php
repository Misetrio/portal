<div class="entry-meta">
	<span class="entry-author"><span><?php esc_html_e('By:', 'improve'); ?></span> <?php the_author_posts_link(); ?></span>
	<span class="sep">|</span>
	<span class="entry-category"><span><?php esc_html_e('In:', 'improve'); ?></span> <?php improve_first_category(); ?></span> 	
	<span class="sep">|</span>	
	<span class="entry-date"><span><?php esc_html_e('Last updated:', 'improve'); ?></span> <?php echo get_the_date(); ?></span>
	<span class="entry-comment"><?php comments_popup_link( '0', '1', '%', 'comments-link', '0');?></span>
</div><!-- .entry-meta -->