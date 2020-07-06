<?php

    if(!isset($pageid)){
        $pageid = null;
    }

    if(have_rows('modules', $pageid)){

        while(have_rows('modules', $pageid)){
            the_row();

            if ( !get_sub_field('deactivate') ) {

                $module_name = get_row_layout();

                // Offer Strip
                if($module_name == 'offer_strip'){
                    include ('acf-lp-modules/offer_strip.php'); 
                }

                // 3 CTAs
                if($module_name == 'three_ctas'){
                    include ('acf-lp-modules/three_ctas.php'); 
                }

                // Standard Video
                if($module_name == 'standard_video'){
                    include ('acf-lp-modules/standard_video.php');
                }

                // 3 Card Image and Text
                if(get_row_layout()=='three_card_image_and_text'){
                  include ('acf-lp-modules/three_card_image_and_text.php');
                }
            }
        }
    }
?>
