<section class="blog-filters light-gray-bkg" id="filters">
	<div class="grid-container">
		<div class="show-for-large">
			<?php $filter_id = 'filter1' ?>
			<?php include('filter.php'); ?>	
		</div>
		<div class="hide-for-large">
			<ul class="accordion" data-accordion data-allow-all-closed="true">
			  <li class="accordion-item" data-accordion-item>
			  	<a href="#" class="accordion-title">Filters</a>
			  		<div class="accordion-content" data-tab-content>
			  			<?php $filter_id = 'filter2' ?>
			  			<?php include('filter.php'); ?>	
			  		</div>
			  </li>
			</ul>
		</div>
	</div>
</section>

<section class="blog-archive">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell text-center">
				<div class="reset-filters" style="display: none;">
					<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="reset">
						 <input type="hidden" name="posts_per_page" value="6">
						 <input type="hidden" name="action" value="myfilter">
						 <input type="submit" value="Reset Filters" class="">
					</form>	
					<!-- <a href="/blog/#filters">Reset Filters</a> -->
				</div>
			</div>
			<div class="cell">
				<div class="post-card-wrapper"  id="response">
					<!-- results from search go here -->
				</div>
				<?php
				// don't display the button if there are not enough posts
				if (  $wp_query->max_num_pages > 1 ) : ?>
					<div class="text-center">
							<div class="button misha_loadmore_filter down-arrow">More posts</div>
						</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>
<section class="posts-continue blog-archive hide-for-reset">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<div class="post-card-wrapper"  id="post-card-wrapper">

					<?php if ($_GET): ?>
						<?php

							// WP_Query arguments
							$args = array(
								'post_type'              => array( 'blog-post' ),
								'nopaging'               => false,
								'posts_per_page'         => '6',
								'order'                  => 'DESC',
							);

							if ($_GET) {
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

								if( isset( $_GET['cus_author'] ) && $_GET['cus_author'] )
									//$args['author_name'] = $_GET['cus_author'];
									$args['meta_key'] = 'blog_author';
									$args['meta_value'] = $_GET['cus_author'];
							}

							// The Query
							$query = new WP_Query( $args );

							// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();

									$terms = get_the_terms( get_the_ID(), 'blog_categories' );

									 get_template_part( 'template-parts/blog_archive_parts/post_card' );

								}

							} else {
								// no posts found
							}

							// Restore original Post Data
							wp_reset_postdata();


						 ?>
					<?php else:
							
					endif; 
					?>
					
				</div>
			</div>
		</div>
	</div>
</section>