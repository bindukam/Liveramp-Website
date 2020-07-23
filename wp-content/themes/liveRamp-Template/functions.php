<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** Gutenberg editor support */
require_once( 'library/gutenberg.php' );


// LEGACY FILES FROM OLD SITE INC DIRECTORY
require_once( 'library/vendors/custom-post-type/src/CPT.php' );

require_once( 'library/resource-links-api/ResourceLinks.php' );

require_once( 'library/resource-links-api/ResourceLinksACF.php' );

require_once( 'library/partner-rewrite.php' );

require_once( 'library/post-types.php' );

require_once( 'library/resource-links-resync.php' );

require_once( 'library/resource-links.php' );

require_once( 'library/taxonomies.php' );

require_once( 'library/mime-type-svg.php' );

// LOAD MORE
require_once( 'library/loadmore/blog.php' );

require_once( 'library/loadmore/resources.php' );

require_once( 'library/loadmore/events.php' );

require_once( 'library/loadmore/news.php' );

require_once( 'library/loadmore/testimonials.php' );

// Load Landing Pages Functions - functions-lp.php
require_once( 'functions-lp.php' );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'redirect'      => false
    ));
}





add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {

	// loop
	foreach( $items as &$item ) {

		// vars
		$icon = get_field('icon', $item);
		$fa = get_field('fontawesome', $item);

		$title = $item->title;


		// append icon
		if( $icon ) {

			$item->title = '<img src="'.$icon.'" alt="icon" class="style-svg" /> '.$title;

		}
		else {
			$item->title = '<span class="title">'.$title.'</span>';
		}


	}

	// return
	return $items;

}



// SEARCH BOX SHORT CODE

function wpbsearchform( $form ) {

    $form = '<div class="searchform-wrapper"><form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <i class="far fa-search"></i>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
    </form>
    </div>';

    return $form;
}

add_shortcode('wpbsearch', 'wpbsearchform');


// LOAD MORE



	/*
			this is an example of how to create a repeater that will show a specific number of rows
			and add a link (button) to display more rows

			this code would generally be added to your functions.php file

			Note: This will only work for a single repeater field. You will need to add different functions
			with different names to use this on multiple repeater field

			The code in this file should go into your function.php file
			or be included by your functions.php file

			Please note that this example uses jQuery to perform the AJAX request
			You must enqueue jQuery using a wp_enqueue_scripts action
	*/
	// fixing merge
	// add action for logged in users
	add_action('wp_ajax_my_repeater_show_more', 'my_repeater_show_more');
	// add action for non logged in users
	add_action('wp_ajax_nopriv_my_repeater_show_more', 'my_repeater_show_more');

	function my_repeater_show_more() {
		// validate the nonce
		if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_repeater_field_nonce')) {
			exit;
			// $test_content = 'broken';
		}
		// make sure we have the other values
		if (!isset($_POST['post_id']) || !isset($_POST['offset'])) {
			return;
			// $test_content = $_POST['post_id'];

		}
		$show = 16; // how many more to show
		$start = $_POST['offset'];
		$end = $start+$show;
		$post_id = $_POST['post_id'];
		// $test_content = $post_id;
		// use an object buffer to capture the html output
		// alternately you could create a varaible like $html
		// and add the content to this string, but I find
		// object buffers make the code easier to work with
		ob_start();
		if (have_rows('modules', $post_id)) {

			while(have_rows('modules', $post_id)) {
				the_row();
				if(get_row_layout()=='galley_hyperlink_grid'){
				  $row = get_sub_field('links');
				  $total = count($row);

				  $count = 0;
				  while (have_rows('links', $post_id)) {
				  	the_row();
				  	if ($count < $start) {
				  		// we have not gotten to where
				  		// we need to start showing
				  		// increment count and continue
				  		$count++;
				  		continue;
				  	}
				  	?>
				  	<div class="cell large-3 medium-4 small-1">
				  		<?php

				  			$url = get_sub_field('link')['url'];
				  			$title = get_sub_field('link')['title'];
				  			$target = get_sub_field('link')['target'];

				  		 ?>
				  		  <a href="<?php echo $url ?>" class="link" target="<?php echo $target ?>"><?php echo $title ?> <i class="fal fa-angle-right"></i></a>
				  	</div>
				  	<?php
				  	$count++;
				  	if ($count == $end) {
				  		// we've shown the number, break out of loop
				  		break;
				  	}
				  } // end while have rows
				}
			}
			// $total = count(get_sub_field('links', $post_id));

			// $total = $i;

		} // end if have rows
		else {
			$test_content = 'no content';
		}
		$content = ob_get_clean();
		// $contnet = $test_content;
		// check to see if we've shown the last item
		$more = false;
		if ($total > $count) {
			$more = true;
		}
		// $content = $test_content;
		// output our 3 values as a json encoded array
		echo json_encode(array('content' => $content, 'more' => $more, 'offset' => $end));
		exit;
	}
	// end function my_repeater_show_more


	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 View";
	    }
	    return $count.' Views';
	}
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}

	// Remove issues with prefetching adding extra views
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	// Add to a column in WP-Admin
	add_filter('manage_posts_columns', 'posts_column_views');
	add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
	function posts_column_views($defaults){
	    $defaults['post_views'] = __('Views');
	    return $defaults;
	}
	function posts_custom_column_views($column_name, $id){
	    if($column_name === 'post_views'){
	        echo getPostViews(get_the_ID());
	    }
	}


	// end page views


