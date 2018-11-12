<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package videonow
 */

?>

	</div><!-- #content .site-content -->
	
	<footer id="colophon" class="site-footer clear">

		<?php if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) && get_theme_mod('footer-widgets-on', true) ) { ?>

			<div class="footer-columns clear">

				<div class="container clear">

					<div class="footer-column footer-column-1">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>

					<div class="footer-column footer-column-2">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>

					<div class="footer-column footer-column-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>

					<div class="footer-column footer-column-4">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>												

				</div><!-- .container -->

			</div><!-- .footer-columns -->

		<?php } ?>

		<?php if ( ( !is_active_sidebar( 'footer-1' ) && !is_active_sidebar( 'footer-2' ) && !is_active_sidebar( 'footer-3' ) &&  !is_active_sidebar( 'footer-4' ) ) && get_theme_mod('footer-widgets-on', true) ) { ?>
			<div class="footer-columns clear">

				<div class="container clear">

					<div class="widget sidebar-notice">
						<p><?php echo __('There is no footer widgets', 'videonow'); ?></p>
						<p><?php echo __('Please put some widgets to the <strong>Footer Column 1/2/3/4</strong>', 'videonow'); ?> (<a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-footer-widgets.png" target="_blank">how to</a>)</p>
						<div class="btn">
							<a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('Okay, I\'m doing now', 'videonow'); ?></a>
						</div>
					</div><!-- .widget .sidebar-notice -->

				</div><!-- .container -->

			</div><!-- .footer-columns -->			

		<?php } ?>

		<div id="site-bottom">

			<div class="container clear">

				<div class="site-info">

					<?php
						$theme_uri = 'https://www.happythemes.com/wordpress-themes/videonow/';
						$author_uri = 'https://www.happythemes.com/';
					?>

					&copy; <?php echo date("o"); ?> - <a href="<?php echo $theme_uri; ?>">VideoNow Theme</a> by <a href="<?php echo $author_uri; ?>" target="_blank">HappyThemes</a>

				</div><!-- .site-info -->

				<div class="footer-nav">
					<?php 
						if ( has_nav_menu( 'footer' ) ) {
							wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-menu' ) ); 
						} else {
					?>
					
						<ul class="footer-menu">
							<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for theme location: Footer Menu', 'videonow'); ?></a></li>
						</ul>

					<?php } ?>					
				</div><!-- .footer-nav -->

			</div><!-- .container -->	

		</div>
		<!-- #site-bottom -->
							
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
