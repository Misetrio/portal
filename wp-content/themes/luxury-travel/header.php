<?php
/**
 * The Header for our theme.
 * @package Luxury Travel
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php /** slider section **/ ?>

<div class="slider-main">
  <?php
    // Get pages set in the customizer (if any)
    $pages = array();
    for ( $luxury_travel_count = 1; $luxury_travel_count <= 5; $luxury_travel_count++ ) {
      $mod = absint( get_theme_mod( 'luxury_travel_slidersettings-page-' . $luxury_travel_count ) );
      if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
      }
    }
    if( !empty($pages) ) :
      $args = array(
        'posts_per_page' => 5,
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $luxury_travel_count = 1;
        ?>
        <div id="slider" class="nivoSlider">
          <?php
            $luxury_travel_n = 0;
          while ( $query->have_posts() ) : $query->the_post();
              $luxury_travel_n++;
              $luxury_travel_slideno[] = $luxury_travel_n;
              $luxury_travel_slidetitle[] = esc_html(get_the_title());
              $luxury_travel_slidelink[] = esc_url( get_permalink() );
              ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $luxury_travel_n ); ?>" />
              <?php
            $luxury_travel_count++;
          endwhile;
          wp_reset_postdata();
          ?>
        </div>
        <?php
        $luxury_travel_k = 0;
          foreach( $luxury_travel_slideno as $luxury_travel_sln ){ ?>
            <div id="slidecaption<?php echo absint( $luxury_travel_sln ); ?>" class="nivo-html-caption">
              <div class="slide-cap  ">
                <div class="container">
                  <h2><?php echo esc_html( $luxury_travel_slidetitle[$luxury_travel_k] ); ?></h2>
                  <a class="read-more" href="<?php echo esc_url( $luxury_travel_slidelink[$luxury_travel_k] ); ?>"><?php esc_html_e( 'FIND OUT MORE','luxury-travel' ); ?><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <?php $luxury_travel_k++;
        }
      else : ?>
          <div class="header-no-slider"></div>
        <?php
      endif;
    else : ?>
        <div class="header-no-slider"></div>
    <?php
    endif; 
  ?>
</div>

<div class="social-media">  
  <?php if( get_theme_mod( 'luxury_travel_facebook_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
  <?php } ?>
  <?php if( get_theme_mod( 'luxury_travel_twitter_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
  <?php } ?>
  <?php if( get_theme_mod( 'luxury_travel_insta_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_insta_url','' ) ); ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a>    
  <?php } ?>
  <?php if( get_theme_mod( 'luxury_travel_youtube_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
  <?php } ?>
  <?php if( get_theme_mod( 'luxury_travel_pintrest_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_pintrest_url','' ) ); ?>"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
  <?php } ?>
</div>

<div id="header">
  <div class="menu-sec">
    <div class="container">
      <div class="row">
        <div class="logo col-md-3 col-sm-3 wow bounceInDown">
            <?php if( has_custom_logo() ){ luxury_travel_the_custom_logo();
             }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p>       
            <?php endif; }?>
        </div>
        <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','luxury-travel'); ?></a></div>
        <div class="menubox col-md-7 col-sm-7">
          <div class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>
        <div class="top-contact col-md-2 col-sm-2">
          <?php if( get_theme_mod( 'luxury_travel_call','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_call','' ) ); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
          <?php } ?>     
          <?php if( get_theme_mod( 'luxury_travel_mail','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_mail','' ) ); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
   