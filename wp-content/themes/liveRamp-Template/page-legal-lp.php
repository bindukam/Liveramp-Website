<?php /* Template Name: Legal LP */ ?>

<?php get_header(); ?>

<?php include('acf-loop.php'); ?>

<script>

//FREEZE FLOATING FORM ON WHEN FOOTER REACHES FOLD
$(document).ready(function() {
    var $windo = $(window);
    var $footer = $('#footer');
    var $floating_form = $('.floating-form');
    
    var windo_height = $windo.height();
    var footer_offset_top = $footer.offset().top;
    var floating_form_height = $floating_form.height();

    $(document).scroll(function() {
        
        var scroll_distance = Math.round($windo.scrollTop());

	    if (footer_offset_top - windo_height + floating_form_height - scroll_distance < 0) {
	        $floating_form.css ('position','static');
	    } else {
	        $floating_form.css ('position','fixed');
	    }
    })
});

$(document).ready(function() {
	//$('#popoup-overlay').show().css('position','fixed').prependTo($('body'));

	$('#click-open-popup').click(
		() => {$('#popoup-overlay').show().css('position','fixed').prependTo($('body'));}
	)
	$('#click-close').click(
		(e) => {$(e.target).parent().hide();return false;}
	);


});
</script>

<div class="floating-form">
	
	<div class="grid-container">
		<div class="mktoButtonRow"><span class="mktoButtonWrap mktoRound" style=""><button type="submit" class="mktoButton button cta" id="click-open-popup"><?php the_field('button_label') ?></button></span></div>
		<div class="message-legal">
			<p><?php the_field('button_message') ?></p>
		</div>
	</div>

	<div id="popoup-overlay">

		<img src="/wp-content/themes/liveRamp-Template/dist/assets/images/icon-close_white_100x100.png" alt="" id="click-close">
		
		<div class="marketo_form">

			<div class="form-intro">
				<p><?php the_field('button_message') ?></p>
				<p><?php the_field('form_message') ?></p> 
			</div>

			<script src="https://lp.liveramp.com/js/forms2/js/forms2.min.js"></script>
										
			<form id="mktoForm_3923"></form>
			
			<script>
				MktoForms2.loadForm("https://lp.liveramp.com", "320-CHP-056", 3923, function(form) {
				    jQuery('form').removeClass().removeAttr('style');
				    jQuery('.mktoForm').css('width', '100%');
				    jQuery('.mktoGutter').remove();
				    jQuery('.mktoClear').remove();
				    jQuery('.mktoOffset').remove();
				    jQuery('.mktoAsterix').remove();
				    jQuery('.mktoLabel').css('width', '');
				    jQuery('input').css('width', '');
				    jQuery('.mktoButtonWrap').css('margin-left', '');
				    jQuery('.mktoButton').addClass('button cta');
				    jQuery('.mktoFieldDescriptor').css('margin-bottom', '');
				    jQuery('.mktoFormRow').eq(4).hide();
				    jQuery('.mktoFormRow').eq(5).hide();
				    jQuery('.mktoFormRow').eq(6).hide();

				    jQuery('.form-wrapper').fadeIn('400'),
				    form.onSuccess(function(values, followUpUrl) {});
				});
			</script>
		</div>
	</div>
</div>
<?php get_footer(); ?>