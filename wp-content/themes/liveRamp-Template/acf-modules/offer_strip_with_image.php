<?php
	$theme_uri = get_template_directory_uri();
	$theme_images = $theme_uri.'/dist/assets/images';
	$theme_svg = $theme_images.'/svg';
	$style = "background-image:url('".$theme_svg."/wavelines-ctastrip-green.svg')";


 ?>

<section class="offer_strip_with_image green-bkg relative <?php the_sub_field('width_toggle') ?> wave-graphic <?php if (get_sub_field('overlay')): echo 'overlay-me'; endif; ?>">

	<div class="grid-container z-5-r">
		<div class="grid-x align-middle align-right pad-1">
			
			<div class="cell medium-6 text-area" style="padding-right:40px">
				<h3 class="yellow">
					<?php the_sub_field('title') ?><span class="white"><?php the_sub_field('description') ?></span>
				</h3>
			</div>
			
			<div class="cell medium-4 icon-area">
				<img src="<?php the_sub_field('image') ?>">

				<?php
					$url = get_sub_field('cta')['url'];
					$title = get_sub_field('cta')['title'];
					$target = get_sub_field('cta')['target'];
				 ?>
				 <a href="<?php echo $url ?>" target="<?php echo $target ?>" class="button"><?php echo $title ?></a>
			</div>
		</div>
	</div>

</section>

<?php if (get_sub_field('overlay')): ?>
	<div class="footer-overlay">

	</div>
<?php endif ?>
