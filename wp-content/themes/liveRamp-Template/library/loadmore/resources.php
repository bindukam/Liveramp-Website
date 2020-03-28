<?php // RESOURECE LOAD MORE BUTTON
// resource load more
function resource_load_more_scripts() {

	global $wp_query;

	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	// register our main script but do not enqueue it yet
	wp_register_script( 'resource_loadmore', get_stylesheet_directory_uri() . '/library/loadmore/resources_loadmore.js', array('jquery') );

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'resource_loadmore', 'resource_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

 	wp_enqueue_script( 'resource_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'resource_load_more_scripts' );


	// ajax handler for load more
function resource_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_GET['query'] ), true );
	$args['paged'] = $_GET['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$args['post_type'] = array('resources');

	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();

			$terms = get_the_terms( get_the_ID(), 'resources_categories' );



			$new_card = 'new-card';
			include( locate_template( 'template-parts/resources_parts/post_card.php', false, false ) );


		endwhile;

	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_resource_loadmore', 'resource_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_resource_loadmore', 'resource_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


// RESOURCE FILER FUNCTIONS


// AJAX filter code
add_action('wp_ajax_resource_filter', 'resource_filter_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_resource_filter', 'resource_filter_function');


function resource_filter_function(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		// 'order'	=> $_GET['date'], // ASC or DESC
		'posts_per_page'         => 100,
		'post_type'              => array( 'resources' ),

	);

	if( isset( $_GET['posts_per_page'] ) && $_GET['posts_per_page'] )
		$args['posts_per_page'] = $_GET['posts_per_page'];

	$args['tax_query'] = array();
	// for taxonomies / categories
	if( isset( $_GET['resources_categories'] ) && $_GET['resources_categories']  && !$_GET['search_term'] )
		$args['tax_query'][] = array(

				'taxonomy' => 'resources_categories',
				'field' => 'slug',
				'terms' => $_GET['resources_categories']

		);

	// for taxonomies / audiences
	if( isset( $_GET['resources_audiences'] ) && $_GET['resources_audiences']  && !$_GET['search_term']  )
		$args['tax_query'][] = array(

				'taxonomy' => 'resources_audiences',
				'field' => 'slug',
				'terms' => $_GET['resources_audiences']

		);

	// for taxonomies / audiences
	if( isset( $_GET['resources_topics'] ) && $_GET['resources_topics']  && !$_GET['search_term']  )
		$args['tax_query'][] = array(

				'taxonomy' => 'resources_topics',
				'field' => 'slug',
				'terms' => $_GET['resources_topics']

		);

	// SEARCH TERMS
	 if( isset( $_GET['search_term'] ) && $_GET['search_term'] )
        $args['s'] = $_GET['search_term'];






	$wp_query = new WP_Query( $args );

	// var_dump($args);

	if( $wp_query->have_posts() ) :
		while( $wp_query->have_posts() ): $wp_query->the_post();
			$new_card = 'new-card';

			include( locate_template( 'template-parts/resources_parts/post_card.php', false, false ) );
			// get_template_part( 'template-parts/blog_archive_parts/post_card' );
			// the_title( '', '', true );
		endwhile;
		wp_reset_postdata();
	else :
		echo '<div class="flex-c margin-2 full-width"><h4>No posts found</h4></div>';

	endif;

	die();
} ?>