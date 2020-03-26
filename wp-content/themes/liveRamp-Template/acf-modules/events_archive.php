<?php 
	// var_dump($post); 

	$temp_post = $post;
?>
<?php 

	// WP_Query arguments
	$args = array(
		'post_type'              => array( 'events' ),
		'posts_per_page'         => '-1',
		'meta_key'				 => 'date_from',
		'orderby'				 => 'meta_value_num',
		'order'					 => 'asc',

	);

	// The Query
	$wp_query = new WP_Query( $args );
	
 ?>

<section class="events_archive" id="events_archive">
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-margin-y">

			<div class="cell large-3 medium-4">
				
					
					<!-- <div class="sticky" data-sticky data-top-anchor="events_archive" data-btm-anchor="events_archive:bottom" data-options="marginTop:10;" data-margin-bottom='2'> -->
						
						<?php include('events_parts/events_filters.php'); ?>

						
						
						<!-- <div class="social">
							<p>Share Page</p>
							<?php echo do_shortcode("[wp_social_sharing]") ?>	
						</div>	 -->
						
					<!-- </div> -->

				

			</div>

			<div class="cell large-9 medium-8 archive">
				<?php include('events_parts/search.php'); ?>
				<?php include('events_parts/archive.php'); ?>
				
			</div>
			
		</div>
	</div>
</section>

