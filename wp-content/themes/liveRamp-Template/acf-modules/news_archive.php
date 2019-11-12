<section class="news_archive" id="news_archive">
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-margin-y">

			<div class="cell large-3 medium-4">
				
					
					<!-- <div class="sticky" data-sticky data-top-anchor="news_archive" data-btm-anchor="news_archive:bottom" data-options="marginTop:10;" data-margin-bottom='2' data-sticky-on='large'> -->
						
						<?php include('news_parts/news_filters.php');
						
						if (get_sub_field('contact_email') || get_sub_field('contact_phone')) : ?>

							<div class="contact show-for-medium">
								<h3>Contact Our <br> Press Team</h3>
								<div class="divider"><img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/blue-headline-line.svg" alt="divider"></div>
								<div class="grid-x align-middle">
									<?php
									if (get_sub_field('contact_phone')) : ?>
										<div class="cell small-2 icon">
											<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/phone-1.svg" alt="contact-icon" id="phone-icon">
										</div>
										<div class="cell small-10 number">
											<a href="tel:<?php the_sub_field('contact_phone');?>"><?php the_sub_field('contact_phone');?> <i class="far fa-chevron-right"></i></a> 
										</div>
									<?php 
									endif; ?>
									
									<?php
									if (get_sub_field('contact_email')) : ?>
										<div class="cell small-2 icon">
											<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/letter-mail-1.svg" alt="contact-icon" id="letter-icon">
										</div>
										<div class="cell small-10 email">
											<a href="mailto:<?php the_sub_field('contact_email');?>"><?php the_sub_field('contact_email');?> <i class="far fa-chevron-right"></i></a> 
										</div>
									<?php 
									endif; ?>
								</div>
							</div>
						<?php 
						endif; ?>
						
						<div class="social show-for-medium horiz-social">
							<p>Share Page</p>
							
							<?php echo do_shortcode("[wp_social_sharing]") ?>	
							
						</div>	
						
					<!-- </div> -->

				

			</div>

			<div class="cell large-9 medium-8 archive">
				<?php include('news_parts/archive.php'); ?>
			</div>


			<div class="cell contact show-for-small-only">
				<h3>Contact Our <br> Press Team</h3>
				<div class="divider">
					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/blue-headline-line.svg" alt="divider">
				</div>
				<div class="grid-x align-middle">
					<?php
					if (get_sub_field('contact_phone')) : ?>
						<div class="cell small-2 icon">
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/phone-1.svg" alt="contact-icon" id="phone-icon">
						</div>
						<div class="cell small-10 number">
							<a href="tel:+<?php the_sub_field('contact_phone') ?>"><?php the_sub_field('contact_phone') ?><i class="far fa-chevron-right"></i></a> 
						</div>
					<?php
					endif;
					if (get_sub_field('contact_email')) : ?>
						<div class="cell small-2 icon">
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/letter-mail-1.svg" alt="contact-icon" id="letter-icon">
						</div>
						<div class="cell small-10 email">
							<a href="mailto:<?php the_sub_field('contact_email') ?>"><?php the_sub_field('contact_email') ?> <i class="far fa-chevron-right"></i></a> 
						</div>
					<?php endif; ?>
				</div>
				<div class="social center-social grid-x">
					<div class="small-12">
						<p>Share Page</p>
						<?php echo do_shortcode("[wp_social_sharing]") ?>
					</div>	
				</div>	
			</div>
		</div>
	</div>
</section>