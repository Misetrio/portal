<?php
/**
 * The template for displaying all single employees.
 *
 * @package subscribe
 */

get_header(); ?>

	<div class="page-header">
		<div class="container">
			<h1 class="page-title"><?php echo get_option('employees-page-title','Meet Our Team'); ?></h1>
		</div>
	</div><!-- .page-header -->	

	<div class="container">				

		<div id="primary" class="content-area full-width">
			<div id="main" class="post-wrap roll-team" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'employee' ); ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .container -->

<?php get_footer(); ?>
