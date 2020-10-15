<!-- CARDS go here -->
<section class="resource_3_card_image_and_text pad-section">
	<!-- check and show if title or description are present  -->
	<?php if ((get_sub_field('title')) || get_sub_field('description')): ?>
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell text-center title-cell">
					<?php if (get_sub_field('title')): ?>
						<h2 class="margin-bottom-2"><?php the_sub_field('title') ?></h2>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description') ?>
					<?php endif ?>
					<div class="pad-ul no-lineheight">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>
	<!--  END -->
	<div class="grid-container <?php if (get_sub_field('include_background')) { echo 'green-bg-box-before'; } ?> relative margin-top-2">
		<!-- Check for layout type -->
		<?php

			if (get_sub_field('layout') == 'row') {
					$layout = 'large-up-3';
					$weighted = '';
				}
			else {
				$layout = 'align-center weighted-module';
				$weighted = 'weighted';
				$data_equalizer = 'data-equalizer="foo"';
			}

		 ?>
		<div class="grid-x grid-margin-x grid-margin-y z-5-r <?php echo $layout; ?>" <?php echo $data_equalizer; ?> data-equalizer="content">
			<?php if (have_rows('cards')): ?>
				<?php $i = 1; ?>
			    <?php while(have_rows('cards')) : ?>
			    <?php the_row(); ?>
				<?php
					 // assign $card to card object
					$card = get_sub_field('card');
					 // $ID is the post ID
					$ID = $card->ID;
					// get the feature image, title, and category term for the post
					$image = get_the_post_thumbnail_url($ID,'full');
					// if there is no image then use the default
					if (!$image) {
						$image = '/wp-content/uploads/2017/07/Whitepaper.png';
					}
					$title = $card->post_title;
					

					if ($card->post_type == 'resources') {
						$term = get_the_terms($ID, 'resources_categories');
						$term_id_icon =  $term[0]->term_id;;
						$term_name = $term[0]->name;
						$data_blank = 'data-blank="true"';
						$news_bkg = '';
						$url = get_field('marketo', $ID);

						// get resource type
						$types = get_terms( array(
						    'taxonomy' => 'resources_categories',
						    'hide_empty' => true,
						) );

						foreach($types as $type) {
						    if ($term_id_icon == $type->term_id) {
						    	$icon_url = get_field('icon', 'category_' . $type->term_id . '' );
						    	$icon = '<img src="'.$icon_url.'" class="icon">';
						    }
						}

						// get resource topic 
						$topics = get_the_terms( $ID, 'resources_topics' );
						// var_dump($topics);


					}
					elseif ($card->post_type == 'blog-post') {
						$icon = '<img src="/wp-content/uploads/2019/05/Document-1.svg" alt="">';
						$term_name = 'Blog';
						$data_blank = 'data-blank="false"';
						$news_bkg = '';
						$url = get_permalink($ID);
						$data_blank = 'data-blank="false"';
						$topics = get_the_terms( $ID, 'blog_categories' );

					}
					elseif ($card->post_type == 'lp') {
						$icon = '<img src="/wp-content/uploads/2019/05/Document-1.svg" alt="">';
						$term_name = 'Landing Pages';
						$data_blank = 'data-blank="false"';
						$news_bkg = '';
						$url = get_permalink($ID);
						$data_blank = 'data-blank="false"';
						$topics = 0;
						$excerpt = get_the_excerpt($ID);

					}
					else {
						$icon = '<img src="/wp-content/uploads/2019/05/eBook-1.svg" alt="">';
						$term_name = 'News';
						$data_blank = 'data-blank="true"';
						$news_bkg = 'news-bkg';
						$url = get_field('external_link', $ID);
						$data_blank = 'data-blank="true"';
						$topics = 0;
					}

					$style = "background-image:url('".$image."')";

					if ($weighted) {
						if ($i == 1) {
								$cell = 'medium-10';
							}
						else {
							$cell = 'medium-5 short';
						}				# code...
					} else {
						$cell = 'medium-4 short';

					}


				?>

					<!-- three row  -->
					<div class="cell resource-card click-card b-radius box-shadow-over-white white-bkg hover <?php echo $cell ?> <?php echo $weighted; ?>" data-url='<?php echo $url ?>' <?php echo $data_blank; ?>>
						<?php if ($weighted): ?>	
							<div class="grid-x">
							<?php

								if ($i == 1) {
									$cell_1 = 'cell medium-7 top';
									$cell_2 = 'cell medium-5 top flex-m';
									$data_watch = '';
								}
								else {
									$cell_1 = 'cell small-5';
									$cell_2 = 'cell small-7';
									$data_watch = 'data-equalizer-watch="foo"';
								}


							 ?>
						<?php endif ?>
						<?php if ($weighted): ?>
							<div class="<?php echo $cell_1 ?>">
						<?php endif ?>
						<div class="image <?php echo $news_bkg; ?>" style="<?php echo $style ?>" <?php echo $data_watch ?>>

						</div>
						<?php if ($weighted): ?>
							</div>
							<div class="<?php echo $cell_2 ?>">
						<?php endif ?>
						<div class="content" <?php echo $data_watch; ?> data-equalizer-watch="foo">

							<div class="term">
								<div class="grid-x" >
									<div class="cell shrink icon orange">
										<?php echo $icon ?>
									</div>
									<div class="cell auto orange">
										<?php echo $term_name; ?>
									</div>
								</div>

							</div>


							<div>
								<h4 class='title primary'><?php echo $title; ?></h4>
							</div>
							<?php if ($topics): ?>
								<div class="dark-slate flexo-bold topic">
									<?php $i = 1;  ?>
									<?php foreach ($topics as $key => $value): ?>
										<?php 
											$ret = ($i == 1 ? $value->name : '');
											echo $ret;
										 ?>
										<?php ++$i ?>
									<?php endforeach ?>
								</div>
							<?php endif ?>
							<?php if ($excerpt): ?>
								<div class="dark-slate excerpt">
                                    <?php 
                                        echo $excerpt;
                                    ?>
								</div>
							<?php endif ?>

						</div>
						<?php if ($weighted): ?>
								</div>
							</div>
						<?php endif ?>

					</div>
					<?php ++$i; ?>
			    <?php endwhile ?>
			<?php endif ?>

		</div>
	</div>
</section>
