<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package course
 */

get_header(); 

if ( function_exists( 'course_set_post_views' ) ) :
	course_set_post_views(get_the_ID());
endif;
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" >

			<?php
				get_template_part('sidebar', '2');
			?>
			
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				// the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
