<?php

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_590ba5d2c30ae',
		'title' => 'Events Page',
		'fields' => array (
			array (
				'key' => 'field_590ba63db9539',
				'label' => 'Slider',
				'name' => 'slider',
				'type' => 'relationship',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array (
					0 => 'events',
				),
				'taxonomy' => array (
				),
				'filters' => array (
					0 => 'search',
					1 => 'post_type',
					2 => 'taxonomy',
				),
				'elements' => '',
				'min' => '',
				'max' => '',
				'return_format' => 'object',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-events.php',
				),
			)
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;
