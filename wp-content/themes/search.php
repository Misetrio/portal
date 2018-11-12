<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package course
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main clear">
			
			<?php
				get_template_part('sidebar', '2');
			?>
					
			<div id="recent-content" class="has-sidebar-2">

				<div class="most-recent-content">

					<div class="section-heading clear">
						<h1 class="section-title">
							<?php printf( esc_html__( 'Search Results for %s', 'course' ), '"' . get_search_query() . '"' ); ?>			
						</h1>	
					</div><!-- .section-heading -->

					<div class="content-grid clear">

						<?php

						if ( have_posts() ) :	

						$i = 1;

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part('template-parts/content', 'grid');

							if ( $i % 2 == 0 ) {
								echo '<span class="line"></span>';
							}

						$i++;

						endwhile;

						else :

							get_template_part( 'template-parts/content', 'none' );

						?>

						<?php endif; ?>

					</div><!-- .content-grid -->

				</div><!-- .most-recent-content -->

				<?php get_template_part( 'template-parts/pagination', '' ); ?>

			</div><!-- #recent-content -->

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

