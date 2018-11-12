<a class="twitter" href="https://twitter.com/intent/tweet?text=<?php echo urlencode( esc_attr( get_the_title( get_the_ID() ) ) ); ?>&amp;url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-twitter.png" alt=""/></a>

<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-facebook.png" alt=""/></a>

<a class="google-plus" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-google-plus.png" alt=""/></a>

<a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;title=<?php echo urlencode( esc_attr( get_the_title( get_the_ID() ) ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-linkedin.png" alt=""/></a>

<a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;media=<?php echo urlencode( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-pinterest.png" alt=""/></a>

<a class="mail" href="mailto:?subject=<?php echo ( ( '[' . get_bloginfo( 'name' ) . '] ' . get_the_title( get_the_ID() ) ) ); ?>&amp;body=<?php echo esc_url( ( get_permalink( get_the_ID() ) ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-mail.png" alt=""/></a>	