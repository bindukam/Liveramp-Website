<!-- new092920 -->

<section class="offer_strip_updated medium-blue-bkg relative round overlay-me entrance-anim <?php the_sub_field('width_toggle') ?> wave-graphic <?php if (get_sub_field('overlay')): echo 'overlay-me'; endif; ?>">

	<div class="grid-container z-5-r">
		<div class="grid-x align-middle align-right pad-1">
			<div class="cell large-6 medium-12 text">
				<h2 class="yellow">
					<?php the_sub_field('title') ?>
				</h2>
				<div class="white">
					<?php the_sub_field('description') ?>
				</div>
			</div>
			<div class="cell large-4 medium-12 text-center">
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
