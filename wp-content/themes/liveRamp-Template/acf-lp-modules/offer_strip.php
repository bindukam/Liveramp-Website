<?php
    $theme_uri = get_template_directory_uri();
    $theme_images = $theme_uri.'/dist/assets/images';
    $theme_svg = $theme_images.'/svg';
    $style = "background-image:url('".$theme_svg."/wavelines-ctastrip-green.svg')";
?>

<section class="offer_strip green-bkg relative <?php the_sub_field('width_toggle') ?> wave-graphic <?php if (get_sub_field('overlay')): echo 'overlay-me'; endif; ?>">
	<div class="grid-container z-5-r">
		<div class="grid-x align-middle">
			<div class="cell medium-12 text text-center">
                <?php if (get_sub_field('title')): ?>
				<h2 class="green"><?php the_sub_field('title') ?></h2>
                <?php endif ?>
                <?php if (get_sub_field('description')): ?>
				<h4 class="green"><?php the_sub_field('description') ?></h4>
                <?php endif ?>
				<?php
					$url = get_sub_field('cta')['url'];
					$title = get_sub_field('cta')['title'];
					$target = get_sub_field('cta')['target'];
				?>
                <?php if ($title): ?>
				 <a href="<?php echo $url ?>" target="<?php echo $target ?>" class="button"><?php echo $title ?></a>
                <?php endif ?>
			</div>
		</div>
	</div>
</section>
<?php if (get_sub_field('overlay')): ?>
	<div class="footer-overlay"></div>
<?php endif ?>
