<?php

	if (have_rows('videos')) {
		$i = 0;
		while (have_rows('videos')) {
			the_row();
			if ($i == 0) {
				$video_1 = get_sub_field('video');
			}
			++$i;
		}

		$total_videos = $i;
	}



 ?>

<section class="video-panel dark-blue-bkg hide-for-filters relative">
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-padding-y">
			<!-- VIDEO CELL -->
			<div class="cell large-8 video-cell primary-bkg b-radius hard-shadow white">
				<h3 id="video-title" class="video-title"></h3>
				<div class="video-wrapper">
					<div class="wistia_embed wistia_async_<?php echo $video_1; ?>" style="width:640px;height:360px;">&nbsp;</div>
					<div class="playbutton">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/play-arrow.svg" alt="play icon">
				</div>
				</div>
					<script>
						window._wq = window._wq || [];
						_wq.push({
								id: '_all',
								options: {
									"autoPlay": false,
									"controlsVisibleOnLoad": false,
									"fullscreenButton": true,
									"playbackRateControl": true,
									"playbar": true,
									"playButton": false,
									"playerColor": "5fbbff",
									"qualityControl": true,
									"settingsControl": true,
									"smallPlayButton": true,
									"volumeControl": true,
									"endVideoBehavior": "default"
								},
						onReady: function(video) {
						console.log("I got a handle to the video!", video);
						console.log("Thank you for watching " + video.name() + "!");
						let title1 = video.name();
						$('#video-title').html(title1);
						$('.w-chrome').css('border-radius', '12px');
						$('.w-video-wrapper.w-css-reset').parent().css('border-radius', '12px');

						}
						});

						// target our video by the first 3 characters of the hashed ID
						_wq.push({ id: '_all',
							options: {
								"autoPlay": false,
								"controlsVisibleOnLoad": false,
								"fullscreenButton": true,
								"playbackRateControl": true,
								"playbar": true,
								"playButton": false,
								"playerColor": "5fbbff",
								"qualityControl": true,
								"settingsControl": true,
								"smallPlayButton": true,
								"volumeControl": true,
								"endVideoBehavior": "default"
							},
							onReady: function(video) {
						$(".replace-video").click(function() {
							var next_video = $(this).attr('data-video-id');
							var $up_next = '#'+$(this).attr('data-next-up');
							$('.playbutton').show();
							video.replaceWith(next_video);
							// TweenMax.to(this, 2, {opacity:0, display:"none"});
							// TweenMax.set($up_next,{display:'block', autoAlpha:0});
							// TweenMax.to($up_next, 2, {autoAlpha:1}).delay(2);

							$(this).fadeOut(400, function() {
								$($up_next).fadeIn(400);
							});



						});

						}});

						$('.playbutton').click( function(event) {
							if(event.preventDefault) { event.preventDefault(); }

								window._wq = window._wq || [];
								var $video_id  = '_all';

								_wq.push({ id: $video_id, onReady: function(video) {
									video.play();
									$('.playbutton').hide();
								}});

							});


					</script>
					<div class="thumbnails">

						<?php if (have_rows('videos')): ?>
							<?php $i = 1;  ?>

						    <?php while(have_rows('videos')) : ?>
						    <?php the_row(); ?>
						    	<?php

						    		$video_id = get_sub_field('video');

						    		$url = 'https://api.wistia.com/v1/medias/'.$video_id.'.json?api_password=974f2815e1e3f078f8030988beb1dff099075ca2aa486940d5a8b98097a713ce';

						    		$response = file_get_contents($url);


						    		$response = json_decode($response);


						    		$title = $response->name;

						    		$thumbnail = $response->thumbnail->url;


						    		$replace_id = 'replace_'.$i;

						    		($i == $total_videos) ? $next_i = 1 : $next_i = ($i+1);
						    		$next_up = 'replace_'.$next_i;
						    		// var_dump($response);

						    		($i == 2 ) ? $hide = '' : $hide = 'hide-video';


						    	 ?>

								<div class="replace-video <?php echo $hide ?>" data-video-id="<?php echo $video_id ?>" id="<?php echo $replace_id; ?>" data-next-up="<?php echo $next_up ?>">
									<div class="replace-grid">
										<div class="next-video" style="background-image:url(<?php echo $thumbnail; ?>)" ></div>
										<div class="title"><b>Up Next:</b> <?php echo $title; ?></div>
									</div>
								</div>


						    	<?php ++$i ?>
						    <?php endwhile ?>
						<?php endif ?>

					</div>
			</div>
			<!-- VIDEO CELL ENDS -->
			<!-- authorcell begins  -->
			<div class="cell large-4 white">
				<div class="author-list">
					<h4>Featured Authors</h4>
					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="underline">
					 <?php if (have_rows('authors')): ?>
					 	

					     <?php while(have_rows('authors')) : ?>
					     <?php the_row(); ?>
					     	<?php $author = get_sub_field('author'); ?>
					     	<?php  
					     		
					     		//var_dump($author); 

					     		$user_id = 'user_'.$author['ID'];
					     		// echo $user_id;
					     		$headshot = get_field('headshot', $user_id);

					     	?>

					     	

					     	<div class="author-name" data-author-id="<?php echo $author['user_nicename']; ?>" data-author-name="<?php echo $author['display_name'] ?>">

					     		<div class="grid-x align-middle author">
					     			<div class="cell shrink headshot-cell">
					     				<div class="headshot text-center">
					     					<?php if ($headshot): ?>
					     						<img src="<?php echo $headshot ?>" alt="<?php echo $author['display_name'] ?>" class="headshot_image">
					     					<?php else: ?>
					     						<i class="fal fa-3x fa-user-circle"></i>	
					     					<?php endif ?>
					     					

					     				</div>
					     			</div>
					     			<div class="cell auto content">
					     				<div class="name"><?php echo $author['display_name'] ?></div>
					     				<div class="see-stories">See Author Posts</div>

					     			</div>
					     		</div>

					     	</div>

					     <?php endwhile ?>
					     
					 <?php endif ?>
				</div>
			</div>
		</div>


		</div>
</section>
