<?php

	if (!get_the_post_thumbnail_url()) {
		$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
	}
	else{
		$background_url = get_the_post_thumbnail_url();
	}

	if(get_field('external_link')) {

		$noURL = '';
		$link = get_field('external_link');
	} else {
		$link = get_permalink();
		$noURL = ' no-external-link';
		// echo "no link!!!";
	}


 ?>

<div class="cell post-card click-card <?php echo $new_card?>" data-url="<?php echo $link ?>" data-blank='true'>
	<!-- <div class="author date">
		<?php echo get_the_date() ?>
	</div> -->
	<div class="post-image">
		<div class="feature-image b-radius <?php echo $noURL ?>" style="background-image:url(<?php echo $background_url ?>);">
		</div>


			
			<!-- <?php echo file_get_contents(get_template_directory_uri().'/dist/assets/images/svg/rectangle-border.svg'); ?> -->

	</div>

	<div class="title text-center">
			<?php the_title(); ?>
			<a href="<?php the_field('external_link'); ?>" class="seo-link white">Read More</a>
	</div>
	<!-- <div class="author">
		By: <?php the_author(); ?>
	</div> -->
</div>
