<?php
//about theme info
add_action( 'admin_menu', 'luxury_travel_gettingstarted' );
function luxury_travel_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'luxury-travel'), esc_html__('Get Started', 'luxury-travel'), 'edit_theme_options', 'luxury_travel_guide', 'luxury_travel_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function luxury_travel_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'luxury_travel_admin_theme_style');

//guidline for about theme
function luxury_travel_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'luxury-travel' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Travel Wordpress Theme', 'luxury-travel' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
				<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and felxible WordPress theme.', 'luxury-travel' ); ?></p>
				<div class="blink">
					<h4><?php esc_html_e( 'Theme Created By ThemesGlance', 'luxury-travel' ); ?></h4>
				</div>
			<div class="intro-text"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'luxury-travel' ); ?> <span><?php esc_html_e( '20% off', 'luxury-travel' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'luxury-travel' ); ?> <span><?php esc_html_e( '" TGYear2018 "', 'luxury-travel' ); ?></span></div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'luxury-travel' ); ?></h3>
			<p><?php esc_html_e( 'Luxury Travel is a Travel agency WordPress theme that is made specifically for sites dealing in travel and tourism business. This multipurpose Tour WordPress Theme best suits versatile businesses such as tourist agencies, tour operators, travel guides, photographic agencies, travel diaries, vacation, airlines, hotels, lifestyle, technology, traveling or journey blog, fashion, and a lot more. Its a very user-friendly and interactive Travel WordPress Theme that supports the latest WordPress versions. It has an eye-catching design which attracts a number of travel enthusiasts. Ample of personalization options are provided that eases the process of customizing the theme according to your choices. The Call to action button (CTA) is an element well-incorporated in the theme to redirect the users to take an action. The theme has different sections and the testimonial section is developed particularly to display client reviews about your business. This Travels WordPress Theme supports multiple browsers, thereby making your site appear on different browsers. The secure and clean codes make this theme extremely lightweight and hassle-free which aids in giving faster page load time. It is 100% responsive built with optimized codes making your site appealing even on small screen sizes. Furthermore, due to the SEO friendly nature of the theme, there is no issue in bringing your site at high ranks in search engines. And the social media options make it super easy for you to enter the social networking world and spread your business.', 'luxury-travel')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'luxury-travel' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'Luxury Travel', 'luxury-travel' ); ?> <a href="<?php echo esc_url( LUXURY_TRAVEL_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'luxury-travel' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with Travel Theme', 'luxury-travel' ); ?></h3>
			<div class="col-left-inner"> 
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'luxury-travel' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'luxury-travel' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'luxury-travel' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'luxury-travel' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'luxury-travel' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'luxury-travel'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive-tg.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( LUXURY_TRAVEL_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'luxury-travel'); ?></a>
			<a href="<?php echo esc_url( LUXURY_TRAVEL_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'luxury-travel'); ?></a>
			<a href="<?php echo esc_url( LUXURY_TRAVEL_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'luxury-travel'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'luxury-travel'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Theme options using customizer API', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Inbuilt BMI Calculator', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Responsive Design', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( '100+ Font Family Options', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'RTL & Translation Ready', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Support to Add Custom CSS/JS', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'SEO Friendly', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Pagination Option', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Footer Customization Options', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Short Codes', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Woo Commerce Compatible', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Multiple Inner Page Templates', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Customizable Home Page', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Advance Social Media Feature', 'luxury-travel'); ?></li>
		 	<li><?php esc_html_e( 'Left and Right Sidebar', 'luxury-travel'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'luxury-travel'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( LUXURY_TRAVEL_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'luxury-travel'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'luxury-travel'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'luxury-travel'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'luxury-travel'); ?></a> <?php esc_html_e('your website.', 'luxury-travel'); ?></li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'luxury-travel'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( LUXURY_TRAVEL_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'luxury-travel'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'luxury-travel' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Luxury Travel Lite', 'luxury-travel' ); ?> <a href="<?php echo esc_url( LUXURY_TRAVEL_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'luxury-travel' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>