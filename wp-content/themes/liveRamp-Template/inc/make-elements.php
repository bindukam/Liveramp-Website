<?php

function make_image( $image, $image_alt = false ) {

	if( $image ):

		if( is_array( $image ) ) {
			$image_url = $image['url'];

			if( !$image_alt ) {
				$image_alt = $image['alt'];
			}
		} else {
			$image_url = $image;

			if( !$image_alt ) {
				$image_alt = get_the_title();
			}
		} ?>
		<div class="img-container">
			<img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
		</div>
	<?php endif;
}

function make_button( $btn_link, $btn_text = 'Click Here' ) {

	if( $btn_link ): ?>

		<a href="<?php echo $btn_link; ?>" class="btn">
			<span><?php echo $btn_text; ?></span>
			<i class="nc-icon-outline arrows-1_minimal-right"></i>
		</a>

	<?php endif;
}

function get_vimeo_id( $video_url ) {

	$pattern = '/vimeo\.com(\/video)?\/(?<code>\d+)/i';

	$matches = [];

	if (preg_match($pattern, $video_url, $matches) !== false)
	{
		if(isset($matches['code'])) {

			return $matches['code'];
		}
	}

	return false;
}

function make_vimeo_iframe( $video_id ) {

	if( $video_id ): ?>

		<div class="fluid-media-wrapper">
			<iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?api=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="video"></iframe>
		</div>

	<?php endif;
}

function make_vimeo_thumbnail( $video_id ) {

	if( $video_id ): ?>

		<div class="img-wrap js-add-vimeo-thumb" video-id="<?php echo $video_id; ?>"></div>

	<?php endif;
}

function make_video( $video_url, $image = false ) {

	if( $vimeo_id = get_vimeo_id( $video_url ) ): ?>

		<div class="video-wrap">

			<?php /* if( $image ):

				if( is_array( $image ) ) {
					$image_url = $image['url'];

					if( !$image_alt ) {
						$image_alt = $image['alt'];
					}
				} else {
					$image_url = $image;

					if( !$image_alt ) {
						$image_alt = get_the_title();
					}
				} ?>

				<div class="img-wrap">
					<img src="<?php echo $image_url; ?>">
				</div>

			<?php else: */ ?>

				<?php make_vimeo_thumbnail( $vimeo_id ); ?>

			<?php /* endif */ ?>

			<div class="video-btn custom-arrow-bg arrow-color-accents play-button-<?php echo $vimeo_id; ?> wow fadeInUp" data-wow-delay="0.75s">
				<span class="custom-arrow-video arrow-color-accents"></span>
			</div>

		</div>

		<?php make_vimeo_iframe(); ?>

	<?php else:

		echo '<p>Invalid Vimeo Url</p>';

	endif;
}

function make_icon( $icon ) {

	if( $icon ):

		// echo '<!-- icon is template-parts/icons/icon-' . strtolower( str_replace(' ', '-', $icon) ) . '-->';

		$path = 'template-parts/icons/icon-' . strtolower( str_replace(' ', '-', $icon) );

		//if ( locate_template( $path . '.php', true, false ) ) { // '' ===

			get_template_part($path);
		//}

	endif;
}
