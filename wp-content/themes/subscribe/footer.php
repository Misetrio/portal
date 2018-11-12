<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package subscribe
 */

?>

	</div><!-- #content .site-content -->
	
	<footer id="colophon" class="site-footer">

		<?php if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) && get_theme_mod('footer-widgets-on', true) ) { ?>

			<div class="footer-columns container clear">

				<div class="footer-column footer-column-1 ht_grid ht_grid_1_4">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>

				<div class="footer-column footer-column-2 ht_grid ht_grid_1_4">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>

				<div class="footer-column footer-column-3 ht_grid ht_grid_1_4">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>

				<div class="footer-column footer-column-4 ht_grid ht_grid_1_4">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>				

			</div><!-- .footer-columns -->

		<?php } ?>

		<div class="clear"></div>

		<div id="site-bottom" class="clear">

			<div class="container">

			<div class="site-info">

				<?php
					$theme_uri = 'https://www.happythemes.com/wordpress-themes/';
					$author_uri = 'https://www.happythemes.com/';
				?>

				&copy; <?php echo date("o"); ?> <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a> - <?php echo __('Theme by', 'subscribe'); ?> <a href="<?php echo $author_uri; ?>" target="_blank">HappyThemes</a>

			</div><!-- .site-info -->

			<?php 
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav' ) );
				}
			?>	

			</div><!-- .container -->

		</div>
		<!-- #site-bottom -->
							
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php if ( get_theme_mod('back-top-on', true) ) : ?>

	<div id="back-top">
		<a href="#top" title="<?php echo __('Back to top', 'subscribe'); ?>"><span class="genericon genericon-collapse"></span></a>
	</div>

<?php endif; ?>

<style type="text/css">
	.site-header {
		position: static;
	}
</style>

<?php wp_footer(); ?>

</body>
</html>
