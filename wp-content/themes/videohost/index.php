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

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
