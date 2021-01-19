<?php
    $theme_uri = get_template_directory_uri();
    $theme_images = $theme_uri.'/dist/assets/images';
    $theme_svg = $theme_images.'/svg';
    
    $img = get_sub_field('event_image');
    if($img) {
        $style = " background-image:url('".$img."') ";
    }
?>

<section class="lp-event-form overlay-me">
	<div class="grid-container module">
        <div class="grid-x grid-padding-x">
			<div class="cell large-6 left-col" style="<?php echo $style; ?>">
                <div class="block primary-bkg">
                    <?php if (get_sub_field('title')): ?>
                    <h2 class="green"><?php the_sub_field('title') ?></h2>
                    <?php endif ?>
                    <?php if (get_sub_field('description')): ?>
                    <div class="green"><?php the_sub_field('description') ?></div>
                    <?php endif ?>
                </div>
			</div>
			<div class="cell large-6 right-col form-cell">
                <?php
                    /* $gf_id = get_sub_field('register_gravity_form_id');
                    if($gf_id) {
                        gravity_form($gf_id, false, false, false, null, false, 12);
                    } */
					$mktFormID = get_sub_field('register_marketo_form_id');
                ?>
				<script src="//lp.liveramp.com/js/forms2/js/forms2.min.js"></script>
				<form id="mktoForm_<?php echo $mktFormID; ?>"></form>
				<script type="text/javascript">
				MktoForms2.loadForm("//lp.liveramp.com", "320-CHP-056", <?php echo $mktFormID; ?>, function(form) {
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
					jQuery('.mktoHtmlText.mktoHasWidth').css('width', '');

					//jQuery('.form-wrapper').fadeIn('400'),
				});
				
				MktoForms2.whenReady(function(form) {
					form.onSuccess(function(values, followUpUrl) {
						window.location.href = "<?php echo get_sub_field('form_submit_landing_page') ?>";
						return false;
					});
				});
				</script>
            </div>
        </div>
	</div>
</section>
<div class="lp-form-footer-overlay"></div>
