<?php
/**
 * The sidebar containing the alternate widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package course
 */


?>

<aside id="third" class="widget-area sidebar sidebar-2 <?php if( is_singular('post') ) { echo "no-sidebar-2"; } ?>">

<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>

	<?php dynamic_sidebar( 'sidebar-2' ); ?>

<?php } else { ?>

	<div class="widget">
		<p><?php echo __('Please put widgets to the <strong>Left Sidebar</strong>', 'course'); ?></p>
		<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('OK, I\'m doing now &raquo;', 'course'); ?></a></p>
	</div>

<?php } ?>
</aside><!-- #third -->

