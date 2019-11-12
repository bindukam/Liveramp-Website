<?php

/**
 * Resources Utility Class
 */
class Resources {

	// @todo - instatiate class with constructor and use $vimeo_id to check is_vimeo?
	//
	// protected $marketo_id = false;
	// protected $vimeo_id = false;
	// function __construct($marketo_url, $vimeo_url)
	// {
	//
	// }

	/**
	 * Outputs the Call To Action text for Resource tile
	 *
	 * @return mixed|null|string|void
	 */
	public static function tile_cta_text() {
        if (!$cta_text = get_field( 'archive_page_tile_cta_text')) {
            if(has_term('video', 'resources_categories') || has_term('webinar', 'resources_categories')) {
                $cta_text = "Watch now";
            } elseif(has_term('ebook', 'resources_categories') || has_term('whitepaper', 'resources_categories')) {
                $cta_text = "Learn more";
            } elseif(has_term('onepage', 'resources_categories') || has_term('case-study', 'resources_categories')) {
                $cta_text = "View now";
            } else {
                $cta_text = "Learn more";
            }
            //error_log('logicDefined: '.$cta_text. " || termsString: ".get_terms_string_for_post('resources_categories') );
        }
//        else {
//            error_log("userDefined: ".$cta_text. " || termsString: ".get_terms_string_for_post('resources_categories'));
//        }

		return $cta_text;
	}

    /**
     * Outputs the category for Resource tile
     *
     * @return mixed|null|string|void
     */
	public static function get_resource_category_name($postId) {
        return get_the_terms( $postId, "resources_categories")[0]->name;
    }

	/**
	 * Outputs additional attributes for the Resource tile
	 *
	 * @return mixed|null|string|void
	 */
	public static function add_resource_attrs($vimeo_url) {

		$attr = '';

		if ( self::is_vimeo( $vimeo_url ) ) {

			$attr = ' has-thumbnail';
		}

		return $attr;
	}

	/**
	 * @param string $video_url
	 *
	 * @return bool
	 */
	public static function is_vimeo( $video_url ) {
		if ( strpos( $video_url, 'vimeo.com' ) === false ) {
			return false;
		}

		return true;
	}

	/**
	 * @param string $vimeo_url
	 *
	 * @return bool|string
	 */
	public static function vimeo_url_to_id( $vimeo_url ) {

		$pattern = '/vimeo\.com(\/video)?\/(?<code>\d+)/i';

        $matches = [];

        if( preg_match($pattern, $vimeo_url, $matches) !== false )
        {
            if(isset($matches['code']))
            {
            	return $matches['code'];
            }
        }

        return false;
	}

	/**
	 * @param string $vimeo_url
	 *
	 * @return mixed
	 */
	public static function get_vimeo_thumbnail_url( $vimeo_url ) {
		$vimeo_id       = self::vimeo_url_to_id( $vimeo_url );
		$vimeo_data_url = 'https://vimeo.com/api/v2/video/' . $vimeo_id . '.json';
		$vimeo_data     = file_get_contents( $vimeo_data_url );

		return json_decode( $vimeo_data )[0]->thumbnail_large;
	}

	/**
	 * @param string $video_id
	 * @param string/boolean $cta_button - default shows the circular arrow,
	 * but also accepts custom HTML and false for no play button
	 *
	 * @return string Video Embed Code to work with vimeo.js
	 */
	public static function make_vimeo_iframe( $video_id = false, $cta_button = 'default' ) {

		if( $video_id ):

			$embed = '<div class="video hide-mobile">'
					. '<div class="img-wrap js-vimeo-container" video-id="' . $video_id . '"></div>'
					. '<span class="video-play-button play-button-' . $video_id . '">';

			if( $cta_button ) {

				if( $cta_button === 'default' ) {

					// This is the animating arrows
					$embed.= '<div class="video-btn-thumb custom-arrow-bg arrow-color-accents">'
								. '<span class="custom-arrow-video arrow-color-accents"></span>'
							. '</div>';

				} else {

					$embed.= $cta_button;
				}
			}

			$embed.= '</span>'
	        		. '<span>'.$play_video_text.'</span>'
    			. '</div>'
				. '<div class="fluid-media-wrapper hide-desktop">'
					. '<iframe src="https://player.vimeo.com/video/' . $video_id . '?api=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="video"></iframe>'
				. '</div>';

			return $embed;

		endif;
	}

	public static function make_vimeo_iframe_from_url( $video_url = false ) {

		return self::make_vimeo_iframe( self::vimeo_url_to_id( $video_url ) );
	}
}
