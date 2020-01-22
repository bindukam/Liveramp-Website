<?php 
  
  $locations = array();
  $locations_list = array();
  
  $taxonomy = 'events_locations';
  $parent_locations = get_terms( array( 
        'taxonomy' => $taxonomy,
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => 0,
        // 'hierarchical' => 1
   ) );


  // var_dump($parent_locations);

  foreach ($parent_locations as $key => $value) {
      $locations_list[$value->slug] = $value->name;

      $children_array = get_term_children( $value->term_id, $taxonomy );
      // var_dump($children_array);
      // echo $value->term_id;
      $children = get_terms( array( 
          'taxonomy' => $taxonomy,
          'orderby' => 'name',
          'order' => 'ASC',
          // 'include' => $children_array,
          // 'exclude' => $value->term_id,
          'parent' => $value->term_id,
          // 'childless' => true,
       ) );
      // var_dump($children);
      
      foreach ($children as $term) {
          // $term = get_term($v);
          $name = '-'.$term->name;
          $slug = $term->slug;
          $id = $term->term_id;
          $locations_list[$slug] = $name;
          
          $grand_children = get_terms( array( 
              'taxonomy' => $taxonomy,
              'orderby' => 'name',
              'order' => 'ASC',
              // 'include' => $children_array,
              // 'exclude' => $value->term_id,
              'parent' => $term->term_id,
              // 'childless' => true,
           ) );
          foreach ($grand_children as $term) {
             $name = '--'.$term->name;
             $slug = $term->slug;
             $id = $term->term_id;
             $locations_list[$slug] = $name;
          }
      }
  }

  // var_dump($locations_list);
 ?>

 




<?php
	
	$select_dates = array();
	$select_locations = array(); 
	$select_liveramp = array(); 



	if ( $wp_query->have_posts() ) {
		while ( $wp_query->have_posts() ) {
			$wp_query->the_post();

			
			// $select_dates[get_field('date_from')] = date("M d, Y", strtotime(get_field('date_from')));
			// $date_from = get_field('date_from');
			$val = date("Ym", strtotime(get_field('date_from')));
			$date = date("Y - M", strtotime(get_field('date_from')));

			$terms = get_the_terms( get_the_ID(), 'events_locations' );
			$types = get_the_terms( get_the_ID(), 'events_liveramp' );
     

			// $select_dates[$val] = $date;
			if (!array_key_exists($val, $select_dates)) {
				if ($val >=  date('Ym')) {
					# code...
					$select_dates[$val] = $date;
				}
				
			}

			foreach ($terms as $key => $term) {
				// var_dump($term);
				if (!array_key_exists($term->slug, $select_locations)) {
					if ($val >=  date('Ym')) {
						# code...
						$select_locations[$term->slug] = $term->name;
					}
					
				}
			}

			if (!empty($types)) {
				foreach ($types as $key => $type) {
					
					if (!array_key_exists($type->slug, $select_liveramp)) {
						if ($val >  date('Ym')) {
							# code...
							$select_liveramp[$type->slug] = $type->name;
						}
						
					}
				}
			}
			

			// echo '<option value="' . $val . '">' . $date . '</option>'; // ID of the 
		}
		
	} else {
		// no posts found
	}
	
 ?>


<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

	<div class="grid-x grid-margin-y">

    <div class="cell header">
      <h2 class="flexo-medium"><?php _translate('events') ?></h2>
      
      <div class="divider"><img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/blue-headline-line.svg" alt="divider"></div>

      <p><?php _translate('filters') ?></p>
    </div>
			 
			<div class="cell location-filter ">
				<label for="locationfilter"><?php _translate('location') ?></label>
				<select name="locationfilter" id="locationfilter"><option value=""><?php _translate('all') ?></option>
					<?php
					
					// ksort($select_locations);
					foreach ($locations_list as $key => $val) {

					    // echo "$key = $val\n";
              if (array_key_exists($key, $select_locations)) {
                # code...
                echo '<option value="' . $key . '">' . $val . '</option>'; // ID of the category 
              }
					    // echo '<option value="' . $key . '">' . $val . '</option>'; // ID of the category 
					}
					?>
					
				</select>
			</div>
      
      <?php if (sizeof($select_liveramp) != 0): ?>
        <div class="cell liveramp-filter ">
          <label for="liverampfilter"><?php _translate('type') ?></label>
          <select name="liverampfilter" id="liverampfilter"><option value=""><?php _translate('all') ?></option>
            <?php
            
            ksort($select_liveramp);
            foreach ($select_liveramp as $key => $val) {
                // echo "$key = $val\n";
                echo '<option value="' . $key . '">' . $val . '</option>'; // ID of the category 
            }
            ?>
            
          </select>
        </div>
      <?php endif ?>
			

			<div class="cell  date-filter">
				<label for="date_field"><?php _translate('date') ?></label>
				<select name="date_field" id="date_field"><option value=""><?php _translate('all') ?></option>
				<?php
					
					foreach ($select_dates as $key => $value) {
						echo '<option value="' . $key . '">' . $value . '</option>'; // ID of the 

					}
					
				 ?>
				</select>
				 
			</div>
			<div class="cell reset-filters" style="display: none;">
					<p class="button outline reset-events" id=""><?php _translate('reset_events') ?></p>
			</div>
				
	</div>

