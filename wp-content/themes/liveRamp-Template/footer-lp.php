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
	        	<div class="grid-x grid-padding-y sub-footer ">
					<div class="cell auto logo">
						<a href="<?php echo site_url(); ?>">
							<?php
							// THEM URI to link to images within the assets folder
                            $theme_uri = get_stylesheet_directory();
							// Theme assets folder
							$theme_images = $theme_uri.'/dist/assets/images';
							$theme_svg = $theme_images.'/svg';
							echo file_get_contents("$theme_svg/lr_logo_only.svg"); ?>
						</a>
					</div>
	        		<div class="cell auto copyright text-right">
	        			<?php wp_nav_menu( array( 'theme_location' => 'lp-footer-menu') ); ?>
	        		</div>

	        		<div class="cell shrink connect text-center">
						<span class="copy">Copyright &copy; <?php echo date("Y"); ?> LiveRamp</span>
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
