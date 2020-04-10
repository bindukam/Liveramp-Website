<!-- Load wistai api -->
<script type='text/javascript' charset="ISO-8859-1" src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/E-v1.js" async></script>

<!-- load desktop video script get field desktop_video -->

<script src="https://fast.wistia.com/embed/medias/<?php the_sub_field('desktop_video') ?>.jsonp" async></script>

<!-- Load mobile video script gets ACF mobile_video -->
<script src="https://fast.wistia.com/embed/medias/<?php the_sub_field('mobile_video') ?>.jsonp" async></script>



<section class="video-hero green-bkg">
	
	<div id="homepage_video">
		
		<!-- desktop video -->
		<div class="wistia_responsive_padding show-for-medium" style="padding:36.88% 0 0 0;position:relative;">
			<div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
				<div class="wistia_embed wistia_async_<?php the_sub_field('desktop_video') ?> videoFoam=true wmode=transparent" style="height:100%;position:relative;width:100%">&nbsp;
				</div>
			</div>
		</div>


		<!-- mobile video -->
		<div class="wistia_responsive_padding hide-for-medium green-bkg" style="padding:117.5% 0 0 0;position:relative;">
			<div class="wistia_responsive_wrapper green-bkg" style="height:100%;left:0;position:absolute;top:0;width:100%;">
				<div class="wistia_embed wistia_async_<?php the_sub_field('mobile_video') ?> videoFoam=true wmode=transparent" style="height:100%;position:relative;width:100%">&nbsp;
				</div>
			</div>
		</div>

		<div class="click-overlay">
			<!-- prevent user from pausing video when they click on it -->
		</div>	
		
		<!-- text overlay -->
		<!-- create are for text to be displayed -->
		<div class="white video-overlay">
			<?php if (have_rows('statements')): ?>
				<?php $i = 1;  ?>
			    <?php while(have_rows('statements')) : ?>
			    <?php the_row(); ?>
			    	<?php 

			    		$statement = get_sub_field('statement');
			    		// var_dump($statement);
			    		$line_1 = $statement['line_1'];
			    		$line_2 = $statement['line_2'];
			    		$cta = $statement['cta'];

			    		$title_id = 'title'.$i;

			    	 ?>
			    	 <!-- Text will be displayed here set to display none until animation start running below -->
			    	 <div class='overlay video-title' id="<?php echo $title_id ?>" style="display:none;">
			    	 	<div class="video-title">
			    	 		<span class='line1 line'><?php echo $line_1 ?></span><br /><span class='line2 line'><?php echo $line_2 ?></span>
			    	 </div>
			    	 <!-- if there is a CTA it goes here -->
			    	 	<?php if ($cta): ?>
			    	 		<?php 
			    	 		
			    	 			$url = $cta['url'];
			    	 			$title = $cta['title'];
			    	 			$target = $cta['target'];
			    	 		
			    	 		 ?>
			    	 		  <a href="<?php echo $url ?>" class="flexo-bold white line cta" target="<?php echo $target ?>"><?php echo $title ?></a>	
			    	 	<?php endif ?> 
			    	 	
			    	</div>

			    <?php ++$i ?>
			    <?php endwhile ?> 
			<?php endif ?>
		</div>
		
		<!-- progress bar, this is animated below  -->
		
		<div class="progress-bar" style="width: 0vw"></div>		

	</div>
	
	<!-- CTAS -->
	<!-- the three ctas that appear below video are here -->
	<div class="grid-container ">
		<div class="grid-x small-up-3 grid-padding-x grid-margin-x grid-padding-y hero-ctas">
			<?php if (have_rows('ctas')): ?>
			    <?php while(have_rows('ctas')) : ?>
			    <?php the_row(); ?>
			    	<div class="cell cta">
			    		<?php 
			    		
			    			$url = get_sub_field('url')['url'];
			    			$title = get_sub_field('url')['title'];
			    			$target = get_sub_field('url')['target'];
			    		
			    		 ?>
			    		  <a href="<?php echo $url ?>" class="flexo-bold" target="<?php echo $target ?>"><?php echo $title ?> <i class="fas fa-chevron-right"></i></a>
			    		  <p class="white show-for-medium"><?php the_sub_field('description') ?></p>

			    	</div>
			    <?php endwhile ?>   
			<?php endif ?>
		</div>
	</div>

</section>
<?php
/*
Enqueue js code only after when jQuery is ready 
*/
wp_enqueue_script ( 'hero-video-module-js', get_template_directory_uri() . '/dist/assets/js/hero-video-module.js' );
 
?>