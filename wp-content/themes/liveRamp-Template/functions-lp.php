<?php

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
