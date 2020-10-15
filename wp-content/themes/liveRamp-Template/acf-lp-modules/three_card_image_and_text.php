<!-- CARDS go here -->
<section class="resource_3_card_image_and_text pad-section">
	<!-- check and show if title or description are present  -->
	<?php if (get_sub_field('title')): ?>
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell text-center title-cell">
					<?php if (get_sub_field('title')): ?>
						<h2 class="margin-bottom-2"><?php the_sub_field('title') ?></h2>
					<?php endif ?>
					<div class="pad-ul no-lineheight">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>
	<!--  END -->
	<div class="grid-container relative margin-top-2">
		<div class="grid-x grid-margin-x grid-margin-y z-5-r align-center">
			<?php if (have_rows('cards')): ?>
				<?php $i = 1; ?>
			    <?php while(have_rows('cards')) : ?>
                    <?php the_row(); ?>
                    <?php
                        $card_image = get_sub_field('image');
                        $card_headline = get_sub_field('headline');
                        $card_description = get_sub_field('copy');
                    ?>

					<!-- three row  -->
					<div class="card-cell  medium-4 short" data-url='<?php echo $url ?>'>
						<div class="image" style="background-image:url('<?php echo $card_image ?>')">

						</div>
						<div class="content">
							<div>
								<h4 class='title'><?php echo $card_headline; ?></h4>
							</div>
							<?php if ($card_description): ?>
								<div class="dark-slate flexo topic">
                                    <?php echo $card_description; ?>
								</div>
							<?php endif ?>

						</div>
					</div>
					<?php ++$i; ?>
			    <?php endwhile ?>
			<?php endif ?>

		</div>
	</div>
</section>
