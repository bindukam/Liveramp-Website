<?php

$theme_uri = get_stylesheet_directory();
$theme_images = $theme_uri.'/dist/assets/images';
$theme_svg = $theme_images.'/svg';

?>

<section class="hero-with-form primary-bkg media">
    <div class="grid-container ">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell green-bkg large-4 small-6">
                <div class="header-logo">
                    <a href="<?php echo site_url(); ?>" rel="nofollow" aria-label="<?php bloginfo( 'name' ); ?>"><?php echo file_get_contents("$theme_svg/lr_logo.svg"); ?></a> 
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell large-6 content">
                <div class="cell eyebrow">
                    <div class="icon"><img src="<?php echo get_sub_field('eyebrow_icon'); ?>"></div>
                    <div class="copy green"><?php echo get_sub_field('eyebrow_text'); ?></div>
                </div>
                <?php if (get_sub_field('title')): ?>
                    <h1 class="headline green"><?php the_sub_field('title') ?></h1>
                <?php endif ?>
                <?php if (get_sub_field('subheadline')): ?>
                    <div class="h3 bold green subheadline"><?php the_sub_field('subheadline') ?></div>
                <?php endif ?>
                <?php if (get_sub_field('description')): ?>
                    <div class="copy green"><?php the_sub_field('description') ?></div>
                <?php endif ?>
            </div>
            <?php
                $mkto_id = get_sub_field('marketo_form_id', 'option');
            ?>
            <?php if ($mkto_id): ?>
            <div class="cell large-5 form-cell">
                <div data-sticky-container>

                    <div class="form-wrapper box-shadow-over-white b-radius white-bkg">
                        
                        <?php if (get_sub_field('form_title')): ?>
                            <div class="h3 form-title dark-gray"><?php echo get_sub_field('form_title')  ?></div>
                        <?php endif ?>
                        
                        <div class="fixed-underline">
                            <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" >
                        </div>
                        
                        <div class="caption dark-slate margin-bottom-1"><?php _translate('all_fields_required')  ?> *</div>
                        
                        <script src="<?php echo get_stylesheet_directory_uri() ?>/forms2.min.js"></script>
                        
                        <form id="mktoForm_<?php echo $mkto_id; ?>"></form>
                        <script>
                            MktoForms2.loadForm("//app-sj25.marketo.com", "320-CHP-056", <?php echo $mkto_id; ?>, function(form) {
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
                                jQuery('.mktoFieldDescriptor').css('margin-bottom', '')
                                jQuery('.form-wrapper').fadeIn('400'),
                                form.onSuccess(function(values, followUpUrl) {});
                            });
                        </script>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</section>


<?php
    $media_type = get_sub_field('media_type');
    $video_id = get_sub_field('video_id');
    $ss = get_sub_field('slideshare_ss');
?>
<section class="hero-with-form media-bottom-section">
    <div class="hero-with-form primary-bkg media media-float"></div>
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
