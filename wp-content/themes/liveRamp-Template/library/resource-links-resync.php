<?php

// // Add post
// $post_id = wp_insert_post($new_post);

//Create the admin menu page for plugin settings
add_action('admin_menu','acxiomIT_custom_plugin_settings');
function acxiomIT_custom_plugin_settings()
{
	add_menu_page("LiveRamp Content Import", // Page Title
		"ReSync Partner Content", // Menu Title
		"administrator", // Capability
		"content_sync", // Menu Slug
		"acxiomIT_custom_plugin_settings_display", // Callable Function;
		"dashicons-upload", // Icon URL
		30 // Position
	);
}

function isJson($string) {
 json_decode($string);
 return (json_last_error() == JSON_ERROR_NONE);
}

// <label>Enable SSL on admin site</label>
// <input type="checkbox" '.$forcesslenabled.' name="acxiomIT_forcessl" value="enabled" />
// <label>Remove domain from URLs</label>
// <input type="checkbox" '.$removedomainfromurl.' name="acxiomIT_removedomainfromurl" value="enabled" />

//this function displays the options page
function acxiomIT_custom_plugin_settings_display()
{
	if( isset( $_POST['started'] ) ) {

		$args = array(
			'post_type' => 'resource_link',
			'posts_per_page'=> -1,
			'meta_query' => array(
				array(
					'key' => 'lvrmp_resource_links_partners',
					'compare' => 'EXISTS'
				)
		   )
		);

		$posts_query = new WP_Query( $args );

		$posts = $posts_query->get_posts();

		foreach( $posts as $post ) {

			$post_id = $post->ID;

			$post_meta_values = get_post_meta($post_id, 'lvrmp_resource_links_partners');

			if( $post_meta_values ) {

				if( gettype($post_meta_values) === 'string' ) {


				}

				// echo gettype($post_meta_values) . '<br>';

				$post_meta_values = str_replace('[', '', $post_meta_values);
				$post_meta_values = str_replace(']', '', $post_meta_values);
				$post_meta_values = str_replace('"', '', $post_meta_values);

				$post_meta_values = implode(', ', $post_meta_values);

				// var_dump($post_meta_values);

				// $post_meta_values = json_encode( $post_meta_values );

				$meta_values = explode(',', $post_meta_values);

				$meta_values_arr = [];

				foreach( $meta_values as $value ) {

					// echo 'value: '. $value . '<br>';

					array_push($meta_values_arr, $value);
				}

				$meta[] = [
					'post_id' => $post_id,
					'post_title' => get_the_title($post),
					'partner_ids' => $meta_values_arr
				];
			}
		}

		$api_url = home_url().'/partners.json';
		$new_partners_json_str = file_get_contents( $api_url );
		$new_partners = json_decode($new_partners_json_str);
		$new_partners = $new_partners->all_items;

		$partners_data = new PartnersData();

		$partners = $partners_data->partners();

		foreach( $meta as $key => $met ) {

			echo '<h4>'.$met['post_title'].' ('.$met['post_id'].') content matching... </h4>';

			$found_partners_slugs = [];

			foreach( $met['partner_ids'] as $partner_id ) {

				$partner_id_found = false;

				foreach( $partners as $key => $partner ) {

					if( $partner->id == $partner_id ) {

						echo '<p style="color:green">1) Partner found: '.$partner->name.'. ID was: ' . $partner_id.'</p>';

						$old_partner_slug = $partner->title_class;

						// echo $new_partner . '<br>';

						$partner_id_found = true;

						$new_partner_id_found = false;

						foreach ($new_partners as $new_partner) {

							if( $new_partner->slug === $old_partner_slug ) {

								echo '<p style="color:green; font-weight: bold;">2) Partner found in new partners - meta updated!</p>';

								$new_partner_id_found = true;

								array_push($found_partners_slugs, '"'.$new_partner->id.'":"'.$old_partner_slug .'"');
							}
						}

						if( !$new_partner_id_found ) {
							echo '<p style="color:red">2) '.$partner->name.' could not be found in the new partners install - must match manually</p>';

							array_push($found_partners_slugs, '"'.$old_partner_slug .'"');
						}

						break;
					}
				}

				if( ! $partner_id_found ) {

					echo '<p style="color:red">Partner unknown. ID was: ' . $partner_id.'</p>';
				}
			}

			$found_partners_slugs_import_string = implode(',', $found_partners_slugs);

			update_post_meta( $met['post_id'], 'lvrmp_resource_links_partners', $found_partners_slugs_import_string );
		}

		die();


		/* Restore original Post Data */
		wp_reset_postdata();

		// die( var_dump($posts) );
		// update_post_meta( $post_id, 'acf_name', $import_practice_string );
		// update_post_meta( $post_id, '_acf_name', 'field_56e098213d6c3' );
		// update_post_meta( $found_post->ID, $acf_name, $value );
		// update_post_meta( $found_post->ID, $acf_name_u, $acf_key );



	}


	$forcesslenabled = (get_option('acxiomIT_forcessl') == 'enabled') ? 'checked' : ''; //default to checked
	$removedomainfromurl = (get_option('acxiomIT_removedomainfromurl') == 'enabled') ? 'checked' : ''; //default to checked

	$page_title = ( isset( $_POST['started'] ) ) ? 'Upload again?' : 'Upload CSV';

	$html = '<div class="postbox">
	<form enctype="multipart/form-data" action="/wp-admin/admin.php?page=content_sync" method="post">

	' . wp_nonce_field('update-options') . '
	<table class="form-table" width="100%" cellpadding="10">
	<tbody>

	<tr>
		<td scope="row" align="left">
			<input type="hidden" name="started" value="true" />
			<input type="submit" name="Start" value="Update" />
		</td>
	</tr>

	</tbody>
	</table>
	</form>

	</div>';

	$html2 = '<div id="commentsdiv" class="postbox  hide-if-js" style="display: block;">
		<button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Comments</span><span class="toggle-indicator" aria-hidden="true"></span></button><h2 class="hndle ui-sortable-handle"><span>Comments</span></h2>
		<div class="inside">
			<input type="hidden" id="add_comment_nonce" name="add_comment_nonce" value="f53c96bf5e">	<p class="hide-if-no-js" id="add-new-comment"><a class="button" href="#commentstatusdiv" onclick="window.commentReply &amp;&amp; commentReply.addcomment(5);return false;">Add comment</a></p>
			<input type="hidden" id="_ajax_fetch_list_nonce" name="_ajax_fetch_list_nonce" value="2ba7d62ea4"><input type="hidden" name="_wp_http_referer" value="/wp-admin/post.php?post=5&amp;action=edit"><table class="widefat fixed striped comments wp-list-table comments-box" style="display:none;">
			<tbody id="the-comment-list" data-wp-lists="list:comment">
			</tbody>
			</table>

				<p id="no-comments">No comments yet.</p><div class="hidden" id="trash-undo-holder">
				<div class="trash-undo-inside">Comment by <strong></strong> moved to the trash. <span class="undo untrash"><a href="#">Undo</a></span></div>
			</div>
			<div class="hidden" id="spam-undo-holder">
				<div class="spam-undo-inside">Comment by <strong></strong> marked as spam. <span class="undo unspam"><a href="#">Undo</a></span></div>
			</div>
		</div>
	</div>';

	echo $html;

	// echo $html2;
}
