<section class="pad-section top-six resource-archive hide-for-filters relative">
	<div class="bg-art">
		<div class="waves">

		</div>
	</div>
	<div class="grid-container z-5-r">
		<div class="grid-x align-center">
			<h2 class="cell text-center pad-2">Latest Resources</h2>
			<div class="cell small-separator margin-top-1">	</div>
			<div class="cell">
				<div class="post-card-wrapper">
				<?php

					// WP_Query arguments
					$args = array(
						'post_type'              => array( 'resources' ),
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

							?>

							<?php get_template_part( 'sub-templates/resources_parts/post_card' ); ?>

							<?php

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
