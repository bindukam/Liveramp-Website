<!-- new092920 -->
<section class="carded_2_up_landscape pale-blue-bkg pad-section">

	<div class="grid-container">
		
		<?php include ('modules-parts/card-intro.php') ?>

		<div class="grid-x cards">
			<?php if (have_rows('cards')): ?>
			    <?php while(have_rows('cards')) : the_row(); ?>
			    		<div class="carded_2_up_card green-bkg">
		    				
		    				<div class="upper-content">
			    				<div class="title white">
			    					<h3><?php the_sub_field('title') ?></h3>
			    				</div>

		    					<div class="card_title-divider divider--orange green-lines"></div>

			    				<div class="text white">
			    					<?php the_sub_field('text') ?>
			    				</div>
		    				</div>
		    				
		    				<?php if (get_sub_field('cta')['url']) { ?>
			    				<div class="lower-content">
			    					<?php
			    						$url = get_sub_field('cta')['url'];
			    						$title = get_sub_field('cta')['title'];
			    						$target = get_sub_field('cta')['target'];
			    					 ?>
				    				<div class="cta">
				    					 <a href="<?php echo $url ?>" class="button outline whiteoutline" target="<?php echo $target ?>"><?php echo $title ?></a>
				    				</div>
			    				</div>
		    				<?php } ?>
		    			
		    			</div>
			    <?php endwhile ?>
			<?php endif ?>
		</div>		
		
		<div class="swirly-thingy">
			<div class="box"><img src="<?php echo get_stylesheet_directory_uri() ?>/dist/assets/images/svg/swirl_kd.svg"></div>
		</div>

	</div>

</section>

