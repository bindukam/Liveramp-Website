<?php
/**
 * The template for displaying CPT archive pages
 * Template Name: Liveramp Contact Page Live Test
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
							
<!-- //////////////////////////////////////////////////////// -->

    <!-- onclick Function to consent for  marketo only -->
    <script>
        function accept__mkto() {
            __cmp('acceptAll', {
                purposeIds: [1, 2, 3, 4, 5],
                vendorIds: [0]
            }, function (data) {});
            __cmp('acceptAllAdditional', {
                vendorIds: [90]
            }, function (data) {});
        }
    </script>

    <!-- loading the form from mkto_js -->
    <script>
        function mkto_F() {
            console.log('here');
            var mkto_S = document.createElement('script');
            mkto_S.type = 'text/javascript';
            mkto_S.src = 'wp-content/themes/liveRamp-Template/mkto-forms/mkto_consent.js';
            document.getElementById('mkto_consent').appendChild(mkto_S);
        }
    </script>

    <!--  consent logic check for marketo -->
    <script>
        var consentForMarketoForm;
        console.log('consentForMarketoForm is ', consentForMarketoForm);

        function checkMktoConsent() {
            window.__cmp('getAdditionalVendorConsents', undefined, function (data) {
                var newConsentForMarketo = (data.purposeConsents[1] && data.vendorConsents[90] && data.purposeConsents[2] && data.purposeConsents[3] && data.purposeConsents[4] && data.purposeConsents[5]);
                console.log('newConsentForMarketo is ', newConsentForMarketo);
                if (consentForMarketoForm !== newConsentForMarketo) {
                    consentForMarketoForm = newConsentForMarketo;
                    if (consentForMarketoForm) {
                        document.getElementById("consent_panel").style.display = "none";
                        mkto_F();
                    }
                }
            });
        }
    </script>
    <!-- end of consent logic check for marketo -->

    <!-- Button div -->
    <div id="consent_panel" class="consent_panel_css">
        <button id="mkto_btn" class="consent_Btn mktoButton button cta" onclick="accept__mkto();">Accept</button>
        <p>Contact form not showing? You may Need to Update your consent preferences. Click here to give consent for Marketo.</p>
    </div>

    <!-- provided from mkto embedded script can call forms.min from marketo original link -->
    <script src="https://lp.liveramp.com/js/forms2/js/forms2.min.js"></script>
    <form id="mktoForm_1004"></form>

    <!-- added this div with ID=mkto_consent to call the marketo form callback once the consent check is done-->
    <div id="mkto_consent"></div>

    <!-- If you have this logic implemented on the page then you only need to add checkMktoConsent() to checkConsentDataWithCallback()-->
    <script>
        window.__cmp('addEventListener', 'cmpReady', function () {
            checkConsentDataWithCallback();
        });
        window.__cmp('addEventListener', 'consentChanged', function () {
            checkConsentDataWithCallback();
        });
        // If false it means that the visitor is new and didnt give an action for consent 
        // If true it means that the consent data object exist and we fire the check for the facebook consent  -->

        function checkConsentDataWithCallback() {
            window.__cmp('consentDataExist', true, function (consentDataExist) {
                if (consentDataExist) {
                    checkMktoConsent();
                }
            });
        }
    </script>


<!-- //////////////////////////////////////////////////////// -->
						
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
						<h2>Our Offices</h2>

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
						      	    					Get Directions
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
						      	    						Website
						      	    					</a>


						      	    				</div>
						      	    			</div>
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
