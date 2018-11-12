<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videocloud
 */
?>

<article id="post-<?php the_ID(); ?>" <?php if( (videocloud_has_embed_code() || videocloud_has_embed()) ) { post_class('has-embed'); } else { post_class(); }; ?>>

	<header class="entry-header">	

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'videocloud' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'videocloud' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-tags clear">

		<?php if (has_tag()) { ?><span class="tag-links"><?php the_tags(' ', ' '); ?></span><?php } ?>
			
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'videocloud' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</div><!-- .entry-tags -->

</article><!-- #post-## -->