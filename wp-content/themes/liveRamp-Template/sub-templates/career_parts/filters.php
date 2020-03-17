<section class="resource-filters light-gray-bkg">
	<div class="grid-container">
		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
		<div class="grid-x align-middle filter-grid">
			
						<div class="cell text large-shrink">
							Show me jobs by
						</div>
						<div class="cell large-shrink category-filter ">
							<select name="department" id="department">
								<option value="" hidden>Team</option>
									<?php foreach ( $departments as $key => $department ) : ?>
											<?php $job_count = count($department->jobs); ?>

											<?php if ($job_count > 0): ?>
												<option value="<?php echo $department->id; ?>"><?php echo $department->name ?></option>	
											<?php endif ?>
											
									<?php endforeach; ?>
							</select>
						</div>
						<div class="cell text large-shrink">
							in
						</div>

						<div class="cell large-auto category-filter ">
							<select name="location" id="location">
								<option value="" hidden>Location</option>
									<?php foreach ( $locations as $key => $location ) : ?>

											<option value="<?php echo $location->id; ?>"><?php echo $location->name ?></option>
										<!--  ID of the category as the value of an option -->
									<?php endforeach; ?>
							</select>
						</div>

			
		</div>
		</form>
	</div>
</section>


<script>

function jobCard() {
	$('.seo-link').hide();
	$('.job-card').on('click', function() {
		event.preventDefault();
		var grId = $(this).attr('data-job-id');
		var url = '/job-listing/?gh_jid='+grId
		window.location.href = url;

		/* Act on the event */
	});
}
	
$( document ).ready(function() {
    console.log( "filters ready!" );

    	$('#filter').on('submit', function(event) {
          event.preventDefault();
          /* Act on the event */
          // alert('no submit for you');
        });


        jobCard();

        $('select').on('change', function(event) {
          event.preventDefault();
          var deptId = $('#department').val();
          var locId = $('#location').val();
          
          /* Act on the event */
          var emptyCheck; 
          
          $('.reset-filters').fadeIn('400');
          // emptyCheck = $('.job-card[data-location="'+locId+'"]');

          // console.log(emptyCheck.size());

	          
	          		$('#no-results').hide();
	          		$('#jobs').show();
	          		
	          		$('.job-card').each(function() {
	          			$(this).hide();

	          			
	          			if (deptId && locId) {
	          				emptyCheck = $('.job-card[data-department="'+deptId+'"][data-location="'+locId+'"]');
	          				if (emptyCheck.length > 0 > 0) {
	          					if (($(this).data('department') == deptId) && ($(this).data('location') == locId)) {
	          						$(this).fadeIn('400');
	          					};		
	          				}
	          				else{
	          					$('#no-results').fadeIn('400');
	          					// $('#jobs').hide();
	          				};
	          				
	          			}

	          			else if (deptId && !locId) {
	          				emptyCheck = $('.job-card[data-department="'+deptId+'"]');
	          				if (emptyCheck.length > 0 > 0) {
	          					if ($(this).data('department') == deptId) {
	          						$(this).fadeIn('400');
	          					};	
	          				}
	          				else{
	          					$('#no-results').fadeIn('400');
	          					// $('#jobs').hide();
	          				};
	          					
	          			}

	          			else if (!deptId && locId) {
	          				emptyCheck = $('.job-card[data-location="'+locId+'"]');
	          				if (emptyCheck.length > 0 > 0) {
	          					if ($(this).data('location') == locId) {
	          						$(this).fadeIn('400');
	          					};	
	          				}
	          				else{
	          					$('#no-results').fadeIn('400');
	          					// $('#jobs').hide();
	          				};

	          				
	          			}
	          			else {
	          				$('.job-card').fadeIn('400');
	          			};


	          			
	          		});
	          

	          

	     });


});
	
</script>
