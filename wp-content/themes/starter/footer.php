<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

?>

	</div><!-- #content .site-content -->
	
	<footer id="colophon" class="site-footer">

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

					<div class="widget setup-notice">
						<p><?php echo __('<span class="step">Step 2.</span> Add footer widgets', 'starter'); ?></p>
						<p><?php echo __('Place widgets to the <strong>Footer Column 1/2/3/4</strong>', 'starter'); ?> (<a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-footer-widgets.png" target="_blank">how to</a>)</p>
						<p>
							<a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('Okay, I\'m doing now &raquo;', 'starter'); ?></a>
						</p>
					</div><!-- .widget .setup-notice -->

				</div><!-- .container -->

			</div><!-- .footer-columns -->			

		<?php } ?>

		<div class="clear"></div>

		<div id="site-bottom" class="container clear">

			<div class="site-info">

				<?php 
					$theme_uri = 'https://www.happythemes.com/wordpress-themes/';
					$author_uri = 'https://www.happythemes.com/';
				?>

				&copy; <?php echo date("o"); ?> <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a> - <?php echo __('Theme by', 'starter'); ?> <a href="<?php echo $author_uri; ?>" target="_blank">HappyThemes</a>

			</div><!-- .site-info -->

			<?php 
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav' ) );
				} else {
			?>

				<ul class="footer-nav">
					<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('<span class="step">Step 3.</span> Add menu for theme location: Footer Menu', 'starter'); ?></a></li>
				</ul><!-- .sf-menu -->

			<?php } ?>				

		</div>
		<!-- #site-bottom -->
							
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
