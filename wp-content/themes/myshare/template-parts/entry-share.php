<span class="entry-share">

	<span class="share-icon"><?php esc_html_e('Share', 'myshare'); ?></span>

	<span class="share-box">

		<a class="twitter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode( esc_attr( get_the_title( get_the_ID() ) ) ); ?>&amp;url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-twitter-white.png'; ?>" alt="Twitter"></a>

		<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-facebook-white.png'; ?>" alt="Facebook"></a>

		<a class="google-plus" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-google-plus-white.png'; ?>" alt="Google+"></a>

		<a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;media=<?php echo urlencode( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-pinterest-white.png'; ?>" alt="Pinterest"></a>

	</span><!-- .share-box -->

</span><!-- .entry-share -->
