<div class="section-heading">

	<?php
		if ( $cat_id == 0 ) {
			$heading_url = get_theme_mod('all-posts-url', home_url().'/latest');
			$heading_text = get_theme_mod('recent-heading', __('Recent videos', 'videohost'));
		} else {
			$heading_url = $cat_link;
			$heading_text = $category->name;		
		}
	?>

	<h3 class="section-title"><a href="<?php echo esc_url($heading_url); ?>"><?php echo $heading_text; ?></a></h3>

</div><!-- .section-heading -->			

<div class="content-loop">

<?php
	// The Loop
	while ( $posts->have_posts() ) : $posts->the_post();
	global $post;	
?>	

<div class="hentry">

	<?php if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('post-thumb');  
				?>		
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">
			<span class="entry-date"><?php echo get_the_date('M d, Y'); ?></span>
			<span class="entry-views"><?php echo videohost_get_post_views(get_the_ID()); ?></span>
		</div><!-- .entry-meta -->							
	</div><!-- .entry-header -->		

</div><!-- .hentry -->

<?php

	$i++;
	endwhile;
?>

</div><!-- .content-loop -->