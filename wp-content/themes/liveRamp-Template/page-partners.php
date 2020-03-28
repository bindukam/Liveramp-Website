<?php
/**
 * The template for displaying 
 * Template Name:  Partners Page

 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php 
	
	$url = 'https://partners.liveramp.com/partners/180bytwo/';
	// get json and make it an array 
	$data = json_decode(file_get_contents('https://partners.liveramp.com/api/?lang=us'));

	// example of getting just a page
	$page = file_get_contents($url);

	// $request = wp_remote_get($url);

	// dig down to certifications of first array
	// var_dump($data->all_items[0]->certifications);

	// var_dump($data );
	// echo $page;
	// echo $request;
	// var_dump($requset);

	$response = wp_remote_get( 'https://partners.liveramp.com/wp-json/wp/v2/partner/1024013/' );
	if ( is_array( $response ) ) {
	  $header = $response['headers']; // array of http header lines
	  $body = $response['body']; // use the content

	  echo $body;
	}



 ?>

<?php
get_footer();
