<?php get_header(); ?>
	
	<?php
		get_template_part('template-parts/content', 'featured');
	?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main clear">
			
			<div id="recent-content">
			
				<?php if ( is_active_sidebar( 'homepage' ) && (!get_query_var('paged')) ) { ?>

					<?php dynamic_sidebar( 'homepage' ); ?>

				<?php } ?>

				<?php if ( get_theme_mod('home-recent-on', 'true') == true ) { ?>

				<div class="section-heading">

					<?php
						$heading_url = get_theme_mod('all-posts-url', home_url().'/latest');
						$heading_text = get_theme_mod('recent-heading', __('Recent videos', 'videocloud'));
					?>

					<h3 class="section-title">
						<a href="<?php echo esc_url($heading_url); ?>"><?php echo $heading_text; ?></a>
					</h3>

					<div class="section-more">
						<a href="<?php echo esc_url($heading_url); ?>"><?php esc_html_e('More', 'videocloud'); ?></a>
					</div>

				</div><!-- .section-heading -->	

				<div class="content-loop">

					<?php

					$temp = $wp_query;
					$wp_query= null;
					$wp_query = new WP_Query( );
					$wp_query->query(
						array( 
							'post__not_in' => get_option( 'sticky_posts' ), 
							'paged' => $paged 
						)
					);

					if ( $wp_query->have_posts() ) :	
					
					$i = 1;

					/* Start the Loop */
					while ( $wp_query->have_posts() ) : $wp_query->the_post();

						get_template_part('template-parts/content', 'loop');

					endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; 

					?>

				</div><!-- .content-loop -->

				<?php } ?>

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

		<?php if ( get_theme_mod('home-recent-on', 'true') == true ) {
				
				get_template_part( 'template-parts/pagination', '' ); 
				
				$wp_query = null; $wp_query = $temp;

			}
		?>
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
