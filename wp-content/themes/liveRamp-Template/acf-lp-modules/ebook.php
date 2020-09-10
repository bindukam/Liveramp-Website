<?php

$theme_uri = get_stylesheet_directory();
$theme_images = $theme_uri.'/dist/assets/images';
$theme_svg = $theme_images.'/svg';
$mkto_id = get_sub_field('marketo_form_id', 'option');

$form_submit_landing_page = get_sub_field('form_submit_landing_page');

$cta_type = get_sub_field('cta_type');
if($cta_type == 'none') {
    $cta_text = '';
    $cta_url = '';
    $cta_target = '';
} else if($cta_type == 'media') {
    $cta_media_file = get_sub_field('cta_media_file');
    $cta_text = get_sub_field('cta_text');
    $cta_url = '?file';
    $cta_target = '_blank';
} else if($cta_type == 'page') {
    $cta_text = get_sub_field('cta_text');
    $cta_url = get_sub_field('cta_landing_page');
    $cta_target = '';
} else if($cta_type == 'url') {
    $cta_text = get_sub_field('cta_url')['title'];
    $cta_url = get_sub_field('cta_url')['url'];
    $cta_target = get_sub_field('cta_url')['target'];
}

$gated_asset = get_sub_field('gated_asset');
if($gated_asset) {
    $parent_form_page = get_sub_field('parent_form_page');
}
?>

<section class="hero-with-form primary-bkg ebook-top-section <?php echo get_sub_field('background_pattern'); ?>"">
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell  large-6 content">
                <div class="header-logo">
                    <a href="<?php echo site_url(); ?>" rel="nofollow" aria-label="<?php bloginfo( 'name' ); ?>"><?php echo file_get_contents("$theme_svg/lr_logo.svg"); ?></a> 
                </div>
                <div class="cell eyebrow">
                    <div class="icon"><img src="<?php echo get_sub_field('eyebrow_icon'); ?>"></div>
                    <div class="copy green"><?php echo get_sub_field('eyebrow_text'); ?></div>
                </div>
                <?php if (get_sub_field('title')): ?>
                    <h1 class="green"><?php the_sub_field('title') ?></h1>
                <?php endif ?>
                <?php if ($cta_text !== '' && $cta_url !== ''): ?>
                    <div class="cta">
                        <a href="<?php echo $cta_url ?>" class="button text white cta" target="<?php echo $cta_target ?>"><?php echo $cta_text?></a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
<section class="hero-with-form ebook-bottom-section">
    <div class="hero-with-form primary-bkg ebook-float"></div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell  large-6 content">
                <?php if (get_sub_field('subheadline')): ?>
                    <div class="h3 bold subheadline"><?php the_sub_field('subheadline') ?></div>
                <?php endif ?>
                <?php if (get_sub_field('description')): ?>
                    <div class="copy"><?php the_sub_field('description') ?></div>
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
                    <div class="cell list-item green-bkg">
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
                            <div class="fixed-underline">
                                <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" >
                            </div>
                        <?php endif ?>
                        
                        <?php if (get_sub_field('form_image')): ?>
                        <div class="form-image">
                            <?php echo wp_get_attachment_image( get_sub_field('form_image'), 'full', false, array( "class" => "b-radius")); ?>
                        </div>
                        <?php endif ?>
                        
                        <div class="caption dark-slate margin-bottom-1"><?php _translate('all_fields_required')  ?> * </div>
                        
                        <?php
                            $gf_id = get_sub_field('gravity_form_id');
                            if($gf_id) {
                                gravity_form($gf_id, false, false, false, null, false, 12);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
