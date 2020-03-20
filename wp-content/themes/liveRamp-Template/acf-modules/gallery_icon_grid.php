<section class="gallery_icon_grid pad-section">
	<div class="grid-container">

		<?php if ((get_sub_field('title')) || get_sub_field('description')): ?>
			<div class="grid-x title margin-bottom-2">
				<div class="cell text-center">
					<?php if (get_sub_field('title')): ?>
						<h2><?php the_sub_field('title') ?></h2>
						<div class="pad-ul no-lineheight margin-bottom-1">
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
						</div>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description') ?>
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>
		<div class="grid-x icon-wrapper grid-margin-x grid-margin-y box-shadow-over-white align-center align-middle">
			<?php if (have_rows('icons')): ?>
			    <?php while(have_rows('icons')) : ?>
			    <?php the_row(); ?>
			    	<div class="cell large-2 medium-3 small-6 text-center">
			    		<img src="<?php the_sub_field('icon') ?>" alt="" class="icon">
			    	</div>
			    <?php endwhile ?>
			<?php endif ?>
		</div>
	</div>
</section>
