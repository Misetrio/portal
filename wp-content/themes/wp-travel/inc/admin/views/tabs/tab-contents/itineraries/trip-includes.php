<?php
	global $post;
	$trip_include = get_post_meta( $post->ID, 'wp_travel_trip_include', true );
	$trip_exclude = get_post_meta( $post->ID, 'wp_travel_trip_exclude', true );
?>
<table class="form-table">	
	<tr>
		<td><h4><label for="wp_travel_trip_include"><?php esc_html_e( 'Trip Includes', 'wp-travel' ); ?></label></h4><?php wp_editor( $trip_include, 'wp_travel_trip_include' ); ?></td>
	</tr>
	<tr>
		<td><h4><label for="wp_travel_trip_exclude"><?php esc_html_e( 'Trip Excludes', 'wp-travel' ); ?></label></h4><?php wp_editor( $trip_exclude, 'wp_travel_trip_exclude' ); ?></td>
	</tr>	
</table>
