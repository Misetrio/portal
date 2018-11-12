<?php
/**
 * Template Name: Homepage
 *
 * The template for displaying homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package subscribe
 */

get_header(); ?>

<div class="container clear">
	<div id="primary" class="content-area full-width">
		<div id="main" class="site-main clear">
			<?php
			while ( have_posts() ) : the_post();

				the_content();

			endwhile; // End of the loop.
			?>
		</div><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php get_footer(); ?>