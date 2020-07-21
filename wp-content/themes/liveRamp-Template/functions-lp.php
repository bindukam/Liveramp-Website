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
