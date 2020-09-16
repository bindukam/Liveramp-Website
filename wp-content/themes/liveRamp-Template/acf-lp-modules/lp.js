jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	if( $('.single-lp').length ) {
		//console.log('lp script here.');
		$(document).on("gform_confirmation_loaded", function (e, form_id) {

			//window.location.href = "http://127.0.0.1:7776/lp/lp-post-webinar-2/";
			//alert('form submitted');

		});

        window.addeventasync = function(){
            addeventatc.settings({
				license: "aPbaeGjiczASXKbLwmPt66719"
            });
		};

        if( ($('.lp-event-hero').length || $('.lp-event-details').length) && $('.lp-event-form').length ) {
			$(".button.register").click(function (e) {
				e.preventDefault();
				$([document.documentElement, document.body]).animate({
					scrollTop: $('.lp-event-form').offset().top
				}, 900);
				return false;
			});
        }
	}
});
