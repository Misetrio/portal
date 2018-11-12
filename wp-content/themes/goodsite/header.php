<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package goodsite
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
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

<?php wp_head(); ?>

<?php

	$primary_font = 'Raleway';
	$secondary_font = 'Source Sans Pro';
	$primary_color = '#ff4422';
	$secondary_color = '#222';	

?>
<style type="text/css" media="all">
	body,
	input,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="search"],
	input[type="password"],
	textarea,
	table,
	.sidebar .widget_ad .widget-title,
	.site-footer .widget_ad .widget-title {
		font-family: "<?php echo $primary_font; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	#secondary-menu li a,
	.footer-nav li a,
	.pagination .page-numbers,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.comment-form label,
	label,
	h1,h2,h3,h4,h5,h6 {
		font-family: "<?php echo $secondary_font; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	a,
	a:hover,
	a:visited,
	.site-title a:hover,
	.sf-menu ul li li a:hover,
	.sf-menu li.sfHover li a:hover,
	#primary-menu li li a:hover,	
	#primary-menu li li.current-menu-item a:hover,	
	#secondary-menu li li a:hover,
	#secondary-menu li li.current-menu-item a:hover,	
	.search-icon:hover span,
	.breadcrumbs h1,
	.content-loop .entry-title a:hover,
	.content-list .entry-title a:hover,
	.content-search .entry-title a:hover,	
	.entry-like a.liked:before,
	h1.entry-title,
	.entry-related h3,	
	.comments-title,
	.comment-reply-title,
	.comment-reply-title small a:hover,
	.sidebar .widget-title,
	.sidebar .widget ul li a:hover,
	.site-footer .widget ul li a:hover,
	.mobile-menu ul li a:hover,
	.entry-tags .tag-links a:hover:before,
	.widget_tag_cloud .tagcloud a:hover:before,
	.entry-related .hentry .entry-title a:hover,
	#recent-content .section-title,
	.content-block-4 .hentry .entry-title a:hover,
	.post-list:before,
	.sidebar .widget ul li:before {
		color: <?php echo $primary_color; ?>;
	}
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	button:hover,
	.btn:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="button"]:hover,
	#back-top a:hover span,
	.post-list:before,
	.sidebar .widget ul li:before {
		background-color: <?php echo $primary_color; ?>;
	}
	#primary-bar {
		background-color: <?php echo $secondary_color; ?>;
	}
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	#secondary-menu li a:hover:before,
	#secondary-menu li.sfHover a:before,
	#secondary-menu li.current-menu-item a:before,
	#secondary-menu li.current-menu-item a:hover:before,
	.page-content a,
	.entry-content a {
		border-bottom-color: <?php echo $primary_color; ?>;

	}
</style>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div id="primary-bar">

			<div class="container">

			<nav id="primary-nav" class="main-navigation">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for: Primary Menu', 'goodsite'); ?></a></li>
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

		</div><!-- #primary-bar -->	

		<div class="site-start">

			<div class="container">

				<div class="site-branding">

					<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
					
					<div class="logo">
						<span class="helper"></span>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png'); ?>" alt=""/>
						</a>
					</div><!-- .logo -->

					<?php } else { ?>

					<div class="site-title">
						<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
						<div class="site-desc"><?php bloginfo('description'); ?></div>
					</div><!-- .site-title -->

					<?php } ?>

				</div><!-- .site-branding -->

				<?php dynamic_sidebar( 'header-ad' ); ?>				

			</div><!-- .container -->

		</div><!-- .site-start -->

		<div id="secondary-bar" class="clear">

			<div class="container">

				<div class="site-branding">

					<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
					
					<div class="logo">
						<span class="helper"></span>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png'); ?>" alt=""/>
						</a>
					</div><!-- .logo -->

					<?php } else { ?>

					<div class="site-title">
						<h3><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h3>
					</div><!-- .site-title -->

					<?php } ?>

				</div><!-- .site-branding -->

			<nav id="secondary-nav" class="secondary-navigation">

				<?php 
					if ( has_nav_menu( 'secondary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="secondary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for: Secondary Menu', 'goodsite'); ?></a></li>
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
						<button type="submit" class="search-submit"><?php echo __('Search', 'goodsite'); ?></button>		
					</form>
				</div><!-- .header-search -->

			<?php endif; ?>					

			</div><!-- .container -->				

		</div><!-- .secondary-bar -->

		<span class="mobile-menu-icon">
			<span class="menu-icon-open"><?php echo __('Menu', 'goodsite'); ?></span>
			<span class="menu-icon-close"><span class="genericon genericon-close"></span></span>		
		</span>				

		<div class="mobile-menu clear">

			<div class="container">

			<?php 

				if ( has_nav_menu( 'primary' ) ) {

					echo '<div class="menu-left">';
					echo '<h3>' . get_theme_mod('primary-nav-heading', __('Pages', 'goodsite')) . '</h3>';

					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

				if ( has_nav_menu( 'secondary' ) ) {

					echo '<div class="menu-right">';
					echo '<h3>' . get_theme_mod('secondary-nav-heading', __('Categories', 'goodsite')) . '</h3>';

					wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

			?>

			</div><!-- .container -->

		</div><!-- .mobile-menu -->					

	</header><!-- #masthead -->

	<div id="content" class="site-content container clear">
