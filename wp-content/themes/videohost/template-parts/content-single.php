<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videohost
 */

	$content = get_the_content();

	global $has_embed;

	preg_match  ('/<iframe(.+)\"/', $content, $matches);
	if (!empty($matches)) {
		$has_embed = true;
	}

	preg_match  ('/<object(.+)\"/', $content, $matches);
	if (!empty($matches)) {
		$has_embed = true;
	}

	preg_match  ('/<embed(.+)\"/', $content, $matches);
	if (!empty($matches)) {
		$has_embed = true;
	}

	if (strpos($content, '[embed]') !== false) {
	    $has_embed = true;
	}

	//echo $source;
?>

<?php if ( get_theme_mod('breadcrumbs-on', false) == true ) { ?>

<div class="breadcrumbs">
	<a href="<?php echo home_url(); ?>"><?php esc_html_e('Home', 'videohost'); ?></a> <span>&rsaquo;</span> <?php videohost_first_category(); ?> <span>&rsaquo;</span> <?php the_title(); ?>
</div>

<?php } ?>

<article id="post-<?php the_ID(); ?>" <?php if( ($has_embed == true || videohost_has_embed()) ) { post_class('has-embed'); } else { post_class(); }; ?>>

	<header class="entry-header">	

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'videohost' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'videohost' ),
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
					esc_html__( 'Edit %s', 'videohost' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</div><!-- .entry-tags -->


</article><!-- #post-## -->
