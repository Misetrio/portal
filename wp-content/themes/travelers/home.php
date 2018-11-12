<?php
/**
 * The home page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelers
 */
get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div id="primary" class="dt-archive-wrap">
					<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>
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
