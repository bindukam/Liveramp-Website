<?php // events loadmore 

// EVENTS LOADMORE AND FILTERS 

// events loadmore

function events_load_more_scripts() {

	global $wp_query;

	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	// register our main script but do not enqueue it yet
	wp_register_script( 'events_loadmore', get_stylesheet_directory_uri() . '/library/loadmore/events_loadmore.js', array('jquery') );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'events_loadmore', 'events_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

 	wp_enqueue_script( 'events_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'events_load_more_scripts' );


	// ajax handler for load more
function events_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$args['post_type'] = array('events');

	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();

			// $terms = get_the_terms( get_the_ID(), 'events_categories' );



			$new_card = 'new-card';
			include( locate_template( 'acf-modules/events_parts/events_card.php', false, false ) );


		endwhile;

	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_events_loadmore', 'events_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_events_loadmore', 'events_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


// EVENTS Blog filters load ajax
// AJAX filter code
add_action('wp_ajax_events_filter', 'events_filter_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_events_filter', 'events_filter_function');


function events_filter_function(){
	$args = array(
		'post_type'              => array( 'events' ),
		'posts_per_page'         => '-1',
		'meta_key'				 => 'date_from',
		'orderby'				 => 'meta_value_num',
		'order'					 => 'asc',


	);


	
	
	

	 if( isset( $_POST['search_term'] ) && $_POST['search_term'] )
	        $args['s'] = $_POST['search_term'];


		

	// author query set here

	$wp_query = new WP_Query( $args );

	if( $wp_query->have_posts() ) :
		while( $wp_query->have_posts() ): $wp_query->the_post();
			$new_card = 'new-card';
			
			// the_title(); // for testing 

			include( locate_template( 'acf-modules/events_parts/events_card.php', false, false ) );

		endwhile;
		wp_reset_postdata();
	else :
		include( locate_template( 'acf-modules/events_parts/no_posts.php', false, false ) );
		
	endif;

	die();
}



// EVENTS Blog filters load ajax
// AJAX reset code
add_action('wp_ajax_events_reset', 'events_reset_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_events_reset', 'events_reset_function');


function events_reset_function(){
	$args = array(
		'post_type'              => array( 'events' ),
		'posts_per_page'         => '-1',
		'meta_key'				 => 'date_from',
		'orderby'				 => 'meta_value_num',
		'order'					 => 'asc',


	);
		

	// author query set here

	$wp_query = new WP_Query( $args );

	if( $wp_query->have_posts() ) :
		while( $wp_query->have_posts() ): $wp_query->the_post();
			$new_card = 'new-card';
			
			// the_title(); // for testing 

			include( locate_template( 'acf-modules/events_parts/events_card.php', false, false ) );

		endwhile;
		wp_reset_postdata();
	else :
		include( locate_template( 'acf-modules/events_parts/no_posts.php', false, false ) );
	endif;

	die();
}

?>