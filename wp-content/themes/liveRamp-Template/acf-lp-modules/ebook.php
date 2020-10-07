<?php

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
$background_image = get_sub_field('background_image');
?>

<section class="hero-with-form primary-bkg ebook-top-section <?php echo get_sub_field('background_pattern'); ?>"">
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell  large-6 content">
                <div class="header-logo">
                    <a href="<?php echo site_url(); ?>" rel="nofollow" aria-label="<?php bloginfo( 'name' ); ?>"><img src="<?php echo get_sub_field('logo'); ?>"></a> 
                </div>
                <div class="cell eyebrow">
                    <div class="icon"><img src="<?php echo get_sub_field('eyebrow_icon'); ?>" /></div>
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
<?php if ($background_image): ?>
    <div id="ebook-bk-image">
        <div class="clip-svg" style="background-image:url(<?php echo $background_image; ?>);"></div>

        <svg width="0" height="0">
            <defs>
                <clippath id="myClip">
                    <circle cx="280" cy="120" r="270"></circle>
                </clippath>
            </defs>
        </svg>
    </div>
<?php endif ?>
<section class="hero-with-form ebook-bottom-section">
    <div class="hero-with-form primary-bkg ebook-float <?php echo $background_image ? 'right-space' : '';  ?>"></div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify col-wrapper">
            <div class="cell  large-6 content col-order-2">
                <?php if (get_sub_field('subheadline')): ?>
                    <div class="h2 bold subheadline"><?php the_sub_field('subheadline') ?></div>
                <?php endif ?>
                <?php if (get_sub_field('description')): ?>
                    <div class="copy"><?php the_sub_field('description') ?></div>
                <?php endif ?>
                <?php if (get_sub_field('list_headline')): ?>
                    <h4><?php the_sub_field('list_headline') ?></h4>
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
                        <div class="copy"><?php echo $copy; ?></div>
                    </div>
                    <?php endwhile ?>
                <?php endif ?>
                <?php if (get_sub_field('testimonial_quote')): ?>
                    <div class="lp-talent">
                        <div class="quote">
                            <div class="quote-text">
                                <?php the_sub_field('testimonial_quote') ?>&rdquo;
                            </div>
                            <?php if (get_sub_field('testimonial_name')): ?>
                            <div class="quote-name">
                                <?php the_sub_field('testimonial_name') ?>
                            </div>
                            <?php endif ?>
                            <?php if (get_sub_field('testimonial_logo')): ?>
                            <div class="quote-logo">
                                <?php echo wp_get_attachment_image( get_sub_field('testimonial_logo'), 'full'); ?>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            <div class="cell large-5 form-cell col-order-1">
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
                <div class="lp-talent">
                    <?php if (get_sub_field('talent_headline')): ?>
                        <h3 class="list-headline">
                            <?php the_sub_field('talent_headline') ?>
                        </h3>
                        <div class="fixed-underline">
                            <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" >
                        </div>
                    <?php endif ?>
                    <?php if (have_rows('talent_list')): ?>
                        <?php while(have_rows('talent_list')) : ?>
                        <?php the_row(); ?>
                        <?php
                                $headshot = '';
                                $logo = '';
                                $name = '';
                                $job_title = '';
                                if (get_sub_field('company_logo')) {
                                    $logo = get_sub_field('company_logo');
                                }
                                if (get_sub_field('name')) {
                                    $name = get_sub_field('name');
                                }
                                if (get_sub_field('job_title')) {
                                    $job_title = get_sub_field('job_title');
                                }
                        ?>
                        <div class="list-item">
                            <div class="item-col">
                                <div class="circle">
                                    <div class="circle"><img class="circle-image" src="<?php echo get_sub_field('headshot'); ?>" /></div>
                                </div>
                            </div>
                            <div class="item-col">
                                <div class="speaker-name">
                                    <?php echo $name; ?>
                                </div>
                                <div class="copy no-dot">
                                    <?php echo $job_title; ?>
                                </div>
                                <?php echo wp_get_attachment_image( get_sub_field('company_logo'), 'full' ); ?>
                            </div>
                        </div>
                        <?php endwhile ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
