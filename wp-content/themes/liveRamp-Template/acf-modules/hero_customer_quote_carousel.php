 <?php
	// find out how many quotes there are

	// get theme url and set up background image to svg
	$hero = (get_sub_field('use_as_hero')) ? 'hero' : '';
	$cell_content = (get_sub_field('use_as_hero')) ? 'medium-6' : 'medium-5';
	$cell_image = (get_sub_field('use_as_hero')) ? 'medium-6' : 'medium-5';


	$quotes = get_sub_field('quotes');
	if (have_rows('quotes')) {
		$num_of_quotes = count($quotes);
		// echo $num_of_quotes;
	}
	

 ?>


<section class="hero_customer_quote_carousel <?php echo $hero ?> green-bkg" data-equalizer="hero-quote">

	<?php if ($num_of_quotes == 1): ?>
		<?php if (have_rows('quotes')): ?>
		    <?php while(have_rows('quotes')) : ?>
		    <?php the_row(); ?>
		    <?php
		    	(get_sub_field('no_quote_mark')) ? $noQuote = 'no-quote' : $noQuote = '' ;
		    	$no_bold = (get_sub_field('quote_title')) ? 'no-bold' : '';
		    ?>
		    <!-- start banner -->
				<?php if ($hero): ?>
					<div class="grid-container">
				<?php endif ?>
		    	<div class="grid-x align-middle align-center">
		    		<div class="cell <?php echo $cell_content ?> content">
		    			<?php if (get_sub_field('quote_title')): ?>
		    				<h1 class="quote-title"><?php the_sub_field('quote_title') ?></h1>
		    			<?php endif ?>
		    			<div class="quote <?php echo $noQuote ?> <?php echo $no_bold; ?>">
		    				<?php the_sub_field('quote') ?>
		    			</div>
		    			<?php if (get_sub_field('title') || get_sub_field('name') || get_sub_field('logo')): ?>
		    				
				    			<div class="grid-x align-middle">
				    				<div class="cell shrink name title">
					    				<?php the_sub_field('name') ?><br>
										<?php the_sub_field('title') ?>
				    				</div>
				    				<?php if (get_sub_field('logo')): ?>
											<div class="cell auto logo-cell">
												<img src="<?php the_sub_field('logo') ?>" alt="logo" class="logo">
											</div>
				    				<?php endif ?>

				    			</div>

		    			<?php endif ?>
		    			<?php if (get_sub_field('cta')): ?>
		    				
		    				<div class="cta">
		    					<?php

		    						$url = get_sub_field('cta')['url'];
		    						$title = get_sub_field('cta')['title'];
		    						$target = get_sub_field('cta')['target'];

		    					 ?>
		    					  <a href="<?php echo $url ?>" class="cta" target="<?php echo $target ?>"><?php echo $title ?></a>
		    				</div>

		    			<?php endif ?>
		    		</div>
		    		<div class="cell <?php echo $cell_image ?> image diagonal-lines show-for-medium">
		    			<?php echo wp_get_attachment_image( get_sub_field('image'), '', '',array( "class" => "hero-image" ) ); ?>
		    		</div>
		    	</div>
		    	<?php if ($hero): ?>
		    		</div>
		    	<?php endif ?>
		    <!-- end banner -->

		    <?php endwhile ?>
		<?php endif ?>
	<?php endif ?>

	<?php if ($num_of_quotes > 1): ?>
		<!-- <div class="orbit" role="region" aria-label="" data-orbit data-auto-play='false' data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;"> -->
		  <!-- <div class="orbit-wrapper"> -->
		    <!-- <div class="orbit-controls">
		      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
		      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
		    </div> -->
		    <ul class="full-module-slider">
		      <?php if (have_rows('quotes')): ?>
		      	<?php $offset = (!$hero) ? 'medium-offset-2' : '' ?>
		      	<?php $i = 0 ?>
		      	    <?php while(have_rows('quotes')) : ?>
		      	    <?php the_row(); ?>
		      	    <?php ($i == 0 ? $active = 'is-active' : $active = '') ?>
		      	    <?php (get_sub_field('no_quote_mark')) ? $noQuote = 'no-quote' : $noQuote = '' ?>
		      	    	<li class="<?php echo $active ?>">
		      	    	      <!-- start banner -->
		      	    	      <?php if ($hero): ?>
		      	    	      	<div class="grid-container">
		      	    	      <?php endif ?>
		      	    	      	<div class="grid-x align-middle green-bkg" data-equalizer-watch="hero-quote">
		      	    	      		<div class="cell <?php echo $cell_content ?> <?php echo $offset; ?> content">
		      	    	      			<?php if (get_sub_field('quote_title')): ?>
		      	    	      				<h1 class="quote-title"><?php the_sub_field('quote_title') ?></h1>
		      	    	      			<?php endif ?>
		      	    	      			<div class="quote <?php echo $noQuote ?>">
		      	    	      				<?php the_sub_field('quote') ?>
		      	    	      			</div>
    	      			    			<?php if (get_sub_field('title') || get_sub_field('name') || get_sub_field('logo')): ?>
    	      			    				
    	      					    			<div class="grid-x align-middle">
    	      					    				<div class="cell shrink name title">
    	      						    				<?php the_sub_field('name') ?><br>
    	      											<?php the_sub_field('title') ?>
    	      					    				</div>
    	      					    				<?php if (get_sub_field('logo')): ?>
    	      												<div class="cell auto logo-cell">
    	      													<img src="<?php the_sub_field('logo') ?>" alt="logo" class="logo">
    	      												</div>
    	      					    				<?php endif ?>

    	      					    			</div>

    	      			    			<?php endif ?>
    	      			    			<?php if (get_sub_field('cta')): ?>
    	      			    				
    	      			    				<div class="cta">
    	      			    					<?php

    	      			    						$url = get_sub_field('cta')['url'];
    	      			    						$title = get_sub_field('cta')['title'];
    	      			    						$target = get_sub_field('cta')['target'];

    	      			    					 ?>
    	      			    					  <a href="<?php echo $url ?>" class="cta" target="<?php echo $target ?>"><?php echo $title ?></a>
    	      			    				</div>

    	      			    			<?php endif ?>

		      	    	      		</div>
		      	    	      		<div class="cell <?php echo $cell_image ?> image diagonal-lines show-for-medium">
		      	    	      			<?php echo wp_get_attachment_image( get_sub_field('image'), '', '',array( "class" => "hero-image" ) ); ?>
		      	    	      		</div>
		      	    	      	</div>
		      	    	      	<?php if ($hero): ?>
		      	    	      		</div>
		      	    	      	<?php endif ?>
		      	    	      <!-- end banner -->
		      	    	</li>
		      	    	<?php ++$i; ?>
		      	    <?php endwhile ?>
		      	<?php endif ?>
		    </ul>
		  <!-- </div> -->
		  <!-- <div class="grid-x">

		  	<div class="cell small-5 medium-offset-2 auto bullets">
		  		<nav class="orbit-bullets">
		  			<?php if (have_rows('quotes')): ?>
		  				<?php $i = 0; ?>
		  			    <?php while(have_rows('quotes')) : ?>
		  			    <?php the_row(); ?>
		  			    <?php ($i == 0) ? $active = 'is-active' : $active = ''  ?>
		  				<button class="<?php echo $active; ?>" data-slide="<?php echo $i ?>"></button>
		  				<?php ++$i; ?>
		  			    <?php endwhile ?>
		  			<?php endif ?>
		  		</nav>
		  	</div>
		  </div>

		</div> -->
	<?php endif ?>

</section>
