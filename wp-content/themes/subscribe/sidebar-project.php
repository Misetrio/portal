<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package subscribe
 */


?>

<aside id="secondary" class="widget-area sidebar project-sidebar">
	<?php if ( ! is_active_sidebar( 'sidebar-project' ) ) { ?>
		<div class="widget setup-notice">
			<p><?php echo __('There is no content here', 'subscribe'); ?></p>
			<p><?php echo __('Please put widgets to the <strong>Project Sidebar</strong>', 'subscribe'); ?></p>
			<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('Okay, I\'m doing now &raquo;', 'subscribe'); ?></a></p>
		</div>
	<?php } ?>

	<?php dynamic_sidebar( 'sidebar-project' ); ?>
</aside><!-- #secondary -->
