<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package greatwall
 */

get_header(); ?>

	<div class="page-header">
		<div class="container">
			<h1 class="page-title"><?php _e( 'All posts in', 'greatwall' ); ?> <?php single_cat_title(''); ?></h1>
		</div>
	</div><!-- .page-header -->

	<div class="container">

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">

		<div id="recent-content" class="content-list">

			<?php

			if ( have_posts() ) :	
						
				$i = 1;		
					
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'list');

					$i++;

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

</div>

<?php get_footer(); ?>
