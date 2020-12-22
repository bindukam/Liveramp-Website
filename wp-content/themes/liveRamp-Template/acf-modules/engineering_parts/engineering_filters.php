<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

	<div class="grid-x grid-margin-y">
			<div class="cell filter author-filter">
			<?php 
			//Fetch published custom-post-type Authors 
			$pargs = array(
				'post_type' => 'authors',
				'post_status' => 'publish',
				'orderby' => 'post_title',
				'order' => 'ASC',
				'posts_per_page'   => -1,
			);
			// The Query
			$the_query = new WP_Query($pargs);
			
			if ( $the_query->have_posts() ) : 
				while( $the_query->have_posts() ): $the_query->the_post();
					$author_list[get_the_ID()] = get_the_title();		
				endwhile;
				wp_reset_postdata();
			 
			else : 
				$author_list = array();  
			endif;  

			?>
				<label for="author" aria-label="Authors">Authors </label>
				<?php
					
					if( !empty($author_list) ):

						echo '<select name="authorfilter" id="authorfilter" data-default="Author"><option value="" hidden>Author</option>';
						foreach($author_list as $authorID => $authorName):

							$args = array(
								'post_type'                => array( 'engineering' ),
								'post_status'              =>  array( 'publish','acf-disabled','private' ),
								'meta_key'                 =>  'blog_author',
								'meta_value'               =>  $authorID,
							);

							// The Query
							$check_author_query = new WP_Query( $args );
							// The Loop
							if ($check_author_query->have_posts()) {
								echo '<option value="' . $authorID . '">' . $authorName . '</option>'; // ID of the category as the value of an option
							}

							// Restore original Post Data
							wp_reset_postdata();

							// echo $author->ID;
							// echo '<option value="' . $author->ID . '">' . $author->display_name . '</option>'; // ID of the category as the value of an option
						endforeach;
						echo '</select>';
					endif;
				?>
			</div>

			<div class="cell category-filter ">
				<label for="category" aria-label="Category">Category </label>
				<?php
					if( $terms = get_terms( array(
							'taxonomy' => 'engineering_categories',
							'orderby' => 'name',
							'hide_empty' => 1
							 )
						   )
						):

						echo '<select name="categoryfilter" id="categoryfilter" data-default="Category"><option value="" hidden>Category</option>';
						foreach ( $terms as $term ) :
							echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
						endforeach;
						echo '</select>';
					endif;
				?>
			</div>
			
			<div class="cell filter date-filter">
				<label for="date_field" aria-label="Date">Date </label>
				<?php
					$current_yesr  = date("Y");
					$already_selected_value = date("Y");
					$earliest_year = 2018;

					print '<select name="date_field" data-default="Date">
								<option value="" hidden>Date</option>';

					foreach (range(date('Y'), $earliest_year) as $x) {
					    print '<option value="'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.$x.'</option>';
					}
					print '</select>';
				 ?>
				 <input type="hidden" name="action" value="engineering_filter">
			</div>		
	</div>

</form>

<div class="reset-filters" style="display: none;">
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="reset">
	 <!-- <input type="hidden" name="categoryfilter" value="">
	 <input type="hidden" name="authorfilter" value="">
	 <input type="hidden" name="date_field" value=""> -->
	 <input type="hidden" name="posts_per_page" value="6">
	 <input type="hidden" name="action" value="engineering_filter">
	 <input type="submit" value="Reset Filters" class="button cta">
</form>	
	
</div>
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
					$('.reset-filters').fadeIn();
					$('#engineering-card-wrapper').html(data); // insert data
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

	// resewt function

	function resetFilters () {
		console.log('reset filter functions');
		$('.select-styled').each(function(index, el) {
			var text = $(this).attr('data-default');
			$(this).text(text);
		});
	}
	
	jQuery(function($){
		$('#reset').submit(function(){
			event.preventDefault();
			var filter = $('#reset');
			$.ajax({
				url:filter.attr('action'),
				data:filter.serialize(), // form data
				type:filter.attr('method'), // POST
				beforeSend:function(xhr){
					// filter.find('button').text('Processing...'); // changing the button label
				},
				success:function(data){
					// filter.find('button').text('Apply filter'); // changing the button label back
					$('#more-button').show();
					$('.reset-filters').hide();
					$('select').val(null);
					resetFilters();
					$('#engineering-card-wrapper').html(data); // insert data
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


</script>
