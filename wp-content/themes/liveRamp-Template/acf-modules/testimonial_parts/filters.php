<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

	<div class="grid-x grid-margin-y">
			
			<div class="cell category-filter ">
				<h2 class="flexo-medium">Customer Stories</h2>
					<div class="divider"><img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/blue-headline-line.svg" alt="divider"></div>
				
					<div class="cell text large-shrink">
						<p class="show-me">Show me resources by</p>
						</div>
						<div class="cell large-shrink category-filter ">
							<?php
								if( $terms = get_terms( array(
										'taxonomy' => 'resources_categories',
										'orderby' => 'name',
										'hide_empty' => 1
										 )
									   )
									):

									echo '<select name="categoryfilter"><option value="null">Type</option>';
									foreach ( $terms as $term ) :
										if (($term->slug == 'case-study') || ($term->slug == 'video')) {
											# code...
											echo '<option value="' . $term->term_id . '">' . $term->name .  '</option>'; 
										}
										// ID of the category as the value of an option
									endforeach;
									echo '</select>';
								endif;
							?>
						</div>

						<div class="cell large-shrink audience-filter ">
							<?php
								if( $terms = get_terms( array(
										'taxonomy' => 'resources_audiences',
										'orderby' => 'name',
										'hide_empty' => 1
										 )
									   )
									):

									echo '<select name="audiencesfilter"><option value="null">Audiences</option>';
									foreach ( $terms as $term ) :
										echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
									endforeach;
									echo '</select>';
								endif;
							?>
						</div>

						

					<input type="hidden" name="action" value="testimonials_filter">
					<!-- <input type="hidden" name="topicsfilter" value="testimonials"> -->
				
			</div>
				
	</div>

</form>
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="" class="reset" style="display: none;">
	 <input type="hidden" name="posts_per_page" value="12">
	 <input type="hidden" name="action" value="testimonials_filter">
	 <input type="submit" value="Reset Filters" class="button cta outline">
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
					$('#more-button').hide();
					console.log("recieved filter");
					$('.reset').fadeIn();
					$('#testimonials-card-wrapper').html(data); // insert data
					$('.new-card').hide().each(function(i) {
						$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
					});
					// $('html, body').animate({scrollTop: $('#testimonials_archive').offset().top}, 800);
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

	jQuery(function($){
		$('.reset').submit(function(){
			event.preventDefault();
			// alert('gotheem');
			var filter = $('.reset');
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
					$('#more-button').show();
					$('.reset').hide();
					$('select').val('null');
					$('input.search').val('');
					$('#testimonials-card-wrapper').html(data); // insert data
					$('.new-card').hide().each(function(i) {
						$(this).delay(100 * i).fadeIn(500).removeClass('new-card');
						$('.seo-link').hide();
					});
					// $('html, body').animate({scrollTop: $('#filter').offset().top -130 }, 800);

					$('.select-styled').each(function(e) {
					  $this = $(this);
					  // var data_default = $this.attr('data-default');
					  var get_select = $this.next('ul');
					  var data_default = get_select.children('li:first-child').text();
					  $this.text(data_default);
					  console.log('data-defualt', data_default);

					})
					
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


</script>
