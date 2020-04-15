<?php if (!empty(get_field('subscribe_form_id', 'option'))) {  ?>
	<section class="blog-subscribe">
	<div class="grid-x grid-padding-x grid-margin-x medium-blue-bkg subscribe b-radius align-middle align-center">
		<div class="cell medium-8 text-center">
			<h2 class="core-blue">Subscribe for Updates</h2>
			
			<div class="email-form text-center">
				
				<div class="response_one white" style="display:none">
					<h4>Thank you for subscribing</h4>
				</div>

				<div class="form-wrapper" style="display:none">
					
					<form class="mktoForm" data-formId="<?php echo get_field('subscribe_form_id','option') ?>" data-formInstance="one"></form>	

				</div>

			</div>

		</div>
	</div>
</section>
	<style>
	.mktoFormRow.makered {color:white;}
	</style>


	<script src="https://lp.liveramp.com/js/forms2/js/forms2.min.js"></script>
	<script>
			jQuery( document ).ready(function() {

			   /* config area - replace with your instance values */

			   var mktoFormConfig = {
			   		podId : "https://lp.liveramp.com",
			   		munchkinId : "320-CHP-056",
			   	   formIds : [<?php echo get_field('subscribe_form_id', 'option') ?>]
			   };

			   /* ---- NO NEED TO TOUCH ANYTHING BELOW THIS LINE! ---- */

			   function mktoFormChain(config) {

			   	/* util */
			   	var arrayFrom = Function.prototype.call.bind(Array.prototype.slice);

			   	/* const */
			   	var MKTOFORM_ID_ATTRNAME = "data-formId";

			   	/* fix inter-form label bug! */
			   	MktoForms2.whenRendered(function(form) {
			   		var formEl = form.getFormElem()[0],
			   			rando = "_" + new Date().getTime() + Math.random();
			   			jQuery('.mktoForm').removeClass().removeAttr('style');
			   			jQuery('.mktoGutter').remove();
			   			jQuery('.mktoClear').remove();
			   			jQuery('.mktoOffset').remove();
			   			jQuery('.mktoAsterix').remove();
			   			jQuery('input').css('width', '');
			   			jQuery('.mktoButtonWrap').css('margin-left', '1rem');
			   			jQuery('.mktoButton').addClass('button cta');
			   			jQuery('.mktoButton').removeClass('mktoButton');
			   			jQuery('.mktoFormCol').css('margin-bottom', '');
			   			jQuery('#filter-signup form button').html('<i class="far fa-angle-right"></i>').removeClass('button cta').addClass('mktoButton');
			   			jQuery(".email-form form button").addClass('mktoButton');
			   			jQuery('.form-wrapper').fadeIn('400');
			   			
			   			var $moveme = jQuery('.mktoFormRow:nth-of-type(10)');
			   			$moveme.parent().after($moveme);
			   			$moveme.addClass('makered');


			   		arrayFrom(formEl.querySelectorAll("label[for]")).forEach(function(labelEl) {
			   			var forEl = formEl.querySelector('[id="' + labelEl.htmlFor + '"]');
			   			if (forEl) {
			   				labelEl.htmlFor = forEl.id = forEl.id + rando;
			   			}
			   		});

			   		form.onSuccess(function(values, followUpUrl) {
			   		       // Get the form's jQuery element and hide it
			   		       var instance = form.getFormElem().attr('data-forminstance');
			   		       var response = '.response_'+instance
			   		       form.getFormElem().hide();
			   		       jQuery(response).fadeIn('400');
			   		       console.log(instance);

			   		       // Return false to prevent the submission handler from taking the lead to the follow up url
			   		       return false;
			   		   });
			   	});

			   	/* chain, ensuring only one #mktoForm_nnn exists at a time */
			   	arrayFrom(config.formIds).forEach(function(formId) {
			   		var loadForm = MktoForms2.loadForm.bind(MktoForms2,config.podId,config.munchkinId,formId),
			   			formEls = arrayFrom(document.querySelectorAll("[" + MKTOFORM_ID_ATTRNAME + '="' + formId + '"]'));

			   		(function loadFormCb(formEls) {
			   			var formEl = formEls.shift();
			   			formEl.id = "mktoForm_" + formId;

			   			loadForm(function(form) {
			   				formEl.id = "";
			   				if (formEls.length) {
			   					loadFormCb(formEls);
			   				}
			   			});
			   		})(formEls);
			   	});
			   }

			   mktoFormChain(mktoFormConfig);


			});
	</script>
<?php } ?>