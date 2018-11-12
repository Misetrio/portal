<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clear last' : 'clear'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	

	<?php if ( has_post_thumbnail() ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('post_thumb'); 
				?>
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>	

	<div class="entry-overview">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<div class="entry-meta clear">

			<span class="entry-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?></a> <?php the_author_posts_link(); ?></span> 
			&#8212; <span class="entry-date"><?php echo get_the_date(); ?></span>

		</div><!-- .entry-meta -->

	</div><!-- .entry-overview -->

	<div class="entry-footer clear">
		<div class="entry-share share-icons">
			<?php get_template_part('template-parts/entry', 'share'); ?>
		</div>
		<ul>
			<li>
				<span class="entry-comments-link">
				<a href="<?php comments_link(); ?>">
				<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-comment.png" alt=""/></span>
				<?php comments_number(  __('<strong>0</strong> comments', 'purelife'), __('<strong>1</strong> comment', 'purelife'), __('<strong>%</strong> comments', 'purelife') ); ?>
		    	</a>
		    	</span>			
			</li>
		</ul>
	</div>

</div><!-- #post-<?php the_ID(); ?> -->