<?php

	global $wp_version;

	if ( $wp_version >= 4.1 ) :

		the_posts_pagination( array( 'prev_text' => __( 'Previous', 'improve' ), 'next_text' => __( 'Next', 'improve' ) ) );
	
	endif;

?>