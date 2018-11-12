<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myshare
 */


?>

<aside id="sidebar-2" class="widget-area sidebar-2">

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
			
<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>

	<?php dynamic_sidebar( 'sidebar-2' ); ?>

<?php } else { ?>

	<div class="widget">
		<p><?php echo __('Please put widgets to the <strong>Left Sidebar</strong>', 'myshare'); ?></p>
		<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('Okay, I\'m doing now &raquo;', 'myshare'); ?></a></p>
	</div>

<?php } ?>

</aside><!-- .sidebar-2 -->

