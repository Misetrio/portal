<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package subscribe
 */

get_header(); ?>

	<div class="page-header">
		<div class="container">
			<h1 class="page-title"><?php _e( 'All posts in', 'subscribe' ); ?> <?php single_cat_title(''); ?></h1>
		</div>
	</div><!-- .page-header -->

	<div class="container">

	<div id="primary" class="content-area full-width">	
				
		<div id="main" class="site-main clear">
		
			<div id="recent-content" class="content-grid">

				<?php

				if ( have_posts() ) :	
				
				$i = 1;		
					
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'grid');

					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->

		</div><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

	</div><!-- .container -->

<?php get_footer(); ?>
