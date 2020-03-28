<section class="pad-section top-six blog-archive hide-for-filters">
	<div class="grid-container">
		<div class="grid-x align-center">
			<h2 class="cell text-center margin-top-2">Latest Posts</h2>
			<div class="cell small-separator margin-top-1">	</div>
			<div class="cell">
				<div class="post-card-wrapper">
				<?php

					// WP_Query arguments
					$args = array(
						'post_type'              => array( 'blog-post' ),
						'nopaging'               => false,
						'posts_per_page'         => '6',
						'order'                  => 'DESC',
					);


					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();

							$terms = get_the_terms( get_the_ID(), 'blog_categories' );

							 get_template_part( 'template-parts/blog_archive_parts/post_card' );

						}

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
	</div>
</section>
