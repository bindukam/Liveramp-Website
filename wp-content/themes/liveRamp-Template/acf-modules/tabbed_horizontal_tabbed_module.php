<?php

	if (!get_sub_field('hide_background')) {
		$theme_uri = get_template_directory_uri();
		// Theme assets folder
		$theme_images = $theme_uri.'/dist/assets/images';
		$theme_svg = $theme_images.'/svg';
		$style = "background-image:url('".$theme_svg."/wavelines-green.svg')";
	}

 ?>

<style>
/* video rounded corder crop */
.tabbed_horizontal_tabbed_module .video {
    /*overflow: hidden;*/
    /*margin-right: 4px;*/
}
.tabbed_horizontal_tabbed_module .video iframe {

}
</style>

<section class="tabbed_horizontal_tabbed_module pad-section">
	<div class="grid-container">
		<div class="grid-x">
			<?php if ((get_sub_field('title')) || (get_sub_field('description'))): ?>
				<div class="cell text-center tabs-title-cell">
					<?php if (get_sub_field('title')): ?>
						<h2 class="green"><?php the_sub_field('title') ?></h2>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description') ?>
					<?php endif ?>
					<div class="pad-ul no-lineheight">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
					</div>
				</div>
			<?php endif ?>
			<?php
				// CREATED ID FOR TABS
				$tab_id = 'tab'.rand();
			 ?>
			<div class="cell tab-wrapper">
				<ul class="tabs" data-responsive-accordion-tabs="accordion medium-tabs large-tabs" id="<?php echo $tab_id ?>"  data-allow-all-closed="true">

					<?php if (have_rows('tabs')): ?>
						<?php $i = 1; ?>
					    <?php while(have_rows('tabs')) : ?>
					    	<?php
					    		if ($i == 1) {
					    				$active = 'is-active';
					    				$aria_true = 'aria-selected="true"';
					    			}
					    			else {
					    				$active = '';
					    				$aria_true = '';
					    			}
					    	 ?>
					    <?php the_row(); ?>
					    	<li class="tabs-title <?php echo $active ?>">
					    		<a href="<?php echo '#panel'.$i; ?>" <?php echo $aria_true ?>>
					    			<?php the_sub_field('tab') ?>
					    		</a>
					    	</li>
					    	<?php ++$i ?>
					    <?php endwhile ?>
					<?php endif ?>

				</ul>

				<div class="bg-art">
					<?php echo file_get_contents("$theme_svg/wavelines-green.svg"); ?>
				</div>

				<div class="tabs-content" data-tabs-content="<?php echo $tab_id; ?>">

				 <?php if (have_rows('tabs')): ?>
				 	<?php $i = 1; ?>
				     <?php while(have_rows('tabs')) : ?>
				     	<?php
				     		if ($i == 1) {
				     				$active = 'is-active';
				     			}
				     			else {
				     				$active = '';
				     			}
				     	 ?>
				     	 <?php the_row(); ?>
				     	<div class="tabs-panel <?php echo $active; ?>" id="<?php echo 'panel'.$i ?>">
				     	  	<div class="grid-x grid-margin-x align-middle">
				     	  		<div class="cell medium-7 show-for-medium image">
				     	  			<?php if (get_sub_field('add_image_or_video') == 'image'): ?>
				     	  				<?php echo wp_get_attachment_image( get_sub_field('image'), full, '',array( "class" => "b-radius tab-image hard-shadow" ) ); ?>
				     	  			<?php endif ?>
				     	  			<?php if (get_sub_field('add_image_or_video') == 'video'): ?>
				     	  				<!-- <?php the_sub_field('video') ?> -->
				     	  				<div class="video b-radius">
				     	  					<div class="play-video">
				     	  						<img src="<?php the_sub_field('poster') ?>" alt="poster image" class="b-radius hard-shadow">
				     	  					</div>

				     	  					<?php
				     	  							// the_sub_field('video_url');

				     	  							// get iframe HTML
				     	  							$iframe = get_sub_field('video');


				     	  							// use preg_match to find iframe src
				     	  							preg_match('/src="(.+?)"/', $iframe, $matches);
				     	  							$src = $matches[1];




				     	  							// add extra params to iframe src
				     	  							$params = array(
				     	  							    'controls'    => 0,
				     	  							    'hd'        => 1,
				     	  							    'autohide'    => 1,
				     	  							    'autoplay'   => 0,
				     	  							    'title'   => 0,
				     	  							    'byline'  => 0,
				     	  							    'portrait' => 0
				     	  							);

				     	  							$new_src = add_query_arg($params, $src);

				     	  							$iframe = str_replace($src, $new_src, $iframe);


				     	  							// add extra attributes to iframe html
				     	  							$attributes = 'frameborder="0"';

				     	  							$id = "id='video-frame$i'";

				     	  							$iframe = str_replace('></iframe>', ' ' . $attributes . $id. ' style="display: none"></iframe>', $iframe);


				     	  							// echo $iframe
				     	  							echo $iframe;
				     	  					?>
				     	  				</div>
				     	  			<?php endif ?>

				     	  		</div>
				     	  		<div class="cell medium-5 content">
				     	  			<h3 class="green"><?php the_sub_field('title') ?></h3>
				     	  			<?php the_sub_field('content') ?>
				     	  		</div>
				     	  	</div>
				     	</div>
				     	<?php ++$i; ?>
				     <?php endwhile ?>
				 <?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>

<script>

    $(document).ready(function () {

    	$('.play-video').click(function () {

    		var $id = $(this).next().attr('id');
    		var $poster = $(this);
    		// console.log($id);

    		var playVideo = new Vimeo.Player($id);
    		/* Act on the event */
    		// console.log('you clicked');
    		$poster.hide();
    		var $id2 = '#'+$id;
    		// console.log($id2);
    		$($id2).show();
    		playVideo.play();

    		//  pause vide on tab hange
    		$('.tabs').on('change.zf.tabs', function () {
    			playVideo.pause();
    		})

    	});

    })

</script>
