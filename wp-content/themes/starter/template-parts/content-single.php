<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package starter
 */	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>

		<div class="entry-meta clear">

			<span class="entry-author"><?php esc_html_e('Posted by', 'starter'); ?> <?php the_author_posts_link(); ?></span> &#8212; <span class="entry-date"><?php echo get_the_date(); ?></span> <span class="entry-category"> <?php esc_html_e('in', 'starter'); ?> <?php starter_first_category(); ?></span> 

		
		</div><!-- .entry-meta -->

		<?php
		endif; ?>

		<?php if ( get_theme_mod('single-share-on', true) ) : ?>

		<div class="share-icons">

			<?php get_template_part('template-parts/entry', 'comment'); ?>		
			
			<?php get_template_part('template-parts/entry', 'share'); ?>

		</div><!-- .share-icons -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
			if ( has_post_thumbnail() && ( get_theme_mod('single-featured-on', false) == true ) ) :
				the_post_thumbnail('single_thumb'); 
			endif;
		?>	
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'starter' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<span class="entry-tags">

		<?php if (has_tag()) { ?><span class="tag-links"><?php the_tags(' ', ' '); ?></span><?php } ?>
			
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'starter' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</span><!-- .entry-tags -->

</article><!-- #post-## -->


<?php if ( get_theme_mod('single-share-on', true) ) : ?>
	
<div class="entry-footer">

	<div class="share-icons">

		<?php get_template_part('template-parts/entry', 'comment'); ?>		
		
		<?php get_template_part('template-parts/entry', 'share'); ?>

	</div><!-- .share-icons -->

</div><!-- .entry-footer -->

<?php endif; ?>
