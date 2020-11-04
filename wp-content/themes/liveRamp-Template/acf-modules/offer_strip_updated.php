<!-- new092920 -->

<section class="offer_strip_updated green-bkg relative round overlay-me entrance-anim <?php the_sub_field('width_toggle') ?> wave-graphic <?php if (get_sub_field('overlay')): echo 'overlay-me'; endif; ?>">

	<div class="grid-container z-5-r">
		<div class="grid-x align-middle align-right content-area">
			<div class="cell large-6 medium-12 text">
				<h2 class="green">
					<?php the_sub_field('title') ?>
				</h2>
				<p class="green">
					<?php the_sub_field('description') ?>
				</p>
			</div>
			<div class="cell large-4 medium-12 button-area">
				<?php

					$url = get_sub_field('cta')['url'];
					$title = get_sub_field('cta')['title'];
					$target = get_sub_field('cta')['target'];
				 ?>
				 <a href="<?php echo $url ?>" target="<?php echo $target ?>" class="button button-white"><?php echo $title ?>Hello again stranger</a>
			</div>
		</div>
	</div>

</section>
