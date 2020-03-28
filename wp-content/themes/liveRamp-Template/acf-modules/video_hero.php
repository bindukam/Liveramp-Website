<!-- Load wistai api -->
<script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>

<!-- load desktop video script get field desktop_video -->

<script src="https://fast.wistia.com/embed/medias/<?php the_sub_field('desktop_video') ?>.jsonp" async></script>

<!-- Load mobile video script gets ACF mobile_video -->
<script src="https://fast.wistia.com/embed/medias/<?php the_sub_field('mobile_video') ?>.jsonp" async></script>



<section class="video-hero green-bkg">
	
	<div id="homepage_video">
		
		<!-- desktop video -->
		<div class="wistia_responsive_padding show-for-medium" style="padding:36.88% 0 0 0;position:relative;">
			<div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
				<div class="wistia_embed wistia_async_<?php the_sub_field('desktop_video') ?> videoFoam=true wmode=transparent" style="height:100%;position:relative;width:100%">&nbsp;
				</div>
			</div>
		</div>


		<!-- mobile video -->
		<div class="wistia_responsive_padding hide-for-medium green-bkg" style="padding:117.5% 0 0 0;position:relative;">
			<div class="wistia_responsive_wrapper green-bkg" style="height:100%;left:0;position:absolute;top:0;width:100%;">
				<div class="wistia_embed wistia_async_<?php the_sub_field('mobile_video') ?> videoFoam=true wmode=transparent" style="height:100%;position:relative;width:100%">&nbsp;
				</div>
			</div>
		</div>

		<div class="click-overlay">
			<!-- prevent user from pausing video when they click on it -->
		</div>	
		
		<!-- text overlay -->
		<!-- create are for text to be displayed -->
		<div class="white video-overlay">
			<?php if (have_rows('statements')): ?>
				<?php $i = 1;  ?>
			    <?php while(have_rows('statements')) : ?>
			    <?php the_row(); ?>
			    	<?php 

			    		$statement = get_sub_field('statement');
			    		// var_dump($statement);
			    		$line_1 = $statement['line_1'];
			    		$line_2 = $statement['line_2'];
			    		$cta = $statement['cta'];

			    		$title_id = 'title'.$i;

			    	 ?>
			    	 <!-- Text will be displayed here set to display none until animation start running below -->
			    	 <div class='overlay video-title' id="<?php echo $title_id ?>" style="display:none;">
			    	 	<div class="video-title">
			    	 		<span class='line1 line'><?php echo $line_1 ?></span><br /><span class='line2 line'><?php echo $line_2 ?></span>
			    	 </div>
			    	 <!-- if there is a CTA it goes here -->
			    	 	<?php if ($cta): ?>
			    	 		<?php 
			    	 		
			    	 			$url = $cta['url'];
			    	 			$title = $cta['title'];
			    	 			$target = $cta['target'];
			    	 		
			    	 		 ?>
			    	 		  <a href="<?php echo $url ?>" class="flexo-bold white line cta" target="<?php echo $target ?>"><?php echo $title ?></a>	
			    	 	<?php endif ?> 
			    	 	
			    	</div>

			    <?php ++$i ?>
			    <?php endwhile ?> 
			<?php endif ?>
		</div>
		
		<!-- progress bar, this is animated below  -->
		
		<div class="progress-bar" style="width: 0vw"></div>		

	</div>
	
	<!-- CTAS -->
	<!-- the three ctas that appear below video are here -->
	<div class="grid-container ">
		<div class="grid-x small-up-3 grid-padding-x grid-margin-x grid-padding-y hero-ctas">
			<?php if (have_rows('ctas')): ?>
			    <?php while(have_rows('ctas')) : ?>
			    <?php the_row(); ?>
			    	<div class="cell cta">
			    		<?php 
			    		
			    			$url = get_sub_field('url')['url'];
			    			$title = get_sub_field('url')['title'];
			    			$target = get_sub_field('url')['target'];
			    		
			    		 ?>
			    		  <a href="<?php echo $url ?>" class="flexo-bold" target="<?php echo $target ?>"><?php echo $title ?> <i class="fas fa-chevron-right"></i></a>
			    		  <p class="white show-for-medium"><?php the_sub_field('description') ?></p>

			    	</div>
			    <?php endwhile ?>   
			<?php endif ?>
		</div>
	</div>

</section>

