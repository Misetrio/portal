<?php
/**
 * Template Name: Page with Left Sidebar
 */

get_header(); ?>

<?php do_action('luxury_travel_page_left_header'); ?>

<div class="container">
    <div class="main-wrap-box row">  
    	<div id="sidebar" class="col-md-4">
    		<?php dynamic_sidebar('sidebar-2'); ?>
    	</div>		 
    	<div class="col-md-8" id="wrapper" >
    		<?php while ( have_posts() ) : the_post(); ?>
            
                <h1><?php the_title();?></h1>
                <img src="<?php the_post_thumbnail_url(); ?>" width="100%">
                <?php the_content(); ?>

                <?php wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'luxury-travel' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'luxury-travel' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) ); 
                
                //If comments are open or we have at least one comment, load up the comment template
                	if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                ?>
            <?php endwhile; wp_reset_postdata();?>
        </div>
        <div class="clearfix"></div>    
    </div>
</div>

<?php do_action('luxury_travel_page_left_footer'); ?>

<?php get_footer(); ?>