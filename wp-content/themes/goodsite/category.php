<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goodsite
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main clear">

			<div class="breadcrumbs clear">
				<h1 class="section-title">
					<?php esc_html_e('All posts in', 'goodsite'); ?> <?php single_cat_title(''); ?>
				</h1>	
			</div><!-- .breadcrumbs -->

		<div id="recent-content" class="content-list">

			<?php

			if ( have_posts() ) :	
											
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'list');

				endwhile;

				else :

				get_template_part( 'template-parts/content', 'none' );

			endif; 

			?>

		</div><!-- #recent-content -->

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
