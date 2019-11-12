<?php

if( function_exists("register_field_group") ):

register_field_group(array (
	'id' => 'acf_partners',
	'title' => 'Partners',
	'fields' => array (
		array (
			'key' => 'field_546e0e6c99e91',
			'label' => 'Partner Website',
			'name' => 'partner_website',
			'type' => 'text',
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'partners',
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
