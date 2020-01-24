<?php
/*
Template Name: Partners Archive
*/
$partner_url = get_query_var('partner'); // Checks to see if there is a single partner slug in the URL e.g. liveramp.com/partners/{ partner-slug }

get_header();

if( !empty($partner_url) ) { // It's the single partner page

	get_template_part('template-parts/single-partner'); //bring in the single partners page template

} else { // It's the partners archive page

    //PAGE BUILDER -->
    	include('acf-loop.php');
    // END PAGE BUILDER

   if( have_posts() ): while( have_posts() ): the_post();
	 ?>
   	<section class="partners-archive pad-section">
       <div class="grid-container">
         <div class="title-container">
            <h2 class="title"><?php _translate('partners')  ?></h2>
            <div class="small-separator"></div>
         </div>
   		<?php get_template_part('template-parts/partner-filters'); ?>
       </div>
   	</section>

	<?php
	if(have_rows('content_standard_image_and_text_module')):
		while(have_rows('content_standard_image_and_text_module')): the_row();
   ?>
	<section class="content_standard_image_and_text_module pad-section">

		<?php
		if (get_sub_field('image')):
			$hide = '';
			$center = '';
			$size = 'medium-5';
		else:
			$hide = ' hide';
			$center = ' align-center text-center no-image';
			$size = 'medium-9';
		endif;

		?>

		<div class="grid-container">
			<div class="grid-x grid-padding-x align-top<?php echo $center ?>">
				<div class="<?php echo $size ?> cell content small-order-2 medium-order-1 big-first-p">
					<h3 class="green title">
						<?php the_sub_field('title') ?>
					</h3>
					<div class="no-lineheight pad-ul">
					  <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
				  </div>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description'); ?>
					<?php endif ?>
					<?php if (get_sub_field('description_cont')): ?>
						<p class="tag1"><?php the_sub_field('description_cont'); ?>	</p>
					<?php endif ?>
					<?php if (get_sub_field('cta')):

						$url = get_sub_field('cta')['url'];
						$title = get_sub_field('cta')['title'];
						$target = get_sub_field('cta')['target'];

					?>
					<a href="<?php echo $url ?>" class="button outline tag2" target="<?php echo $target ?>"><?php echo $title ?></a>
					<?php endif ?>
				</div>
				<div class="cell align-top medium-7 image-container small-order-1 medium-order-2<?php echo $hide ?>">
					<div class="image-area green-bg-box-before">
						<div class="image align-middle">
							<?php echo wp_get_attachment_image( get_sub_field('image'), full, '',array( "class" => "b-radius tab-image" ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; endif; ?>

	<?php
	if(have_rows('offer_strip')):
		while(have_rows('offer_strip')): the_row();
   ?>
	<?php
		$theme_uri = get_template_directory_uri();
		$theme_images = $theme_uri.'/dist/assets/images';
		$theme_svg = $theme_images.'/svg';
		$style = "background-image:url('".$theme_svg."/wavelines-ctastrip-green.svg')";


	 ?>

	<section class="offer_strip green-bkg relative <?php the_sub_field('width_toggle') ?> wave-graphic <?php if (get_sub_field('overlay')): echo 'overlay-me'; endif; ?>">

		<div class="grid-container z-5-r">
			<div class="grid-x align-middle align-right pad-1">
				<div class="cell medium-6 text">
					<h2 class="yellow">
						<?php the_sub_field('title') ?>
					</h2>
					<div class="white">
						<?php the_sub_field('description') ?>
					</div>

				</div>
				<div class="cell medium-4 text-center">
					<?php

						$url = get_sub_field('cta')['url'];
						$title = get_sub_field('cta')['title'];
						$target = get_sub_field('cta')['target'];

					 ?>
					 <a href="<?php echo $url ?>" target="<?php echo $target ?>" class="button"><?php echo $title ?></a>
				</div>
			</div>
		</div>


	</section>

	<div class="footer-overlay">

	</div>

   <?php endwhile; endif; ?>



   <?php endwhile; endif; ?>


<?php
}

get_footer(); ?>
