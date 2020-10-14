<!-- new092920 -->
<?php
	$theme_uri = get_template_directory_uri();
	$theme_images = $theme_uri.'/dist/assets/images';
	$theme_svg = $theme_images.'/svg';
	$style = "background-image:url('".$theme_svg."/wavelines-ctastrip-green.svg')";


 ?>

<section class="offer_strip_updated medium-blue-bkg relative round overlay-me entrance-anim <?php the_sub_field('width_toggle') ?> wave-graphic <?php if (get_sub_field('overlay')): echo 'overlay-me'; endif; ?>">

	<div class="grid-container z-5-r">
		<div class="grid-x align-middle align-right pad-1">
			<div class="cell medium-6 text">
				<h2 class="yellow">
					<?php the_sub_field('title') ?>Hello Stranger
				</h2>
				<div class="white">
					<?php the_sub_field('description') ?>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</div>
			</div>
			<div class="cell medium-4 text-center">
				<?php

					$url = get_sub_field('cta')['url'];
					$title = get_sub_field('cta')['title'];
					$target = get_sub_field('cta')['target'];

				 ?>
				 <a href="<?php echo $url ?>" target="<?php echo $target ?>" class="button"><?php echo $title ?>Hello again stranger</a>
			</div>
		</div>
	</div>

</section>

<?php if (get_sub_field('overlay')): ?>
	<div class="footer-overlay">

	</div>
<?php endif ?>
