// Slick Slider for Modules 
function moduleSlider(moduleName) {
	// alert(moduleNAme);
	var $slider = '.' + moduleName;
		
	$($slider).slick({
	     slidesToShow: 1,
	     slidesToScroll: 1,
	     autoplay: false,
	     autoplaySpeed: 2000,
	     mobileFirst: true,
	     arrows: false,
	     dots: true,
	     adaptiveHeight: true,
	     responsive: [
	        {
	           breakpoint: 640,
	           settings: "unslick"
	        }
	     ]
	  });
	// $($slider).slick({
	// 	arrows: false,
	// 	autoplay: false,
	// 	fade: true,
	// 	// lazyLoad: 'progressive',
	// 	speed: 100,
	// 	// adaptiveHeight: false,
	// 	responsive: [
	// 	    {
	// 	      breakpoint: 768,
	// 	      settings: {
	// 	          slidesToScroll: 1,
	// 	          autoplay: true,
	// 	          autoplaySpeed: 5000,
	// 	          fade: false,
	// 	          dots: true,
	// 	          speed: 1000,
	// 	          adaptiveHeight: true,
	// 	          easing: 'easeInOutSine',
	// 	      }
	// 	    }
	// 	  ]
	// });

}
// END SLIDER