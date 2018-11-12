<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package subscribe
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
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet">
<?php wp_head(); ?>
<?php
	// Theme Color
	$primary_color = '#037ef3';
	$secondary_color = '#2c9f45';
	$footer_bg_color = '#002838';
?>
<style type="text/css" media="all">
	body {
		font-size: <?php echo get_theme_mod('body-font-size', '17').'px'; ?>;
	}
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
		font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
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
		font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	a,
	a:visited,
	a:hover,
	.site-title a:hover,
	.entry-title a:hover,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.entry-content a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.sidebar .widget ul li a:hover,
	#back-top a span,
	.more-button,
	.roll-project .project-title a:hover,
	.content-loop .entry-title a:hover,
	.content-grid .entry-title a:hover,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.sidebar .widget_tag_cloud .tagcloud a:hover,
	.site-footer .widget_tag_cloud .tagcloud a:hover,
	.entry-tags .tag-links a:hover,
	.content-loop .read-more a:hover,
	.content-loop .entry-comment a:hover {
		color: <?php echo $primary_color; ?>;
	}
	a.roll-button,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.cart-amount,
	.panel-widget-style[data-title_alignment="center"] .widget-title:after,
	.panel-grid-cell .widget-title:after,
	.roll-progress .progress-animate,
	.page-header,
	.sidebar .widget ul li:before,
	.widget_newsletter input[type="submit"],
	.widget_newsletter input[type="button"],
	.widget_newsletter button,
	.breadcrumbs,
	.loader:before {
		background-color: <?php echo $primary_color; ?>;
	}
	.sf-menu li a:before,
	#back-top a span,
	.more-button,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.sidebar .widget_tag_cloud .tagcloud a:hover,
	.site-footer .widget_tag_cloud .tagcloud a:hover,
	.entry-tags .tag-links a:hover {
		border-color: <?php echo $primary_color; ?>;
	}
	.cart-data .count,
	.cart-data .count:after,
	#back-top a:hover span,
	.project-filter li a.active,
	.project-filter li a:hover {
		border-color: <?php echo $secondary_color; ?>;
	}
	.sf-menu li li a:hover,	
	.site-header .search-icon:hover span,	
	.cart-data .count,
	#back-top a:hover span,
	.project-filter li a.active,
	.project-filter li a:hover,
	.plan-item.featured-plan,
	.post-type-archive-services .service .fa,
	.subscribe_services_widget .service .fa,	
	.subscribe_services_b_widget .service .fa {
		color: <?php echo $secondary_color; ?>;
	}

	.sf-menu li a:hover:before,
	.sf-menu li.sfHover a:before,
	.header-cart:hover .cart-data .count,
	.header-cart .widget_shopping_cart p.buttons a.wc-forward:not(.checkout),
	.newsletter-widget input[type="button"],
	.newsletter-widget input[type="submit"],
	.newsletter-widget button,
	.plan-item.featured-plan .button,
	.header-search .search-submit,
	.loader:after {
		background-color: <?php echo $secondary_color; ?>;
	}
	.plan-item.featured-plan {
		box-shadow: 0 0 0 4px <?php echo $secondary_color; ?>;
	}
	.site-footer {
		background-color: <?php echo $footer_bg_color; ?>;	
	}	
</style>

</head>

<body <?php body_class(); ?>>

<?php if ( is_front_page() || subscribe_has_pagebuilder() ) { do_action('subscribe_before_site'); } //Hooked: subscribe_preloader() ?>

<div id="page" class="site">

	<header id="masthead" class="site-header <?php if ( get_theme_mod('header-search-on', true) != true ) { echo "no-header-search"; } ?> clear">

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

			<nav id="primary-nav" class="primary-navigation <?php if ( get_theme_mod('header-search-on', true) ) { echo 'has-search-icon'; } ?>">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'subscribe'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->

			<div id="slick-mobile-menu"></div>

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>
				
				<span class="search-icon">
					<span class="genericon genericon-search"></span>
					<span class="genericon genericon-close"></span>			
				</span>

				<div class="header-search">
					<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" class="search-input" placeholder="<?php esc_html_e('Search for...', 'subscribe'); ?>" autocomplete="off">
						<button type="submit" class="search-submit"><?php echo __('Search', 'subscribe'); ?></button>		
					</form>
				</div><!-- .header-search -->

			<?php endif; ?>						

		</div><!-- .container -->

	</header><!-- #masthead -->	

	<div id="content" class="site-content clear">
