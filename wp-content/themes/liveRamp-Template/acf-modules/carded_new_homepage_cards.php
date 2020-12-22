<section class="carded_new_homepage_cards pad-section entrance-anim">

	<!-- check and show if title or description are present  -->
	<?php if ((get_sub_field('title')) || get_sub_field('description')): ?>
		<div class="grid-container title">
			<div class="grid-x">
				<div class="cell text-center title-cell">
					<?php if (get_sub_field('title')): ?>
						<h2 class="margin-bottom-2"><?php the_sub_field('title') ?></h2>
					<?php endif ?>
					<div class="pad-ul no-lineheight">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
					</div>
					<?php if (get_sub_field('description')): ?>
						<div class="description">
							<?php the_sub_field('description') ?>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	<?php endif ?>
	<!--  END -->

	<div class="grid-container relative margin-top-2">
		
		<div id="new-home-cards" class="grid-x grid-margin-x grid-margin-y">
			
			<?php if (have_rows('mycards')): 
				while(have_rows('mycards')) : the_row(); ?>
					<div class="cell b-radius box-shadow-over-white">
						<div class="icon"><img src="<?php echo get_sub_field ('icon') ?>"></div>
						<div class="text">
							<h3><?php echo get_sub_field ('title') ?></h3>
							<p><?php echo get_sub_field ('text') ?></p>
							<?php $link = get_sub_field ('link') ?>
							<a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="bm-cta"><?php echo $link['title'] ?></a>
						</div>
					</div>
					<?php ++$i; ?>
			    <?php endwhile ?>
			<?php endif ?>

		</div>
	</div>
</section>
