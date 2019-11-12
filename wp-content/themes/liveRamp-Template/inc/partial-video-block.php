<?php
	$title = get_sub_field( 'title' );
	$subtitle = get_sub_field( 'subtitle' );
	$content = get_sub_field( 'content' );
	$angle = get_sub_field( 'slant' );
	$bg_color = get_sub_field( 'background_color' );
	$button_text = get_sub_field( 'button_text' );
	$video_image = get_sub_field( 'video_image' );
	$vimeo_video_id = get_sub_field( 'vimeo_video_id' );

	$classes = '';
	$classes .= 'block block-video block-text-lt ';
	$classes .= 'bg-' . $bg_color . ' ';
	$classes .= $angle . ' ';
?>

<section class="<?php echo $classes; ?>">
	<div class="ctn">
		<header class="header-block">
			<h1 class="title"><?php echo $title ?></h1>
			<h3 class="subtitle"><?php echo $subtitle ?></h3>
		</header>
		<div class="cnt">
			<div class="video-thumb">
				<a href="#" class="md-video-block video-link"
					data-modal="md-block-video_<?php echo $vimeo_video_id ?>"
					title="Open video player">
					<img src="<?php echo $video_image ?>" />
					<div class="btn-center">
						<div class="btn-ctn">
							<span class="btn"><?php echo $button_text ?><span class="icon-arrow-right"></span></span>
						</div>
					</div>
				</a>
				<span class="mobile-iframe"></span>
			</div>
		</div>
	</div>
</section>

<div class="md-modal md-effect md-video-block" id="md-block-video_<?php echo $vimeo_video_id ?>">
	<div class="md-content">
		<iframe height="500" width="500" src="https://player.vimeo.com/video/<?php echo $vimeo_video_id; ?>?title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
</div>
