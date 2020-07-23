<?php

    if(!isset($pageid)){
        $pageid = null;
    }

    if(have_rows('modules', $pageid)){

        while(have_rows('modules', $pageid)){
            the_row();

            if ( !get_sub_field('deactivate') ) {

                $module_name = get_row_layout();

                // Hero with form - Webinar and eBook (1st variant design)
                if($module_name == 'lp_hero_with_form'){
                    include ('acf-lp-modules/hero_with_form.php');
                }

                // Talent
                if($module_name == 'lp_talent'){
                    include ('acf-lp-modules/talent.php');
                }

                // Hero with Image Block
                if($module_name == 'lp_hero_with_image_block'){
                    include ('acf-lp-modules/hero_with_image.php');
                }

                // eBook (2nd variant design)
                if($module_name == 'lp_ebook'){
                    include ('acf-lp-modules/ebook.php');
                }

                // Offer Strip
                if($module_name == 'lp_offer_strip'){
                    include ('acf-lp-modules/offer_strip.php');
                }

                // Image and Text Module
                if($module_name =='lp_image_and_text'){
                    include ('acf-lp-modules/image_and_text.php');
                }

                // Standard Media - Video and SlideShare
                if($module_name == 'lp_media'){
                    include ('acf-lp-modules/media.php');
                }
            }
        }
    }
?>
