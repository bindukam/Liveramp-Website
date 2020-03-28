<?php

$post_object = get_sub_field('featured_post');

// override $post
$post = $post_object;
setup_postdata( $post ); 

$terms = get_the_terms( get_the_ID(), 'blog_categories' );
// var_dump($terms);
$term_count =  count($terms);


// var_dump($post);

$meta = get_post_meta(get_the_ID());

$feature_id = get_the_ID();

// var_dump($meta);

    
?>
<section class="blog_hero medium-blue-bkg">
	<div class="grid-container">
		<div class="grid-x  grid-margin-x align-middle">
			<div class="cell large-8 medium-7 feature">
				
					
					<div class="author date white">
						<?php the_author() ?> &nbsp;|&nbsp; <?php the_date(); ?>
					</div>
					<div class="title">
						<a href="<?php the_permalink() ?>">
							<?php the_title( '<h1 class="white">', '</h1>', true ); ?>	
						</a>
					</div>
					<div class="feature-image b-radius hard-shadow click-card" data-url="<?php the_permalink() ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>)">

					</div>
					<div class="meta">
						<?php 
							$i = 1;
							foreach( $terms as $term ){
								if ($i < $term_count) {
									$spacer = ',&nbsp;';
								}
								else {
									$spacer = '';
								}
								
								echo '<a href="'. get_term_link( $term->term_id, $term->taxonomy ) .'">'. $term->name .'</a>'. $spacer;
								++$i;
							}
						 ?>
					</div>

				
			</div>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<div class="cell large-4 medium-5 dark-blue-bkg popular">
				
					<h4 class="core-blue">Populars</h4>
					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/small-blue-line.svg" alt="small blue line" class="divider">
					<?php 
						$popularpost = new WP_Query( 
								array(  'post_type'              =>  'blog' ,
										'post__not_in' => array($feature_id),
										'posts_per_page' => 2, 
										'meta_key' => 'post_views_count', 
										'orderby' => 'meta_value_num', 
										'order' => 'DESC'  ) );

						while ( $popularpost->have_posts() ) : $popularpost->the_post(); 

						$terms = get_the_terms( get_the_ID(), 'blog_categories' );
						$term_count =  count($terms);
						// var_dump($terms);	



					?>
					  
					<div class="popular-post">
						<div class="author date">
							<?php the_author() ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php the_date(); ?>	
						</div>
						<div class="feature-image click-card b-radius hard-shadow" data-url="<?php echo the_permalink() ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>)"> 
						</div>
						<div class="meta">
							<?php 
								$i = 1;
								foreach( $terms as $term ){
									if ($i < $term_count) {
										$spacer = ',&nbsp;';
									}
									else {
										$spacer = '';
									}
									
									echo '<a href="'. get_term_link( $term->term_id, $term->taxonomy ) .'">'. $term->name .'</a>'. $spacer;
									++$i;
								}
							 ?>
						</div>
						<div class="title">
							<a href="<?php echo the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</div>
						
					</div>
					
					 
					<?php endwhile;
					wp_reset_postdata();
					?>
				</div>
			
		</div>
	</div>
</section>