</form>

<script>


$( document ).ready(function() {
    console.log( "filters ready!" );

    	

    	$('.post-card').each(function(index, el) {
    		// console.log(index);
    		console.log(el);
    		// console.log($(this['dataset']));
    		// $('#liverampfilter').append();
    	});

        $('select').on('change', function(event) {
          event.preventDefault();
          var date = $('#date_field').val();
          var loc = $('#locationfilter').val();
          var type = $('#liverampfilter').val();
          
          /* Act on the event */
          var emptyCheck;



          
          // $('.reset-filters').fadeIn('400');
          // emptyCheck = $('.job-card[data-location="'+locId+'"]');

          // console.log(emptyCheck.size());
	          		
      		$('.post-card').each(function() {
      			$(this).hide();
      			$('.reset-filters').fadeIn('400');
      			if (date && loc && type ) {
      				emptyCheck = $('.'+loc+'.'+date+'.'+type);
      				if (emptyCheck.length > 0) {
      					if ($(this).hasClass(loc) && $(this).hasClass(type) && $(this).hasClass(date)) {
      						$(this).fadeIn('400');
      					};
      				}
      				else{
      					$('#no-events').fadeIn('400');
      				};
      					
      			}
      			else if(date && loc && !type){
      				emptyCheck = $('.'+loc+'.'+date);
      				if (emptyCheck.length > 0) {
      					if ($(this).hasClass(loc) && $(this).hasClass(date)) {
      						$(this).fadeIn('400');
      					};
      				}
      				else{
      					$('#no-events').fadeIn('400');
      				};
      					
      			}
      			else if(date && type && !loc){
      				emptyCheck = $('.'+type+'.'+date);
      				if (emptyCheck.length > 0) {
      					if ($(this).hasClass(type) && $(this).hasClass(date)) {
      						$(this).fadeIn('400');
      					};
      				}
      				else{
      					$('#no-events').fadeIn('400');
      				};
      					
      			}
      			else if(loc && type && !date){
      				emptyCheck = $('.'+type+'.'+loc);
      				if (emptyCheck.length > 0) {
      					if ($(this).hasClass(type) && $(this).hasClass(loc)) {
      						$(this).fadeIn('400');
      					};
      				}
      				else{
      					$('#no-events').fadeIn('400');
      				};
      					
      			}
      			else if(loc && !type && !date){
      				emptyCheck = $('.'+loc);
      				if (emptyCheck.length > 0) {
      					if ($(this).hasClass(loc)) {
      						$(this).fadeIn('400');
      					};
      				}
      				else{
      					$('#no-events').fadeIn('400');
      				};
      					
      			}
      			else if(!loc && type && !date){
      				emptyCheck = $('.'+type);
      				if (emptyCheck.length > 0) {
      					if ($(this).hasClass(type)) {
      						$(this).fadeIn('400');
      					};
      				}
      				else{
      					$('#no-events').fadeIn('400');
      				};
      					
      			}
      			else if(!loc && !type && date){
      				emptyCheck = $('.'+date);
      				if (emptyCheck.length > 0) {
      					if ($(this).hasClass(date)) {
      						$(this).fadeIn('400');
      					};
      				}
      				else{
      					$('#no-events').fadeIn('400');
      				};
      					
      			}

            

      			;



      		});
	          
          console.log(emptyCheck);
	          

	     });

        $('.reset-events').on('click', function() {
        	event.preventDefault();
        	$('#no-events').fadeOut('400');
        	$('.reset-filters').fadeOut('400');
          $('.reset-search').fadeOut('400');
        	$('.post-card').each(function() {
        		$(this).fadeIn('400');
        	});
        	$('select').val(null);
          $('input').val(null);
        	/* Act on the event */

          // reset styled filters 
          $('.select-styled').each(function(e) {
            $this = $(this);
            // var data_default = $this.attr('data-default');
            var get_select = $this.next('ul');
            var data_default = get_select.children('li:first-child').text();
            $this.text(data_default);
            console.log('data-defualt', data_default);

          })

        });


});







</script>
