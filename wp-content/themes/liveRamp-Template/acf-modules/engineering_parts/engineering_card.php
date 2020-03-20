<?php

	$terms = get_the_terms( get_the_ID(), 'engineering_categories' );
	// var_dump($terms);
	$term_count =  count($terms);

	if (!get_the_post_thumbnail_url()) {
		$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
	}
	else{
		$background_url = get_the_post_thumbnail_url();
	}

?>

<div class="cell post-card click-card <?php echo $new_card ?>" data-url="<?php the_permalink(); ?>">
	<div class="author date">
		<?php echo get_the_date() ?>
	</div>
	<div class="post-image">
		<div class="feature-image b-radius" style="background-image:url(<?php echo $background_url ?>);">
		</div>

			<?php echo file_get_contents(get_template_directory_uri().'/dist/assets/images/svg/rectangle-border.svg'); ?>

	</div>
	<div class="meta">
		<?php
			$i = 1;
			if ($terms) {
				foreach( $terms as $term ){
					if ($i < $term_count) {
						$spacer = ', ';
					}
					else {
						$spacer = '';
					}

					echo $term->name . $spacer;
					++$i;
				}
			}
		 ?>

	</div>
	<div class="title">
		<h5>
			<?php the_title(); ?>
		</h5>
	</div>
	<div class="author">
		By: <?php the_author(); ?>
	</div>
</div>
