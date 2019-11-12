<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_58ee7f4fd4a48',
        'title' => 'Hero Repeater',
        'fields' => array(
            array(
                'key' => 'field_58ee7fcb1d195',
                'label' => 'Hero Slider',
                'name' => 'hero_slider',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_58ee7ffc1d196',
                        'label' => 'Hero Title Override',
                        'name' => 'hero_title_override',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_58ee801e1d197',
                        'label' => 'Hero Image (Desktop)',
                        'name' => 'hero_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_592485f30de2f',
                        'label' => 'Hero Image (Mobile)',
                        'name' => 'hero_image_mobile',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_58ee80421d198',
                        'label' => 'Hero Icon',
                        'name' => 'hero_icon',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'Abilitec' => 'Abilitec',
                            'Abilitec Alt' => 'Abilitec Alt',
                            'Agencies' => 'Agencies',
                            'Applying Identity' => 'Applying Identity',
                            'Brands' => 'Brands',
                            'Connect' => 'Connect',
                            'Customer Library' => 'Customer Library',
                            'Data Monetization' => 'Data Monetization',
                            'Data Owners' => 'Data Owners',
                            'Data Store' => 'Data Store',
                            'Discover Identity' => 'Discover Identity',
                            'Features Connect' => 'Features Connect',
                            'Identity Graph' => 'Identity Graph',
                            'Identity Link Features' => 'Identity Link Features',
                            'Identity Resolution' => 'Identity Resolution',
                            'Identity' => 'Identity',
                            'Measurement' => 'Measurement',
                            'Omnichannel' => 'Omnichannel',
                            'Onboarding' => 'Onboarding',
                            'Overview' => 'Overview',
                            'Partner' => 'Partner',
                            'People Based Marketing' => 'People Based Marketing',
                            'Personalization' => 'Personalization',
                            'Platform' => 'Platform',
                            'Publishers' => 'Publishers',
                            'Rampup Logo' => 'Rampup Logo',
                            'Safehaven' => 'Safehaven',
                            'Separation' => 'Separation',
                            'Targeting' => 'Targeting',
                            'TV' => 'TV',
                            'TV Ebook' => 'TV Ebook',
                            'Slider Brands' => 'Slider Brands',
                            'Slider Identity' => 'Slider Identity',
                            'Slider Platform' => 'Slider Platform',
                            'Slider Publishers' => 'Slider Publishers',
                            'Slider Data Owners' => 'Slider Data Owners',
                            'Slider Targeting' => 'Slider Targeting',
                            'Slider People Based Search' => 'Slider People Based Search',
                        ),
                        'default_value' => array(
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_58ee80641d199',
                        'label' => 'Hero Video Url',
                        'name' => 'hero_video_url',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_58ee80a71d19c',
                        'label' => 'Buttons',
                        'name' => 'buttons',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'table',
                        'button_label' => '',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_58ee80c01d19d',
                                'label' => 'Hero Button Link',
                                'name' => 'hero_button_link',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_58ee80d71d19e',
                                'label' => 'Hero Button Text',
                                'name' => 'hero_button_text',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_5c5de404ed256',
                                'label' => 'Hero Button Link Target',
                                'name' => 'hero_button_link_target',
                                'type' => 'checkbox',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'choices' => array(
                                    'External Link' => 'External Link',
                                ),
                                'allow_custom' => 0,
                                'default_value' => array(
                                ),
                                'layout' => 'vertical',
                                'toggle' => 0,
                                'return_format' => 'value',
                                'save_custom' => 0,
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
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