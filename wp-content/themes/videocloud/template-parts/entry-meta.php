<div class="entry-meta clear">

	<span class="entry-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?></a><?php the_author_posts_link(); ?></span> 
	<span class="entry-date"> &#8212; <?php echo get_the_date(); ?></span>

	<span class="entry-category-single"> <?php esc_html_e('in', 'videocloud'); ?> <?php videocloud_first_category(); ?></span>

	<span class="meta-right">
		<span class="entry-like"><?php echo get_simple_likes_button( get_the_ID() ); ?></span>			
		<span class="entry-views"><?php echo videocloud_get_post_views(get_the_ID()); ?> <?php esc_html_e('Views', 'videocloud'); ?></span>
	</span>

</div><!-- .entry-meta -->