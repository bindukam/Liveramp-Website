<?php
/**
 * The template for displaying CPT archive pages
 * Template Name: Liveramp Contact Consent
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?> 

<?php $pageid = get_the_ID(); ?>
<style>
	.mktoInstruction {display: none}


</style>
<div class="" id="contact-page">
	<section class="breadcrumbs <?php the_sub_field('background_color'); ?> green-bkg" id="contact-breadcrumbs">
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
				<div class="cell">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
				</div>
			</div>
		</div>
	</section>

	<section class="contact-page-content">
		<div class="grid-container">
			<div class="grid-x grid-margin-x align-justify">
				<div class="cell  large-5 content">
					<div class="title description">
						<h1 class="white"><?php the_title(); ?></h1>
						<div class="white">
							<?php the_content(); ?>
						</div>

					</div>

				</div>
				<div class="cell large-5 form-cell">
					<div data-sticky-container>

						<div class="form-wrapper box-shadow-over-white b-radius white-bkg">
							
							<h3 class="form-title">Contact Us</h3>
							
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" class="pad-ul">
							
							<div class="caption dark-slate margin-bottom-1">All fields required * </div>
							
							<?php get_template_part( 'template-parts/contact-consent', 'none' ); ?>			

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="location" id="contact-location">
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell large-5">
					<div class="locations">
						<h2><?php _translate('our_offices')  ?></h2>

						<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
						  <?php if (have_rows('locations')): ?>
						  	<?php $i = 1;  ?>
						      <?php while(have_rows('locations')) : ?>
						      <?php the_row(); ?>
						      <?php $is_active = ($i == 1) ? 'is-active' : ''; ?>

						      	<li class="accordion-item <?php echo $is_active; ?>" data-accordion-item>
						      	  <a href="#deeplink1" class="accordion-title"><?php the_sub_field('city') ?></a>
						      	  <div class="accordion-content" data-tab-content id="deeplink1">
						      	    <div class="grid-x grid-margin-x">
						      	    	<div class="cell medium-7 address">
						      	    		<p><?php the_sub_field('street') ?></p>
						      	    		<?php if (get_sub_field('floor')): ?>
						      	    			<p><?php the_sub_field('floor') ?></p>
						      	    		<?php endif ?>
						      	    		<p><?php the_sub_field('city') ?> <?php the_sub_field('state') ?> <?php the_sub_field('zip') ?></p>
						      	    		<p><?php the_sub_field('country') ?></p>

						      	    	</div>
						      	    	<div class="cell medium-5 links">
						      	    		<?php if (get_sub_field('phone')): ?>
						      	    			<div class="grid-x align-middle">
						      	    				<div class="cell small-1">
						      	    					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/phone_icon.png" alt="phone icon" class="icon">
						      	    				</div>
						      	    				<div class="cell small-11 link">
						      	    					<a href="tel:<?php the_sub_field('phone') ?>" class="arrow-tag">
						      	    						<?php the_sub_field('phone') ?>
						      	    					</a>
						      	    				</div>

						      	    			</div>
						      	    		<?php endif ?>
						      	    		<div class="grid-x align-middle">
						      	    			<div class="cell small-1">
						      	    				<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/directions_icon.png" alt="phone icon" class="icon">
						      	    			</div>
						      	    			<div class="cell small-11 link">
						      	    				<a href="<?php the_sub_field('google_maps') ?>" target="_blank" class="arrow-tag">
						      	    					<?php _translate('get_directions')  ?>
						      	    				</a>
						      	    			</div>
						      	    		</div>
						      	    		<?php if (get_sub_field('website')): ?>
						      	    			<div class="grid-x align-middle">
						      	    				<div class="cell small-1">
						      	    					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/website_icon.png" alt="phone icon" class="icon">
						      	    				</div>
						      	    				<div class="cell small-11 link">
						      	    					<a href="<?php the_sub_field('website') ?>" target="_blank">
						      	    						<?php _translate('website')  ?>
						      	    					</a>


						      	    				</div>
						      	    			</div>
						      	    		<?php endif ?>
											
											
											<?php if (get_sub_field('text_message')): ?>
												<p class="smallText mt-20"><?php the_sub_field('text_message') ?></p>
											<?php endif ?>
											<?php if (get_sub_field('hr_phone')): ?>
												<p class="smallText"><a href="tel:<?php the_sub_field('hr_phone') ?>" class="arrow-tag" data-wpel-link="internal"> <?php the_sub_field('hr_phone') ?> </a></p>
											<?php endif ?>

						      	    	</div>
						      	    </div>
						      	  </div>
						      	</li>
						      	<?php ++$i ?>
						      <?php endwhile ?>
						  <?php endif ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>


<?php
get_footer();
