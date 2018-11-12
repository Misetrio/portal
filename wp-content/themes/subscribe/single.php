<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package subscribe
 */

get_header(); 

if ( function_exists( 'subscribe_set_post_views' ) ) :
	subscribe_set_post_views(get_the_ID());
endif;
?>

<?php if(get_theme_mod('single-breadcrumbs-on', true) == true) { ?>
<div class="breadcrumbs">
	<span class="breadcrumbs-nav">
		<a href="<?php echo home_url(); ?>"><?php esc_html_e('Home', 'subscribe'); ?></a>
		<span class="post-category"><?php subscribe_first_category(); ?></span>
		<span class="post-title"><?php the_title(); ?></span>
	</span>
</div>
<?php 
	} else {
?>
<div class="single-space"></div>
<?php
	}
?>
	
<div class="container">

	<div id="primary" class="content-area">

		<div id="main" class="site-main" >

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

		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- .container -->

<?php get_footer(); ?>
