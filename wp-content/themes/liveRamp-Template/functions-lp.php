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
            "supports" => array( "title", "excerpt", "thumbnail", "editor", "custom-fields", "revisions", "color_theme" ),
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

    function lrlp_load_scripts() {

        global $wp_query;

        wp_enqueue_script('jquery');

        wp_register_script( 'lrlp_scripts', get_stylesheet_directory_uri() . '/acf-lp-modules/lp.js', array('jquery') );

        wp_localize_script( 'lrlp_scripts', 'lrlp_scripts_params', array(
            'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
            'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
            'max_page' => $wp_query->max_num_pages
        ) );

        wp_enqueue_script( 'lrlp_scripts' );
    }
    add_action( 'wp_enqueue_scripts', 'lrlp_load_scripts' );

    function lrlp_after_submission( $entry, $form ) {

        $post_ID = get_the_ID();
        $cookie_value = '';

        if(isset($_COOKIE['lrlp_cookie'])) {
            $ID_string = $_COOKIE['lrlp_cookie'];
            $IDs = explode(',', $ID_string);
            if(!in_array($post_ID, $IDs)) {
                $comma = $ID_string != '' ? ',' : '';
                $ID_string .= $comma . $post_ID;
                $cookie_value = $ID_string;
            }
        } else {
            $cookie_value = $post_ID;
        }

        if($cookie_value != '') {
            $expire = time() + (7 * 24 * 60 * 60);
            setcookie('lrlp_cookie', $cookie_value, $expire, '/');

            $domain = $_SERVER["HTTP_HOST"];
            if(false !== strpos( (string) $domain, '.liveramp.com')) {
                setcookie('lrlp_cookie', $cookie_value, $expire, '/', '.liveramp.com');
            } else {
                setcookie('lrlp_cookie', $cookie_value, $expire, '/');
            }
        }
    }
    add_action( 'gform_after_submission', 'lrlp_after_submission', 10, 2 );
