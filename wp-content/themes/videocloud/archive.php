<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videocloud
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<div class="section-heading">
			<h1 class="section-title">
				<?php
					global $wp_version;

					if ( $wp_version >= 4.1 ) {
						echo get_the_archive_title('');
					} else {
						esc_html_e("Archives", 'videocloud');
					}
				?>					
			</h1>	
		</div><!-- .breadcrumbs -->
				
		<main id="main" class="site-main clear">

		<div id="recent-content" class="content-loop clear">

			<?php

			if ( have_posts() ) :	
											
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'loop');

				endwhile;

				else :

				get_template_part( 'template-parts/content', 'none' );

			endif; 

			?>

		</div><!-- #recent-content -->

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php if(get_theme_mod('content-layout','choice-1') != 'choice-2') : ?>

<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>
