<section class="resources_hero medium-blue-bkg relative">
	<div class="bg-art">
		<div class="wave-oncol">

		</div>
	</div>
	<div class="grid-container z-5-r">
		<div class="grid-x">
			<div class="cell">
			 	<ul class="slider-1card-auto hide">
					<?php

					$posts = get_field('hero');

					$num_posts =  count($posts);

					if( $posts ): ?>
					    
					    <?php $i = 1;  ?>
					    
					    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					        
					        <?php setup_postdata($post); ?>
					        
					        <?php

					        	$terms = get_the_terms( get_the_ID(), 'resources_categories' );
					        	$terms2 = get_the_terms( get_the_ID(), 'resources_topics' );

					        	$active = (($i == 1 ) ? $active = 'is-active' : '');
								if ($terms) :
									foreach ($terms as $term) {
										$icon =  get_field('icon', $term);
										$name =  $term->name;
										if ($icon) :
										$icon_data = file_get_contents($icon);
										endif;
										$slug = $term->slug;
									}
								endif;

								if ($terms2) :
									foreach ($terms2 as $term2) {
										// $icon =  get_field('icon', $term);
										$name2 =  $term2->name;
									}
								endif;

					        ?>
					        
					        <li class="slide-container b-radius white-bkg no-overflow">
								<div class="hero-slide grid-x " >
									<div class="cell medium-7 image click-card" data-url="<?php the_field('marketo'); ?>" data-blank="true" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>)">

										<?php if ($name == 'Video'): ?>
											<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/play-arrow.svg" alt="play icon">
										<?php endif ?>

									</div>
									<div class="cell medium-5 content white-bkg">
										<div class="term flex-m margin-bottom-1">
										<div class="icon orange-icon"><?php echo $icon_data; ?></div>
										<div class="term-name"><?php echo $name ?></div>

										</div>

										<h3>
											<a href="<?php the_field('marketo'); ?>" class="medium-blue" target="_blank">
												<?php the_title(); ?>
											</a>
										</h3>
										<?php if (get_the_content()): ?>
											<?php the_content(); ?>
										<?php endif ?>
										<div class="meta z-r-5">
											<?php
												$i = 1;
												if ($terms2) {
													foreach( $terms2 as $term ){
														if ($i < $term_count) {
															$spacer = ',&nbsp;';
														}
														else {
															$spacer = '';
														}

														?>
															<span class="meta-term core-orange" data-term-id='<?php echo $term->slug . $spacer; ?>'>
																<?php echo  $term->name . $spacer; ?>
															</span>

															<?php

														++$i;
													}
												}
											?>
										</div>
									</div>

								</div>
					        </li>
					        <?php ++$i ?>
					    <?php endforeach; ?>

					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
		    	</ul>
			</div>
		</div>
	</div>
</section>


<script>
	// On swipe event
	$('.slider-1card-auto').on('init', function(event, slick, direction){
	  // console.log('slider ready');
	  $(this).removeClass('hide')
	  // left
	});
</script>