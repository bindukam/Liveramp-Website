<?php 
	if (!$counter){
		$counter = 0;
	}
	$counter += 1;
?>

<?php if (get_sub_field('background_image')) { ?>
<style>
	#teal-theme .green-bg-box-before::before {
	    background-image: url(<?php echo get_sub_field('background_image') ?>);
	    background-repeat: no-repeat;
	    background-position: center center;
	    background-size: 600px;
	    left: 0;
	    width: 100%;
	    background-color: transparent;
	}	
</style>
	
<?php  } ?>
<section class="multi_colored_content_cards pad-section <?php echo 'id-' . $counter;?>">

	<div class="grid-container content">
		<div class="grid-x grid-margin-x grid-margin-y margin-bottom-1">

			<?php if ((get_sub_field('title')) || (get_sub_field('description'))): ?>
				
				<div class="cell small-12 text-center title-cell">
					
					<?php if (get_sub_field('title')): ?>
					    <h2 class="green"><?php the_sub_field('title') ?></h2>
						<div class="pad-ul no-lineheight">
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
						</div>
					<?php endif ?>
					
					<div class="big-first-p">
						<?php if (get_sub_field('description')): ?>
							<?php the_sub_field('description'); ?>
						<?php endif ?>
					</div>

				</div>
			
			<?php endif ?>

		</div>

		<div class="grid-x grid-margin-x grid-margin-y small-up-1 medium-up-2 large-up-4 align-center mobile-module-slider relative green-bg-box-before margin-bottom-2" data-equalizer="mc-cards-<?php echo $counter ?>">

			<?php if (have_rows('cards')): ?>
			    <?php while(have_rows('cards')) : ?>
			    <?php
			    		the_row();

			    		if (get_sub_field('solid_color')) {
			    			$solid = 'green-bkg';
			    			$text = 'white';
			    			$button = 'button-white';
			    		}
			    		else {
			    			$solid = '';
			    			$text = '';
			    			$button = '';
			    		}
			    ?>

			    	<div class="cell z-5-r" data-equalizer-watch="mc-cards-<?php echo $counter ?>">
			    		<div class="grid-y grid-padding-x box-shadow-over-white card <?php echo $solid ?>" >

			    			<?php if (!get_sub_field('solid_color')): ?>
								<!--  NON SOLID COLOR CARD -->
		    					<div class="cell auto medium-3 small-4 green-bkg card-title padding-1">

		    							<div class="c1">
	    									<img src="<?php the_sub_field('icon') ?>" alt="" class="icon">
		    							</div>
		    							<div class="c2">
		    								<h4 class="white no-margin-bottom title"><?php the_sub_field('title') ?></h4>
		    							</div>

		    					</div>

			    			<?php endif ?>

			    			<?php if (get_sub_field('solid_color')): ?>
								<!--  SOLID COLOR CARD -->
			    				<div class="cell large-2 medium-3 small-4 green-bkg card-title solid">

	    							<div class="c1">
	    									<img src="<?php the_sub_field('icon') ?>" alt="" class="icon">
	    							</div>

		    					</div>
							<?php endif ?>
							
							<?php 
							if (get_sub_field('cta')) { 
									$pad = ' extra-padding';
							} ?>

			    			<div class="cell large-8  medium-7 small-6 content<?php echo $pad?>">
			    				<?php if (get_sub_field('solid_color')): ?>
			    					<h4 class="white title-solid"><?php the_sub_field('title') ?></h4>
			    				<?php endif ?>
			    				<p class="<?php echo $text ?>">
			    					<?php the_sub_field('content') ?>
			    				</p>
			    			</div>
							<?php if (get_sub_field('cta')): ?>
			    			<div class="cell small-2 cta margin-top-1">
			    				<?php
			    					$url = get_sub_field('cta')['url'];
			    					$title = get_sub_field('cta')['title'];
			    					$target = get_sub_field('cta')['target'];
			    				 ?>
			    				 <a href="<?php echo $url ?>" class="button outline <?php echo $button ?> no-overflow" target="<?php echo $target ?>"><?php echo $title ?></a>
			    			</div>
						<?php endif; ?>
			    		</div>
			    	</div>
			    <?php endwhile ?>
			<?php endif ?>

		</div>




	</div>
</section>
