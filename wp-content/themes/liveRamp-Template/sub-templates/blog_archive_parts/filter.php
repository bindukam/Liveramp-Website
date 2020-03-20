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

									echo '<select name="blog_categories" data-default="Category"><option value="" hidden>Category</option>';
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
								if( $authors = get_users( array(
										'orderby' => 'name',
										'hide_empty' => 1,
										// 'role'       => 'author'
										 )
									   )
									):

									echo '<select name="author" data-default="Author"><option value="" hidden>Author</option>';
									foreach ( $authors as $author ) :
										$aid = $author->ID;
										// WP_Query arguments
										// WP_Query arguments
										$args = array(
											'post_type'              => array( 'blog-post' ),
											'author'                 =>  $aid,
										);

										// The Query
										$check_author_query = new WP_Query( $args );

										// The Loop
										if ($check_author_query->have_posts()) {
											// var_dump($author);
											echo '<option value="' . $author->user_nicename . '">' . $author->display_name . '</option>'; // ID of the category as the value of an option
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

								print '<select name="date_field" data-default="Date">
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