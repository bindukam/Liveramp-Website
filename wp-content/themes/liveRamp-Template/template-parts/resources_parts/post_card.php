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

	<div class="post-card  relative <?php echo $new_card ?> b-radius box-shadow-over-white" >
		<!-- find out if Marketo link is present -->
			<?php 

				if (get_field('marketo')) {
					//  if presnet set $data_url  = get_field('marketo')
					$data_url = get_field('marketo');
					$data_blank = "_blank";
				}
				else {
					$data_url = get_permalink();	
					$data_blank = "";
					}
			 ?> 
			

		
		
		<div class="post-image click-card"  data-url="<?php echo $data_url; ?>" data-blank="<?php echo $data_blank; ?>">
			
			<div class="feature-image" style="background-image:url(<?php echo $background_url ?>)">
				
				<?php if ($video_play && get_field('remove_play_icon_on_tile')==false): ?>
					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/play-arrow.svg" alt="play icon">
				<?php endif ?>
			</div>

		</div>

		<div class="content">
			<div class="meta">
				<?php
					$i = 1;
					if ($terms) {
						foreach( $terms as $term ){
							if ($i < $term_count) {
								$spacer = ',&nbsp;';
							}
							else {
								$spacer = '';
							}
							// var_dump($term);
							$icon =  get_field('icon', $term);
							$name =  $term->name;
							$icon_data = file_get_contents($icon);
							?>

							<div class="icon"><?php echo $icon_data; ?></div>  <div class="term-name"><?php echo $name ?></div>



							<?php
							++$i;
						}
					}
				 ?>

			</div>
			<?php
			$topics = get_the_terms( get_the_ID(), 'resources_topics' );
			if ($topics){
				$extrapad = " extra-padding";
			} ?>
			<div class="title<?php echo $extrapad ?>">
				<a href="<?php echo $data_url; ?>" target="<?php echo $data_blank; ?>" class="medium-blue">
					<?php the_title(); ?>
				</a>
			</div>
			<?php
			
			if ($topics):?> 

				<div class="project-name margin-top-1">
				<?php

					$i = 1;
					if ($topics) {
						foreach( $topics as $topic ){
							if ($i < $topic_count) {
								$spacer = ',&nbsp;';
							}
							else {
								$spacer = '';
							}
							// var_dump($topic);
							// $icon =  get_field('icon', $topic);
							$name =  $topic->name;
							$val = $topic->slug;
							?>
							
							 <span class="meta-term" data-term-id="<?php echo $val ?>">
							 	<?php echo $name ?>
							 </span>
							
							<?php
							++$i;
						}
					}
				 ?>
				</div>
			<?php endif; ?>
			
		</div>

	</div>
