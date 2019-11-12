<?php

class MarketingStackMeta{

    function __construct()
    {
        add_action('cmb2_init', array($this, 'marketing_stack_metabox'));
    }


    function marketing_stack_metabox()
    {

        // Start with an underscore to hide fields from custom fields list
        $prefix = '_cmb_';

        /**
         * Metabox to be displayed on a single page ID
         */
        $marketing_stack_page = new_cmb2_box(array(
            'id' => $prefix . 'metabox',
            'title' => __('Marketing Stack Metabox', 'cmb2'),
            'object_types' => array('page',), // Post type
            'context' => 'normal',
            'priority' => 'high',
            'show_names' => true, // Show field names on the left
            'show_on' => array('id' => array(9,33455,34770)), // Specific post IDs to display this metabox
        ));

        $marketing_stack_page->add_field(array(
            'name' => __('Headline', 'cmb2'),
            'desc' => __('Marketing Stack Headline', 'cmb2'),
            'id' => $prefix . 'headline',
            'type' => 'text',
        ));

        $marketing_stack_page->add_field(array(
            'name' => __('Details', 'cmb2'),
            'desc' => __('Details', 'cmb2'),
            'id' => $prefix . 'detail',
            'type' => 'textarea',
        ));

    }
}

new MarketingStackMeta();
