<?php

	// find out how many quotes there are
	$slides = get_sub_field('slides');
	if (have_rows('slides')) {
		$num_of_slides = count($slides);
		// echo $num_of_quotes;
	}

	if (have_rows('slides')): ?>
	<?php while(have_rows('slides')) : ?>
	<?php the_row(); 
	if (get_sub_field('image')) {
		$wimage = 'withimage';
	}
	endwhile;
	endif;
 ?>
<?php if ($num_of_slides == 1): ?>
<section class="hero_simple_text green-bkg <?php echo $wimage; ?>">
	<div class="grid-container z-5-r">
		<div class="grid-x align-middle content">

			<?php if (have_rows('slides')): ?>
			    <?php while(have_rows('slides')) : ?>
			    <?php the_row(); ?>
			    	<div class="cell medium-7 white">
				    	<?php if (get_sub_field('pre_header')): ?>
				    		<p class="flexo-bold"><?php the_sub_field('pre_header') ?></p>
				    	<?php endif ?>
				    	<h1><?php the_sub_field("title") ?></h1>
				    	<?php the_sub_field('description') ?>
			    	</div>
			    	<div class="cell medium-5 image">
			    		<?php echo wp_get_attachment_image( get_sub_field('image'), 'large', '',array( "class" => "hero-image" ) ); ?>
			    	</div>

			    <?php endwhile ?>
			<?php endif ?>
			
		</div>
	</div>
</section>
<?php endif ?>

<?php if ($num_of_slides > 1): ?>
	<!-- <div class="orbit" > -->
	  <!-- <div class="orbit-wrapper"> -->
		 <section class="hero_simple_text green-bkg">
		 	 <div class="grid-container">
			 	<div class="grid-x align-middle align-center full-module-slider" data-equalizer="herosimple">

			 				<?php if (have_rows('slides')): ?>
			 				    <?php while(have_rows('slides')) : ?>
			 				    <?php the_row(); ?>
			 				    <div class="cell" data-equalizer-watch="herosimple">
			 				    	<div class="grid-x">
			 				    		<div class="cell white content medium-7">
			 				    			<?php if (get_sub_field('pre_header')): ?>
			 				    				<p  class="flexo-medium"><?php the_sub_field('pre_header') ?></p>
			 				    			<?php endif ?>
			 				    			<?php if (!get_sub_field('pre_header')): ?>
			 				    				<p>&nbsp;</p>
			 				    			<?php endif ?>
			 				    			<h1><?php the_sub_field("title") ?></h1>
			 				    			<?php the_sub_field('description') ?>
			 				    		</div>
			 				    		<div class="cell medium-5">
			 				    			<?php echo wp_get_attachment_image( get_sub_field('image'), '', '',array( "class" => "hero-image" ) ); ?>
			 				    		</div>
			 				    	</div>
			 				    </div>
			 				    <?php endwhile ?>
			 				<?php endif ?>

			 	</div>
			 </div>
		</section>
<?php endif ?>
