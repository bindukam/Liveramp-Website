<?php

if( !function_exists('lvrmp_lp_posts_register') ) {

    add_action('init', 'lvrmp_lp_posts_register', 0);

    function lvrmp_lp_posts_register() {

        $labels = array(
            'name' => _x('LP Events', 'post type general name'),
            'singular_name' => _x('LP Event', 'post type singular name'),
            'add_new' => _x('Add New', 'LP Event'),
            'add_new_item' => __('Add New LP Event'),
            'edit_item' => __('Edit LP Event'),
            'new_item' => __('New LP Event'),
            'view_item' => __('View LP Event'),
            'search_items' => __('Search LP Event'),
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
            'supports' => array('title', 'thumbnail', 'author'),
            'rewrite' => true,
            'show_in_nav_menus' => true,
        );

        register_post_type('lp-event' , $args);
    }
}

if( !function_exists('register_lp_tax') ) {

    add_action('init', 'register_lp_tax');

    function register_lp_tax() {
        register_taxonomy (
            'lp_event_categories',
            'lp-event',
            array(
                'labels' => array(
                    'name' => 'Category',
                    'add_new_item' => 'Add New Category',
                    'new_item_name' => 'New Category'
                ),
                'show_ui' => true,
                'hierarchical' => false,
                'show_tagcloud' => false
            )
        );
    }
}

