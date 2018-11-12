<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myshare
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
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,400i,700" rel="stylesheet"> 
<?php wp_head(); ?>

<?php
	$primary_font = 'Droid Sans';
	$secondary_font = 'Droid Sans';
	$primary_color = '#4267b2';
	$secondary_color ='#4267b2';	

?>
<style type="text/css" media="all">
	body,
	.breadcrumbs h1,
	.breadcrumbs h2,
	.breadcrumbs h3,
	label,
	input,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="search"],
	input[type="password"],
	textarea,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	table,
	.sidebar .widget_ad .widget-title,
	.site-footer .widget_ad .widget-title {
		font-family: "<?php echo $primary_font; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
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
	.entry-meta a,
	.edit-link a,
	.author-box .author-name span a,
	.comment-reply-title small a:hover,
	.sidebar-2 .widget ul li a:hover,
	.sidebar .widget ul li a:hover,
	.site-footer .widget ul li a:hover,
	.mobile-menu ul li a:hover,
	.entry-tags .tag-links a:hover:before,
	.widget_tag_cloud .tagcloud a:hover:before,
	.entry-content a,
	.entry-content a:visited,
	.page-content a,
	.page-content a:visited,
	.widget a:visited,
	.entry-related .hentry .entry-title a:hover {
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
	.sidebar-2 .widget-title {
		background-color: <?php echo $primary_color; ?>;
	}
	.small-logo a {
		color: <?php echo $secondary_color; ?>;
	}
	#primary-bar {
		background-color: <?php echo $secondary_color; ?>;
	}
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	#secondary-menu li.current-menu-item a,
	#secondary-menu li.current-menu-item a:hover {
		border-bottom-color: <?php echo $primary_color; ?>;

	}
	@media only screen and (max-width: 959px) {
		.site-header {
			background-color: <?php echo $secondary_color; ?>;
		}
	}
</style>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<header id="masthead" class="site-header">

		<div id="primary-bar">

			<div class="container">

			<div class="small-logo">
				<a href="<?php echo home_url(); ?>">
					<?php if ( get_theme_mod('small-logo', '') != null ): ?>
					<span class="helper"></span>
					<img src="<?php echo esc_url( get_theme_mod('small-logo', '') ); ?>" alt="<?php bloginfo('name'); ?>" />
					<?php else: ?>
					<span class="text-logo"><?php $str = get_bloginfo('name'); echo mb_substr($str, 0, 1); ?></span>
					<?php endif; ?>
				</a>
			</div><!-- .small-logo -->

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>

				<div class="header-search">
					<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" class="search-input" placeholder="<?php esc_html_e('Search...', 'myshare'); ?>" autocomplete="off">
						<button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>		
					</form>
				</div><!-- .header-search -->

			<?php endif; ?>

			<nav id="primary-nav" class="main-navigation">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for: Primary Menu', 'myshare'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->	

			</div><!-- .container -->

			<span class="mobile-menu-icon">
				<span class="menu-icon-open"><?php echo __('Menu', 'myshare'); ?></span>
				<span class="menu-icon-close"><span class="genericon genericon-close"></span></span>		
			</span>				

		</div><!-- #primary-bar -->	

		<div id="secondary-bar" class="clear">

			<div class="container">

			<nav id="secondary-nav" class="secondary-navigation">

				<?php 
					if ( has_nav_menu( 'secondary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="secondary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for: Secondary Menu', 'myshare'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #secondary-nav -->

			</div><!-- .container -->				

		</div><!-- .secondary-bar -->

		<div class="mobile-menu clear">

			<div class="container">

			<?php 

				if ( has_nav_menu( 'primary' ) ) {

					echo '<div class="menu-left">';
					echo '<h3>' . get_theme_mod('primary-nav-heading', __('Pages', 'myshare')) . '</h3>';

					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

				if ( has_nav_menu( 'secondary' ) ) {

					echo '<div class="menu-right">';
					echo '<h3>' . get_theme_mod('secondary-nav-heading', __('Categories', 'myshare')) . '</h3>';

					wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

			?>

			</div><!-- .container -->

		</div><!-- .mobile-menu -->					

	</header><!-- #masthead -->

	<div id="content" class="site-content container clear">

	<?php 
		if( is_home() || is_archive() || is_search() ):
			get_template_part('sidebar', '2');
		endif; 
	?>
