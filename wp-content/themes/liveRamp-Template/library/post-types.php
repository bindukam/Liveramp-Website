<?php

if( !function_exists('lvrmp_posts_register') ) {

add_action('init', 'lvrmp_posts_register', 0);

function lvrmp_posts_register() {

	$labels = array(
		'name' => _x('News', 'post type general name'),
		'singular_name' => _x('News', 'post type singular name'),
		'add_new' => _x('Add New', 'News'),
		'add_new_item' => __('Add New News'),
		'edit_item' => __('Edit News'),
		'new_item' => __('New News'),
		'view_item' => __('View News'),
		'search_items' => __('Search News'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'rewrite' => true,
		'show_in_nav_menus' => true,
	);



	register_post_type('news' , $args);

	$labels = array(
		'name' => _x('Blog', 'post type general name'),
		'singular_name' => _x('Blog', 'post type singular name'),
		'add_new' => _x('Add New', 'Blog'),
		'add_new_item' => __('Add New Blog'),
		'edit_item' => __('Edit Blog'),
		'new_item' => __('New Blog'),
		'view_item' => __('View Blog'),
		'search_items' => __('Search Blog'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail','author', 'comments'),

		'rewrite' => array( 'slug' => 'blog', 'with_front' => true ),

		// 'rewrite' => array( "slug" => "blog", 'with_front' => false ),

		'show_in_nav_menus' => true,
	);

	register_post_type('blog-post' , $args);

	$labels = array(
		'name' => _x('Engineering', 'post type general name'),
		'singular_name' => _x('Engineering', 'post type singular name'),
		'add_new' => _x('Add New', 'Engineering'),
		'add_new_item' => __('Add New Engineering'),
		'edit_item' => __('Edit Engineering'),
		'new_item' => __('New Engineering'),
		'view_item' => __('View Engineering'),
		'search_items' => __('Search Engineering'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail','author', 'comments'),
		'rewrite' => array( 'slug' => 'engineering', 'with_front' => true ),
		'show_in_nav_menus' => true,
	);

	// register_post_type('engineering' , $args);

	$labels = array(
		'name' => _x('Resources', 'post type general name'),
		'singular_name' => _x('Resources', 'post type singular name'),
		'add_new' => _x('Add New', 'Resources'),
		'add_new_item' => __('Add New Resources'),
		'edit_item' => __('Edit Resources'),
		'new_item' => __('New Resources'),
		'view_item' => __('View Resources'),
		'search_items' => __('Search Resources'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'rewrite' => true,
		'show_in_nav_menus' => true,
	);

	register_post_type('resources' , $args);

	$labels = array(
		'name' => _x('Webinars', 'post type general name'),
		'singular_name' => _x('Webinars', 'post type singular name'),
		'add_new' => _x('Add New', 'Webinars'),
		'add_new_item' => __('Add New Webinars'),
		'edit_item' => __('Edit Webinars'),
		'new_item' => __('New Webinars'),
		'view_item' => __('View Webinars'),
		'search_items' => __('Search Webinars'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'rewrite' => true,
		'show_in_nav_menus' => true,
	);

//	register_post_type('webinars' , $args);

	$labels = array(
		'name' => _x('Events', 'post type general name'),
		'singular_name' => _x('Event', 'post type singular name'),
		'add_new' => _x('Add New', 'Webinars'),
		'add_new_item' => __('Add New Event'),
		'edit_item' => __('Edit Events'),
		'new_item' => __('New Event'),
		'view_item' => __('View Events'),
		'search_items' => __('Search Events'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'author'),
		'rewrite' => true,
		'show_in_nav_menus' => true,
	);
	
	register_post_type('events' , $args);
	
	/**
	 * Post Type: Partners.
	 */

	$labels = array(
		"name" => __( "Partners", "custom-post-type-ui" ),
		"singular_name" => __( "Partner", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Partners", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => false,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "all_partners", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "all_partners", $args );
}

}
