<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package purelife
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

		<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

		<?php
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-info clear">

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

	</div><!-- .entry-info -->

	<div class="entry-content">
		<?php 
			if ( has_post_thumbnail() && ( get_theme_mod('single-featured-on', true) == true ) ) :
				the_post_thumbnail('single_thumb'); 
			endif;
		?>	
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'purelife' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'purelife' ),
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
					esc_html__( 'Edit %s', 'purelife' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</span><!-- .entry-tags -->

</article><!-- #post-## -->
