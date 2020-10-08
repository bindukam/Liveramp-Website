<?php
	if (have_rows('videos')) {
		$i = 0;
		while (have_rows('videos')) {
			the_row();
			if ($i == 0) {
				$video_1 = get_sub_field('video');
				$url1 = 'https://api.wistia.com/v1/medias/'.$video_1.'json?api_password=974f2815e1e3f078f8030988beb1dff099075ca2aa486940d5a8b98097a713ce';
				$response1 = file_get_contents($url1);
	    		$response1 = json_decode($response1);
	    		$title = $response1->name;
	    		$thumbnail = $response1->thumbnail->url;
	    		$topics2 = $response1->project->name;
			}
			++$i;
		}
		$total_videos = $i; ?>

		<section class="video-panel dark-blue-bkg relative">
			
			<div class="bg-art">
				<div class="horiz-wavelines"></div>
			</div>
			
			<div class="grid-container z-5-r">
				<div class="grid-x grid-margin-x grid-padding-y">
					
					<!-- VIDEO CELL -->
					<div class="cell large-8 video-cell primary-bkg b-radius hard-shadow white">
						
						<div class="now-playing">
							<p><?php _translate('now_playing')  ?></p>
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="divider line" class="divider">
						</div>
						
						<h2 id="video-title" class="video-title"></h2>
						
						<div class="video-wrapper">
							<div class="wistia_embed wistia_async_<?php echo $video_1; ?>" style="width:640px;height:360px;">&nbsp;</div>
							<div class="playbutton">
								<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/play-arrow.svg" alt="play icon">
							</div>
						</div>
						
						<div class="project-name" id="project-name">
							<?php echo $topics2 ?>
						</div>
					
					</div>
					<!-- VIDEO CELL ENDS -->
					
					<!-- UP NEXT begins  -->
					<div class="cell medium-4 white">
						<div class="resource-thumbnails">
							
							<div class="title">
								<h4>Up next:</h4>
								<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="divider line" class="divider">
							</div>

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

										$topics = $response->project->name;

							    		$replace_id = 'replace_'.$i;

							    		($i == $total_videos) ? $next_i = 1 : $next_i = ($i+1);
							    		
							    		$next_up = 'replace_'.$next_i;

							    		($i == 2 ) ? $hide = '' : $hide = 'hide-video';

							    	 ?>

									<div class="replace-video <?php echo $hide ?>" data-video-id="<?php echo $video_id ?>" id="<?php echo $replace_id; ?>" data-next-up="<?php echo $next_up ?>" data-next-topic="<?php echo $topics ?>">
										<div class="replace-grid">
											<div class="next-video" style="background-image:url(<?php echo $thumbnail; ?>)" ></div>
											<div class="title">
												<h4>
													<?php echo $title; ?>
												</h4>
												<p class="project-name">
													<?php echo $topics ?>
												</p>
											</div>
										</div>
									</div>

							    	<?php ++$i ?>
							    <?php endwhile ?>
							<?php endif ?>

						</div>
					</div>
				</div>
			</div>
		</section>

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
					$('#video-title').text(video.name());
					$('.w-chrome').css('border-radius', '12px');
					$('.w-video-wrapper.w-css-reset').parent().css('border-radius', '12px');
					//$('.wistia_embed_initialized').removeAttr('style');
					$(".replace-video").click(function() {
						var next_video = $(this).attr('data-video-id');
						var $up_next = '#'+$(this).attr('data-next-up');
						var topic = $(this).attr('data-next-topic');
						$('.playbutton').show();
						video.replaceWith(next_video);
						$('#project-name').text(topic);
						$(this).fadeOut(400, function() {
							$($up_next).fadeIn(400);
						});
			  		});
				}
			});

			// target our video by the first 3 characters of the hashed ID
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
	<?php } ?>
