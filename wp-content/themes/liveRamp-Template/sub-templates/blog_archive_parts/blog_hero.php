<?php

$post_object = get_field('featured_post');

// override $post
$post = $post_object;
setup_postdata( $post );

$terms = get_the_terms( get_the_ID(), 'blog_categories' );
// var_dump($terms);
$term_count =  count($terms);


// var_dump($post_object);

$meta = get_post_meta(get_the_ID());

$feature_id = get_the_ID();

// var_dump($meta);

if (!get_the_post_thumbnail_url()) {
	$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
}
else{
	$background_url = get_the_post_thumbnail_url();
}



?>
<section class="blog_hero primary-bkg">
	<div class="grid-container">
		<div class="grid-x  grid-padding-x align-middle">
			<div class="cell large-8 medium-7 feature">


					<div class="author date white">
						<?php the_author() ?> &nbsp;|&nbsp; <?php the_date(); ?>
					</div>
					<div class="title">
						<a href="<?php the_permalink() ?>">
							<?php the_title( '<h1 class="white">', '</h1>', true ); ?>
						</a>
					</div>
					<div class="feature-image b-radius hard-shadow click-card" data-url="<?php the_permalink() ?>" style="background-image:url(<?php echo $background_url ?>)">


					</div>

					<div class="meta">
						<?php
							$i = 1;
							if ($terms) {
								foreach( $terms as $term ){
									if ($i < $term_count) {
										$spacer = ',&nbsp;';
									}
									else {
										$spacer = '';
									} ?>

									<span class="meta-term" data-term-id='<?php echo $term->slug . $spacer; ?>'>
										<?php
										 echo  $term->name . $spacer; ?>
									</span>

									<?php
									++$i;
								}
							}
						 ?>
					</div>


			</div>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<div class="cell large-4 medium-5 dark-blue-bkg popular">

					<h4 class="core-blue">Popular</h4>
					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/small-blue-line.svg" alt="small blue line" class="divider">
					<?php
						$popularpost = new WP_Query(
								array(  'post_type'			=>  'blog-post' ,
										'post__not_in' 		=> array($feature_id),
										'posts_per_page' 	=> 2,
										'meta_key' 			=> 'post_views_count',
										'orderby' 			=> 'meta_value_num',
										'order' 			=> 'DESC',
										'date_query' 		=> array(array(
												'after' => '-300 days',
												'column' => 'post_date',
											),
										)
								)
						);
						//echo '<pre style="background-color:white">'.print_r($popularpost, 1).'</pre>';
						
						while ( $popularpost->have_posts() ) : $popularpost->the_post();

						$terms = get_the_terms( get_the_ID(), 'blog_categories' );
						$term_count =  count($terms);
						// var_dump($terms);
						$thumbnail = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url('', 'large') : get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';


					?>

					<div class="popular-post">
						<div class="author date">
							<?php the_author() ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php the_date(); ?>
						</div>
						<div class="feature-image-wrapper click-card"  data-url="<?php echo the_permalink() ?>">
							<div class="feature-image  b-radius hard-shadow" style="background-image:url(<?php echo $thumbnail; ?>)">
							</div>
							<?php echo file_get_contents(get_template_directory_uri().'/dist/assets/images/svg/rectangle-border-blog.svg'); ?>	

							<div class="meta">
								<?php
									$i = 1;
									if ($terms) {
										foreach( $terms as $term ){
											if ($i < $term_count) {
												$spacer = ',&nbsp;';
											}
											else {
												$spacer = '';
											} ?>

											<span class="meta-term" data-term-id='<?php echo $term->slug . $spacer; ?>'>
												<?php
												 echo  $term->name . $spacer; ?>
											</span>

											<?php
											++$i;
										}
									}

								 ?>
							</div>
							<div class="title">
								<a href="<?php echo the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</div>
	
						</div>
						
						
					</div>


					<?php endwhile;
					wp_reset_postdata();
					?>
				</div>

		</div>
	</div>
</section>

<!-- hero ends here -->
