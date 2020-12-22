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
		
		//getting post
		$post = get_post( $entry['post_id'] ); 
		$post_ID = get_the_ID();
		if(have_rows('modules', $post_ID)){

			while(have_rows('modules', $post_ID)){
				the_row();

				if ( !get_sub_field('deactivate') ) {

					$module_name = get_row_layout();

					if(!empty($post)){ // Gravity form just submitted successfully.

						// Hero with Image Block
						// eBook (2nd variant design)
						if( $module_name == 'lp_hero_with_form' ||
							$module_name == 'lp_ebook' ){
							$post_ID = get_the_ID();
							$query_params = $_SERVER['QUERY_STRING'];
							$query_params = $query_params != '' ? '?'.$query_params : '';
							$form_submit_landing_page = get_sub_field('form_submit_landing_page').$query_params;
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
							} elseif( array_key_exists('lrlp_cookie', $_COOKIE) && $parent_form_postID > 0 ) {
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
										if(file_exists($file_path)) {
											?>
											<script>
												document.addEventListener('DOMContentLoaded', function(event) {
													document.getElementById('downloadhere').href="<?php echo $cta_media_file['url'] ?>";
													//document.getElementById('downloadhere').setAttribute('target','_blank');
													document.getElementById('downloadhere').click();
												})
											</script>
											<?php

											// header('Content-Description: File Transfer');
											// header('Content-Type: application/octet-stream');
											// header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
											// header('Expires: 0');
											// header('Cache-Control: must-revalidate');
											// header('Pragma: public');
											// header('Content-Length: ' . filesize($file_path));
											// flush(); // Flush system output buffer
											// readfile($file_path);
											//exit();//   stops download too early
										} else {
											http_response_code(404);
											exit();
										}

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
    }
    add_action( 'gform_after_submission', 'lrlp_after_submission', 10, 2 );
	
	add_filter( 'gform_field_validation', 'validate_gf_form', 10, 4 );
	function validate_gf_form( $result, $value, $form, $field ) { //echo "<pre>"; print_r( $field->get_input_type() );  
	    $alpha_pattern = "/^[A-Za-z ]+$/";
		//if ($field->formId==2) {
			if ($field->get_input_type() == 'text' && ! preg_match( $alpha_pattern, $value ) ) {
				$result['is_valid'] = false;
				if($value){
					$result['message']  = 'Enter a valid value';
				}
			}
		//}
		return $result;
	}
