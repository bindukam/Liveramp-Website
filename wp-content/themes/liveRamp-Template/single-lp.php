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

            if(!empty($_POST)){ // Gravity form just submitted successfully.

                // Hero with Image Block 
                // eBook (2nd variant design)
                if( $module_name == 'lp_hero_with_form' || 
                    $module_name == 'lp_ebook' ){
                    $post_ID = get_the_ID();
                    $form_submit_landing_page = get_sub_field('form_submit_landing_page');
                    if($form_submit_landing_page) {
                        header("Location: ".$form_submit_landing_page); // Redirect to next page after form submission
                        exit();
                    }
                }
            } else {
                
                $parent_form_page = get_sub_field('parent_form_page');
                $parent_form_postID = 0;
                $parent_form_link = '';
                $file_mode = '';

                if( $parent_form_page ) {
                    $parent_form_postID = $parent_form_page->ID;
                    $parent_form_link = get_post_permalink($parent_form_postID);
                }

                if( $module_name == 'lp_hero_with_image_block' || // Hero with Image Block 
                    $module_name == 'lp_ebook' ||                 // eBook (2nd variant design)
                    $module_name == 'lp_image_and_text' ) {       // Image and Text Module

                    $gated_asset = get_sub_field('gated_asset');
                    if( !$gated_asset ) {
                        $file_mode = 'PERMIT'; // non-gated asset is always file permit.
                    } elseif( isset($_COOKIE['lrlp_cookie']) && $parent_form_postID > 0 ) {
                        // for gated assets, always check to see cookie exists
                        $IDs = explode (",", $_COOKIE['lrlp_cookie']);
                        if(in_array($parent_form_postID, $IDs)) {
                            $file_mode = 'PERMIT';
                        }
                    }

                    $cta_type = get_sub_field('cta_type');
                    $post_ID = get_the_ID();
                    if($cta_type == 'media') {
                        $cta_media_file = get_sub_field('cta_media_file');
                        if(isset($_GET['file']) && $cta_media_file ) {
                            if($file_mode == 'PERMIT') {

                                // display asset content
                                $file = $cta_media_file;
                                $file_name = $file['filename'];
                                $file_mime_type = $file['mime_type'];
                                $file_path = get_attached_file($file['ID']);

                                header('Content-type: '.$file_mime_type);
                                header('Content-Length: ' . filesize($file_path));
                                $handle = fopen($file_path, 'rb');
                                $buffer = '';
                                while (!feof($handle)) {
                                    $buffer = fread($handle, 4096);
                                    echo $buffer;
                                    ob_flush();
                                    flush();
                                }
                                fclose($handle);
                                exit;

                            } else {
                                // not permitted, redirect to parent form page
                                header("Location: ".$parent_form_link);
                                exit();
                            }
                        //} elseif ( $gated_asset && $file_mode != 'PERMIT' ) {
                        //    header("Location: ".$parent_form_link);
                        //    exit();
                        }
                    }
                } elseif( $module_name == 'lp_media' ){ // Standard Media - Video and SlideShare
                    $gated_asset = get_sub_field('gated_asset');
                    if($gated_asset) {
                        $redirect_parent_form = false;
                        if(isset($_COOKIE['lrlp_cookie'])) {
                            $IDs = explode (",", $_COOKIE['lrlp_cookie']);
                            if(!in_array($parent_form_postID, $IDs)) {
                                $redirect_parent_form = true;
                            }
                        } else {
                            $redirect_parent_form = true;
                        }
                        if($redirect_parent_form) {
                            $parent_form_page = get_sub_field('parent_form_page');
                            if($parent_form_page) {
                                $parent_form_postID = $parent_form_page->ID;
                                $parent_form_link = get_post_permalink($parent_form_postID);
                                header("Location: ".$parent_form_link);
                                exit();
                            }
                        }
                    }
                }
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
