<div class="grid-x align-middle">
			<div class="cell large-shrink">
				<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="GET" id="<?php echo $filter_id ?>" class="filters no-border">
					<div class="grid-x align-middle filter-grid">
						<div class="cell text large-shrink">
							Show me posts about
						</div>
						<div class="cell large-shrink category-filter ">
							<?php
								if( $terms = get_terms( array(
										'taxonomy' => 'blog_categories',
										'orderby' => 'name',
										'hide_empty' => 1
										 )
									   )
									):

									echo '<select name="blog_categories" data-default="Category" aria-label="Category"><option value="" hidden>Category</option>';
									foreach ( $terms as $term ) :
										// var_dump($term);
										// echo $term->slug;
										echo '<option value="' . $term->slug . '">' . $term->name . '</option>'; // ID of the category as the value of an option
									endforeach;
									echo '</select>';
								endif;
							?>
						</div>
						<div class="cell large-shrink">
							by
						</div>
						<div class="cell filter author-filter large-shrink">
							<?php
								//Fetch published custom-post-type Authors 
								$pargs = array(
									'post_type' => 'authors',
									'post_status' => 'publish',
									'orderby' => 'post_title',
									'order' => 'ASC',
									'posts_per_page'   => -1,
								);
								// The Query
								$the_query = new WP_Query($pargs);
								
								if ( $the_query->have_posts() ) : 
									while( $the_query->have_posts() ): $the_query->the_post();
										$author_list[get_the_ID()] = get_the_title();		
									endwhile;
									wp_reset_postdata();
								 
								else : 
									$author_list = array();  
								endif;  
								
								if( !empty($author_list) ):

									echo '<select name="cus_author" data-default="Author" aria-label="Author"><option value="" hidden>Author</option>';
									foreach($author_list as $authorID => $authorName):
										
										// WP_Query arguments
										$args = array(
											'post_type'                => array( 'blog-post' ),
											'post_status'              =>  array( 'publish','acf-disabled','private' ),
											'meta_key'                 =>  'blog_author',
											'meta_value'               =>  $authorID,
										);

										// The Query
										$check_author_query = new WP_Query( $args );

										// The Loop
										if ($check_author_query->have_posts()) {
											// var_dump($author);
											echo '<option value="' . $authorID . '">' . $authorName . '</option>'; // ID of the category as the value of an option
										}

										// Restore original Post Data
										wp_reset_postdata();

										// echo $author->ID;
										// echo '<option value="' . $author->ID . '">' . $author->display_name . '</option>'; // ID of the category as the value of an option
									endforeach;
									echo '</select>';
								endif;
							?>
						</div>
						<div class="cell large-shrink">
							from
						</div>
						<div class="cell filter large-shrink date-filter">
							<?php
								$current_yesr  = date("Y");
								$already_selected_value = date("Y");
								$earliest_year = 2016;

								print '<select name="date_field" data-default="Date" aria-label="Date">
											<option value="" hidden>Date</option>';

								foreach (range(date('Y'), $earliest_year) as $x) {
								    print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
								}
								print '</select>';
							 ?>
							 <input type="hidden" name="action" value="myfilter">
						</div>
					</div>
				</form>

			</div>
			<div class="cell auto spacer text-center show-for-large">
				<svg height="40" width="3" class="vl">
				  <line x1="0" y1="0" x2="0" y2="40" style="stroke:rgb(100,100,100);stroke-width:2" />
				</svg>
			</div>
			<div class="cell large-3 email-subscribe">
				<div class="hide-for-large">
					<hr>
				</div>
				<div class="email-form text-center" id="filter-signup">

					<div class="response_two" style="display:none">
						<h4>Thank you for subscribing</h4>
					</div>
					<form class="mktoForm filers-signup" data-formId="1001" data-formInstance="two"></form>
				</div>
			</div>
		</div>