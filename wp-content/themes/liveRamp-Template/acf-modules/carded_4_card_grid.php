<section class="carded_4_card_grid pad-section">

	<div class="grid-container">

		<div class="grid-x grid-margin-x grid-margin-y title-cell align-center">

			<?php if ((get_sub_field('title')) || (get_sub_field('description'))): ?>
				<div class="cell medium-9 small-12 text-center">
					<?php if (get_sub_field('title')): ?>
					    <h2 class="green"><?php the_sub_field('title') ?></h2>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description'); ?>
					<?php endif ?>
					<div class="no-lineheight pad-ul">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
					</div>
				</div>
			<?php endif ?>

		</div>

		<div class="grid-x grid-margin-x grid-margin-y small-up-1 medium-up-2 mobile-module-slider green-bg-box-before relative align-center" data-equalizer='foo'>
			<?php if (have_rows('cards')): ?>
			    <?php while(have_rows('cards')) : ?>
			    <?php the_row(); ?>
			    	<div class="cell card4 z-5-r">
			    		<div class="grid-x grid-padding-x grid-padding-y box-shadow-over-white b-radius">
			    			<div class="cell large-2 medium-3 small-2 icon-wrap green-bkg text-center">
								<div class="small-separator">	</div>
			    				<img src="<?php the_sub_field('icon') ?>" alt="" class="icon" >
			    			</div>
			    			<div class="cell large-10 medium-9 small-10 content" data-equalizer-watch='foo'>
			    				<div class="text">
			    					<h3 class='title'><?php the_sub_field('title') ?></h3>
			    					<?php the_sub_field('content') ?>
			    				</div>



								<?php if ( get_sub_field('cta') ) : ?>
				    				<div class="cta">
				    					<?php

				    						$url = get_sub_field('cta')['url'];
				    						$title = get_sub_field('cta')['title'];
				    						$target = get_sub_field('cta')['target'];

				    					 ?>
				    					 <a href="<?php echo $url ?>" class="button outline" target="<?php echo $target ?>"><?php echo $title ?></a>
				    				</div>
								<?php endif; ?>
			    			</div>
			    		</div>
			    	</div>
			    <?php endwhile ?>
			<?php endif ?>
		</div>

	</div>

</section>
