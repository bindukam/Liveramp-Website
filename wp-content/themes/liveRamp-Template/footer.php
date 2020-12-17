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
	        			<?php _translate('follow_us'); ?>
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
<script>
	$(document).ready(function(){
		 // Carded: Multi-Colored Content Cards ( Accessiblity fix )
		 $('[id^=slick-slide]').attr('tabindex','0'); 
		 $('[id^=slick-slide] .cell a').attr('tabindex','0');
		 $('h2').attr('tabindex','0');
		// $('#sf-showcase .solution-card').attr('tabindex','0');
		// $('#sf-showcase .solution-card .card-cta > button').attr('tabindex','0');
		 
		 // Carded Square 6-Card Content ( Accessiblity fix )
		 $('[id^=slick-slide]').find('a.button').attr('tabindex','0'); 
		 
		 //Tabbed: Expanded Left Justified Vertical Tab Module ( Accessiblity fix )
		 /*  $('.tabs-panel').find('a.button').on('focusout', function(e){ console.log('Focusout Loop');
			var buttonElem =  $(this);
			 buttonElem.attr('tabindex',-1);
			 console.log('focusout elem txt: '+buttonElem.text()); 
		  });   */ 
		  // returns true if the element or one of its parents has the class classname
function hasSomeParentTheClass(element, classname) {
	
    if (element){
		if (element.className !== undefined && element.className !=='' ){
			if (element.className.split(' ').indexOf(classname)>=0) return true;
		}
	}
    return element.parentNode && hasSomeParentTheClass(element.parentNode, classname);
}
			 $(window).keyup(function (e) {
				let ecode = (e.keyCode ? e.keyCode : e.which); 
				if (ecode == 9) {
					// console.log(e.target);
					// console.log(hasSomeParentTheClass(e.target, 'tabs-panel'));
					
					if(hasSomeParentTheClass(e.target, 'tabs-panel')){
						e.stopPropagation();
						console.log($(e.target).parents().find('.tabs-panel'));
						let tabbedElemID = $(e.target).parents().find('.tabs-panel').attr('id');
						$('a[href="#'+tabbedElemID+'"]').parent().next().focus();
					}/* 
					 $('.tabs-panel').find('a.button').on('focus', function(e){ 
						let buttonElem =  $(this);
						buttonElem.attr('tabindex',-1);   console.log('Elem: '+buttonElem.text()+' in focus');
						
						let tabbedElemID = buttonElem.closest('.tabs-panel').attr('id');
						let linksToTabbedSection = $('a[href="#'+tabbedElemID+'"]');
						
						let curLiIndex = $('ul.tabs li.is-active').index(); 
						let nextLiIndex = curLiIndex + 1 ;
						console.log( 'curLiIndex '+curLiIndex );
						console.log( 'nextLiIndex '+nextLiIndex );
						//$('ul.tabs li').eq( nextLiIndex ).attr('tabindex',nextLiIndex); 
						$('ul.tabs li').eq( nextLiIndex ).click();
					 });  
					
					 
					 $('.platform-footer').find('a').on('focus', function(e){   console.log('Elem footer Focusout');
						 $('.tabs-panel').find('a.button').attr('tabindex',0); 
					  }); */
				}
			});  
		  // console.log('nxt elem'+$( '.tabbed_expanded_left_justified_vertical_tab_module' ).next().html());
		 /* $('.tabs-panel').find('a.button').on('focusout', function(e){ console.log('Focusout Loop');
			let buttonElem =  $(this);
			buttonElem.attr('tabindex',-1); 
			 $(window).keyup(function (e) {
				let ecode = (e.keyCode ? e.keyCode : e.which); 
				if (ecode == 9) { console.log('focusout elem txt: '+buttonElem.text()); console.log('focusout elem htm: '+buttonElem.html());
				   let tabbedElemID = buttonElem.closest('.tabs-panel').attr('id');
				   let linksToTabbedSection = $('a[href="#'+tabbedElemID+'"]');
				   
				 
				   var curLiIndex = $('ul.tabs li.is-active').index(); 
				   let nextLiIndex = curLiIndex + 1 ;
				  //  console.log( 'curLiIndex '+curLiIndex );
				  // console.log( 'tabindex set fro next '+nextLiIndex );
				   
				   $('ul.tabs li').eq( nextLiIndex ).find('a').attr('tabindex',nextLiIndex); 
				   $('ul.tabs li').eq( nextLiIndex ).find('a').focus();
				   $('ul.tabs li').eq( nextLiIndex ).find('a').attr('tabindex',-1); 
				
				   $('ul.tabs li').eq( nextLiIndex ).click();
				  // console.log( 'curLiIndex clicked = '+nextLiIndex );
				  $('div.is-active').find('a.button').attr('tabindex',nextLiIndex++); 
				 //  linksToTabbedSection.closest('li').next().find('a').focus();
				 //  linksToTabbedSection.closest('li').click();
				}
			});
		});   */
		/*  $('ul.tabs').on('focusout', function(e){
			 $(window).keyup(function (e) {
				let ecode = (e.keyCode ? e.keyCode : e.which); 
				if (ecode == 9) {
					liElem.find('a').attr('tabindex','-1'); 
				}
			});
		 });  */
		/* $('ul.tabs li.is-active').on('focusout', function(e){
			var liElem =  $(this);
			var curLiIndex = liElem.index(); // alert(  curLiIndex); 
			
			$(window).keyup(function (e) {
				let ecode = (e.keyCode ? e.keyCode : e.which); 
				if (ecode == 9) {
					liElem.find('a').attr('tabindex','-1'); 
					// alert(  curLiIndex + 1); 
					 $('ul.tabs li').eq( curLiIndex + 1 ).find('a').attr('tabindex',curLiIndex + 1); 
				}
			});
		}); */
	});
	
</script>
<script>
$(document).ready(function(){
	if (location.hash) {
		$([document.documentElement, document.body]).animate({scrollTop: $("#liveramp-university-education-hub").offset().top-150}, 2000);
	}
});
</script>
</body>
</html>
