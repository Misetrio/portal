<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package revolution
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
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<?php wp_head(); ?>
<?php
	$primary_font = 'Roboto';
	$primary_color = '#0091cd';

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
		font-family: "<?php echo $primary_font; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	.entry-category a,
	a:hover,
	.site-header .search-icon:hover span,
	.breadcrumbs .breadcrumbs-nav a:hover,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.entry-content a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.sidebar .widget ul li a:hover,
	.entry-related .entry-title a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	article.hentry .edit-link a:hover,
	.site-footer .widget ul li a:hover,
	.comment-content a:hover {
		color: <?php echo $primary_color; ?>;
	}
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"] {
		background-color: <?php echo $primary_color; ?>;
	}
</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header clear">

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
			</div><!-- .site-title -->

			<?php } ?>

		</div><!-- .site-branding -->

		<?php if ( get_theme_mod('header-social-on', 'true') == true ) : ?>

		<div class="header-social <?php if ( get_theme_mod('header-search-on', true) == false ) { echo "no-header-search";  } ?>">


			<?php if ( get_theme_mod('facebook-url', '') ) : ?>
				<a class="facebook" href="<?php echo esc_url( get_theme_mod('facebook-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/social-facebook.png'; ?>" alt="Facebook"></a>
			<?php endif; ?>

			<?php if ( get_theme_mod('twitter-url', '') ) : ?>
				<a class="twitter" href="<?php echo esc_url( get_theme_mod('twitter-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/social-twitter.png'; ?>" alt="Twitter"></a>
			<?php endif; ?>			

			<?php if ( get_theme_mod('google-plus-url', '') ) : ?>
				<a class="google-plus" href="<?php echo esc_url( get_theme_mod('google-plus-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/social-google-plus.png'; ?>" alt="Google+"></a>
			<?php endif; ?>

			<?php if ( get_theme_mod('instagram-url', '') ) : ?>
				<a class="linkedin" href="<?php echo esc_url( get_theme_mod('instagram-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/social-instagram.png'; ?>" alt="Instagram"></a>
			<?php endif; ?>

			<?php if ( get_theme_mod('youtube-url', '') ) : ?>
				<a class="youtube" href="<?php echo esc_url( get_theme_mod('youtube-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/social-youtube.png'; ?>" alt="YouTube"></a>
			<?php endif; ?>

			<?php if ( get_theme_mod('pinterest-url', '') ) : ?>
				<a class="pinterest" href="<?php echo esc_url( get_theme_mod('pinterest-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/social-pinterest.png'; ?>" alt="Pinterest"></a>
			<?php endif; ?>
			
			<?php if ( get_theme_mod('rss-url', '') ) : ?>
				<a class="rss" href="<?php echo esc_url( get_theme_mod('rss-url', '') ); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/social-rss.png'; ?>" alt="RSS"></a>
			<?php endif; ?>					

		</div>

		<?php endif; ?>	
		
		<div class="header-links">
			<a href="<?php echo get_theme_mod('header-link-url1', home_url().'/wp-admin/'); ?>"><?php echo get_theme_mod('header-link-text1', '<span class="genericon genericon-user"></span> Login'); ?></a>		
			<a href="<?php echo get_theme_mod('header-link-url2', home_url().'/contact/'); ?>"><?php echo get_theme_mod('header-link-text2', '<span class="genericon genericon-mail"></span> Contact'); ?></a>		
		</div>		

		<div id="slick-mobile-menu"></div>					

		</div><!-- .container -->

	</header><!-- #masthead -->	

	<div id="primary-bar" class="clear">

		<div class="container">

		<?php if ( get_theme_mod('sticky-nav-on', true) == true ) : ?>

		<div class="mobile-branding">

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
			</div><!-- .site-title -->

			<?php } ?>

		</div><!-- .mobile-branding -->

		<?php endif; ?>

		<nav id="primary-nav" class="primary-navigation">

			<?php 
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
				} else {
			?>

				<ul id="primary-menu" class="sf-menu">
					<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'revolution'); ?></a></li>
				</ul><!-- .sf-menu -->

			<?php } ?>

		</nav><!-- #primary-nav -->

		<?php if ( get_theme_mod('header-search-on', true) ) : ?>
			
			<span class="search-icon">
				<span class="genericon genericon-search"></span>
				<span class="genericon genericon-close"></span>			
			</span>

			<div class="header-search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" class="search-input" placeholder="<?php echo __('What are you looking for?', 'revolution'); ?>" autocomplete="off">
					<button type="submit" class="search-submit"><?php echo __('Search', 'revolution'); ?></button>		
				</form>
			</div><!-- .header-search -->

		<?php endif; ?>		
			
		</div><!-- .container -->

	</div><!-- #primary-bar -->

<div id="content" class="site-content container clear">
