<?php

    function lrlp_register_cpt_landingpages() {

        /**
         * Post Type: Use Cases.
         */

        $labels = array(
            "name" => __( "Landing Pages", "custom-post-type-ui" ),
            "singular_name" => __( "Landing Page", "custom-post-type-ui" ),
        );

        $args = array(
            "label" => __( "Landing Pages", "custom-post-type-ui" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => "", array( "slug" => "landing-page", "with_front" => false ),
            "query_var" => true,
            'menu_icon' => '/wp-content/themes/liveRamp-Template/src/assets/images/website_icon.png',
            "supports" => array( "title", "editor", "custom-fields", "revisions", "color_theme" ),
        );

        register_post_type( "lp", $args );
    }

    add_action( 'init', 'lrlp_register_cpt_landingpages' );


	function lrlp_slideshare ($shortcode){

        $ss = str_replace( '&#038;', '&', $shortcode );
        $ss = str_replace( '&amp;', '&', $ss );
        $regex ="/id=(.*?)]/";
        $output = preg_match($regex, $ss, $result);

        if($output) {
            return '<iframe class="ss-iframe" src="https://www.slideshare.net/slideshow/embed_code/' . $result[1]. '" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>';
        } else {
            return '';

        }
	}

    function lrlp_custom_title($title){

        $post = get_post();

        if(! empty( $post )) {
            $post_template = get_page_template_slug($post);
            if($post_template == "page-lp.php") {
                $page_title = get_field('page_title', $post->ID).'';
                $site_title = get_bloginfo('name');
                $title = $page_title != '' ? $site_title.' | '.$page_title : '';
            }
        }

        return $title;
    }
    add_filter('wpseo_title','lrlp_custom_title', 10, 1);
    add_filter('pre_get_document_title','lrlp_custom_title');
