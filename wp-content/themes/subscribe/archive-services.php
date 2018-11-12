<?php
/**
 * Services archives template
 *
 * @package subscribe
 */

get_header(); ?>

	<div class="page-header">
		<div class="container">
			<h1 class="page-title"><?php echo get_theme_mod('services-page-title','Our Services'); ?></h1>
		</div>
	</div><!-- .page-header -->

	<div class="container">

	<div id="primary" class="content-area full-width">
		<div id="main" class="post-wrap roll-services" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php $icon = get_post_meta( get_the_ID(), 'wpcf-service-icon', true ); ?>
				<?php $link = get_post_meta( get_the_ID(), 'wpcf-service-link', true ); ?>
				<div class="service ht_grid ht_grid_1_3">
					<div class="roll-icon-box">
                    <?php if ( has_post_thumbnail() ) : ?> 
                            <div class="service-thumb"> 
								<?php if ($link) : ?>
									<?php echo '<a href="' . esc_url($link) . '">' . get_the_post_thumbnail(get_the_ID(), 'subscribe-service-thumb') . '</a>'; ?>
								<?php else : ?>
									<?php the_post_thumbnail('subscribe-service-thumb'); ?>
								<?php endif; ?>
                            </div> 
                         <?php elseif ($icon) : ?>   
							<div class="icon">
								<?php if ($link) : ?>
									<?php echo '<a href="' . esc_url($link) . '"><i class="fa ' . esc_html($icon) . '"></i></a>'; ?>
								<?php else : ?>
									<?php echo '<i class="fa ' . esc_html($icon) . '"></i>'; ?>
								<?php endif; ?>
							</div>
						<?php endif; ?>							
						<div class="content">
							<h3>
								<?php if ($link) : ?>
								<a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
								<?php else : ?>
								<?php the_title(); ?>
								<?php endif; ?>
							</h3>
							<?php the_content(); ?>
						</div>	
					</div>
				</div>
			<?php endwhile; ?>

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div><!-- #main -->
	</div><!-- #primary -->

	</div><!-- .container -->

<?php get_footer(); ?>
