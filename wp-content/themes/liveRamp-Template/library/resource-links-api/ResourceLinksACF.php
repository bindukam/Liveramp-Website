<?php

if(function_exists("register_field_group")&& 1 == 0)
{
	
	// $types = get_terms( array(
	// 	'taxonomy' => 'resources_categories',
	// 	'hide_empty' => true,
	//  ) );
	// $choices = array();
	// foreach($types as $type) {
	//    $id = $type->slug;
	//    $name = $type->name;
	//    $choice = array( $id => $name );
	//    array_push($choices, $choice);
	// }

	register_field_group(array (
		'id' => 'acf_resource-link-data',
		'title' => 'Resource Link Data',
		'fields' => array (
			array (
				'key' => 'field_55e4dbbaee2e1',
				'label' => 'Link Type',
				'name' => 'link_type',
				'type' => 'radio',
				'choices' => array (
					'resource' => 'Resource',
					'video' => 'Video',
					'news' => 'News',
					'pressrelease' => 'External Press Release',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_55e4df5574184',
				'label' => 'Resource Sub-Type',
				'name' => 'doc_sub_type',
				'type' => 'radio',
				'instructions' => 'Group items together using this sub-type.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'resource',
						),
					),
					'allorany' => 'all',
				),
				'choices' => $choices,
				'other_choice' => 1,
				'save_other_choice' => 1,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_56b0e824f4d29',
				'label' => 'External Press Releases',
				'name' => '',
				'type' => 'message',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'pressrelease',
						),
					),
					'allorany' => 'all',
				),
				'message' => 'External Press Releases will appear in the "News" section.',
			),
			array (
				'key' => 'field_55c92671d52af',
				'label' => 'Link Label',
				'name' => 'link_label',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '!=',
							'value' => 'news',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55e4dbffee2e2',
				'label' => 'Blog Post',
				'name' => 'blog_post',
				'type' => 'relationship',
				'instructions' => 'Choose a blog post from the list on the left. Limit 1.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'news',
						),
					),
					'allorany' => 'all',
				),
				'return_format' => 'object',
				'post_type' => array (
					0 => 'news',
					1 => 'blog',
					2 => 'engineering',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
					1 => 'post_type',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => 1,
			),
			array (
				'key' => 'field_55e4dc96d7bcc',
				'label' => 'Thumbnail',
				'name' => 'thumbnail',
				'type' => 'image',
				'instructions' => 'Upload or select an image to use as a thumbnail for this link.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'news',
						),
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'resource',
						),
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'video',
						),
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'pressrelease',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'object',
				'preview_size' => 'blog-thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56b0e7e8fd123',
				'label' => 'Teaser',
				'name' => 'teaser',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'pressrelease',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_55c9257950a6c',
				'label' => 'Link URL',
				'name' => 'link_url',
				'type' => 'text',
				'instructions' => 'Include http://',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'resource',
						),
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'video',
						),
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'pressrelease',
						),
					),
					'allorany' => 'any',
				),
				'default_value' => 'http://',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56b1247f4821b',
				'label' => 'Post Date',
				'name' => 'post_date',
				'type' => 'date_picker',
				'instructions' => 'Used to order this external press release within the "News" container it appears in on Partner pages.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_55e4dbbaee2e1',
							'operator' => '==',
							'value' => 'pressrelease',
						),
					),
					'allorany' => 'all',
				),
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'resource_link',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_resource-link-pages',
		'title' => 'Resource Link Pages',
		'fields' => array (
			array (
				'key' => 'field_55e4dd20e124d',
				'label' => 'Connections',
				'name' => 'link_pages',
				'type' => 'relationship',
				'instructions' => 'Select all pages where this resource link should display.',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
					1 => 'post_type',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'resource_link',
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
		'menu_order' => 10,
	));
}


?>
