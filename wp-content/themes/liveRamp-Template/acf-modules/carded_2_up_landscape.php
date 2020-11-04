<!-- new092920 -->
<section class="carded_2_up_landscape pale-blue-bkg">

	<div class="grid-container">

		<?php include ('modules-parts/card-intro.php') ?>

		<div class="grid-x cards">
			<?php if (have_rows('cards')): ?>
			    <?php while(have_rows('cards')) : the_row(); ?>
			    		<div class="carded_2_up_card green-bkg">
		    				
		    				<div class="title white">
		    					<h3><?php the_sub_field('title') ?></h3>
		    				</div>

	    					<div class="card_title-divider divider--orange"></div>

		    				<div class="text white">
		    					<?php the_sub_field('text') ?>
		    				</div>

	    					<?php
	    						$url = get_sub_field('cta')['url'];
	    						$title = get_sub_field('cta')['title'];
	    						$target = get_sub_field('cta')['target'];
	    					 ?>
		    				<div class="cta">
		    					 <a href="<?php echo $url ?>" class="button button-white" target="<?php echo $target ?>"><?php echo $title ?></a>
		    				</div>
		    			</div>
			    <?php endwhile ?>
			<?php endif ?>
		</div>

	</div>

</section>
