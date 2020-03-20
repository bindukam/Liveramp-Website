<?php

	$terms = get_the_terms( get_the_ID(), 'blog_categories' );
	// var_dump($terms);
	$term_count =  count($terms);

	if (!get_the_post_thumbnail_url()) {
		$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
	}
	else{
		$background_url = get_the_post_thumbnail_url('', 'large');
	}



 ?>

<div class="post-card">
	<div class="author date">
		<span class="author-name" data-author-id="<?php echo get_the_author_meta('user_nicename') ?>">
			<?php the_author() ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo get_the_date() ?>
	</div>
	<div class="post-image click-card <?php echo $new_card ?>" data-url="<?php the_permalink(); ?>">
		<div class="feature-image b-radius" style="background-image:url(<?php echo $background_url ?>)">
		</div>

			<?php echo file_get_contents(get_template_directory_uri().'/dist/assets/images/svg/rectangle-border-blog.svg'); ?>

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

					<span class="meta-term" data-term-id='<?php echo $term->slug?>'>
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
		<a href="<?php the_permalink(); ?>" class='title-link'><?php the_title(); ?></a>
	</div>
	
</div>