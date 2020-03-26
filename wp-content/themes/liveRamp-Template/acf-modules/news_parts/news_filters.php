<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

	<div class="grid-x grid-margin-y">
			
		<div class="cell category-filter ">
			<h2 class="flexo-medium"><?php _translate('press_&_news') ?></h2>

			<div class="divider"><img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/blue-headline-line.svg" alt="divider"></div>

			<p class="title"><?php _translate('filters') ?></p>
		
			<label for="category"><?php _translate('type') ?></label>

			<select name="newsfilter" id="newsfilter">
				<option value="" hidden><?php _translate('all') ?></option>
				<option value="is_featured"><?php _translate('featured_stories') ?></option>
				<option value="is_press"><?php _translate('press_releases') ?></option>
			</select>

			<input type="hidden" name="action" value="news_filter">
			
		</div>
				
	</div>

</form>

<script>

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
				success:function(data) {
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
						} else {
					    	window.location.href = url;
					  	};

					});
				}
			});
			return false;
		});
	});


</script>
