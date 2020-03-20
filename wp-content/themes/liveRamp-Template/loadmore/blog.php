<?php 
	
	// blog post load more
	function misha_my_load_more_scripts() {

		global $wp_query;

		// In most cases it is already included on the page and this line can be removed
		// wp_enqueue_script('jquery');

		// register our main script but do not enqueue it yet
		wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/myloadmore.js', array('jquery') );

		// now the most interesting part
		// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
		// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
		wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );

	 	wp_enqueue_script( 'my_loadmore' );
	}

	add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );


		// ajax handler for load more
	function misha_loadmore_ajax_handler(){

		// prepare our arguments for the query
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
		$args['post_status'] = 'publish';
		$args['post_type'] = array('blog-post');

		// it is always better to use WP_Query but not here
		query_posts( $args );

		if( have_posts() ) :

			// run the loop
			while( have_posts() ): the_post();

				$terms = get_the_terms( get_the_ID(), 'blog_categories' );



				$new_card = 'new-card';
				include( locate_template( 'sub-templates/blog_archive_parts/post_card.php', false, false ) );


			endwhile;

		endif;
		die; // here we exit the script and even no wp_reset_query() required!
	}



	add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
	add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}




	// AJAX filter code
	add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE}
	add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');


	function misha_filter_function(){
		$args = array(
			'orderby' => 'date', // we will sort posts by date
			'order'	=> $_GET['date'], // ASC or DESC
			'posts_per_page'         => 100,
			'post_type'              => array( 'blog-post' ),


		);
		
		if( isset( $_GET['posts_per_page'] ) && $_GET['posts_per_page'] )
			$args['posts_per_page'] = $_GET['posts_per_page'];
		
		// for taxonomies / categories
		if( isset( $_GET['blog_categories'] ) && $_GET['blog_categories'] )
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'blog_categories',
					'field' => 'slug',
					'terms' => array($_GET['blog_categories'])
				)
			);

		if( isset( $_GET['date_field'] ) && $_GET['date_field'] )
			$args['date_query'] = array(
				array(
					'year'          => $_GET['date_field'],
					'column'        => 'post_date',
				)
			);

		if( isset( $_GET['author'] ) && $_GET['author'] )
			$args['author_name'] = $_GET['author'];

		// author query set here


		$wp_query = new WP_Query( $args );
		
		if( $wp_query->have_posts() ) :

			while( $wp_query->have_posts() ): $wp_query->the_post();
				$new_card = 'new-card';

				include( locate_template( 'sub-templates/blog_archive_parts/post_card.php', false, false ) );
			endwhile;
			wp_reset_postdata();
		else :
			echo 'No posts found';
		endif;

		die();
	}

 ?>