<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videohost
 */

get_header(); ?>

	<div id="primary" class="content-area <?php if(get_theme_mod('archive-style','choice-1') == 'choice-1') { echo "no-sidebar"; }?>">

		<div class="section-heading">
			<h1 class="section-title">
				<?php
					global $wp_version;

					if ( $wp_version >= 4.1 ) {
						echo get_the_archive_title('');
					} else {
						esc_html_e("Archives", 'videohost');
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
