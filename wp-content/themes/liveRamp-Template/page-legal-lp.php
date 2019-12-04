<?php /* Template Name: Legal LP */ ?>

<?php get_header(); ?>

<?php include('acf-loop.php'); ?>
<script>

//FREEZE FLOATING FORM ON WHEN FOOTER REACHES FOLD
$(document).ready(function() {
    var $floating_form_floater = $('.floating-form.floater');
    var $floating_form_sticker = $('.floating-form.sticker');
    var rect = {};
    var footer_top_window = 0;
    var window_height = 0;
   


    function isElementInViewport (el, dir ) {

        //special bonus for those using jQuery
        if (typeof jQuery === "function" && el instanceof jQuery) {
            el = el[0];
        }

console.log(dir);

        rect = el.getBoundingClientRect();
        footer_top_window = rect.top;
        window_height = window.innerHeight;
        
        console.log('Window Height',window_height);
        console.log('Footer to Top',footer_top_window);

        if ( (dir=='Down') && (footer_top_window < window_height) ) {
            //$('body').css('background-color','red');
           	$floating_form_floater.hide();
           	$floating_form_sticker.css('visibility','visible')

        }
        if ( (dir=='Up') && (footer_top_window > window_height) ) {
            //$('body').css('background-color','yellow');
            $floating_form_floater.show();
            $floating_form_sticker.css('visibility','hidden')

        }
    }
    var position = $(window).scrollTop(); 

    $(window).scroll(function() { 
        var scroll = $(window).scrollTop(); 
        if (scroll > position) { 
            //console.log('scrollDown');
            isElementInViewport ($('#footer'), 'Down');
        } else { 
            //console.log('scrollUp'); 
            isElementInViewport ($('#footer'), 'Up');
        } 
        position = scroll; 
    }); 
});

$(document).ready(function() {
	//$('#popoup-overlay').show().css('position','fixed').prependTo($('body'));

	$('#click-open-popup_a, #click-open-popup_b').click(
		function () {
			$.colorbox({ inline: true, width: '100%', href: '#mobile-popup', fixed: false, top: true });
		}
	)
	$('#click-close').click(
		(e) => {$(e.target).parent().hide();return false;}
	);

});
</script>
<div class="floating-form floater">
	
	<div class="grid-container">
		<a class="lp-legal button" id="click-open-popup_a"><?php the_field('button_label') ?></a>

		<div class="message-legal">
			<p><?php the_field('button_message') ?></p>
		</div>
	</div>

</div>	
<div class="floating-form sticker" style="visibility: hidden;position: static">
	
	<div class="grid-container">
		<a class="lp-legal button" id="click-open-popup_b"><?php the_field('button_label') ?></a>

		<div class="message-legal">
			<p><?php the_field('button_message') ?></p>
		</div>
	</div>

</div>	

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/standalone-pages/assets/colorbox/example3/colorbox.css">
<script src="<?php echo get_template_directory_uri() ?>/standalone-pages/assets/colorbox/jquery.colorbox.js"></script>
<script src="https://lp.liveramp.com/js/forms2/js/forms2.min.js"></script>

<div style="display:none">
    <div id="mobile-popup">
		<div class="marketo_form" >

			<div class="form-intro">
				<p><?php the_field('button_message') ?></p>
				<p><?php the_field('form_message') ?></p> 
			</div>

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