<section class="featured_blog relative">
	<div class="bg-art">
		<div class="waves">

		</div>
	</div>
	<div class="grid-container z-5-r">
		<div class="grid-x top-two grid-margin-x grid-padding-x align-center">

				<div class="cell text-center header">
					<h2><?php _translate('featured_blog_posts')  ?></h2>

						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="divider line" class="divider">

				</div>
				<?php $posts = get_field('featured_blog'); ?>
				<? if( $posts ): ?>

				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>

				        <?php

				        	if (!get_the_post_thumbnail_url()) {
				        		$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
				        	}
				        	else{
				        		$background_url = get_the_post_thumbnail_url();
				        	}

				         ?>


				        	<div class="cell click-card medium-auto blog-card hover-bump" data-url="<?php echo the_permalink(); ?>">
				        		<div class="author date">
				        			<?php the_author(); ?> | <?php the_date('M d, Y'); ?>
				        		</div>
				        		<div class="image-wrapper">
				        			<div class="feature-image" style="background-image:url(<?php echo $background_url ?>)">
				        			</div>
				        			
				        				<?php echo file_get_contents(get_template_directory_uri().'/dist/assets/images/svg/rectangle-border-blog.svg'); ?>	
				        			
				        			
				        		</div>
				        		
				        		<div class="meta">
				        			<?php

				        				$terms = get_the_terms( get_the_ID(), 'blog_categories' );
				        				$term_count =  count($terms);
				        				$ti = 1;
				        				if ($terms) {
				        					foreach( $terms as $term ){
				        						if ($ti < $term_count) {
				        							$spacer = ',&nbsp;';
				        						}
				        						else {
				        							$spacer = '';
				        						}

				        						echo $term->name . $spacer;
				        						++$ti;
				        					}
				        				}
				        				else {
				        					echo '&nbsp';
				        				}
				        			 ?>
				        		</div>
				        		<div class="title">
				        			<h3><?php the_title(); ?></h3>
				        		</div>
				        		<div class="excerpt">
				        			<?php echo wp_trim_words( get_the_content(), 15 ); ?>
				        		</div>
				        	</div>

				    <?php endforeach; ?>

				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

		</div>

		<div class="grid-x bottom-4 grid-margin-x grid-padding-x align-center">
			<?php $posts = get_field('featured_blog_2nd_row'); ?>

				<? if( $posts ): ?>

				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>

				        <?php

				        	if (!get_the_post_thumbnail_url()) {
				        		$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
				        	}
				        	else{
				        		$background_url = get_the_post_thumbnail_url();
				        	}

				         ?>
				        	<div class="cell click-card medium-auto blog-card hover-bump" data-url="<?php echo the_permalink(); ?>">
				        		<div class="author date">
				        			<?php the_author(); ?> | <?php the_date('M d, Y'); ?>
				        		</div>
				        		<div class="image-wrapper">
									<div class="feature-image b-radius relative" style="background-image:url(<?php echo $background_url ?>)">
										<?php echo file_get_contents(get_template_directory_uri().'/dist/assets/images/svg/rectangle-border-blog.svg'); ?> 
				        			</div>
				        		</div>
				        		<div class="meta">
				        			<?php

				        				$terms = get_the_terms( get_the_ID(), 'blog_categories' );
				        				$term_count =  count($terms);
				        				$ti = 1;
				        				if ($terms) {
				        					foreach( $terms as $term ){
				        						if ($ti < $term_count) {
				        							$spacer = ',&nbsp;';
				        						}
				        						else {
				        							$spacer = '';
				        						}

				        						echo $term->name . $spacer;
				        						++$ti;
				        					}
				        				}
				        				else {
				        					echo '&nbsp';
				        				}
				        			 ?>
				        		</div>
				        		<div class="title">
				        			<h3><?php the_title(); ?></h3>
				        		</div>
				        	</div>

				    <?php endforeach; ?>

				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

		</div>
	</div>
</section>
