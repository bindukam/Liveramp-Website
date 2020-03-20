<div class="grid-x  search-wrapper">
	<div class="cell">
		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="search">
			 <input type="text" name="search_term" placeholder='Search' class="search">
			 <input type="hidden" name="action" value="testimonials_filter">
			 <!-- <input type="submit" value="Reset Filters" class="button cta outline"> -->
		</form>	
	</div>
</div>

<script>
	$( document ).ready(function() {
	    // console.log( "reswet ready!" );

	    jQuery(function($){
	    	$('#search').submit(function(){
	    		event.preventDefault();
	    		// alert('gotheem');
	    		var filter = $('#search');
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
	    				$('#more-button').hide();
	    				$('.reset').fadeIn();
	    				$('input.search').val('');
	    				$('#testimonials-card-wrapper').html(data); // insert data
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

