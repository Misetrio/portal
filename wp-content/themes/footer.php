<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package course
 */

?>

	</div><!-- #content .site-content -->
	
	<footer id="colophon" class="site-footer container">

		<?php 
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav' ) );
			}
		?>		

		<?php if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) && get_theme_mod('footer-widgets-on', true) ) { ?>

			<div class="footer-columns clear">

				<div class="ht_grid_1_4 footer-column footer-column-1">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>

				<div class="ht_grid_1_4 footer-column footer-column-2">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>

				<div class="ht_grid_1_4 footer-column footer-column-3">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>		

				<div class="ht_grid_1_4 footer-column footer-column-4">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>														

			</div><!-- .footer-columns -->		

		<?php } ?>

		<div class="clear"></div>

		<div id="site-bottom" class="clear">

		<div class="container">

			<div class="site-info">

				<?php
					$author_uri = 'https://www.happythemes.com/';
				?>

				&copy; <?php echo date("o"); ?> <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a> - <?php echo __('Theme by', 'course'); ?> <a href="<?php echo $author_uri; ?>" target="_blank">HappyThemes</a>

			</div><!-- .site-info -->			

		</div>
		
		</div><!-- #site-bottom -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<script type="text/javascript">

(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict"; 

        /*-----------------------------------------------------------------------------------*/
        /*  Slick Mobile Menu
        /*-----------------------------------------------------------------------------------*/
        $('#primary-menu').slicknav({
            prependTo: '#slick-mobile-menu',
            allowParentLinks: true,
            label: '<?php echo get_theme_mod('mobile-nav-heading', 'Menu'); ?>'            
        });   

    });

})(jQuery);

</script>

<?php wp_footer(); ?>

</body>
</html>
