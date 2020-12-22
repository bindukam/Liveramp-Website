<section class="offer_strip green-bkg relative <?php the_sub_field('width_toggle') ?> <?php if (get_sub_field('overlay')): echo 'overlay-me'; endif; ?>">
	
	<div class="grid-container z-5-r">
		<div class="grid-x align-middle align-right pad-1">
			<div class="cell medium-6 text">
				<h2>
					<?php the_sub_field('title') ?>
				</h2>
				<div class="white">
					<?php the_sub_field('description') ?>
				</div>

			</div>
			<div class="cell medium-4 text-center">
				<?php

					$url = get_sub_field('cta')['url'];
					$title = get_sub_field('cta')['title'];
					$target = get_sub_field('cta')['target'];

				 ?>
				 <a href="<?php echo $url ?>" target="<?php echo $target ?>" class="button"><?php echo $title ?></a>
			</div>
		</div>
	</div>
	<div class="bg-art align-middle">
		<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/wavelines-ctastrip-all-colors.svg" alt="" >
	</div>

</section>

<?php if (get_sub_field('overlay')): ?>
	<div class="footer-overlay">

	</div>
<?php endif ?>
