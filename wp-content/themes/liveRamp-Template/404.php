<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<!-- <section class="hero_simple_text green-bkg">
	<div class="grid-container">
		<div class="grid-x align-middle content">

			
			    	<div class="cell medium-7 white">
				    	
				    	<h1>It’s not you, it’s us.</h1>
				    	
			    	</div>
			    	<div class="cell medium-5 image">
			    
			    	</div>

			 
			
		</div>
	</div>
</section> -->

<section class="content_standard_image_and_text_module pad-section">

	<div class="grid-container">
		<div class="grid-x grid-padding-x align-top">
			<div class="medium-5 cell content small-order-2 medium-order-1 big-first-p">
				<h3 class="green title">
					How can we help?
				</h3>
				<div class="no-lineheight pad-ul">
				  <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
			  </div>
				The page you are looking for does not exist.

				<?php $url = home_url(); ?>

				<a href="<?php echo esc_url( $url ); ?>" class="button outline tag2" target="<?php echo $target ?>">Go Home</a>
				
			</div>
			<div class="cell align-top medium-7 image-container small-order-1 medium-order-2">
				<div class="image-area green-bg-box-before">
					<div class="image align-middle">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/image-404-cropped.jpg" alt="" class='b-radius'>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php get_footer();
