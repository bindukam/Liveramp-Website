<?php

if( function_exists("register_field_group") ):

register_field_group(array (
	'id' => 'acf_blogs-settings',
	'title' => 'Blogs\' Settings',
	'fields' => array (
		array (
			'key' => 'field_558b697d653cf',
			'label' => 'Blog',
			'name' => '',
			'type' => 'tab',
		),
		array (
			'key' => 'field_558b69a0653d0',
			'label' => 'Blog Header',
			'name' => 'blog_header',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_558b6a22653d1',
					'label' => 'Background',
					'name' => 'background',
					'type' => 'image',
					'column_width' => '',
					'save_format' => 'object',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_558b6a2c653d2',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_558b6a35653d3',
					'label' => 'Sub-Title',
					'name' => 'sub-title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
			),
			'row_min' => 1,
			'row_limit' => 1,
			'layout' => 'row',
			'button_label' => 'Add Row',
		),
		array (
			'key' => 'field_558b85de6bde7',
			'label' => 'Featured Posts in the Sidebar 3',
			'name' => 'blog_featured_posts_sidebar',
			'type' => 'relationship',
			'instructions' => 'Choose up to 6 featured posts to display in the sidebar on the blog.',
			'return_format' => 'object',
			'post_type' => array (
				0 => 'blog',
			),
			'taxonomy' => array (
				0 => 'all',
			),
			'filters' => array (
				0 => 'search',
			),
			'result_elements' => array (
				0 => 'featured_image',
				1 => 'post_title',
			),
			'max' => 6,
		),
		array (
			'key' => 'field_558b6a44653d4',
			'label' => 'Engineering Blog',
			'name' => '',
			'type' => 'tab',
		),
		array (
			'key' => 'field_558b6a51653d5',
			'label' => 'Engineering Blog Header',
			'name' => 'engineering_header',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_558b6a67653d6',
					'label' => 'Background',
					'name' => 'background',
					'type' => 'image',
					'column_width' => '',
					'save_format' => 'object',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_558b6a71653d7',
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_558b6a7a653d8',
					'label' => 'Sub-Title',
					'name' => 'sub-title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
			),
			'row_min' => 1,
			'row_limit' => 1,
			'layout' => 'row',
			'button_label' => 'Add Row',
		),
		array (
			'key' => 'field_558b861d6bde8',
			'label' => 'Featured Posts in the Sidebar 4',
			'name' => 'engineering_featured_posts_sidebar',
			'type' => 'relationship',
			'instructions' => 'Choose up to 6 featured posts to display in the sidebar on the blog.',
			'return_format' => 'object',
			'post_type' => array (
				0 => 'engineering',
			),
			'taxonomy' => array (
				0 => 'all',
			),
			'filters' => array (
				0 => 'search',
			),
			'result_elements' => array (
				0 => 'featured_image',
				1 => 'post_title',
			),
			'max' => 6,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'no_box',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));

endif;
