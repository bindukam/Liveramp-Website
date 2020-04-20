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