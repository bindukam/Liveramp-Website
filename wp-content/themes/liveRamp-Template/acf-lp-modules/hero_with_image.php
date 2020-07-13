<?php

$eyebrow = get_sub_field('eyebrow');

?>

<section class="primary-bkg">
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell  large-5 content">
                <div class="eyebrow <?php echo $eyebrow; ?>"><?php echo $eyebrow; ?></div>
                <?php if (get_sub_field('title')): ?>
                    <h2 class="green"><?php the_sub_field('title') ?></h2>
                 <?php endif ?>
                <?php if (get_sub_field('subheadline')): ?>
                    <h4 class="green"><?php the_sub_field('subheadline') ?></h4>
                 <?php endif ?>
                <?php if (have_rows('list')): ?>
                    <?php while(have_rows('list')) : ?>
                    <?php the_row(); ?>
                    <?php
                        $icon = '';
                        $copy = '';
                        $card = get_sub_field('card');
                        if (get_sub_field('icon')) {
                            $icon = wp_get_attachment_image( get_sub_field('icon'));
                        }
                        if (get_sub_field('copy')) {
                            $copy = get_sub_field('copy');
                        }
                    ?>
                    <div class="list-item">
                        <div class="icon"><?php echo $icon; ?></div>
                        <div class="copy"><?php echo $copy; ?></div>
                    </div>
                    <?php endwhile ?>
                <?php endif ?>

            </div>
            <div class="cell large-5 form-cell">
                <div data-sticky-container>

                    <div class="form-wrapper box-shadow-over-white b-radius white-bkg">
                        
                        <?php if (get_sub_field('form_title')): ?>
                            <h3 class="form-title"><?php get_sub_field('form_title')  ?></h3>
                        <?php endif ?>
                        
                        <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" class="pad-ul">
                        
                        <div class="caption dark-slate margin-bottom-1"><?php _translate('all_fields_required')  ?> * <?php _translate('contact_us')  ?></div>
                        
                        <script src="<?php echo get_stylesheet_directory_uri() ?>/forms2.min.js"></script>
                        
                        <?php
                            $mkto_id = get_sub_field('marketo_form_id', 'option');
                        ?>
                        
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
        </div>
    </div>


    <?php if (!get_sub_field('video_id')): ?>
    <div class="grid-x align-middle align-center video-area">
        <div class="cell text-center box-shadow-over-white b-radius no-overflow video-container">
            <script src="https://fast.wistia.com/embed/medias/<?php the_sub_field('video_id') ?>.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0px 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_sub_field('video_id') ?> videoFoam=true  box-shadow-over-white b-radius" style="height:100%;position:relative;width:100%">&nbsp;</div></div></div>
        </div>
    </div>
    <?php endif ?>
</section>

<script>
		$( document ).ready(function() {
		    console.log( "video ready!" );
		    // alert('booger');

		});
</script>
