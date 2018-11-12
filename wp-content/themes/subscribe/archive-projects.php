<?php
/**
 * Projects archives template
 *
 * @package subscribe
 */

get_header(); ?>

	<div id="primary" class="content-area full-width">
		<div id="main" class="" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="page-header">
				<div class="container">
					<h1 class="page-title"><?php echo get_theme_mod('projects-page-title','Our Work'); ?></h1>
				</div>
			</div><!-- .page-header -->

			<div class="container">

			<?php 
				$terms = get_terms( 'project_category' );
			?>
			<div class="project-wrap portfolio-section">
			
			<ul class="project-filter" id="filters">
				<li><a href="#" data-filter="*"><?php esc_html_e('Show all', 'subscribe'); ?></a></li>
				<?php 
					$count = count($terms);
		           if ( $count > 0 ){
		               foreach ( $terms as $term ) {
		                   echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
		               }
		           }
           		?>
			</ul>

			<div class="roll-project fullwidth">
				<div class="isotope-container" data-portfolio-effect="fadeInUp">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php 
					$project_url = get_post_meta( get_the_ID(), 'wpcf-project-link', true ); 
					if ($project_url == null) {
						$project_url = get_the_permalink();
					}

			       $id = $post->ID;
			       $termsArray = get_the_terms( $id, 'project_category' );
			       $termsString = "";

			       if ( $termsArray) {
			           foreach ( $termsArray as $term ) {
			               $termsString .= $term->slug.' ';
			           }
			       }

				?>

				<div class="project-item item isotope-item <?php echo $termsString;?>">
					<div class="project-inner">
						<a class="thumbnail-link" href="<?php echo esc_url($project_url); ?>">
							<?php the_post_thumbnail('project_thumb'); ?>
						</a>
						<h3 class="project-title">		
							<a href="<?php echo esc_url($project_url); ?>">
								<?php the_title(); ?>				
							</a>
						</h3>						
					</div>
				</div>
				
			<?php endwhile; ?>

				</div>

			</div><!-- .roll-project -->

			</div><!-- .project-wrap .portfolio-section -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div><!-- .container -->

		</div><!-- #main -->

	</div><!-- #primary -->	

<?php get_footer(); ?>
