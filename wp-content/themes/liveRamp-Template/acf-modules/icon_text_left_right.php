<!-- new092920 -->
<section class="icon_text_left_right pad-section">
	
	<div class="grid-container">
		
        <?php include ('modules-parts/card-intro.php') ?>

        <?php if (have_rows('cards')): ?>
            <?php while(have_rows('cards')) : the_row(); ?>
				<div class="grid-x icon_text_row<?php echo (get_sub_field('icon_position')=='Left') ? ' even':' odd'; ?>">
					
					<div class="cell image-container">
						<img src="<?php the_sub_field('icon') ?>" class="lsh-features_image">
					</div>
					
					<div class="cell text-container">
						
						<div class="title green">
							<h3><?php the_sub_field('title') ?></h3>
						</div>
						
						<div class="txt-with-divider">
							<div class="txt-with-divider--item divider--orange green-lines"></div>
						</div>
						
						<div class="text">
							<p><?php the_sub_field('text') ?></p>
						</div>
						
					</div>
				</div>
            <?php endwhile ?>
        <?php endif ?>
	
	</div>

</section>	