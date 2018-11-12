<?php
/**
 * The template for displaying all single projects.
 *
 * @package subscribe
 */

	get_header();
?>

	<?php if (get_theme_mod('full-project-on', false) == true) { //Check if the post needs to be full width
		$full_width = 'full-width';
	} else {
		$full_width = '';
	} ?>

	<header class="page-header">
		<div class="container">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div><!-- .container -->
	</header><!-- .page-header -->

	<div class="container">

		<div id="primary" class="content-area <?php echo $full_width; ?>">
			<div id="main" class="post-wrap" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'project' ); ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #main -->
		</div><!-- #primary -->

		<?php if ( get_theme_mod('full-project-on', false) == false ) {
			get_template_part('sidebar','project');
		} ?>

	</div><!-- .container -->

<?php get_footer(); ?>
