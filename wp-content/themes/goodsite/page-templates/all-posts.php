<?php
/*
 * Template Name: All Posts
 *
 * The template for displaying all posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goodsite
 */

get_header(); ?>
	<?php		

		$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
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

		if ( $the_query->have_posts() && (!get_query_var('paged')) ) {	

	?>
		
	<div id="featured-content" class="clear">

		<?php
			// The Loop
			while ( $the_query->have_posts() ) : $the_query->the_post();
		?>	

		<?php if ($i == 1) { ?>

		<div class="featured-large hentry">

				<a class="thumbnail-link" href="<?php the_permalink(); ?>">
					
					<div class="thumbnail-wrap">
						<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('featured-large-thumb');  
						} else {
							echo '<img src="' . get_template_directory_uri() . '/assets/img/featured-large-thumb.png" alt="" />';
						}
						?>
					</div><!-- .thumbnail-wrap -->
					<span class="gradient"></span>
				</a>

				<div class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-meta">
						<span class="entry-category"><?php goodsite_first_category(); ?></span>
						<span class="entry-date"><?php echo get_the_date(); ?></span>
						<span class="entry-comment"><?php comments_popup_link( '0', '1', '%', 'comments-link', __('comments off', 'goodsite')); ?></span>
					</div><!-- .entry-meta -->							
				</div><!-- .entry-header -->	
			
		</div><!-- .featured-slide .hentry -->			

		<?php } else { ?>

		<div class="featured-small hentry <?php if($i == 3) { echo 'last'; } ?>">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				
				<div class="thumbnail-wrap">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('featured-small-thumb');  
					} else {
						echo '<img src="' . get_template_directory_uri() . '/assets/img/featured-small-thumb.png" alt="" />';
					}
					?>
				</div><!-- .thumbnail-wrap -->
				<span class="gradient"></span>
			</a>

			<div class="entry-header">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-meta">
					<span class="entry-category"><?php goodsite_first_category(); ?></span>					
					<span class="entry-date"><?php echo get_the_date(); ?></span>
					<span class="entry-comment"><?php comments_popup_link( '0', '1', '%', 'comments-link', __('comments off', 'goodsite')); ?></span>
				</div><!-- .entry-meta -->							
			</div><!-- .entry-header -->	

		</div><!-- .hentry -->


		<?php

			}

			$i++;
			endwhile;
		?>
			</div><!-- #featured-content -->
			
		<?php 
			} //end if has featured posts
			wp_reset_postdata();				
		?>
			
	<div id="primary" class="content-area <?php if(get_theme_mod('latest-style','choice-1') == 'choice-1') { echo "no-sidebar"; }?>">

		<div id="main" class="site-main clear">

			<div class="breadcrumbs clear">
				
				<h1>
					<?php
						esc_html_e('Latest news', 'goodsite');
					?>					
				</h1>

			</div><!-- .section-header -->

			<div id="recent-content" class="<?php if(get_theme_mod('latest-style','choice-1') == 'choice-1') { echo "content-loop clear"; } else { echo "content-list"; } ?>">

				<?php

					$temp = $wp_query;
					$wp_query= null;
					$wp_query = new WP_Query();
					$wp_query->query('paged='.$paged);

					if ( have_posts() ) :

					$i = 1;

					while ($wp_query->have_posts()) : $wp_query->the_post();
					
						if(get_theme_mod('latest-style','choice-1') == 'choice-1') {
							get_template_part('template-parts/content', 'loop');
						} else {
							get_template_part('template-parts/content', 'list');
						}
					
						$i++;

					endwhile;

					else :

					get_template_part( 'template-parts/content', 'none' );

				?>

			<?php endif; ?>

			</div><!-- #recent-content -->
			
		</div><!-- #main -->
		<?php

			global $wp_version;

			if ( $wp_version >= 4.1 ) :

				the_posts_pagination( array( 'prev_text' => _x( 'Previous', 'previous post', 'goodsite' ) ) );
			
			endif;

		?>

		<?php $wp_query = null; $wp_query = $temp;?>

	</div><!-- #primary -->

<?php 
	if(get_theme_mod('latest-style','choice-1') == 'choice-2') {
		get_sidebar();
	}
?>
<?php get_footer(); ?>
