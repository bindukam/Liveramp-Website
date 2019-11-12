<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_partners-grid',
		'title' => 'Partners Grid',
		'fields' => array (
			array (
				'key' => 'field_56424b43a69d6',
				'label' => '',
				'name' => 'partners',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56424d22853a4',
						'label' => 'Partner',
						'name' => 'partner_for_grid',
						'type' => 'select',
						'column_width' => '',
						'choices' => array (
							'' => 'Select a partner from the list',
              # This will be populated by a custom dropdown hook
              # See `custom_partners_choices` in functions.php
						),
						'default_value' => '',
						'allow_null' => 0,
						'multiple' => 0,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Partner',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '131', # Why Data Connectivity / Measurement tier-two page
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '129', # Why Data Connectivity / Targeting tier-two page
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '133', # Why Data Connectivity / One-to-One Marketing tier-two page
					'order_no' => 0,
					'group_no' => 2,
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
}