<script>

	$( document ).ready(function() {
	    // console.log( "video page ready!" );

	    window._wq = window._wq || [];	

	    // target our video by the first 3 characters of the hashed ID
	    _wq.push({ 
	    	id: '_all',
	    	option: {
	    		muted: 'true',
	    		
	    		// endVideoBehavior: 'reset',
	    	},

	    	onReady: function(video) {
	    	  video.play();
	    	  // console.log(video.duration());
	    	  // get vide oduration 
	    	  var duration = video.duration();

	    	  // set percent for progress bar
	    	  var percent = 100/duration;

	    	  // create timelines for animation these are GreenSock timelines more can be 
	    	  // found here https://greensock.com/docs
	    	  // https://ihatetomatoes.net/wp-content/uploads/2016/07/GreenSock-Cheatsheet-4.pdf

	    	  var tl1 = new TimelineMax();
	    	  var tl2 = new TimelineMax();
	    	  var tl3 = new TimelineMax();
	    	  var tl4 = new TimelineMax();

	    	  
	    	  // restart timeline 1 
	    	  function restartVideo() {
	    	  	tl1.restart();
	    	  	// video.play();
	    	  }

	    	  

	    	  	// set different ease that are used in the timeline
	    	  	// more information can be found here https://greensock.com/docs/Easing
	    	  	
		    	var $ease =  'Power3.easeOut'; 
		    	var $ease2 =  'Power3.easeIn';
		    	var time = 1,
		    		time2 = .5;  

		    	// bind timechange to progress bar Timechange is fired every 300ms
		    	video.bind('timechange', function(t) {
		    			var pw = percent*t;
		    			$('.progress-bar').css('width', pw+'vw');

		    	});

		    	// bind second chage to animations 
		    	video.bind("secondchange", function(s) {
		    		// fire tl1 at 1 second in
		    	  if (s === 1) {
		    	    tl1
		    			.fromTo('#title1', time, {autoAlpha:0, display:'', y:-20}, {autoAlpha:1, y:0, ease: $ease})
		    			.to('.progress-bar', 1, {opacity:1})
		    		   .to('.line2', time, {color: '#FAE164',})
		    		   ;	
		    	  }
		    	  // fire tl2 at 4 seconds
		    	  if (s === 4) {
		    	  	tl2 
		    	  		.staggerTo('.line', time, {opacity:0, top:10, ease: $ease2, stagger:{from:'end'}} )
		    	  		.set('#title1', {display:'none'})
		    	  		.set('.line', {opacity:1, color:'#fff', top:0})
		    	  		.fromTo('#title2', time, {autoAlpha:0, display:'', y:-10}, {autoAlpha:1, y:0, ease: $ease})
		    	  		.to('.line2', time, {color: '#FAE164'})
		    	  }

		    	
		    	  // fire tl3 at 7 seconds
		    	  if(s === 7) {
		    	  	tl3
		    	  		.staggerTo('.line', time, {opacity:0, top:10, ease: $ease2, stagger:{from:'end', amount:1}}, 2 )
		    	  		.set('#title2', {display:'none'})
		    	  		.set('.line', {opacity:1, color:'#fff', top:0})
		    	  	   .fromTo('#title3', 1, {autoAlpha:0, display:'', y:-10}, {autoAlpha:1, y:0, ease: $ease})
		    	  	   .to('.line2', time, {color: '#FAE164'})
		    	  	   // .staggerTo('.line', time, {opacity:0, top:10, ease: $ease2, stagger:{from:'end', amount:1}}, 2 )
		    	  	   // .set('#title3', {display:'none'})

		    	  	   ;	
		    	  }
		    	  // fire tl4 at 12 seconds
		    	  if (s === 12) {
		    	  	tl4
		    	  	.staggerTo('.line', time, {opacity:0, top:10, ease: $ease2, stagger:{from:'end', amount:1}}, 2 )
		    	  	.set('#title3', {display:'none'})
		    	  	.set('.line', {opacity:1, color:'#fff', top:0})
		    	  	;
		    	  }


		    	});

		    	// at end or video reset and restart everything
		    	video.bind("end", function(){
		    	 	$('.progress-bar').css({
		    	 		'opacity': '0',
		    	 		'width': '0vw'
		    	 	});
		    	 	// video.time(0);
		    	 	
		    	 });
	    	  
	    }});

	});

</script>