<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

	<div class="grid-x grid-margin-y">
			
			<div class="cell category-filter ">
			<h2 class="flexo-medium">Press & News</h2>
      
      				<div class="divider"><img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/blue-headline-line.svg" alt="divider"></div>

					<p class="title">Filters</p>
				
					<label for="category">Type</label>

					<select name="newsfilter" id="newsfilter">
						<option value="" hidden>All</option>
						<option value="is_featured">Featured Stories</option>
						<option value="is_press">Press Releases</option>
					</select>

					<input type="hidden" name="action" value="news_filter">
				
			</div>
				
	</div>

</form>

<script>


	$('#filter').change(function() {
		console.log('filter changed');
		// this.form.submit();
	});


	jQuery(function($){
		$('#filter').change(function(){
			// alert('gotheem');
			var filter = $('#filter');
			$.ajax({
				url:filter.attr('action'),
				data:filter.serialize(), // form data
				type:filter.attr('method'), // POST
				beforeSend:function(xhr){
					filter.find('button').text('Processing...'); // changing the button label
				},
				success:function(data){
					// filter.find('button').text('Apply filter'); // changing the button label back
					// $('#more-button').hide();
					// $('.reset-filters').fadeIn();
					$('#news-card-wrapper').html(data); // insert data
					$('.new-card').hide().each(function(i) {
						$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
						$('.seo-link').hide();
					});
					$('html, body').animate({scrollTop: $('#news_archive').offset().top -130 }, 800);
					$('.click-card').click(function() {
					  $('.seo-link').hide();	
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

	// jQuery(function($){
	// 	$('#reset').submit(function(){
	// 		event.preventDefault();
	// 		// alert('gotheem');
	// 		var filter = $('#reset');
	// 		$.ajax({
	// 			url:filter.attr('action'),
	// 			data:filter.serialize(), // form data
	// 			type:filter.attr('method'), // POST
	// 			beforeSend:function(xhr){
	// 				// filter.find('button').text('Processing...'); // changing the button label
	// 			},
	// 			success:function(data){
	// 				// filter.find('button').text('Apply filter'); // changing the button label back
	// 				$('#more-button').show();
	// 				// $('.reset-filters').hide();
	// 				$('select').val(null);
	// 				$('#news-card-wrapper').html(data); // insert data
	// 				$('.new-card').hide().each(function(i) {
	// 					$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
	// 				});
	// 				// $('html, body').animate({scrollTop: $('#filter').offset().top -130 }, 800);
	// 				$('.click-card').click(function() {
	// 				  var url = $(this).data('url');
	// 				  var blank = $(this).data('blank');
	// 				  if (blank) {
	// 				    window.open(url);
	// 				  }
	// 				  else {
	// 				    window.location.href = url;
	// 				  };

	// 				});

	// 			}
	// 		});
	// 		return false;
	// 	});
	// });


</script>
