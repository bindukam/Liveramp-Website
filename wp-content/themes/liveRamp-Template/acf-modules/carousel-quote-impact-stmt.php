<section class="carousel-quote-impact-stmt pad-section relative">
	<div class="grid-container carousel">
		<div class="bg-art">
			<!-- <img id="quote-bg" src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/quote-bg.svg" alt="" preserveAspectRatio="none"> -->
			<svg xmlns="http://www.w3.org/2000/svg" id="quote-bg" viewBox="0 0 1248.95 456.28" class="style-svg replaced-svg svg-replaced-9" preserveAspectRatio="none"><defs><style>.cls-1{fill:#f7ec13;isolation:isolate;}</style></defs><title>quote-bg</title><path id="c1" class="cls-1" d="M640,701.69c247.36,0,469.9,15,624.48,38.95V284.36C1109.9,308.29,887.36,323.31,640,323.31s-469.9-15-624.48-38.95V740.64C170.1,716.7,392.64,701.69,640,701.69" transform="translate(-15.52 -284.36)"></path></svg>
		</div>

	    <ul class="full-module-slider"  data-equalizer="caros">

	      <?php if (have_rows('slides')): ?>
	      	<?php $i = 0 ?>
	      	    <?php while(have_rows('slides')) : ?>
	      	    <?php the_row(); ?>
	      	    <?php ($i == 0 ? $active = 'is-active' : $active = '') ?>
	      	    <?php (get_sub_field('display_quote_mark')) ? $noQuote = '' : $noQuote = 'no-quote' ?>

	      	    	<li class="<?php echo $active ?> a-slide"  data-equalizer-watch="caros">

	      	    	  <div class="slide grid-x grid-margin-x align-middle align-center" style="width:100%">

	      	    	  	<?php if (get_sub_field('image')): ?>
	      	    	  		<div class="cell medium-6 circle-wrapper">
	      	    	  			<div class="circle">
	      	    	  				<?php echo wp_get_attachment_image( get_sub_field('image'), 'full', '',array( "class" => "circle-image" ) ); ?>
	      	    	  			</div>
	      	    	  			<?php echo wp_get_attachment_image( get_sub_field('accent_image'), 'full', '',array( "class" => "accent-image" ) ); ?>
	      	    	  		</div>
	      	    	  	<?php endif ?>

	      	    	  	<?php (get_sub_field('image')) ? $size = 'medium-6' : $size = 'medium-10' ?>
	      	    	  	<div class="cell <?php echo $size; if (!get_sub_field('image')):  echo ' margin-top-2'; endif;?>">
	      	    	  		<div class="quote <?php echo $noQuote; ?>">
	      	    	  			<?php the_sub_field('quote') ?>
	      	    	  		</div>
	      	    	  		<div class="author green">
	      	    	  			<?php the_sub_field('author') ?>
	      	    	  		</div>
	      	    	  	</div>
	      	    	  </div>
	      	    	</li>

	      	    	<?php ++$i; ?>
	      	    <?php endwhile ?>
	      	<?php endif ?>

	    </ul>


	</div>
</section>
