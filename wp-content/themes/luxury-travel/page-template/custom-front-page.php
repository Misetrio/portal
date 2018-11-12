<?php
/**
 * Template Name: Custom home page
 */

get_header(); ?>

<?php do_action('luxury_travel_slider_section'); ?>

<section id="our-products">
  <div class="container">
      <div class="text-center">
          <?php if( get_theme_mod('luxury_travel_maintitle') != ''){ ?>     
              <h3><?php echo esc_html(get_theme_mod('luxury_travel_maintitle',__('Trending In Our Store','luxury-travel'))); ?></h3>
          <?php }?>
      </div>
    <?php $pages = array();
    for ( $count = 0; $count <= 0; $count++ ) {
      $mod = absint( get_theme_mod( 'luxury_travel_page' . $count ));
      if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
      }
    }
    if( !empty($pages) ) :
      $args = array(
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $count = 0;
        while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="row box-image text-center">
                <?php the_content(); ?>
                <div class="clearfix"></div>
            </div>
        <?php $count++; endwhile; 
        wp_reset_postdata(); ?>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
    endif;?>
      <div class="clearfix"></div> 
  </div>
</section>
  
<?php do_action('luxury_travel_above_about_section'); ?>

<?php /*--About Us--*/?>
<section class="about">
  <div class="container">
    <div class="row">
      <?php
        $args = array( 'name' => esc_html( get_theme_mod('luxury_travel_about_setting','')));
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-md-8 col-sm-8">
              <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
              <p><?php the_excerpt(); ?></p>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="abt-image">
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              </div>
            </div>          
          <?php endwhile; 
          wp_reset_postdata();?>
          <?php else : ?>
             <div class="no-postfound"></div>
          <?php
      endif; ?>
    </div>
  </div>
</section>

<?php do_action('luxury_travel_after_about_section'); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>