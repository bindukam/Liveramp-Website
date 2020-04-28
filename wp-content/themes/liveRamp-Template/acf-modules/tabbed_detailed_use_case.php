<?php

	(get_sub_field('overlay_header')) ? $overlay_header = 'overlay_header' : $overlay_header = '';

 ?>

<section class="tabbed_detailed_use_case pad-section <?php echo $overlay_header; ?>">
	<div class="grid-container">
		<?php
			// total amount of headshots
			$row = get_sub_field('tabs');
			$total = count($row);

		?>
		<?php if ($total > 1): ?>
			<?php if (!(get_sub_field('overlay_header'))): ?>
				<?php if (get_sub_field('description')): ?>
					<div class="grid-x">
						<div class="cell text-center">
							<?php if (get_sub_field('title')): ?>
								<h2><?php the_sub_field('title') ?></h2>
								<div class="pad-ul no-lineheight">
									<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" class="pad-ul no-lineheight margin-bottom-1">
								</div>
							<?php endif ?>
							<?php if (get_sub_field('description')): ?>
								<?php the_sub_field('description') ?>
							<?php endif ?>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>
		<?php endif ?>
<style>
	.tabbed_detailed_use_case .tabs-wrapper .tabs .tabs-title {width:auto;padding: .5rem 0;flex-grow: 1;
    flex-basis: 0;}

    .tabs-title>a {padding: 1.25rem 0;}


</style>		
		<div class="grid-x">

			 <!-- tabs  tabs start here  -->
			<?php if ($total > 1): ?>
			 	<div class="cell tabs-wrapper">
			 		<!-- tabs go here -->
			 		<div class="grid-x grid-margin-x align-center tabs" data-responsive-accordion-tabs="accordion medium-tabs large-tabs" id="example-jazmo">

			 		  <?php if (have_rows('tabs')): ?>
			 		      <?php $i = 1;  ?>
			 		      <?php while(have_rows('tabs')) : ?>
			 		      <?php the_row(); ?>

			 		      	<?php

			 		      		if ($i == 1) {
			 		      			$active = 'is-active';
			 		      			$aria = 'true';
			 		      		}
			 		      		else {
			 		      			$active = '';
			 		      			$aria = 'false';
			 		      		}

			 		      		$href = '#detail_tab'.$i;
			 		      	 ?>
			 					<div class="cell tabs-title <?php echo $active ?>">
			 						<a href="<?php echo $href ?>" aria-selected="<?php echo $aria ?>" class="icon-wrapper">
			 							<div class="icon-square">
											<?php if( the_sub_field('icon')): ?>
				 								<p>
				 									<img src="<?php the_sub_field('icon') ?>" alt="icon" class="icon">
				 								</p>
											<?php endif; ?>
			 								<?php the_sub_field('title') ?>
			 							</div>
			 						</a>
			 					</div>
			 		      	<?php ++$i ?>
			 		      <?php endwhile ?>
			 		  <?php endif ?>

			 		</div>
			 		<!-- END tabs -->
			 	</div>
			 		<!-- end tabs tabs -->
			 <?php endif ?>

				<!-- tabs content starts here -->
			<div class="cell">
				<div class="tabs-content" data-tabs-content="example-jazmo">
					<?php if (have_rows('tabs')): ?>
						<?php $i = 1;  ?>
					    <?php while(have_rows('tabs')) : ?>
					    <?php the_row(); ?>
					    <?php

					    	if ($i == 1) {
					    		$active = 'is-active';
					    		$aria = 'true';
					    	}
					    	else {
					    		$active = '';
					    		$aria = 'false';
					    	}

					    	$id = 'detail_tab'.$i;
					     ?>

						  <?php if (have_rows('column_2_content')): ?>
								<?php while(have_rows('column_2_content')) : ?>
								  <?php the_row(); ?>
									  <?php if (!get_sub_field('partner-image')):
										   $imagecheck = ' align-center';
											$imgHide = ' hide';
										else:
											$imagecheck = '';
											$imgHide = '';
										endif;
									endwhile;
								endif;
							 ?>
							<?php
								// total amount of images
								$row = get_sub_field('column_2_content');
								$total = count($row);

								$orbit_wrapper = ($total > 1) ? 'orbit-wrapper' : '';

							 ?>

					     <!-- panel starts here -->
					    	<div class="tabs-panel <?php echo $active ?>" id="<?php echo $id; ?>">
					    	  <div class="grid-x align-center grid-margin-y pad-1">
					    	  	<div class="cell medium-6 text-center panel head">
					    	  		<h2><?php the_sub_field('title') ?></h2>
					    	  		<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="divider line" class="pad-ul margin-bottom-1">
					    	  		<?php the_sub_field('description') ?>
					    	  	</div>
					    	  </div>
					    	  <!-- panel grid starts here -->
					    	  <div class="grid-x grid-margin-x <?php echo $imagecheck; ?>">
						    	  	<div class="cell col-1 medium-5 big-first-p z-5-r">
						    	  		<?php the_sub_field('column_1_content') ?>
						    	  	</div>
						    	  	<!-- image or carousel starts here -->
						    	  	<div class="cell medium-7 col-2 graphic <?php echo $orbit_wrapper; ?> <?php echo $imgHide; ?>">
						    	  		<div class="grid-x z-5-r">
						    	  			<div class="cell title text-center">
						    	  				<h4><?php the_sub_field('column_2_title') ?></h4>
						    	  			</div>
						    	  			<div class="cell medium-12 image-carousel-wrapper">
												<div class="bg-art">
												</div>
												<div class="slider-2x2">
													<?php if (have_rows('column_2_content')): ?>
						    	  					    <?php while(have_rows('column_2_content')) : ?>
															<?php the_row(); ?>
															<?php if (get_sub_field('partner-image')): ?>
																<?php 
																	$clickcard = '';
																	$cardurl = ''; 
																	if (get_sub_field('partner-cta')) {
																		$cardurl = ' data-url="' . get_sub_field('partner-cta')['url'] . '"'; 
																		// $cardurl = get_sub_field('partner-cta')['url']; 
																		$clickcard = ' click-card';
																		$cardtitle = get_sub_field('partner-cta')['title'];
																	}
																?>

																<div style="z-index:100;" class="partner-slide <?php echo $active . $clickcard ?>"  <?php echo $cardurl ?> alt="<?php  echo $cardtitle ?>">
																	<img src="<?php the_sub_field('partner-image') ?>" alt="image" class='b-radius'>
																</div>
																
															<?php endif; ?>
														<?php endwhile ?>
													<?php endif ?>
												</div>

						    	  			</div>
						    	  		</div>
									</div>
					    	  	</div>
					    	</div>
					    <?php ++$i ?>
					    <?php endwhile ?>
					<?php endif ?>

				</div>
			</div>
		</div>

	</div>

</section>

<script>

	$( document ).ready(function() {
	    // console.log( "tabs slider ready!" );
	   	// $('.tabs-orbit').removeAttr('style').css('height', 'auto');
	   	// $(window).trigger('resize');
	   	// $('.tabs-orbit').css('width')

	   	$('.tabs-title, .accordion-title').on('click', function() {
	   	  console.log('Those tabs sure did change!');
			setTimeout(function(){
				//  $('#tabs-orbit').trigger('resize');
				$('.slider-2x2').resize();
			}, 50);

		});
		   
	});

</script>
