<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package improve
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
  	$primary_font = 'Open Sans';
  	$secondary_font = 'Open Sans';
	$primary_color = '#ce181e';
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
	a:hover,
	.site-header .search-icon:hover span,
	#primary-menu li a:hover,
	#primary-menu li.sfHover a,	
	#primary-menu li.sfHover li a,
	#secondary-menu li.sfHover li a,	
	.sf-menu li a:hover,
	.sf-menu li li a:hover,
	.sf-menu li.sfHover a,
	.sf-menu li.current-menu-item a,
	.sf-menu li.current-menu-item a:hover,
	.section-header span,
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
	.sidebar .widget .widget-title,
	#site-bottom a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	.widget_tag_cloud .tagcloud a:hover:before,
	.entry-tags .tag-links a:hover:before,
	.content-loop .entry-title a:hover,
	.content-list .entry-title a:hover,
	.content-grid .entry-title a:hover,
	article.hentry .edit-link a:hover,
	.site-footer .widget ul li a:hover,
	.comment-content a:hover,
	.pagination .page-numbers.current,
	.entry-tags .tag-links a:hover,
	.coupon-more a,
	.coupon-form a,
	.breadcrumbs h1 span,
	.section-header h3,
	.sorter a.current {
		color: <?php echo $primary_color; ?>;
	}
	#primary-menu li li a:hover,
	#secondary-menu li li a:hover,
	#primary-menu li li.current-menu-item a:hover,
	#secondary-menu li li.current-menu-item a:hover,	
	.widget_tag_cloud .tagcloud a:hover,
	.coupon-nav ul li.current a {
		color: <?php echo $primary_color; ?> !important;
	}
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	#back-top a:hover span,
	.sidebar .widget ul li:hover:before,
	.pagination .next,
	.read-more a,
	.more-link a {
		background-color: <?php echo $primary_color; ?>;
	}
	.pagination .next:after {
		border-left-color: <?php echo $primary_color; ?>;
	}
	.coupon-form .code-box button:before {
		border-right-color: <?php echo $primary_color; ?>;		
	}

	#primary-nav li ul,
	.coupon-area .coupon-code {
		border-color: <?php echo $primary_color; ?>;
	}
	.entry-category a {
		color: #47c2a5 !important;	
	}

</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div id="primary-bar">

			<div class="container">
			
			<nav id="primary-nav" class="primary-navigation">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'improve'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->

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

			</div><!-- .container -->

		</div><!-- #primary-bar -->

		<div class="site-start container">

			<div class="site-branding">

				<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
				
				<div id="logo">
					<span class="helper"></span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png'); ?>" alt=""/>
					</a>
				</div><!-- #logo -->

				<?php } else { ?>

				<h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				<div class="site-desc">
					<?php bloginfo('description'); ?>
				</div><!-- .site-desc -->

				<?php } ?>

			</div><!-- .site-branding -->						

			<?php dynamic_sidebar( 'header-ad' ); ?>	

		</div><!-- .site-start .container -->

		<div id="secondary-bar" class="container">
			
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

			<nav id="secondary-nav" class="secondary-navigation">

				<?php 
					if ( has_nav_menu( 'secondary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="secondary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Secondary Menu', 'improve'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #secondary-nav -->

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>

			<div class="header-search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" class="search-input" placeholder="Search for..." autocomplete="off">
					<button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>		
				</form>
			</div><!-- .header-search -->	
					
			<?php endif; ?>			

		</div><!-- #secondary-bar -->

		<span class="mobile-menu-icon">
			<span class="menu-icon-open"><?php echo __('Menu', 'improve'); ?></span>
			<span class="menu-icon-close"><span class="genericon genericon-close"></span></span>		
		</span>	

		<?php if ( get_theme_mod('header-search-on', true) ) : ?>
			
			<span class="search-icon">
				<span class="genericon genericon-search"></span>
				<span class="genericon genericon-close"></span>			
			</span>

			<div class="mobile-search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" class="search-input" placeholder="Search for..." autocomplete="off">
					<button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>		
				</form>
			</div><!-- .header-search -->					

		<?php endif; ?>

		<div class="mobile-menu clear">

			<div class="container">

			<?php 

				if ( has_nav_menu( 'primary' ) ) {

					echo '<div class="menu-left">';
					echo '<h3>' . get_theme_mod('primary-nav-heading', __('Pages', 'improve')) . '</h3>';

					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

				if ( has_nav_menu( 'secondary' ) ) {

					echo '<div class="menu-right">';
					echo '<h3>' . get_theme_mod('secondary-nav-heading', __('Categories', 'improve')) . '</h3>';

					wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

			?>

			</div><!-- .container -->

		</div><!-- .mobile-menu -->					

	</header><!-- #masthead -->	

<div id="content" class="site-content container clear">