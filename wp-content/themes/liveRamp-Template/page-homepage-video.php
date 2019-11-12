<?php
/**
 * The template for displaying carrer jobs pages
 * Template Name: Homepage Video
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */



get_header(); ?>

<div id="homepage_video">
	
	
	
	<script src="https://fast.wistia.com/embed/medias/u1ocs1r350.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:36.88% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_u1ocs1r350 videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/u1ocs1r350/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
	
	<div class="grid-container video-overlay white" id="video-overlay">
		
			<div class="grid-x">
				<div class="cell">
					<h1 class="overlay"></h1>
				</div>
			</div>
	</div>
	<div class="progress-bar" style="width: 0vw">
		<div class="seconds white">
			
		</div>
	</div>	
</div>


<!-- <script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/E-v1.js" async></script>
<div class="wistia_embed wistia_async_u1ocs1r350" style="width:100%;height:100vh;">&nbsp;</div> -->

<script>
	var overlay = $('.overlay');
	window._wq = window._wq || [];

	// target our video by the first 3 characters of the hashed ID
	_wq.push({ 
		id: '_all',
			options: {
			    "autoPlay": true,
		        "controlsVisibleOnLoad": false,
		        "fullscreenButton": false,
		        "playbackRateControl": false,
		        "playbar": false,
		        "playButton": false,
		        "playerColor": "5fbbff",
		        "qualityControl": false,
		        "settingsControl": false,
		        "smallPlayButton": false,
		        "volumeControl": false,
		        "endVideoBehavior": "loop"
			 },




		onReady: function(video) {
	  // at 10 seconds, do something amazing
		  video.bind('secondchange', function(s) {
		    if (s === 1) {
		      // Insert code to do something amazing here
		      console.log("We just reached " + s + " seconds!");
		      
		       	TweenLite.to(overlay, 2, {text:{value:"This is the new text", delimiter:""}, ease:Linear.easeNone});

		    }

		    if (s === 7) {
		      // Insert code to do something amazing here
		      console.log("We just reached " + s + " seconds!");
		      
		       	TweenLite.to(overlay, 2, {text:{value:"", delimiter:" "}, ease:Linear.easeNone});

		    }

		    if (s === 13) {
		      // Insert code to do something amazing here
		      console.log("We just reached " + s + " seconds!");
		      
		       	TweenLite.to(overlay, 2, {text:{value:"This is some more text", delimiter:" "}, ease:Linear.easeNone});

		    }

		    if (s === 20) {
		      // Insert code to do something amazing here
		      console.log("We just reached " + s + " seconds!");
		      
		       	TweenLite.to(overlay, 2, {text:{value:"Now its gone", delimiter:" "}, ease:Linear.easeNone});

		    }

		    if (s === 22) {
		      // Insert code to do something amazing here
		      console.log("We just reached " + s + " seconds!");
		      
		       	TweenLite.to(overlay, 2, {text:{value:"", delimiter:" "}, ease:Linear.easeNone});

		    }
		    

		  });

		  video.bind('timechange', function(t) {
		  		var pw = (4*t)+'vw';

		  		// $('.seconds').text(pw);
		  		$('.progress-bar').css('width', pw);
		  		// console.log("We just reached " + t + " seconds!");

		  		if (t > 24) {
		  			$('.progress-bar').hide();
		  			
		  		}

		  		if (t > 5 ) {
		  			$('.progress-bar').show();
		  		}

		  });

		  
	}});

</script>






<?php
get_footer();
