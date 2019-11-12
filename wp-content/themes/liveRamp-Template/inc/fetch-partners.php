<?php

define("THEME_DIR", get_template_directory_uri());

function enqueue_scripts( $filter_data ) {
	wp_enqueue_script('filter_object', get_template_directory_uri() . '/ajax.js', null, null, true);
	wp_localize_script( 'filter_object', 'filter_data', $filter_data );
}

/**
 * Enqueue scripts and styles
 */
function arc_filters() {

	global $post;

// =============================================================================
//  Partners - CURL
// =============================================================================

	if( is_page_template('page-partners-curl.php') ) {

		// if( $api_url = get_field('content_api_url', 'options') )
		// {
		// 	echo $api_url.'<br>';
		// 	echo $api_url.'<br>';
		// 	echo 'url is : ' . get_field('content_api_url', 'options') . '<br>';
		// 	// $json = file_get_contents($api_url);

		// 	// $curl_options = [
		// 	// 	CURLOPT_RETURNTRANSFER => true,     // return web page
		// 	// 	CURLOPT_HEADER         => true,    //  return headers
		// 	// 	CURLOPT_FOLLOWLOCATION => true,     // follow redirects
		// 	// 	CURLOPT_ENCODING       => "",       // handle all encodings
		// 	// 	// CURLOPT_USERAGENT      => "spider", // who am i
		// 	// 	CURLOPT_AUTOREFERER    => true,     // set referer on redirect
		// 	// 	CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
		// 	// 	CURLOPT_TIMEOUT        => 120,      // timeout on response
		// 	// 	CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
		// 	// 	CURLOPT_SSL_VERIFYPEER => true,
		// 	// 	CURLOPT_SSL_VERIFYHOST => 2,
		// 	// 	//CURLOPT_CAINFO         => 'ca.pem'
		// 	// ];

		// 	// $ch = curl_init($api_url);
		// 	// curl_setopt_array( $ch, $curl_options );
		// 	// curl_close( $ch );
		// 	// $json = curl_exec($ch);
		// 	// curl_close( $ch );
		// 	// $headers = curl_getinfo($ch);

		// 	// echo '<br><br><br><br><br><br><br><br>';
		// 	// echo 'Headers<br>';
		// 	// var_dump($headers);

		// 	// $ch = curl_init($api_url);

		// 	// var_dump($api_url);

		// 	// $curl = curl_init($api_url);
		// 	// curl_setopt($curl, CURLOPT_VERBOSE, 1);
		// 	// // curl_setopt($curl, CURLOPT_SSLVERSION,3);
		// 	// // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		// 	// // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		// 	// curl_setopt ($curl, CURLOPT_URL, $api_url);
		// 	// $json = curl_exec($curl);
		// 	// curl_close( $curl );


		// 	// Initialize session and set URL.
		// 	$ch = curl_init();
		// 	curl_setopt($ch, CURLOPT_URL, $api_url);

		// 	// Set so curl_exec returns the result instead of outputting it.
		// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		// 	// Get the response and close the channel.
		// 	$json = curl_exec($ch);
		// 	curl_close($ch);

		// 	$filter_data = json_decode($json, true);
		// }

		// enqueue_scripts( $filter_data );

		// #2

		if( $api_url = get_field('content_api_url', 'options') ) {

			// echo 'contents: ' . file_get_contents($api_url);
			// echo 'eng contents';

			// Get cURL resource
			$curl = curl_init();
			// Set some options - we are passing in a useragent too here

			$options = array(
	            CURLOPT_URL            => $api_url,
	            CURLOPT_RETURNTRANSFER => true,
	            CURLOPT_HEADER         => true,
	            CURLOPT_FOLLOWLOCATION => true,
	            CURLOPT_ENCODING       => "",
	            CURLOPT_AUTOREFERER    => true,
	            CURLOPT_CONNECTTIMEOUT => 120,
	            CURLOPT_TIMEOUT        => 120,
	            CURLOPT_MAXREDIRS      => 10,

	            CURLOPT_VERBOSE		   => 1,

	            // CURLOPT_SSLVERSION	   => 3,
	            CURLOPT_SSL_VERIFYPEER => false
	        );

			// array(
			// 	CURLOPT_RETURNTRANSFER => 1,
			// 	CURLOPT_URL => $api_url,
			// 	CURLOPT_USERAGENT => 'Sample cURL Request',
			// 	CURLOPT_SSLVERSION => 3,
			// 	CURLOPT_SSL_VERIFYPEER => false,
			// 	CURLOPT_SSL_VERIFYHOST => false,
			// 	CURLOPT_FOLLOWLOCATION => true
			// 	// CURLOPT_PROXYPORT => "80"
			// )

			curl_setopt_array($curl, $options);

			// Send the request & save response to $resp
			if(!$resp = curl_exec($curl)){

				die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
			}

			// Close request to clear up some resources
			curl_close($curl);
			$filter_data = json_decode($resp, true);

			enqueue_scripts( $filter_data );
		}
	}

// =============================================================================
//  Partners
// =============================================================================

	if( is_page_template('page-partners-archive.php') ) {

		if( $api_url = get_field('content_api_url', 'options') )
		{
			// echo $api_url.'<br>';
			// echo $api_url.'<br>';
			// echo 'url is : ' . get_field('content_api_url', 'options') . '<br>';
			// // $json = file_get_contents($api_url);

			// $curl = curl_init();

			// $curl_options = [
			// 	CURLOPT_RETURNTRANSFER => true,     // return web page
			// 	CURLOPT_HEADER         => true,    //  return headers
			// 	CURLOPT_FOLLOWLOCATION => true,     // follow redirects
			// 	CURLOPT_ENCODING       => "",       // handle all encodings
			// 	// CURLOPT_USERAGENT      => "spider", // who am i
			// 	CURLOPT_AUTOREFERER    => true,     // set referer on redirect
			// 	CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
			// 	CURLOPT_TIMEOUT        => 120,      // timeout on response
			// 	CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
			// 	CURLOPT_SSL_VERIFYPEER => true,
			// 	CURLOPT_SSL_VERIFYHOST => 2,
			// 	//CURLOPT_CAINFO         => 'ca.pem'
			// ];

			// $ch = curl_init($api_url);
			// curl_setopt_array( $ch, $curl_options );
			// curl_close( $ch );

			// // curl_setopt($curl, CURLOPT_VERBOSE, 1);
			// // curl_setopt($curl, CURLOPT_SSLVERSION,3);
			// // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			// // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

			// //curl_setopt ($curl, CURLOPT_URL, $api_url);

			// $json = curl_exec($ch);
			// $headers = curl_getinfo($ch);

			// echo '<br><br><br><br><br><br><br><br>';
			// echo 'Headers<br>';
			// var_dump($headers);
			// var_dump($json);
			// // $obj = json_decode($json);
			// // echo $obj->access_token;
			// var_dump($json);

			// $filter_data = json_decode($json, true);

		} else {

		}

		$filter_data = ['api_url' => get_field('content_api_url', 'options')];

		enqueue_scripts( $filter_data );
	}

	$ajaxData = array(
		'ajaxurl' => admin_url('admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'ajax-users-nonce' ),
	);

	wp_enqueue_script('app', get_template_directory_uri() . '/ajax.js', null, null, true);
	wp_localize_script( 'app', 'WPaAjax', $ajaxData );
}

add_action( 'wp_enqueue_scripts', 'arc_filters' );

?>
