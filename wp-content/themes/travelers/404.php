<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travelers
 */
get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'travelers' ); ?></h1>
							</header><!-- .page-header -->
							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'travelers' ); ?></p>
								<?php
								get_search_form();
								the_widget( 'WP_Widget_Recent_Posts' );
								// Only show the widget if site has multiple categories.
								if ( travelers_categorized_blog() ) :
									?>
									<div class="widget widget_categories">
										<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'travelers' ); ?></h2>
										<ul>
											<?php
											wp_list_categories( array(
													'orderby'    => 'count',
													'order'      => 'DESC',
													'show_count' => 1,
													'title_li'   => '',
													'number'     => 10,
											) );
											?>
										</ul>
									</div><!-- .widget -->
									<?php
								endif;
								?>
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="dt-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
