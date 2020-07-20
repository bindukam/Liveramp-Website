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
                if($module_name == 'hero_with_form'){
                    include ('acf-lp-modules/hero_with_form.php');
                }

                // Talent
                if($module_name == 'talent'){
                    include ('acf-lp-modules/talent.php');
                }

                // Hero with Image Block
                if($module_name == 'hero_with_image_block'){
                    include ('acf-lp-modules/hero_with_image.php');
                }

                // eBook (2nd variant design)
                if($module_name == 'ebook'){
                    include ('acf-lp-modules/ebook.php');
                }

                // Offer Strip
                if($module_name == 'offer_strip'){
                    include ('acf-lp-modules/offer_strip.php');
                }

                // Image and Text Module
                if($module_name =='image_and_text'){
                    include ('acf-lp-modules/image_and_text.php');
                }

                // 3 Card Image and Text
                if($module_name =='three_card_image_and_text'){
                    include ('acf-lp-modules/three_card_image_and_text.php');
                }

                // Standard Media - Video and SlideShare
                if($module_name == 'media'){
                    include ('acf-lp-modules/media.php');
                }

            }
        }
    }
?>
