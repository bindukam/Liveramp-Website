<section class="resource-filters light-gray-bkg">
	<div class="grid-container">
		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="GET" id="filter" class="no-border">
		<div class="grid-x align-middle filter-grid">

						<div class="cell text large-shrink">
							Show me resources by
						</div>
						<div class="cell large-shrink category-filter ">
							<?php
								if( $terms = get_terms( array(
										'taxonomy' => 'resources_categories',
										'orderby' => 'name',
										'hide_empty' => 1
										 )
									   )
									):

									echo '<select name="resources_categories" data-default="Category"><option value="" hidden>Category</option>';
									foreach ( $terms as $term ) :
										echo '<option value="' . $term->slug . '">' . $term->name . '</option>'; // ID of the category as the value of an option
									endforeach;
									echo '</select>';
								endif;
							?>
						</div>

						<div class="cell large-shrink category-filter ">
							<?php
								if( $terms = get_terms( array(
										'taxonomy' => 'resources_audiences',
										'orderby' => 'name',
										'hide_empty' => 1
										 )
									   )
									):

									echo '<select name="resources_audiences" data-default="Audiences"><option value="" disabled hidden>Audiences</option>';
									foreach ( $terms as $term ) :
										echo '<option value="' . $term->slug . '">' . $term->name . '</option>'; // ID of the category as the value of an option
									endforeach;
									echo '</select>';
								endif;
							?>
						</div>

						<div class="cell large-shrink category-filter ">
							<?php
								if( $terms = get_terms( array(
										'taxonomy' => 'resources_topics',
										'orderby' => 'name',
										'hide_empty' => 1
										 )
									   )
									):

									echo '<select name="resources_topics" data-default="Topics"><option value="" hidden>Topics</option>';
									foreach ( $terms as $term ) :
										echo '<option value="' . $term->slug . '">' . $term->name . '</option>'; // ID of the category as the value of an option
									endforeach;
									echo '</select>';
								endif;
							?>
						</div>



						<div class="cell auto spacer text-center show-for-large flex-c">
							<svg height="40" width="3" class="vl">
							  <line x1="0" y1="0" x2="0" y2="40" style="stroke:#C8CAD0;stroke-width:2" stroke-linecap="round"/>
							</svg>
						</div>
						<div class="cell large-3">
							<input type="text" name="search_term" placeholder="Search" class="search">
							 <input type="hidden" name="action" value="resource_filter">
						</div>

		</div>
		</form>
	</div>
</section>

<section class="resource-archive">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell small-12 text-center">
				<div class="reset-filters" style="display: none;">
					<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="reset">
						 <input type="hidden" name="posts_per_page" value="6">
						 <input type="hidden" name="action" value="resource_filter">
						 <input type="submit" value="Reset Filters" class="">
					</form>
				</div>
			</div>
			<div class="cell small-12">
				<div class="post-card-wrapper reset-filters" id="post-card-wrapper">
					
					<?php if ($_GET): ?>
						 <?php 

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






						 		$saved_resource_query = new WP_Query( $args );

						 		if( $saved_resource_query->have_posts() ) :
						 			while( $saved_resource_query->have_posts() ): $saved_resource_query->the_post();
						 				$new_card = 'new-card'; 
						 				// var_dump(the_post());
						 				// get_template_part( 'post_card' );
						 				include 'post_card.php';
						 				// the_title( '', '', true );
						 			endwhile;
						 			// wp_reset_postdata();
						 		else :
						 			echo '<div class="flex-c margin-2 full-width"><h4>No posts found</h4></div>';

						 		endif;
						 		// wp_reset_postdata();


						  ?>

							
					<?php endif ?>

				</div>
			</div>

		</div>
	</div>
</section>

