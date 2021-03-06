<?php get_header(); ?>

	<?php							

		$args = array(
		'post_type'      => 'post',
		//'orderby'        => 'date',
		//'order'          => 'ASC',
		'posts_per_page' => '2',
	    'meta_query' => array(
	        array(
	            'key'   => 'is_featured',
	            'value' => 'true'
	        	)
	    	)				
		);

		// The Query
		$the_query = new WP_Query( $args );

		$i = 1;

		if ( $the_query->have_posts() && (!get_query_var('paged')) && ( get_theme_mod('featured-content-on', 'true') == true ) ) :	

	?>

		<div id="featured-content" class="container clear">

		<?php
			// The Loop
			while ( $the_query->have_posts() ) : $the_query->the_post();
		?>	

		<div class="hentry <?php if( $i % 2 == 0) { echo "last"; }?>">

			<?php if ( has_post_thumbnail() ) { ?>
				<a class="thumbnail-link" href="<?php the_permalink(); ?>">
					<div class="thumbnail-wrap">
						<?php 
							the_post_thumbnail('post_thumb');  
						?>
					</div><!-- .thumbnail-wrap -->
				</a>
			<?php } ?>

			<div class="entry-header clear">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div><!-- .entry-header -->

			<div class="entry-footer clear">
				<div class="entry-share share-icons">
					<?php get_template_part('template-parts/entry', 'share'); ?>
				</div>
				<div class="entry-meta">
					<span class="entry-category"><?php purelife_first_category(); ?></span>
				</div><!-- .entry-meta -->			
			</div>

		</div><!-- .hentry -->

		<?php   
			$i++;
			endwhile;
		?>

		</div><!-- #featured-content -->

	<?php
		endif;
		wp_reset_postdata();
	?>	

	<div id="primary" class="content-area clear">	

		<main id="main" class="site-main clear">

			<div id="recent-content" class="content-loop">

				<?php

				if ( have_posts() ) :	
				
				$i = 1;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'loop');

					if ( $i == '1' ) {
						dynamic_sidebar( 'content-ad' );
					}

					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
