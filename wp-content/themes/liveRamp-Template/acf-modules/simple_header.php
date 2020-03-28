<section class="simple_header pad-section">

	<div class="grid-container">

		<div class="grid-x grid-margin-x grid-margin-y title-cell align-center">

			<div class="cell small-9 text-center">
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

		</div>
   </div>
</section>
