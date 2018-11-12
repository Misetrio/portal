<?php get_header(); ?>


	<?php get_template_part( 'template-parts/content', 'featured' ); ?>

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
<?php get_footer(); ?>
