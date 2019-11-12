<?php

require_once ABSPATH . 'wp-content/composer-lib/tinify/tinify/lib/Tinify.php';
require_once ABSPATH . 'wp-content/themes/liveramp/inc/partners-api/PartnersCacheUtils.php';

/**
 * Class PartnersCache
 *
 * @author  Mike Rudling <mrudling@wearearchitect.com>
 */
class PartnersCache {

	/**
	 * Partners data remote source URL.
	 */
	const DATA_URL = 'https://connect.liveramp-live.dev.cc/public/destinations.json';

	/**
	 * Local cache timestamp URL.
	 */
	const CACHE_TIMESTAMP_URL = ABSPATH . 'wp-content/themes/liveramp/inc/partners-api/cache_timestamp.json';

	/**
	 * Local cache URL.
	 */
	const CACHE_URL = ABSPATH . 'wp-content/themes/liveramp/inc/partners-api/partners.json';

	/**
	 * Local images directory.
	 */
	const IMAGES_DIR = ABSPATH . 'wp-content/uploads/partners/';

	/**
	 * Local optimized images directory.
	 */
	const OPTIMIZED_IMAGES_DIR = ABSPATH . 'wp-content/uploads/partners/optimized/';

	/**
	 * Tinify API key.
	 */
	const TINIFY_API_KEY = 'imoBrYqSIWAEdtfg7qDB0jOcNjsEjVa_';

	/**
	 * Seven hours in milliseconds.
	 */
	const SEVEN_HOURS = 25200;

	/**
	 * Twelve hours in milliseconds.
	 */
	const TWELVE_HOURS = 43200;

	/**
	 * PartnersCache constructor.
	 */
	public function __construct() {
		LiveRamp\Tinify\setKey( self::TINIFY_API_KEY );
	}

	/**
	 * Cache data.
	 *
	 * @return bool|string
	 */
	public function cacheData() {
		$timeNow    = date( 'U' );
		$timeCached = file_get_contents( self::CACHE_TIMESTAMP_URL );
		$diff       = (int) $timeNow - $timeCached;

		if ( $diff > self::TWELVE_HOURS ) {
			// Call API and cache the data.
			$data = file_get_contents( self::DATA_URL );
			file_put_contents( self::CACHE_URL, $data );
			file_put_contents( self::CACHE_TIMESTAMP_URL, $timeNow );
		} else {
			// Get cached data.
			$data = file_get_contents( self::CACHE_URL );
		}

		return $data;
	}

	/**
	 * Cache images.
	 */
	public function cacheImages() {
		$data   = json_decode( self::cacheData() );
		$now    = (int) date( 'U' );
		$nowGMT = $now - self::SEVEN_HOURS;

		if( !empty($data)) {

			foreach ( $data as $item ) {
				$image_name = $item->id . '.png';
				$updatedTimestamp = strtotime( $item->updated_at );

				// Check if image exists locally, if not cache it.
				if ( file_exists( self::IMAGES_DIR . $image_name ) === false ) {
					$this->saveImage( $item );
				}

				// Check if the remote image file update_at filed in the JSON
				// response is less than 1 week.  If it is, save it.
				if ( ( $nowGMT - $updatedTimestamp ) < (self::TWELVE_HOURS) && filemtime(self::IMAGES_DIR . $image_name) > self::TWELVE_HOURS) {
					$this->saveImage( $item );
				}
			}
		}
	}

	/**
	 * Save image.
	 *
	 * @param $item
	 */
	protected function saveImage( $item ) {
		$image_name = $item->id . '.png';
		$image_data = PartnersCacheUtils::curl($item->logo_url);

		if($image_data !== false) {
			$image_path = self::IMAGES_DIR . $image_name;
			$optimized_image_path = self::OPTIMIZED_IMAGES_DIR . $image_name;
			file_put_contents( $image_path, $image_data );
			self::optimizeImage( $image_path, $optimized_image_path );
		}
	}

	/**
	 * Optimize the image.
	 *
	 * @param string $image_path
	 * @param string $optimized_image_path
	 */
	protected function optimizeImage( $image_path, $optimized_image_path ) {
		$resizeOptions = [
			'method' => 'scale',
			'width'  => 150
		];
		LiveRamp\Tinify\fromFile( $image_path )->toFile( $optimized_image_path );
		LiveRamp\Tinify\fromFile( $optimized_image_path )->resize( $resizeOptions )->toFile( $optimized_image_path );
	}
}
