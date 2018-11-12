<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package course
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
<?php wp_head(); ?>

<?php
	// Theme Color
	$primary_color = '#4CAF50';
	$nav_bg_color = '#5f5f5f';
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
		font-family: "Open Sans", "Helvetica Neue", Helvetica, sans-serif;
	}
	.pagination .page-numbers,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.comment-form label,
	label,
	h1,h2,h3,h4,h5,h6 {
		font-family: "Open Sans", "Helvetica Neue", Helvetica, sans-serif;
	}
	a,
	a:visited,
	a:hover,
	.site-title a:hover,
	.sf-menu ul li li a:hover,
	#primary-menu li li a:hover,
	#primary-menu li li.current-menu-item a:hover,	
	.comment-reply-title small a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	.content-grid .entry-category a,
	.entry-title a:hover,
	.sidebar .widget li a:hover,
	.site-footer .widget li a:hover,
	.section-title a:hover,
	.footer-nav li a:hover,
	#site-bottom .site-info a:hover,
	.entry-related .entry-title a:hover {
		color: <?php echo $primary_color; ?>;
	}
	.sf-menu li.current-menu-item a,
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
	.section-heading .section-more a,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.flex-direction-nav a:hover,
	.entry-tags .tag-links a:hover,
	.widget_tag_cloud .tagcloud a:hover,
	.recent-nav .nav-right a,
	.content-grid .entry-more a:hover {
		background-color: <?php echo $primary_color; ?>;
	}
	#secondary .widget .widget-title,
	.entry-tags .tag-links a:hover:after,
	.widget_tag_cloud .tagcloud a:hover:after {
		border-left-color: <?php echo $primary_color; ?>;
	}	
	.flex-control-paging li a:hover,
	.flex-control-paging li a.flex-active {
		background-color: #ffbe02;
	}
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current {
		border-bottom-color: <?php echo $primary_color; ?>;
	}
	#primary-menu li:hover,
	.entry-tags .tag-links a:hover,
	.widget_tag_cloud .tagcloud a:hover {
		border-color: <?php echo $primary_color; ?>;
	}
	#primary-bar {
		background-color: <?php echo $nav_bg_color; ?>;
	}
</style>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<header id="masthead" class="site-header no-header-social clear">

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
					</div><!-- .site-title -->

					<?php } ?>

				</div><!-- .site-branding -->

				<?php if ( get_theme_mod('header-search-on', true) ) : ?>
					<span class="search-icon">
						<span class="genericon genericon-search"></span>
						<span class="genericon genericon-close"></span>			
					</span>
					<div class="header-search">
						<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="search" name="s" class="search-input" placeholder="<?php esc_html_e('Search', 'course'); ?>" autocomplete="off">
							<button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>		
						</form>
					</div><!-- .header-search -->

				<?php endif; ?>								

			</div><!-- .container -->

		</div><!-- .site-start -->

		<div id="primary-bar" class="light-text clear">

			<div class="container">

			<nav id="primary-nav" class="primary-navigation">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for: Primary Menu', 'course'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->	

			<span class="sidebar-2-button">
				<span class="genericon genericon-menu"></span>
				<span class="genericon genericon-close"></span>	
			</span>

			<div id="slick-mobile-menu"></div>

			</div><!-- .container -->				

		</div><!-- #primary-bar -->			

	</header><!-- #masthead -->

	<div id="content" class="site-content container clear">
