<?php

	if (!get_the_post_thumbnail_url()) {
		$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
	}
	else{
		$background_url = get_the_post_thumbnail_url();
	}


 ?>

 <?php

 	$terms = get_the_terms( get_the_ID(), 'resources_categories' );
 	// var_dump($terms);
 	$term_count =  count($terms);

 	if (!get_the_post_thumbnail_url()) {
 		$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
 	}
 	else{
 		$background_url = get_the_post_thumbnail_url();
 	}

 	if ($terms) {
 		foreach( $terms as $term ){

 			if ($term->name == 'Video') {
 				$video_play = 1;
 			}
 			else {
 				$video_play = null;
 			}

 		}
 	}

  ?>

<div class="cell post-card click-card <?php echo $new_card ?>" data-url="<?php the_field('marketo'); ?>" data-blank='true'>
	<!-- <div class="author date">
		<?php echo get_the_date() ?>
	</div> -->
	<div class="post-image">
		<div class="feature-image b-radius" style="background-image:url(<?php echo $background_url ?>);">
		</div>

			<div class="border">
				<?php echo file_get_contents(get_template_directory_uri().'/dist/assets/images/svg/rectangle-border.svg'); ?>
			</div>
			<?php if ($video_play): ?>
				<div class="play-button">
					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/play-arrow.svg" alt="play icon">	
				</div>
			<?php endif ?>
			
	</div>
	
	<div class="title text-center">
			<p class="term"><?php echo $term->name; ?></p>
			<?php the_title(); ?>
			<a href="<?php the_field('marketo'); ?>" class="seo-link white">Read More</a>
	</div>
	<!-- <div class="author">
		By: <?php the_author(); ?>
	</div> -->
</div>