//=================================================================
// Register Custom Taxonomies
//=================================================================
function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Color Themes.
	 */

	$labels = array(
		"name" => __( "Color Themes", "custom-post-type-ui" ),
		"singular_name" => __( "Color theme", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Color Themes", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'color_theme', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "color_theme",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "color_theme", array( "page", "lp" ), $args );

	/**
	 * Taxonomy: Roles.
	 */

	$labels = array(
		"name" => __( "Roles", "custom-post-type-ui" ),
		"singular_name" => __( "Role", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Roles", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'role', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "role",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "role", array( "use_cases" ), $args );

	/**
	 * Taxonomy: Interests.
	 */

	$labels = array(
		"name" => __( "Interests", "custom-post-type-ui" ),
		"singular_name" => __( "Interest", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Interests", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'interest', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "interest",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "interest", array( "use_cases" ), $args );

	/**
	 * Taxonomy: Sort By Options.
	 */

	$labels = array(
		"name" => __( "Sort By Options", "custom-post-type-ui" ),
		"singular_name" => __( "Sort by Speed", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Sort By Options", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'sort_by', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "sort_by",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "sort_by", array( "use_cases" ), $args );
   /**
	 * Taxonomy: Product Modules.
	 */

	$labels = array(
		"name" => __( "Product Modules", "custom-post-type-ui" ),
		"singular_name" => __( "Product Module", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Product Modules", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'product_modules', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "product_modules",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "product_modules", array( "use_cases" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

//=================================================================
// REGISTER USE CASE POST Type
//=================================================================
function cptui_register_my_cpts_use_cases() {

	/**
	 * Post Type: Use Cases.
	 */

	$labels = array(
		"name" => __( "Use Cases", "custom-post-type-ui" ),
		"singular_name" => __( "Use Case", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Use Cases", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "use-cases-archive",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "our-platform", "with_front" => false ),
		"query_var" => true,
		"supports" => array( "title", "editor", "excerpt", "custom-fields", "revisions" ),
		"taxonomies" => array( "role", "interest", "sort_by" ),
	);

	register_post_type( "use_cases", $args );
}

add_action( 'init', 'cptui_register_my_cpts_use_cases' );

// Function that will return Wordpress menus called by shortcodes
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(
		'menu'            => '',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''),
		$atts));


	return wp_nav_menu( array(
		'menu'            => $menu,
		'container'       => $container,
		'container_class' => $container_class,
		'container_id'    => $container_id,
		'menu_class'      => $menu_class,
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");



// ADD ENGINEERIN CPT

// Register Custom Post Type
function engineering_post_type() {

	$labels = array(
		'name' => _x('Engineering', 'post type general name'),
		'singular_name' => _x('Engineering', 'post type singular name'),
		'add_new' => _x('Add New', 'Engineering'),
		'add_new_item' => __('Add New Engineering'),
		'edit_item' => __('Edit Engineering'),
		'new_item' => __('New Engineering'),
		'view_item' => __('View Engineering'),
		'search_items' => __('Search Engineering'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail','author', 'comments'),
		'rewrite' => array( 'slug' => 'engineering', 'with_front' => true ),
		'show_in_nav_menus' => true,
	);

	register_post_type('engineering' , $args);

}
add_action( 'init', 'engineering_post_type' );


include('library/loadmore/engineering.php');




// WISTIA OMBED CODE
wp_oembed_add_provider( '/https?:\/\/(.+)?(wistia.com|wi.st)\/(medias|embed)\/.*/', 'http://fast.wistia.com/oembed', true);



// ADDING SHORTCODE for buttons
function button_white_shortcode_func( $atts = [], $content = null ) {
	$a = shortcode_atts( array(
		
		'url' => '',
		'target' => '',
	), $atts );

   $result = '<a class="button outline whiteoutline" target="'.esc_attr($a['target']).'"  href=' . esc_attr($a['url']) . '>' . $content . '</a>';
//    $result = '<button class="button outline whiteoutline">' . $content . '</button>';
	return $result;
}
add_shortcode( 'button-white', 'button_white_shortcode_func' );

function button_shortcode_func( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'url' => '',
		'target' => '',
	), $atts );

    $result = '<a class="button" target="'.esc_attr($a['target']).'"  href=' . esc_attr($a['url']) . '>' . $content . '</a>';

	return $result;
}
add_shortcode( 'button', 'button_shortcode_func' );


// add number of post on author page for custom post type 

function add_extra_user_column($columns) { //Add CPT Column for events and remove default posts column
    unset($columns['posts']);
    return array_merge( $columns, 
              array('foo' => __('Posts')) );
}
add_filter('manage_users_columns' , 'add_extra_user_column');

function add_post_type_column( $value, $column_name, $id ) { //Print event_type value
  if( $column_name == 'foo' ) {
    global $wpdb;
    $count = (int) $wpdb->get_var( $wpdb->prepare(
      "SELECT COUNT(ID) FROM $wpdb->posts WHERE 
       post_type IN ('blog-post', 'news', 'resources', 'events', 'post', 'page') AND post_status = 'publish' AND post_author = %d",
       $id
    ) );

    if ( $count > 0 ) {
        $r = "<a href='edit.php?author=$id'>";
        $r .= $count;
        $r .= '</a>';
    } else {
        $r = 0;
    }

    return $r;
  }
}

add_filter( 'manage_users_custom_column', 'add_post_type_column', 10, 3 );


//_translate('back_to_news') 
function _translate($word) {
	$field = get_field_object($word, 'option');
	//echo '<pre style="background-color:white">xx'.print_r($field, 1).'</pre>';

	if (!empty($field['value'])) {
		echo $field['value'];
	} else {
		echo $field['label'];
	}
} 

function swaphttp ($url) {return str_replace( 'http://', 'https://', $url );}


add_filter( 'manage_pages_columns', 'codismo_table_columns', 10, 1 );
add_action( 'manage_pages_custom_column', 'codismo_table_column', 10, 2 );
 
function codismo_table_columns( $columns ) {
 
    $custom_columns = array(
        'codismo_template' => 'Template'
    );
 
    $columns = array_merge( $columns, $custom_columns );
 
    return $columns;
 
}
 
function codismo_table_column( $column, $post_id ) {
 
    if ( $column == 'codismo_template' ) {
        echo basename( get_page_template() );
    }
 
}

/** "Add X-XSS headers" code start */
add_action('send_headers', function(){
	header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
	header("X-Frame-Options: SAMEORIGIN");
	header("X-XSS-Protection: 1; mode=block");
	header("X-Content-Type-Options: nosniff");
	header("Referrer-Policy: strict-origin-when-cross-origin");
}, 1);
/** "Add X-XSS headers" code ends*/

/** "Add filter to change blog author name " code start*/
add_filter( 'the_author', 'show_blog_author_name', 10, 1 );
 
function show_blog_author_name( $author_name ) {
	$post = get_post( $post );
    if ( $post ) { 
		if($post->post_type=='blog-post'){
		 $blog_author_data = get_field('blog_author',$post->ID);
			if(isset($blog_author_data) && !empty($blog_author_data->post_title)){
				return  $blog_author_data->post_title;
			}
		}
	}
	return  $author_name;
 
}
/** "Add filter to change blog author name " code end*/
 