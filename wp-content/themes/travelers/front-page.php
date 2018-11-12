<?php
/**
 * The front-page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelers
 */
get_header();
	if ( get_theme_mod( 'home_featured_posts' ) != '' ) :
	$dt_featured_posts = esc_attr( get_theme_mod( 'home_featured_posts_select' ) );
	if ( $dt_featured_posts == '') {
	$dt_featured_posts = '';
	}
	$dt_slide_number   = esc_attr( get_theme_mod( 'dt_slide_number' ) );
	$args = array(
	'post_type'		 => 'post',
	'posts_per_page' => $dt_slide_number,
	'orderby' 		 => 'ASC',
	'category__in'   => $dt_featured_posts
	);
	$dt_featured_posts = new WP_Query($args);
	?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="dt-front-slider">
					<div class="dt-featured-post-slider">
						<div class="swiper-wrapper">
							<?php while ( $dt_featured_posts->have_posts() ) : $dt_featured_posts->the_post(); ?>
								<div class="swiper-slide">
									<div class="dt-featured-post">
										<header class="entry-header">
											<div class="dt-featured-post-meta animated fadeInUp">
												<h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_attr( get_the_title() ); ?></a></h2>
												<p><?php echo wp_trim_words( get_the_content(), 18, '...' ); ?></p>
											</div>
										</header>
										<figure>
											<?php  if ( has_post_thumbnail() ) :
												the_post_thumbnail( 'travelers-featured-slider-img' );
											else : ?>
												<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank-slider.jpg" alt="<?php _e( 'no image found', 'travelers' ); ?>"/>
											<?php endif; ?>
										</figure>
									</div><!-- .dt-featured-post -->
								</div><!-- .swiper-slide -->
							<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div><!-- .swiper-wrapper -->
						<!-- Add Arrows -->
						<div class="swiper-button-next transition5"><i class="fa fa-angle-right"></i></div>
						<div class="swiper-button-prev transition5"><i class="fa fa-angle-left"></i></div>
					</div><!-- .dt-featured-post-slider -->
				</div><!-- .dt-front-slider -->
			</div>
		</div>
	</div>
<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					if ( 'page' == get_option( 'show_on_front' ) ) : ?>
					<div class="dt-content-area">
						<?php
						get_template_part( 'template-parts/content', 'page' );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
					</div>
					<?php else : ?>
					<div class="dt-front-post">
						<figure>
							<?php  if ( has_post_thumbnail() ) :
								the_post_thumbnail( 'dt-blog-thumbnail' );
							else : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank-slider.jpg" alt="<?php _e( 'no image found', 'travelers' ); ?>"/>
							<?php endif; ?>
							<a href="<?php echo esc_url( get_the_permalink() ); ?>"><span></span></a>
						</figure>
						<article>
							<header class="entry-header">
								<h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_attr( get_the_title() ); ?></a></h2>
								<?php travelers_posted_on(); ?>
							</header><!-- .entry-header -->
							<?php the_excerpt(); ?>
						</article>
						<footer class="entry-footer">
							<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php _e( 'Read More', 'travelers' ); ?></a>
						</footer><!-- .entry-footer -->
						<div class="clearfix"></div>
					</div>
					<?php
					endif;
					wp_reset_postdata();
				endwhile;
				?>
				<div class="clearfix"></div>
				<div class="dt-pagination-nav">
					<?php the_posts_pagination(); ?>
				</div><!---- .dt-pagination-nav ---->
				<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'travelers' ); ?></p>
				<?php endif; ?>
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
