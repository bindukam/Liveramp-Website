<div class="cell no-posts-cell">
	<h5>No posts found</h5>

	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="reset" class="reset-events-page">
		 <input type="hidden" name="action" value="events_reset">
		 <input type="submit" value="Reset Filters" class="button cta outline">
	</form>	

</div>	


<script>
		$( document ).ready(function() {
		    // console.log( "reswet ready!" );

		    jQuery(function($){
		    	$('.reset-events-page').submit(function(){
		    		event.preventDefault();
		    		// alert('gotheem');
		    		var filter = $('.reset-events-page');
		    		$.ajax({
		    			url:filter.attr('action'),
		    			data:filter.serialize(), // form data
		    			type:filter.attr('method'), // POST
		    			beforeSend:function(xhr){
		    				// filter.find('button').text('Processing...'); // changing the button label
		    				console.log('sending reset');
		    			},
		    			success:function(data){
		    				// filter.find('button').text('Apply filter'); // changing the button label back
		    				console.log("recieved reset");
		    				// $('#more-button').show();
		    				// $('.reset').hide();
		    				$('select').val(null);
		    				$('input').val(null);
		    				$('#events-card-wrapper').html(data); // insert data
		    				$('.new-card').hide().each(function(i) {
		    					$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
		    				});
		    				// $('html, body').animate({scrollTop: $('#filter').offset().top -130 }, 800);
		    				$('.click-card').click(function() {
		    				  var url = $(this).data('url');
		    				  var blank = $(this).data('blank');
		    				  if (blank) {
		    				    window.open(url);
		    				  }
		    				  else {
		    				    window.location.href = url;
		    				  };

		    				});

		    			}
		    		});
		    		return false;
		    	});
		    });
		});
</script>

