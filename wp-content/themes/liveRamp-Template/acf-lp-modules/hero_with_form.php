<?php

$theme_uri = get_stylesheet_directory();
$theme_images = $theme_uri.'/dist/assets/images';
$theme_svg = $theme_images.'/svg';

?>

<section class="hero-with-form primary-bkg">
    <div class="grid-container green-bkg">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell">
                <div class="header-logo">
                    <a href="<?php echo site_url(); ?>" rel="nofollow" aria-label="<?php bloginfo( 'name' ); ?>"><?php echo file_get_contents("$theme_svg/lr_logo.svg"); ?></a> 
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell  large-6 content">
                <div class="cell eyebrow">
                    <div class="icon" style="background-image:url(<?php echo get_sub_field('eyebrow_icon'); ?>);"></div>
                    <div class="copy green"><?php echo get_sub_field('eyebrow_text'); ?></div>
                </div>
                <?php if (get_sub_field('title')): ?>
                    <h1 class="green"><?php the_sub_field('title') ?></h1>
                 <?php endif ?>
                <?php if (get_sub_field('list_headline')): ?>
                    <h4 class="green"><?php the_sub_field('list_headline') ?></h4>
                 <?php endif ?>
                <?php if (have_rows('list')): ?>
                    <?php while(have_rows('list')) : ?>
                    <?php the_row(); ?>
                    <?php
                        $icon = '';
                        $copy = '';
                        $card = get_sub_field('card');
                        if (get_sub_field('icon')) {
                            $icon = get_sub_field('icon');
                        }
                        if (get_sub_field('copy')) {
                            $copy = get_sub_field('copy');
                        }
                    ?>
                    <div class="cell list-item">
                        <div class="icon" style="background-image:url(<?php echo $icon; ?>);"></div>
                        <div class="copy green"><?php echo $copy; ?></div>
                    </div>
                    <?php endwhile ?>
                <?php endif ?>

            </div>
            <div class="cell large-5 form-cell">
                <div data-sticky-container>

                    <div class="form-wrapper box-shadow-over-white b-radius white-bkg">
                        
                        <?php if (get_sub_field('form_title')): ?>
                            <div class="h3 form-title dark-gray"><?php echo get_sub_field('form_title')  ?></div>
                        <?php endif ?>
                        
                        <div class="fixed-underline">
                            <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" >
                        </div>
                        
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
</section>
