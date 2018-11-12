<div class="section-heading">

	<?php
		if ( $cat_id == 0 ) {
			$heading_url = get_theme_mod('all-posts-url', home_url().'/latest');
			$heading_text = esc_html('Latest news', 'goodsite');
		} else {
			$heading_url = $cat_link;
			$heading_text = $category->name;		
		}
	?>

	<h3 class="section-title"><a href="<?php echo esc_url($heading_url); ?>"><?php echo $heading_text; ?></a></h3>

</div><!-- .section-heading -->			

<div class="block-loop">

<?php
	// The Loop
	while ( $posts->have_posts() ) : $posts->the_post();

?>	

<div class="hentry">

	<?php if ( has_post_thumbnail() ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('medium-thumb');  
				?>
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">

			<?php if ( $cat_id == 0 ) { ?>
				<span class="entry-category"><?php goodsite_first_category(); ?></span>
			<?php } ?>

			<span class="entry-date"><?php echo get_the_date(); ?></span>

			<?php if ( $cat_id != 0 ) { ?>
				<span class="entry-comment"><?php comments_popup_link( __('0 comment', 'goodsite'), __('1 comment', 'goodsite'), __('% comment', 'goodsite'), 'comments-link', __('comments off', 'goodsite')); ?></span>
			<?php } ?>
		</div><!-- .entry-meta -->							
	</div><!-- .entry-header -->		

</div><!-- .hentry -->

<?php

	$i++;
	endwhile;
?>

</div><!-- .block-loop -->