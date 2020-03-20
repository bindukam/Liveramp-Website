<?php
/*--------------------------------------------------------*\
	Register Custom Taxonomies
\*--------------------------------------------------------*/

add_action('init', 'register_tax');

function register_tax() {
	register_taxonomy (
		'partners_categories',
		'partners',
		array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Category',
				'new_item_name' => 'New Category'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'resources_categories',
		'resources',
		array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Category',
				'new_item_name' => 'New Category'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'resources_audiences',
		'resources',
		array(
			'labels' => array(
				'name' => 'Audiences',
				'add_new_item' => 'Add New Audience',
				'new_item_name' => 'New Audience'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'resources_industries',
		'resources',
		array(
			'labels' => array(
				'name' => 'Industries',
				'add_new_item' => 'Add New Industry',
				'new_item_name' => 'New Industry'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'resources_topics',
		'resources',
		array(
			'labels' => array(
				'name' => 'Topics',
				'add_new_item' => 'Add New Topic',
				'new_item_name' => 'New Topic'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'blog_categories',
		'blog-post',
		array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Category',
				'new_item_name' => 'New Category'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false,
			'show_admin_column' => true
		)
	);

	register_taxonomy (
		'blog_tags',
		'blog-post',
		array(
			'labels' => array(
				'name' => 'Tags',
				'add_new_item' => 'Add New Tag',
				'new_item_name' => 'New Tag'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false,
			'show_admin_column' => true
		)
	);



	register_taxonomy (
		'engineering_categories',
		'engineering',
		array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Category',
				'new_item_name' => 'New Category'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'careers_categories',
		'careers',
		array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Category',
				'new_item_name' => 'New Category'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'webinars_categories',
		'webinars',
		array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Category',
				'new_item_name' => 'New Category'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'events_locations',
		'events',
		array(
			'labels' => array(
				'name' => 'Location',
				'add_new_item' => 'Add New Location',
				'new_item_name' => 'New Location'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

	register_taxonomy (
		'events_liveramp',
		'events',
		array(
			'labels' => array(
				'name' => 'LiveRamp Status',
				'add_new_item' => 'Add New LiveRamp Status',
				'new_item_name' => 'New LiveRamp Status'
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		)
	);

// 	register_taxonomy (
// 		'resource_link_type',
// 		'resource_link',
// 		array(
// 			'labels' => array(
// 				'name' => 'Link Type',
// 				'add_new_item' => 'Add New Link Type',
// 				'new_item_name' => 'New Link Type'
// 			),
// 			'show_ui' => true,
// 			'hierarchical' => true,
// 			'show_tagcloud' => false
// 		)
// 	);
}
