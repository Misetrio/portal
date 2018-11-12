<?php

	global $wp_version;

	if ( $wp_version >= 4.1 ) :

		the_posts_pagination( array( 'prev_text' => __( '&laquo; Previous', 'revolution' ), 'next_text' => __( 'Next &raquo;', 'revolution' ) ) );
	
	endif;

?>