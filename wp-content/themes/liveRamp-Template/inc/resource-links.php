<?php

// Partner Links custom post type
$resource_links = new CPT(array(
	'post_type_name' => 'resource_link',
	'singluar' => 'Resource Link',
	'plural' => 'Resource Links',
	'slug' => 'resource-links'
),
	array(
		'capability_type' => 'post',
		'query_var' => true,
		'public' => true,
		'publicly_queryable' => true,    
		'show_in_rest' => true,    
		'supports' => array('title'),
		'exclude_from_search' => true
	)
);

$resource_links->menu_icon('dashicons-admin-links');

/*--------------------------------------------------------*\
 Partner Links Custom Meta Boxes (for Partners multi-select
\*--------------------------------------------------------*/

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function lvrmp_resource_links_add_meta_box() {

	$screens = array( 'resource_link' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'lvrmp_resource_links_partners',
			__( 'Partners', 'lvrmp' ),
			'lvrmp_resource_links_meta_box_callback',
			$screen,
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'lvrmp_resource_links_add_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function lvrmp_resource_links_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'lvrmp_resource_links_save_meta_box_data', 'lvrmp_resource_links_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, 'lvrmp_resource_links_partners', true );
	$value = json_decode($value);

	/* Partern Data */
	// $partners_data = new PartnersData();

	if( $api_url = get_field('content_api_url', 'options') ) {

		$partners_json_str = file_get_contents( $api_url );

		$partners = json_decode($partners_json_str);

		$partners = $partners->all_items;
	}

	// $partners = $partners_data->partners();

//	print_r($partners);

	echo '<label for="lvrmp_resource_links_partners_field">';
	_e( 'Select the partners where this resource link should display:', 'lvrmp' );
	echo '</label><br/><br/>';
//	echo '<input type="text" id="lvrmp_resource_links_partners_field" name="lvrmp_resource_links_partners_field" value="' . esc_attr( $value ) . '" size="25" />';
	?>
	<select id="lvrmp_resource_links_partners_field" name="lvrmp_resource_links_partners_field[]" class="partner-select" multiple="true" data-placeholder="Select Partners" style="width: 100%;">
		<option value="*">All</option>
		<?php
		foreach ( $partners as  $partner ):
			echo '<option value="'.$partner->slug.'"'.( isset($value) && in_array($partner->id,$value) ? "selected='selected'" : "").'>' . $partner->name . '</option>';
		endforeach;
		?>
	</select>
	<script type="text/javascript">
		jQuery('#lvrmp_resource_links_partners_field').chosen();
	</script>
	<style type="text/css">
   #lvrmp_resource_links_partners_field_chosen { width: 100% !important; }
   #lvrmp_resource_links_partners_field_chosen .search-field,
   #lvrmp_resource_links_partners_field_chosen input {
      width: 100% !important;
   }
</style>
	<?php
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function lvrmp_resource_links_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['lvrmp_resource_links_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['lvrmp_resource_links_meta_box_nonce'], 'lvrmp_resource_links_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['lvrmp_resource_links_partners_field'] ) ) {
		return;
	}

	$my_data = array();
	if (isset($_POST['lvrmp_resource_links_partners_field'])) {
		$my_data = $_POST['lvrmp_resource_links_partners_field'];
	}
	error_log(print_r($my_data,true));
	if ( "string" === gettype($my_data)) {
		$my_data = array($my_data);
	}
	$my_data = json_encode( $my_data );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'lvrmp_resource_links_partners', $my_data );
}
add_action( 'save_post', 'lvrmp_resource_links_save_meta_box_data' );

function lvrmp_resource_link_enqueue( $hook ) {

	if ( 'post-new.php' != $hook && 'post.php' != $hook ) {
		return;
	}
	wp_enqueue_style( 'lvrmp-chosen-css', THEME_DIR . '/assets/js/lib/chosen/chosen.min.css', array(), '1', 'all' );
	wp_enqueue_script('lvrmp-chosen-js', THEME_DIR . '/assets/js/lib/chosen/chosen.jquery.min.js', array('jquery'), '1');
}
add_action('admin_enqueue_scripts', 'lvrmp_resource_link_enqueue' );
