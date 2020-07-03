<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>
</div>
<?php   //get_template_part( 'template-parts/geo-pop' ); ?>
<section id="footer" class="dark-gray-bkg">
	<footer class="footer">
	    <div class="footer-container">
	        <div class="grid-container">

	        	<div class="grid-x grid-margin-x large-up-5 footer-grid ">

	        		<?php if ( is_active_sidebar( 'footer-widgets1' ) ) : ?>
	        		<div class="cell footer-widget-wrapper">
	        			<?php dynamic_sidebar( 'footer-widgets1' ); ?>
	        		</div>
	        		<?php endif; ?>

	        		<?php if ( is_active_sidebar( 'footer-widgets2' ) ) : ?>
	        		<div class="cell footer-widget-wrapper">
	        			<?php dynamic_sidebar( 'footer-widgets2' ); ?>
	        		</div>
	        		<?php endif; ?>

	        		<?php if ( is_active_sidebar( 'footer-widgets3' ) ) : ?>
	        		<div class="cell footer-widget-wrapper">
	        			<?php dynamic_sidebar( 'footer-widgets3' ); ?>
	        		</div>
	        		<?php endif; ?>

	        		<?php if ( is_active_sidebar( 'footer-widgets4' ) ) : ?>
	        		<div class="cell footer-widget-wrapper">
	        			<?php dynamic_sidebar( 'footer-widgets4' ); ?>
	        		</div>
	        		<?php endif; ?>

	        		<?php if ( is_active_sidebar( 'footer-widgets5' ) ) : ?>
	        		<div class="cell footer-widget-wrapper">
	        			<?php dynamic_sidebar( 'footer-widgets5' ); ?>
	        		</div>
	        		<?php endif; ?>

	        	</div>

	        </div>

	        <div class="grid-container">
	        	<div class="grid-x grid-padding-y sub-footer ">
					<div class="cell auto logo">
						<a href="<?php echo site_url(); ?>">
							<?php
							// THEM URI to link to images within the assets folder
							$theme_uri = get_template_directory_uri();
							// Theme assets folder
							$theme_images = $theme_uri.'/dist/assets/images';
							$theme_svg = $theme_images.'/svg';
							echo file_get_contents("$theme_svg/lr_logo.svg"); ?>
						</a>
					</div>
	        		
<style>
.copyright ul {
    justify-content: center;
}

#footer .footer-container .sub-footer .copyright a:first-child:before {
    background:none;
}
</style>
	        		<div class="cell auto copyright text-center">
	        			<? wp_nav_menu( array( 'theme_location' => 'copyright-menu') ); ?>
						<span class="copy">Copyright &copy; <?php echo date("Y"); ?> LiveRamp</span>
	        		</div>

	        		<div class="cell shrink connect text-center">
	        			Follow Us
	        			<div class="grid-x grid-margin-x small-up-4">
	        				
							<?php 
							if( have_rows('icon_list', 'option') ):
							    while ( have_rows('icon_list', 'option') ) : the_row();?>
									<div class="cell">
										<a href="<?php the_sub_field('social_link'); ?>" target="_blank" rel="nofollow" aria-label="<?php the_sub_field('social_sitename'); ?>">
											<i class="fab <?php the_sub_field('social_icon'); ?>"></i>
										</a>
									</div>

							        <?php 
							    endwhile;
							endif;

							?>
	        			</div>

	        		</div>

	        	</div>
	        </div>
	    </div>
	</footer>
</section>


<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>

<?php ?>

</body>
</html>
