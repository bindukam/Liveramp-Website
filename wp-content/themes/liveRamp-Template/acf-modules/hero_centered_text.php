
<section class="hero_centered_text green-bkg <?php echo $wimage; ?>">
	<div class="grid-container z-5-r">
		<div class="grid-x align-middle content" style="display: block; text-align: center">

			<?php if (have_rows('slides')): ?>
			    <?php while(have_rows('slides')) : ?>
			    <?php the_row(); ?>
			    	<div class="cell medium-12 white">
				    	<?php if (get_sub_field('pre_header')): ?>
				    		<p class="flexo-bold"><?php the_sub_field('pre_header') ?></p>
				    	<?php endif ?>
				    	<h1><?php the_sub_field("title") ?></h1>
				    	<p><?php the_sub_field('description') ?></p>
			    	</div>
			    <?php endwhile ?>
			<?php endif ?>
			
		</div>
	</div>
</section>
