<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelers
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="dt-header">
	<?php if ( has_nav_menu( 'primary' ) ) :
        $class = '';
       
        ?>
		<nav class="dt-menu-wrap <?php echo esc_attr( $class ); ?>">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="dt-menu-md">
							<?php _e( 'Menu', 'travelers' ); ?>
							<span><i class="fa fa-bars"></i> </span>
						</div>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</div><!-- .col-lg-12 .col-md-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</nav><!-- .dt-sticky -->
		<?php
       
        ?>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="dt-logo">
					<?php
					if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) {
						the_custom_logo();
					}
					if (is_front_page() || is_home()) {
						echo '<h1 class="transition35 site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
					} else {
						echo '<p class="transition35 site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></p>';
                    }
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .dt-logo -->
			</div>
			<div class="col-lg-8 col-md-8">
				<?php if ( is_active_sidebar( 'dt-header-widget' ) ) : ?>
					<div class="dt-header-widget">
						<?php dynamic_sidebar( 'dt-header-widget' ); ?>
					</div><!-- .col-lg-3 .col-md-3 .col-sm-6 -->
				<?php endif; ?>
			</div>
		</div>
	</div>
</header><!-- .dt-header -->
<?php
?>
<?php if( ! is_front_page() ) : ?>
	<div class="dt-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php travelers_breadcrumb(); ?>
				</div><!-- .col-lg-12 -->
			</div><!-- .row-->
		</div><!-- .container-->
	</div><!-- .dt-breadcrumbs-->
<?php endif; ?>
