<?php
/**
 * Template Name: Full Width
 *
 * The template for displaying full width pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package subscribe
 */

get_header(); ?>

	<header class="page-header">
		<div class="container">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div><!-- .container -->
	</header><!-- .page-header -->
		
	<div class="container clear">

	<div id="primary" class="content-area full-width">
		<div id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div><!-- #main -->
	</div><!-- #primary -->
	
	</div><!-- .container -->

<?php get_footer(); ?>