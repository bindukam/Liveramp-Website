<section class="posts-continue resource-archive hide-for-filters">


	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">

				<?php // Get total number of posts in post-type-name
					$count_posts = wp_count_posts('resources');
					$total_posts = $count_posts->publish;
					// echo $total_posts . ' custom posts. ';
					$offset = 6;
				?>

				<?php

					// WP_Query arguments
					$args = array(
						'post_type'              => array( 'resources' ),
						'nopaging'               => false,
						'posts_per_page'         => '6',
						'offset'         		 => '6',
						'order'                  => 'DESC',
					);

					// The Query
					$temp_query = new WP_Query( $args );
					// $temp_query = $wp_query;





					// The Loop
					if ( $temp_query->have_posts() ) { ?>
						<div class="post-card-wrapper" id="post-card-wrapper2">

					<?php
						while ( $temp_query->have_posts() ) {
							$temp_query->the_post();

							$terms = get_the_terms( get_the_ID(), 'resources_categories' );

							?>

							<?php get_template_part( 'template-parts/resources_parts/post_card' ); ?>


							<?php



							// echo $offset;
						} ?>

						</div>

						<?php
						// don't display the button if there are not enough posts
						if (  $temp_query->max_num_pages > 1 ) : ?>
							<div class="text-center">
									<div class="button resource_loadmore outline down-arrow">More posts</div>
								</div>
						<?php endif; ?>
						<script>
							var posts_myajax = '<?php echo serialize( $temp_query->query_vars ) ?>',
						    current_page_myajax = 2,
						    max_page_myajax = <?php echo $temp_query->max_num_pages ?>
						</script>
						<?php

					}
					else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();

				 ?>

			</div>
		</div>
	</div>

</section>
