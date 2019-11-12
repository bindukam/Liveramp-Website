<?php

/**
 * Make image.
 *
 * @param        $image
 * @param bool   $image_alt
 * @param string $image_size Can pass in 'large', 'medium_large', 'medium' or 'thumbnail'
 */
function make_image( $image, $image_alt = false, $image_size = 'medium' ) {

	if( $image ):

		if( is_array( $image ) ) {

			$image_url = $image['sizes'][$image_size];

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

function get_video_id( $video_url ) {

	if( $video_url ) {

		$pattern = '/vimeo\.com(\/video)?\/(?<code>\d+)/i';

		$matches = [];

		if (preg_match($pattern, $video_url, $matches) !== 0)
		{
			if(isset($matches['code'])) {

				return [
					'site' => 'vimeo',
					'id' => $matches['code']
				];
			}

		} else {

			$pattern = '/wistia\.com(\/medias)?\/(?<code>[a-zA-Z0-9_]+)/i';

			$matches = [];

			if( preg_match($pattern, $video_url, $matches) !== false ) {

				if(isset($matches['code'])) {

					return [
						'site' => 'wistia',
						'id' => $matches['code']
					];
				}
			}
		}
	}

	// test urls
	// https://liveramp.wistia.com/medias/yytctjej0m
	// https://vimeo.com/192053691

	return false;
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

function make_video_from_id( $site, $video_id = false, $wistia_bg_id = false ) {
	if( $video_id ): ?>

		<?php if( $site === 'youtube'): ?>
		<div class="fluid-media-wrapper">
			<iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?api=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="video"></iframe>
		</div>
		<?php else: //if( $site === 'wistia'):

		if( !$wistia_bg_id ) {
			$wistia_bg_id = $video_id;
		} ?>

        <script src="https://fast.wistia.com/embed/medias/<?php echo $wistia_bg_id; ?>.jsonp" async></script>
        <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
        <script>document.getElementsByClassName('hero')[0].style.height = 'auto';</script>
        <div id="js-video-background" class="wistia_embed wistia_async_<?php echo $wistia_bg_id; ?> videoFoam=true autoPlay=true muted=true silentAutoPlay=true endVideoBehavior=loop" style="">
            <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;">
                <img src="https://fast.wistia.com/embed/medias/<?php echo $wistia_bg_id; ?>/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" />
            </div>
        </div>
        <script type="text/javascript">
            window.addEventListener('load', restartPlay, false);
            function restartPlay() {
                var video = Wistia.api('<?php echo $wistia_bg_id; ?>');
                video.bind("pause", function() {
                    //console.log("The video was just paused!");
                    video.play();
                });
            };
        </script>
		<?php endif ?>

	<?php endif;
}

function make_vimeo_iframe( $video_id = false ) {

	if( $video_id ): ?>

		<div class="fluid-media-wrapper">
			<iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?api=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="video"></iframe>
		</div>

	<?php endif;
}

function make_vimeo_thumbnail( $video_id ) {

	if( $video_id ): ?>

		<div class="img-wrap js-vimeo-container" video-id="<?php echo $video_id; ?>"></div>

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

		<?php make_vimeo_iframe($vimeo_id); ?>

	<?php else:

		// echo '<p>Invalid Vimeo Url</p>';

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


/**
 * Get URL.
 *
 * @param      $field_type
 * @param      $external_url
 * @param      $internal_url
 * @param bool $anchor_link
 *
 * @return array
 */
function get_url($field_type, $external_url, $internal_url, $anchor_link = false )
{
	$data = [
		'is_external_link' => false,
	];

	$field_type = strtolower($field_type);

	if ($field_type === 'external') {

		$data['url'] = $external_url;
		$data['is_external_link'] = true;

	} else if (($field_type === 'internal')) {

		if( is_int( $internal_url ) ) {

			// Internal Link is an ID, so get the URL from the ID
			$internal_url = get_the_permalink($internal_url);
		}

		$data['url'] = $internal_url;

		if( $anchor_link ) {

			if( $internal_url ) {

				if( get_the_permalink() === $internal_url ) {

					$data['url'] = '#'.$anchor_link;

				} else {
					$data['url'] .= '#'.$anchor_link;
				}

			} else {

				// Anchor link only - no url given
				$data['url'] = '#'.$anchor_link;
			}
		}

	} else {

		$data['url'] = null;
	}

	return $data;
}
