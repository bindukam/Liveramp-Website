<?php

	if (!get_the_post_thumbnail_url()) {
		$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
	}
	else{
		$background_url = get_the_post_thumbnail_url();
	}

	$date_check = (get_field('date_to')) ? get_field('date_to') : get_field('date_from');

	$terms = get_the_terms( get_the_ID(), 'events_locations' );
	$types = get_the_terms( get_the_ID(), 'events_liveramp' );
	// var_dump($terms);
	$term_count =  count($terms);

	$filter_date = date("Ym", strtotime(get_field('date_from')));

	$ti = 1;
	$loc = '';
	foreach ($terms as $term) {
		$loc = $loc.' '.$term->slug;
	}

	$type_s = '';
	if (!empty($types)) {
		foreach ($types as $type) {
			$type_s = $type_s.' '.$type->slug;
		}
	}
	
	// var_dump($loc);


 ?>


<?php if ($date_check >= date('Ymd')): ?>
	

<div class="cell post-card click-card <?php echo $new_card ?> <?php echo $loc ?> <?php echo $type_s ?> <?php echo $filter_date ?>" data-url="<?php the_field('external_link'); ?>" data-blank='true' data-filter-date='<?php echo $filter_date ?>' data-search-title="<?php the_title(); ?>" data-location="
				<?php
					$i = 1;
					if ($terms) {
						foreach( $terms as $term ){
							if ($i < 2) {
								$spacer = ', ';
							}
							else {
								$spacer = '';
							}
							
							if ($i < 3) {
									# code...
								echo $term->name . $spacer;
							}	
							
							++$i;
						}
					}
				 ?>">
	<div class="post-image">
		<div class="feature-image b-radius" style="background-image:url(<?php echo $background_url ?>);">
		</div>

			<?php echo file_get_contents(get_template_directory_uri().'/dist/assets/images/svg/rectangle-border.svg'); ?>
	</div>
	
	<div class="title text-center">
			<div>
				<?php the_title(); ?>
			</div>
			<?php
			
				$date_from = date("M d", strtotime(get_field('date_from')));

				if (get_field('date_to')) {
					$date_to = date("d, Y ", strtotime(get_field('date_to')));
				    $date_from = date("M d", strtotime(get_field('date_from')));
				    $date = $date_from.' - '.$date_to;
				}
				else {
					$date = $date_from = date("M d, Y", strtotime(get_field('date_from')));
				}
			
			?>
			<div>
				<?php echo $date ?>
				<a href="<?php the_field('external_link'); ?>" class="seo-link white">Read More</a>
			</div>

			<div class="">
				<?php
					$i = 1;
					
					if ($terms) {
						foreach( $terms as $term ){
							if ($term_count == 1) {
								$spacer = '';
							}
							elseif ($i == $term_count) {
								$spacer = '';
							}
							else {
								$spacer = ', ';
							}
							
							
									# code...
						  echo $term->name . $spacer;
								
							
							++$i;
						}
					}
				 ?>
			</div>
	</div>
	<!-- <div class="author">
		By: <?php the_author(); ?>
	</div> -->
</div>

<?php endif ?>
