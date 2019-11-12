<?php

/**
 * Class LiveRampUtility
 */
class LiveRampUtility {

	/**
	 * @param $image_url
	 *
	 * @return bool
	 */
	public static function is_svg( $image_url ) {
		$extension = substr( strrchr( $image_url, '.' ), 1 );

		if ( $extension == 'svg' ) {
			return true;
		}

		return false;
	}
}
