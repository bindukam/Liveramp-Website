<?php

if(function_exists("register_field_group")):

register_field_group(array (
	'id' => 'acf_careers',
	'title' => 'Careers',
	'fields' => array (
		array (
			'key' => 'field_546caa67b703e',
			'label' => 'Application ID',
			'name' => 'application_id',
			'type' => 'text',
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
		),
		array (
			'key' => 'field_546cbb67eb7ce',
			'label' => 'Careers Info',
			'name' => 'careers_info',
			'type' => 'wysiwyg',
			'default_value' => '',
			'toolbar' => 'full',
			'media_upload' => 'yes',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'careers',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));

endif;
