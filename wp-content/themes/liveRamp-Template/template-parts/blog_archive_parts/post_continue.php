<section class="posts-continue blog-archive hide-for-filters">

	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">

				<?php

					// WP_Query arguments
					$args = array(
						'post_type'              => array( 'blog-post' ),
						'nopaging'               => false,
						'posts_per_page'         => '6',
						'offset'         		 => '6',
						'order'                  => 'DESC',
					);

					// The Query
					$wp_query = new WP_Query( $args );
					$temp_query = $wp_query;





					// The Loop
					if ( $wp_query->have_posts() ) { ?>
						<div class=" post-card-wrapper" id="load-more1">

					<?php
						while ( $wp_query->have_posts() ) {
							$wp_query->the_post();

							$terms = get_the_terms( get_the_ID(), 'blog_categories' );

							?>

							<?php get_template_part( 'template-parts/blog_archive_parts/post_card' ); ?>

							<?php

							// echo $offset;
						} ?>

						</div>

						<?php
						// don't display the button if there are not enough posts
						if (  $wp_query->max_num_pages > 1 ) : ?>
							<div class="text-center">
									<div class="button misha_loadmore outline down-arrow">More posts</div>
								</div>
						<?php endif; ?>
						<script>
							var posts_myajax = '<?php echo serialize( $wp_query->query_vars ) ?>',
						    current_page_myajax = 2,
						    max_page_myajax = <?php echo $wp_query->max_num_pages ?>
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
