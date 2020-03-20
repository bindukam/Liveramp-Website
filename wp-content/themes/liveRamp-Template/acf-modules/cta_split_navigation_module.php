<section class="cta_split_navigation_module">
	<div class="grid-container">
		<?php if ((get_sub_field('title')) || (get_sub_field('description'))): ?>
			<div class="grid-x">
				<div class="cell text-center">
					<?php if (get_sub_field('title')): ?>
						<h1><?php the_sub_field('title') ?></h1>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description') ?>
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>
		<div class="grid-x grid-margin-x grid-padding-x align-center align-middle green">
			<div class="cell medium-4 cta-wrap cta-1 text-center medium-text-right">
				<h3>
					<?php the_sub_field('cta_title_1') ?>
				</h3>
				<?php

					$url = get_sub_field('cta_1')['url'];
					$title = get_sub_field('cta_1')['title'];
					$target = get_sub_field('cta_1')['target'];

				 ?>
				 <div>
				 	<a href="<?php echo $url ?>" class="button outline" target="<?php echo $target ?>"><?php echo $title ?></a>
				 </div>

			</div>
			<div class="cell medium-1 text-center show-for-medium split-lines">
				<!-- <img src="<?php echo get_template_directory_uri();?>/dist/assets/images/svg/spilt-green.svg" alt="lines" class="split-lines"> -->
			</div>
			<div class="cell medium-4 cta-wrap cta-2 text-center medium-text-left">
				<h3>
					<?php the_sub_field('cta_title_2') ?>
				</h3>
				<?php

					$url = get_sub_field('cta_2')['url'];
					$title = get_sub_field('cta_2')['title'];
					$target = get_sub_field('cta_2')['target'];

				 ?>
				 <div>
				 	<a href="<?php echo $url ?>" class="button outline" target="<?php echo $target ?>"><?php echo $title ?></a>
				 </div>

			</div>
		</div>
	</div>
</section>
