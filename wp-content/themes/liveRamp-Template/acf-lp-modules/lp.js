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

		var lblCountry = $("label:contains('Country')");
        if( lblCountry.length ) {
			var select = lblCountry.parent().find('.select-styled');
			select.attr('data-id', 'United States');
			select.text('United States');
        }

        // `input[type="submit"].disabled, input[type="submit"].button-disabled, input[type="submit"]:disabled`
        $('form[id^="gform_"]').on('change', function (e) {
            var $reqd = $(this).find('.gfield_contains_required.gfield_visibility_visible').filter(function (i, c) {
                return []
                    .concat($(c).find('input[type="text"], textarea').filter(function (i, fl) { return $(fl).val().length == 0; }).get())
                    .concat($(c).find('input[type="checkbox"]').not(':checked').get())
                    .length;
            });
            if ($reqd.length) {
                $(this).find('input[type="submit"]').addClass('disabled button-disabled').attr('disabled', 'disabled');
            } else {
                $(this).find('input[type="submit"]').removeClass('disabled button-disabled').removeAttr('disabled');
            }
        }).trigger('change');

        if ($('form[id^="gform_"]').length) {
            $('form[id^="gform_"]').find('input[type="submit"]').addClass('disabled button-disabled').attr('disabled', 'disabled');
        }
	}
});
