<div class="grid-x  search-wrapper">
	<div class="cell">
		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="search">
			 <input type="text" name="search_term" placeholder='Search' class="search" id="search_term">
			 <!-- <input type="submit" value="Reset Filters" class="button cta outline"> -->
		</form>	

		<div class="cell reset-search" style="display: none;">
				<p class="button outline reset-events" id="">Reset Events</p>
		</div>
	</div>
</div>

<script>
	$( document ).ready(function() {
	    // console.log( "reswet ready!" );

	    jQuery(function($){
			$('form input').keydown(function (e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					return false;
				}
			});

	    	$('#search_term').on("input", searchevents);
		

			function searchevents(){

				event.preventDefault();
				// alert('gotheem');
				console.log('WORKED');
				var filter = $('#search');
				var search_term = $('#search_term').val();
				console.log(search_term);
				var empty_check = 0;
				$('.post-card').hide().each(function(index, el) {
					var card_title = $(this).attr('data-search-title'),
					card_location = $(this).attr('data-location');
					console.log(card_title);
					var n = card_title.search(new RegExp(search_term, "i")),
						nloc = card_location.search(new RegExp(search_term, "i"));
					
					if (n != -1 || nloc != -1) {
						$(this).fadeIn('400');
						empty_check = 1;
					};

					if (empty_check == 0) {
						$('.reset-search').fadeIn('400');	
					};
				});;

				return false;
			}
		});
	});
</script>

