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
                        $card = get_sub_field('card');
                        $ID = $card->ID;
                        $title = $card->post_title;
                        $card_image = get_field('card_image', $ID);
                        $card_eyebrow_text = get_field('card_eyebrow_text', $ID);
                        $card_eyebrow_icon = get_field('card_eyebrow_icon', $ID);
                        $card_description = get_field('card_description', $ID);

                        if (!$card_image) {
                            $card_image = '/wp-content/uploads/2017/07/Whitepaper.png';
                        }
                        if (!$card_eyebrow_icon) {
                            $card_eyebrow_icon = '/wp-content/uploads/2019/05/eBook-1.svg';
                        }

                        $term_name = 'eBook';
                        $data_blank = 'data-blank="false"';
                        $news_bkg = '';
                        $url = get_permalink($ID);
                        $data_blank = 'data-blank="false"';

                        $icon = '<img src="'.$card_eyebrow_icon.'" alt="">';
                        $style = "background-image:url('".$card_image."')";

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
								<h4 class='title'><?php echo $title; ?></h4>
							</div>
							<?php if ($card_description): ?>
								<div class="dark-slate flexo-bold topic">
                                    <?php echo $card_description; ?>
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
