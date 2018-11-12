<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package makemoney
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if (get_theme_mod('favicon', '') != null) { ?>
<link rel="icon" type="image/png" href="<?php echo esc_url( get_theme_mod('favicon', '') ); ?>" />
<?php } ?>
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400i,700,700i" rel="stylesheet">
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div id="top-bar" class="clear">

			<div class="container">

			<nav id="primary-nav" class="main-navigation">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('<span class="step">Step 1.</span> Add menu for location: Primary Menu', 'makemoney'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->

			<?php if ( get_theme_mod('header-social-on', 'true') == true ) : ?>

			<span class="header-social">

				<?php if ( get_theme_mod('twitter-url', '') ) : ?>
					<a class="twitter" href="<?php echo esc_url( get_theme_mod('twitter-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-twitter-white.png'; ?>" alt="Twitter"></a>
				<?php endif; ?>

				<?php if ( get_theme_mod('facebook-url', '') ) : ?>
					<a class="facebook" href="<?php echo esc_url( get_theme_mod('facebook-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-facebook-white.png'; ?>" alt="Facebook"></a>
				<?php endif; ?>

				<?php if ( get_theme_mod('google-plus-url', '') ) : ?>
					<a class="google-plus" href="<?php echo esc_url( get_theme_mod('google-plus-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-google-plus-white.png'; ?>" alt="Google+"></a>
				<?php endif; ?>
				
				<?php if ( get_theme_mod('youtube-url', '') ) : ?>
					<a class="youtube" href="<?php echo esc_url( get_theme_mod('youtube-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-youtube-white.png'; ?>" alt="YouTube"></a>
				<?php endif; ?>

				<?php if ( get_theme_mod('linkedin-url', '') ) : ?>
					<a class="linkedin" href="<?php echo esc_url( get_theme_mod('linkedin-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-linkedin-white.png'; ?>" alt="LinkedIn"></a>
				<?php endif; ?>

				<?php if ( get_theme_mod('pinterest-url', '') ) : ?>
					<a class="pinterest" href="<?php echo esc_url( get_theme_mod('pinterest-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-pinterest-white.png'; ?>" alt="Pinterest"></a>
				<?php endif; ?>
				
				<?php if ( get_theme_mod('rss-url', '') ) : ?>
					<a class="rss" href="<?php echo esc_url( get_theme_mod('rss-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/icon-rss-white.png'; ?>" alt="RSS"></a>
				<?php endif; ?>					

			</span>

			<?php endif; ?>

			</div><!-- .container -->

		</div><!-- .top-bar -->

		<div class="site-start container clear">

			<div class="site-branding">

				<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
				
				<div id="logo">
					<span class="helper"></span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png'); ?>" alt=""/>
					</a>
				</div><!-- #logo -->

				<?php } else { ?>

				<div class="site-title">
					<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				</div><!-- .site-title -->

				<?php } ?>

			</div><!-- .site-branding -->
		
			<?php dynamic_sidebar( 'header-ad' ); ?>	

			<span class="mobile-menu-icon">
				<span class="menu-icon-open"><?php echo __('Menu', 'makemoney'); ?></span>
				<span class="menu-icon-close"><span class="genericon genericon-close"></span></span>		
			</span>		

		</div><!-- .site-start -->

		<div id="secondary-bar" class="container clear">

			<nav id="secondary-nav" class="secondary-navigation">

				<?php 
					if ( has_nav_menu( 'secondary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="secondary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('<span class="step">Step 2.</span> Add menu for location: Secondary Menu', 'makemoney'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #secondary-nav -->

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>
				
				<span class="search-icon">
					<span class="genericon genericon-search"></span>
					<span class="genericon genericon-close"></span>			
				</span>

			<?php endif; ?>	

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>

				<div class="header-search">
					<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" class="search-input" placeholder="Search for..." autocomplete="off">
						<button type="submit" class="search-submit"><?php echo __('Search', 'makemoney'); ?></button>		
					</form>
				</div><!-- .header-search -->

			<?php endif; ?>					

		</div><!-- .secondary-bar -->

		<div class="mobile-menu clear">

			<div class="container">

			<?php 

				if ( has_nav_menu( 'primary' ) ) {

					echo '<div class="menu-left">';
					echo '<h3>' . get_theme_mod('primary-nav-heading', __('Pages', 'makemoney')) . '</h3>';

					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

				if ( has_nav_menu( 'secondary' ) ) {

					echo '<div class="menu-right">';
					echo '<h3>' . get_theme_mod('secondary-nav-heading', __('Categories', 'makemoney')) . '</h3>';

					wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

			?>

			</div><!-- .container -->

		</div><!-- .mobile-menu -->				

	</header><!-- #masthead -->

	<div id="content" class="site-content container clear">
