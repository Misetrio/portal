<?php //Template Name: HOME Page with Elemanter
get_header(); 
$wl_theme_options = weblizar_get_options();
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
	else :
		the_content();
endif;
get_footer();
?>
