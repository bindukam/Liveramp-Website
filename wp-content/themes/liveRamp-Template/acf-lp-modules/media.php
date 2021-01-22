<!-- LP Standard Media -->
<?php
    $media_type = get_sub_field('media_type');
    $video_id = get_sub_field('video_id');
    $ss = get_sub_field('slideshare_ss');
?>
<section class="hero-with-form media-section <?php echo $media_type; ?>">
    <div class="media-wrapper primary-bkg <?php echo get_sub_field('background_pattern'); ?>">
        <div class="grid-container ">
            <div class="grid-x grid-margin-x align-justify">
                <div class="cell green-bkg large-4 small-6">
                    <div class="header-logo">
                        <a href="<?php echo site_url(); ?>" rel="nofollow" aria-label="<?php bloginfo( 'name' ); ?>"><img src="<?php echo get_sub_field('logo'); ?>"></a> 
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-justify">
                <div class="cell large-lp-5 form-cell 11">
                    <div class="cell eyebrow">
                        <div class="icon"><img src="<?php echo get_sub_field('eyebrow_icon'); ?>" /></div>
                        <div class="copy green"><?php echo get_sub_field('eyebrow_text'); ?></div>
                    </div>
                    <?php if (get_sub_field('title')): ?>
                        <h1 class="headline green"><?php the_sub_field('title') ?></h1>
                    <?php endif ?>
                    <?php if (get_sub_field('subheadline')): ?>
                        <div class="h2 bold green subheadline"><?php the_sub_field('subheadline') ?></div>
                    <?php endif ?>
                    <?php if (get_sub_field('description')): ?>
                        <div class="copy green"><?php the_sub_field('description') ?></div>
                    <?php endif ?>
                </div>
                <?php
                    //$gf_id = get_sub_field('gravity_form_id');
                    // if($gf_id) {
					$mktFormID = get_sub_field('marketo_form_id');
					if($mktFormID) {
                ?>
                <div class="cell large-5 form-cell">
                    <div data-sticky-container>
                        <div class="form-wrapper box-shadow-over-white b-radius white-bkg">
                            <?php
                                //gravity_form($gf_id, false, false, false, null, true, 12);
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
                <?php
                   }
                ?>
            </div>
        </div>
    </div>
    <div class="grid-container media-video">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell ">
                <?php 
                    if ($media_type == 'video') {
                        if ($video_id) { 
                ?>
                        <script src="https://fast.wistia.com/embed/medias/<?php echo $video_id ?>.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0px 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php echo $video_id; ?> videoFoam=true  box-shadow-over-white b-radius" style="height:100%;position:relative;width:100%">&nbsp;</div></div></div>
                <?php   }
                    } else {
                        if ($ss) {
                ?>
                            <div class="ss-iframe-wrapper">
                            <?php echo lrlp_slideshare($ss); ?>
                            </div>
                <?php 
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>
