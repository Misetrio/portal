<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newsblock
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
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700" rel="stylesheet">

<?php wp_head(); ?>

<?php 
	$primary_font = 'Open Sans';
	$secondary_font = 'Roboto Condensed';
	$theme_color = '#567ebb';
	$body_font_size = '16px';
?>

<style type="text/css" media="all">
	h1,h2,h3,h4,h5,h6,
	.sf-menu li a,
	.pagination .page-numbers,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"] {
		font-family: <?php echo $secondary_font; ?>, "Helvetica Neue", Helvetica, Arial, sans-serif;;
	}
	body,
	input,
	textarea,
	table,
	.sidebar .widget_ad .widget-title,
	.site-footer .widget_ad .widget-title,
	.content-loop .content-ad .widget-title {
		font-family: <?php echo $primary_font; ?>, "Helvetica Neue", Helvetica, Arial, sans-serif;;
	}
	#primary-bar,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.pagination .page-numbers:hover,
	.widget_newsletter,
	.header-search .search-submit {
		background-color: <?php echo $theme_color; ?>;
	}
	
	a:hover,
	.sf-menu li li a:hover,
	.setup-notice p a,
	.pagination .page-numbers.current,
	.entry-related h3 span,
	.entry-tags .edit-link a,
	.author-box .author-meta .author-name a,
	.author-box .author-meta .author-name a:hover,
	.author-box .author-meta .author-desc a,
	.page-content a,
	.entry-content a,
	.page-content a:visited,
	.entry-content a:visited,	
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.sidebar .widget a:hover,
	.sidebar ul li a:hover,
	.read-more a {
		color: <?php echo $theme_color; ?>;
	}
</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div class="site-start clear">

			<div class="container">
			
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

			<div id="slick-mobile-menu"></div>

			</div><!-- .container -->

		</div><!-- .site-start -->

		<div id="primary-bar" class="clear">

			<div class="container">

			<nav id="primary-nav" class="primary-navigation">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'newsblock'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->

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
						<button type="submit" class="search-submit"><?php echo __('Search', 'newsblock'); ?></button>		
					</form>
				</div><!-- .header-search -->

			<?php endif; ?>					

			</div><!-- .container -->

		</div><!-- #primary-bar -->		

	</header><!-- #masthead -->

	<div id="content" class="site-content container clear">
