<?php
/**
 * The template for displaying CPT Landing Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$post_ID = get_the_ID();
if(have_rows('modules', $post_ID)){

    while(have_rows('modules', $post_ID)){
        the_row();

        if ( !get_sub_field('deactivate') ) {

            $module_name = get_row_layout();

            // Hero with Image Block / eBook (2nd variant design)
            if($module_name == 'lp_hero_with_image_block' || $module_name == 'lp_ebook'){

                $cta_type = get_sub_field('cta_type');
                if($cta_type == 'media') {
                    $cta_media_file = get_sub_field('cta_media_file');
                }

                $gated_asset = get_sub_field('gated_asset');
                if($gated_asset) {
                    $parent_form_page = get_sub_field('parent_form_page');
                }

                if(isset($_GET['file']) && $cta_type == 'media' && $cta_media_file) {

                    // pdf, jpeg, jpg
                    $file = $cta_media_file;
                    $file_name = $file['filename'];
                    $file_mime_type = $file['mime_type'];
                    $file_path = get_attached_file($file['ID']);

                    echo "<h2>".$file_name."</h2>";
                    echo "<h2>".$file_mime_type."</h2>";
                    echo "<h2>".$file_path."</h2>";
                    echo "<h2>".filesize($file_path)."</h2>";

                    // Header content type
                    //header('Content-type: '.$file_mime_type);
                    //header("Content-Length: " . filesize($file_path));
                    readfile($file_path);
                    
                    exit;
                }
            }

            // Hero with form - Webinar and eBook (1st variant design)
            if($module_name == 'lp_hero_with_form'){

            }

            // Image and Text Module
            if($module_name =='lp_image_and_text'){
            }


            // Standard Media - Video and SlideShare
            if($module_name == 'lp_media'){
            }
        }
    }
}

get_header('lp'); ?> 

<?php 
    include('acf-lp-loop.php');
?>

<?php
get_footer('lp');
?>
