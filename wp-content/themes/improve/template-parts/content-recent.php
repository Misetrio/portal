<div id="recent-content" class="content-loop">

	<?php

	if ( have_posts() ) :	
	
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		get_template_part('template-parts/content', 'loop');

	endwhile;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; 

	?>

</div><!-- #recent-content -->	

<?php get_template_part('template-parts/pagination', ''); ?>