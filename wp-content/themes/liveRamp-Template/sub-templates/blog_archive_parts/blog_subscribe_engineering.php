<?php if (!empty(get_field('engineering_subscribe_form_id', 'option'))) {  ?>
	<section class="blog-subscribe">
	<div class="grid-x grid-padding-x grid-margin-x medium-blue-bkg subscribe b-radius align-middle align-center">
		<div class="cell medium-8 text-center">
			<h2 class="core-blue">Subscribe for Updates</h2>
			
			<div class="email-form text-center">
				
				<div class="response_one white" style="display:none">
					<h4>Thank you for subscribing</h4>
				</div>

				<div class="form-wrapper" style="display:none">
					
					<form class="mktoForm" data-formId="<?php echo get_field('engineering_subscribe_form_id','option') ?>" data-formInstance="one"></form>	

				</div>

			</div>

		</div>
	</div>
</section>
<?php } ?>
