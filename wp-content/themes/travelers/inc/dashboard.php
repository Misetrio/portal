<?php
/**
 * Add theme dashboard page
 */
add_action('admin_menu', 'travelers_theme_info');
function travelers_theme_info() {
	$theme_data = wp_get_theme();
	add_theme_page( sprintf( esc_html__( '%s Dashboard', 'travelers' ), $theme_data->Name ), sprintf( esc_html__('%s Theme', 'travelers'), $theme_data->Name), 'edit_theme_options', 'travelers', 'travelers_theme_info_page');
}
if ( ! function_exists( 'travelers_admin_scripts' ) ) :
	/**
	 * Enqueue scripts for admin page only: Theme info page
	 */
	function travelers_admin_scripts( $hook ) {
		if ( $hook === 'widgets.php' || $hook === 'appearance_page_travelers'  ) {
            // Add recommend plugin css
            wp_enqueue_style( 'plugin-install' );
            wp_enqueue_script( 'plugin-install' );
            wp_enqueue_script( 'updates' );
            add_thickbox();
			wp_enqueue_style('travelers-admin-css', get_template_directory_uri() . '/css/admin.css');
		}
	}
endif;
add_action('admin_enqueue_scripts', 'travelers_admin_scripts');
function travelers_theme_info_page() {
	$theme_data = wp_get_theme();
	// Check for current viewing tab
	$tab = null;
	if ( isset( $_GET['tab'] ) ) {
		$tab = $_GET['tab'];
	} else {
		$tab = null;
	}
	?>
	<div class="wrap about-wrap theme_info_wrapper">
		<h1><?php printf(esc_html__('Welcome to %1s - Version %2s', 'travelers'), $theme_data->Name, $theme_data->Version ); ?></h1>
		<div class="about-text"><?php esc_html_e( 'Travelers is a WordPress Travel Blog Theme built with Bootstrap and is fully responsive for all the screen sizes. It can be used for Personal, Blogging, Fashion, Lifestyle, Travel, Technology, Travel Agencies, Hotels, Tour Operators, Airlines, Photographic Agencies, blogger or any other types of blog site. Travelers theme comes with built-in widgets and widgets positions, customizer to customize and setup logo, color and layouts.', 'travelers' ); ?></div>
		<a target="_blank" href="<?php echo esc_url('https://www.famethemes.com/?utm_source=theme_dashboard_page&utm_medium=badge_link&utm_campaign=theme_admin'); ?>" class="famethemes-badge wp-badge"><span>FameThemes</span></a>
		<h2 class="nav-tab-wrapper">
			<a href="?page=travelers" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php echo $theme_data->Name; ?></a>
			<a href="<?php echo esc_url( add_query_arg( array( 'page'=>'travelers', 'tab' => 'demo-data-importer' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab<?php echo $tab == 'demo-data-importer' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'One Click Demo Import', 'travelers' ); ?></span></a>
            <?php ?>
                <a href="<?php echo esc_url( add_query_arg( array( 'page'=>'travelers', 'tab' => 'free_pro' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab<?php echo $tab == 'free_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free vs PRO', 'travelers' ); ?></span></a>
            <?php  ?>
		</h2>
		<?php if ( is_null($tab) ) { ?>
			<div class="theme_info info-tab-content">
				<div class="theme_info_column clearfix">
					<div class="theme_info_left">
						<div class="theme_link">
							<h3><?php esc_html_e( 'Theme Customizer', 'travelers' ); ?></h3>
							<p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'travelers'), $theme_data->Name); ?></p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'travelers'); ?></a>
							</p>
						</div>
						<div class="theme_link">
							<h3><?php esc_html_e('Having Trouble, Need Support?', 'travelers'); ?></h3>
							<p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through FameThemes support ticket system.', 'travelers'), $theme_data->Name); ?></p>
							<p>
								<a class="button button-secondary" target="_blank" href="https://www.famethemes.com/contact"><?php esc_html_e( 'Create a support ticket', 'travelers' ) ?></a>&nbsp;
								<a href="http://docs.famethemes.com/" target="_blank" class="button button-secondary"><?php esc_html_e('Online Documentation', 'travelers'); ?></a>
							</p>
						</div>
						<?php ?>
						<div class="theme_link">
							<h3 class="theme-upgrade"><?php esc_html_e('Upgrade to Travelers Pro', 'travelers'); ?></h3>
							<p class="about"><?php printf(esc_html__('Our #1 travel blogging WordPress theme with premium features designed for bloggers and content lovers.', 'travelers'), $theme_data->Name); ?></p>
							<p>
								<a class="button button-secondary" target="_blank" href="http://demos.famethemes.com/travelers-pro"><?php _e( 'Travelers Pro Demo', 'travelers' ) ?> &#8594;</a>&nbsp;
								<a class="button button-primary" target="_blank" href="https://www.famethemes.com/themes/travelers-pro"><?php _e( 'Upgrade Now', 'travelers' ) ?> &#8594;</a>
							</p>
						</div>
						<?php  ?>
					</div>
					<div class="theme_info_right">
						<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
					</div>
				</div>
			</div>
		<?php } ?>
        <?php if ( $tab == 'demo-data-importer' ) { ?>
            <div class="demo-import-tab-content info-tab-content">
                <?php if ( has_action( 'travelers_demo_import_content_tab' ) ) {
                    do_action( 'travelers_demo_import_content_tab' );
                } else { ?>
                    <div id="plugin-filter" class="demo-import-boxed">
                        <?php
                        $plugin_name = 'famethemes-demo-importer';
                        $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_name );
                        $button_class = 'install-now button';
                        $button_txt = esc_html__( 'Install Now', 'travelers' );
                        if ( ! $status ) {
                            $install_url = wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'install-plugin',
                                        'plugin' => $plugin_name
                                    ),
                                    network_admin_url( 'update.php' )
                                ),
                                'install-plugin_'.$plugin_name
                            );
                        } else {
                            $install_url = add_query_arg(array(
                                'action' => 'activate',
                                'plugin' => rawurlencode( $plugin_name . '/' . $plugin_name . '.php' ),
                                'plugin_status' => 'all',
                                'paged' => '1',
                                '_wpnonce' => wp_create_nonce('activate-plugin_' . $plugin_name . '/' . $plugin_name . '.php'),
                            ), network_admin_url('plugins.php'));
                            $button_class = 'activate-now button-primary';
                            $button_txt = esc_html__( 'Active Now', 'travelers' );
                        }
                        $detail_link = add_query_arg(
                            array(
                                'tab' => 'plugin-information',
                                'plugin' => $plugin_name,
                                'TB_iframe' => 'true',
                                'width' => '772',
                                'height' => '349',
                            ),
                            network_admin_url( 'plugin-install.php' )
                        );
                        echo '<p>';
                        printf( esc_html__(
                            'Hey, you will need to install and activate the %1$s plugin first.', 'travelers' ),
                            '<a class="thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'FameThemes Demo Importer', 'travelers' ).'</a>'
                        );
                        echo '</p>';
                        echo '<p class="plugin-card-'.esc_attr( $plugin_name ).'"><a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_name ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a></p>';
                        ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
	    <?php ?>
		    <?php if ( $tab == 'free_pro' ) { ?>
                <div id="free_pro" class="freepro-tab-content info-tab-content">
                    <table class="free-pro-table">
                        <thead><tr><th></th><th>Travelers</th><th>Travelers Pro</th></tr></thead>
                        <tbody>
                        <tr>
                            <td>
                                <h4>Responsive Design</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Translation Ready</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Upload Your Own Logo</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Featured Post Slider</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Jetpack Support</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Sidebar Layout</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Primary Color</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Footer Widget</h4>
                            </td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Sticky Menu</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Sticky Posts</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>600+ Google fonts</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Footer Instagram</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Footer Copyright Editor</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <h4>24/7 Priority Support</h4>
                            </td>
                            <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
                            <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
                        </tr>
                        <tr class="ti-about-page-text-center"><td></td><td colspan="2"><a href="https://www.famethemes.com/themes/travelers-pro/?utm_source=theme_dashboard&utm_medium=compare_table&utm_campaign=travelers" target="_blank" class="button button-primary button-hero">Get Travelers Pro now!</a></td></tr>
                        </tbody>
                    </table>
                </div>
		    <?php } ?>
        <?php  ?>
	</div> <!-- END .theme_info -->
	<?php
}
?>