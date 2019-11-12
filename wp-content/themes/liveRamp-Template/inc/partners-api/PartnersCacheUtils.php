<?php

/**
 * Class Utils
 *
 * @package Verve
 * @author  Mike Rudling <mrudling@wearearchitect.com>
 */
class PartnersCacheUtils {

	/**
	 * Make a CURL request.
	 *
	 * @param string $url     The URL / endpoint in the Salesforce API.
	 * @param int    $method  0 = GET, 1 = POST.
	 * @param array  $data    Data to send with a POST request.
	 * @param array  $headers Headers to send with the request.
	 *
	 * @return mixed
	 */
	public static function curl( $url, $method = 0, $data = [], $headers = [] ) {
		$resource = curl_init();

		curl_setopt( $resource, CURLOPT_URL, $url );
		curl_setopt( $resource, CURLOPT_POST, $method );
		curl_setopt( $resource, CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $resource, CURLOPT_RETURNTRANSFER, true );

		if ( 1 === $method ) {
			curl_setopt( $resource, CURLOPT_POSTFIELDS, $data );
		}

		$response = curl_exec( $resource );

		$httpCode = curl_getinfo($resource, CURLINFO_HTTP_CODE);

		if($httpCode == 404) {
			curl_close( $resource );

			return false;
		}

		curl_close( $resource );

		return $response;
	}
}
