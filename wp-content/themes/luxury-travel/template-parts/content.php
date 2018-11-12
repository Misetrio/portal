<?php
/**
 * The template part for displaying services
 * @package Luxury Travel
 * @subpackage luxury_travel
 * @since 1.0
 */
?>
<div class="blog-sec">
    <h3><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?></a></h3>
    <div class="post-info">
        <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
        <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
        <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','luxury-travel'), __('0 Comments','luxury-travel'), __('% Comments','luxury-travel') ); ?></span> 
    </div>
    <p><?php the_excerpt(); ?></p>
    <div class="blogbtn">
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read Full', 'luxury-travel' ); ?>"><?php esc_html_e('Read Full','luxury-travel'); ?></a>
    </div>
</div>