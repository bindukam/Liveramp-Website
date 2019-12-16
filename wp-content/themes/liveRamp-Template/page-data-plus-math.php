<?php
/**
 * The template for displaying pages
 * Template Name: Data Plus Math
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php if ($_GET['apply']=='true') {  ?>
	<script>
		const handleUserOptOut = () => {

		  // check that the dpm snowplow library has been loaded, otherwise wait for it
		  if(!window["DPMSendConversionEvent"]) {
		    window['opt-out-wait'] = (window['opt-out-wait'] ? window['opt-out-wait'] : 0) + 1;
		    if(window['opt-out-wait'] < 20) {
		      window.setTimeout(handleUserOptOut, 100);
		      return;      
		    }
		    // if we get here, something went wrong, so define a dummy send conv event function to not block the below code
		    window["DPMSendConversionEvent"] = function() { console.warn('DPM SP library not present') };
		  }
		  
		let message = "";

		//require apply=true on URI to reduce bot initiated opt-outs
		if(document.location.search.startsWith("?apply=true")) { 

			let optOutSource = "user-initiated";
			
			//look for source= on page URL
			try {
				let m = document.location.search.match(/source\=([A-Za-z0-9\-\_]+)/);
				optOutSource = m && m.length > 1 ? m[1] : optOutSource;	
			} catch(e) {
				console.warn("Failed to read opt-out source on location", e);
			}

		  //send conversion event for statistics
		  DPMSendConversionEvent('opt_out:' + optOutSource);
		  
		  // embed IFRAME for setting actual opt-out cookie
		  let optoutiframe = document.createElement('IFRAME');
		  optoutiframe.style = "width: 100%; border: none; scroll: none; color:red";
		  optoutiframe.src = "https://c.tvpixel.com/dpm-opt-out/opt-out-iframe";
		  document.querySelector('.opt-out-status-p').insertAdjacentElement('afterend',optoutiframe);

		} else {
		  	//print message
			message = "Please visit our privacy policy link below to begin the opt-out process";
		  document.querySelector('.opt-out-status-p').innerText = message;
		  document.querySelector('.opt-out-status-p').style.color = 'red';
		}

		};

		document.addEventListener("DOMContentLoaded", handleUserOptOut);
	</script>
	<style>
		iframe p {font-family: "Flexo Medium",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;}

	</style>
	<div id="dark-blue-theme" class="color-theme">
	    <section class="hero_simple_text green-bkg withimage entrance-anim">
	        <div class="grid-container z-5-r">
	            <div class="grid-x align-middle content">
	                <div class="cell medium-7 white">
	                    <h1>Data Plus Math Opt Out</h1>
	                </div>
	                <div class="cell medium-5 image">
	                    <img width="1024" height="225" src="http://lrmultidevelop.wpengine.com/wp-content/uploads/2019/12/data-plus-math_white_hi-res-smaller-1024x225.png" class="hero-image" alt="" srcset="http://lrmultidevelop.wpengine.com/wp-content/uploads/2019/12/data-plus-math_white_hi-res-smaller-1024x225.png 1024w, http://lrmultidevelop.wpengine.com/wp-content/uploads/2019/12/data-plus-math_white_hi-res-smaller-300x66.png 300w, http://lrmultidevelop.wpengine.com/wp-content/uploads/2019/12/data-plus-math_white_hi-res-smaller-768x169.png 768w, http://lrmultidevelop.wpengine.com/wp-content/uploads/2019/12/data-plus-math_white_hi-res-smaller-640x141.png 640w, http://lrmultidevelop.wpengine.com/wp-content/uploads/2019/12/data-plus-math_white_hi-res-smaller.png 1200w" sizes="(max-width: 639px) 98vw, (max-width: 1199px) 64vw, 770px"> </div>
	            </div>
	        </div>
	    </section>
		<section class="content_standard_image_and_text_module pad-section entrance-anim">
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-top align-center text-center no-image">
					<div class="medium-9 cell content small-order-2 medium-order-1 big-first-p z-5-r">
						<p id="opt-out" class="opt-out-status-p"></p>
						<a class="button" target="" href="/">Continue</a>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php } else { 
	include('acf-loop.php');
}
get_footer();
