<div class="grid-x large-up-2 xlarge-up-3 grid-margin-x grid-margin-y" id="events-card-wrapper">
	<?php 

		// The Loop
		if ( $wp_query->have_posts() ) {
			
			while ( $wp_query->have_posts() ) {
				$wp_query->the_post(); ?>
				
				<?php include('events_card.php') ?>

		<?php	
			
			}

		} else {
			// no posts found
		}

		// // Restore original Post Data
		// wp_reset_postdata();


	 ?>	
</div>
<div class="grid-x grid-margin-x grid-margin-y" id="no-events" style="display: none;">
	<div class="cell">
		<h3>No events were found</h3> 
		<div>
			<p class="button outline reset-events" id="">Reset Events</p>
		</div>
	</div>
</div>

<?php 
// Restore original Post Data
		wp_reset_postdata();
		?>		


<?php 
	$post = $temp_post;	
	// var_dump($post); 
?>