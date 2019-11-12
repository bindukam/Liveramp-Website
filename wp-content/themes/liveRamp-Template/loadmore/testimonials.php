<?php 

	// testimonials loadmore

	function testimonials_load_more_scripts() {

		global $wp_query;

		// In most cases it is already included on the page and this line can be removed
		wp_enqueue_script('jquery');

		// register our main script but do not enqueue it yet
		wp_register_script( 'testimonials_loadmore', get_stylesheet_directory_uri() . '/testimonials_loadmore.js', array('jquery') );

		// now the most interesting part
		// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
		// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
		wp_localize_script( 'testimonials_loadmore', 'testimonials_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );

	 	wp_enqueue_script( 'testimonials_loadmore' );
	}

	add_action( 'wp_enqueue_scripts', 'testimonials_load_more_scripts' );


		// ajax handler for load more
	function testimonials_loadmore_ajax_handler(){

		// prepare our arguments for the query
		$args = json_decode( stripslashes( $_POST['query'] ), true );
		$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
		$args['post_status'] = 'publish';
		$args['post_type'] = array('resources');
		$args['tax_query'] = array(
				array(
					'taxonomy'         => 'resources_topics',
					'terms'            => 'testimonials',
					'field'            => 'slug',
				),
				array(
					'taxonomy'         => 'resources_categories',
					'terms'            => array( 'video', ' case-study' ),
					'field'            => 'slug',
					'operator'         => 'IN',
				),
		);


		// it is always better to use WP_Query but not here
		query_posts( $args );

		if( have_posts() ) :

			// run the loop
			while( have_posts() ): the_post();

				// $terms = get_the_terms( get_the_ID(), 'testimonials_categories' );



				$new_card = 'new-card';
				include( locate_template( 'acf-modules/testimonial_parts/card.php', false, false ) );


			endwhile;

		endif;
		die; // here we exit the script and even no wp_reset_query() required!
	}



	add_action('wp_ajax_testimonials_loadmore', 'testimonials_loadmore_ajax_handler'); // wp_ajax_{action}
	add_action('wp_ajax_nopriv_testimonials_loadmore', 'testimonials_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


	// testimonials Blog filters load ajax
	// AJAX filter code
	add_action('wp_ajax_testimonials_filter', 'testimonials_filter_function'); // wp_ajax_{ACTION HERE}
	add_action('wp_ajax_nopriv_testimonials_filter', 'testimonials_filter_function');


	function testimonials_filter_function(){
			$args = array(
				'orderby' => 'date', // we will sort posts by date
				'order'	=> $_POST['date'], // ASC or DESC
				'posts_per_page'         => 100,
				'post_type'              => array( 'resources' ),

			);

			if( isset( $_POST['posts_per_page'] ) && $_POST['posts_per_page'] )
			$args['posts_per_page'] = $_POST['posts_per_page'];

			// for taxonomies / categories
			if( isset( $_POST['categoryfilter'] ) && $_POST['categoryfilter']  && !$_POST['search_term'] )
				$args['tax_query'][] = array(

						'taxonomy' => 'resources_categories',
						'field' => 'id',
						'terms' => $_POST['categoryfilter'],
						

				);

			// for taxonomies / audiences
			if( isset( $_POST['audiencesfilter'] ) && $_POST['audiencesfilter']  && !$_POST['search_term']  )
				$args['tax_query'][] = array(

						'taxonomy' => 'resources_audiences',
						'field' => 'id',
						'terms' => $_POST['audiencesfilter'],
						

				);

			// for taxonomies / categories
			$args['tax_query'][] = array(

					'taxonomy' => 'resources_topics',
					'field' => 'slug',
					'terms' => 'testimonials',
					

			);
				

			// for taxonomies / audiences


			// SEARCH TERMS
			 if( isset( $_POST['search_term'] ) && $_POST['search_term'] )
		        $args['s'] = $_POST['search_term'];

		// author query set here

		$wp_query = new WP_Query( $args );

		if( $wp_query->have_posts() ) :
			while( $wp_query->have_posts() ): $wp_query->the_post();
				$new_card = 'new-card';

				include( locate_template( 'acf-modules/testimonial_parts/card.php', false, false ) );
				// the_title(); //use for testing

			endwhile;
			wp_reset_postdata();
		else :
			include( locate_template( 'acf-modules/testimonial_parts/no_posts.php', false, false ) );
		endif;

		die();
	}

 ?>