<?php
	$theme_uri = get_template_directory_uri();
	$theme_images = $theme_uri.'/dist/assets/images';
	$theme_svg = $theme_images.'/svg';
	$style = "background-image:url('".$theme_svg."/wave-green.svg')";
 ?>

<section class="carded_square_6-card_content pad-section <?php echo get_sub_field('bg_art') ?>">
	<div class="grid-container z-5-r">
		<?php if ((get_sub_field('title')) || (get_sub_field('description'))): ?>
			<div class="cell small-12 text-center">
				<?php if (get_sub_field('title')): ?>
				    <h2 class="green"><?php the_sub_field('title') ?></h2>
				    <div class="no-lineheight pad-ul">
				    	<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
					</div>

				<?php endif ?>
				<?php if (get_sub_field('description')): ?>
					<?php the_sub_field('description'); ?>
				<?php endif ?>

			</div>
		<?php endif ?>
		<div class="cell">
			<div class="grid-x grid-margin-x  grid-padding-x grid-padding-y align-center mobile-module-slider" data-equalizer="card6">
				<?php if (have_rows('cards')): ?>
				    <?php while(have_rows('cards')) : ?>
				    <?php the_row(); ?>
				    	<div class="cell large-4 medium-6">
				    		<div class="b-radius green-bkg box-shadow-over-white card" data-equalizer-watch="card6">
				    			<div class="card-title">
									<div>
										<img src="<?php the_sub_field('icon') ?>" alt="icon" class="icon">
									</div>
				    				<h4 class="white"><?php the_sub_field('title') ?></h4>
				    			</div>
				    			<div class="white">
				    				<?php the_sub_field('content') ?>
				    			</div>
				    		</div>
				    	</div>
				    <?php endwhile ?>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>
