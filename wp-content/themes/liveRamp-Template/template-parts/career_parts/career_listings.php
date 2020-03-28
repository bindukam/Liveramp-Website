<section class="careers-listings">
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-margin-y">
			<div class="cell text-center">
				<div class="reset-filters core-orange" style="display: none; cursor:pointer;">
					Reset Filters
				</div>
			</div>
		</div>
		<div class="grid-x grid-margin-x grid-margin-y xlarge-up-4 medium-up-2 large-up-3 align-center" id="jobs" >
			
			
			<?php foreach ($jobs as $key => $job): ?>
				<?php 
					// $department_id = ;
					$dept = $job->departments[0];
					$dept_id = $dept->id;

					$loc = $job->offices[0];
					// var_dump($loc);
					$loc_id = $loc->id;

					// echo $dept_id;
				 ?>
				<div class="cell job-card hover-bump flex-c" data-job-id="<?php echo $job->id ?>" data-department="<?php echo $dept_id; ?>" data-location="<?php echo $loc_id; ?>">
					<div class="job pad-1 b-radius" data-equalizer-watch="job-card">
						<h4 class="core-blue"><?php echo $job->title ?></h4>
						<p><?php echo $job->location->name ?></p>
					</div>
					<a href="/job-listing/?gh_jid=<?php echo $job->id ?>" class="seo-link white">Apply</a>
				</div>
			<?php endforeach ?>

			
		</div>

		<div class="grid-x" id="no-results" style="display:none;">
			<div class="cell">
				<h3>No Results</h3>
				<!-- <div class="reset-filters core-orange" style="display: none; cursor:pointer;">
					Reset Filters
				</div> -->
				
			</div>
		</div>
	</div>
	
</section>

<script>
	
	$( document ).ready(function() {
	    console.log( "jobs ready!" );

	    jobCard();

	    $('.reset-filters').on('click', function(e) {
	    	event.preventDefault();
	    	$('.job-card').hide( function() {
	    		$(this).fadeIn('400');
	    	});
	    	$('select').val(null);
	    	$(this).hide();
	    	/* Act on the event */
	    });
 
	});	
	
</script>