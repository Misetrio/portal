<?php
/*
 * Template Name: All Posts
 *
 * The template for displaying all posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videocloud
 */

get_header(); ?>

	<?php
		get_template_part('template-parts/content', 'featured');
	?>
			
	<div id="primary" class="content-area <?php if(get_theme_mod('content-layout','choice-1') == 'choice-2') { echo "no-sidebar"; }?>">

		<div id="main" class="site-main clear">

			<div class="section-heading clear">
			
				<h1 class="section-title">
					<?php
						echo get_theme_mod('recent-heading', __('Recent videos', 'videocloud'));
					?>					
				</h1>

			</div><!-- .section-heading -->

			<div id="recent-content" class="content-loop clear">

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

					if ( have_posts() ) :

					$i = 1;

					while ($wp_query->have_posts()) : $wp_query->the_post();
					
						get_template_part('template-parts/content', 'loop');
					
						$i++;

					endwhile;

					else :

					get_template_part( 'template-parts/content', 'none' );
					
					endif;
					
				?>

			</div><!-- #recent-content -->
			
		</div><!-- #main -->
		<?php

			the_posts_pagination( array( 'prev_text' => _x( 'Previous', 'previous post', 'videocloud' ) ) );

		?>

		<?php $wp_query = null; $wp_query = $temp;?>

	</div><!-- #primary -->

<?php if(get_theme_mod('content-layout','choice-1') != 'choice-2') : ?>

<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>
