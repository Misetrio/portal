<?php get_header(); ?>

<?php if (is_front_page()) { ?>

	<div class="home-blog-space"></div>

<?php } else { ?>

	<div class="page-header">
		<div class="container">
			<h1 class="page-title"><?php echo get_theme_mod('blog-page-title','News from Our Blog'); ?></h1>
		</div><!-- .container -->
	</div><!-- .page-header -->

<?php } ?>

<div class="container">

	<div id="primary" class="content-area <?php if(get_theme_mod('loop-style','choice-1') == 'choice-1') { echo "full-width"; } ?>">	
			
		<div id="main" class="site-main clear">

			<div id="recent-content" class="content-<?php if(get_theme_mod('loop-style','choice-1') == 'choice-1') { echo 'grid'; } else { echo 'loop'; } ?>">

				<?php

				if ( have_posts() ) :	
				
				$i = 1;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					if (get_theme_mod('loop-style','choice-1') == 'choice-1') {

						get_template_part('template-parts/content', 'grid');

					} else {

						get_template_part('template-parts/content', 'loop');

					}

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

	<?php if(get_theme_mod('loop-style','choice-1') == 'choice-2') : ?>

		<?php get_sidebar(); ?>

	<?php endif; ?>

</div><!-- .container -->

<?php get_footer(); ?>
