<section class="latest_posts_top_6">
	<div class="grid-container">
		<div class="grid-x large-up-3">
			<?php 

				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'blog' ),
					'nopaging'               => false,
					'posts_per_page'         => '6',
					'order'                  => 'DESC',
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post(); ?>
						
						<div class="cell">
							
						</div>



				<?php	}
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();

			 ?>
		</div>
	</div>
</section>
