<?php

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

$c = "d";

?>

<section class="hero-with-form primary-bkg with-image-block <?php echo get_sub_field('background_pattern'); ?>"">
    <div class="grid-container ">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell green-bkg large-4">
                <div class="header-logo">
                    <a href="<?php echo site_url(); ?>" rel="nofollow" aria-label="<?php bloginfo( 'name' ); ?>"><img src="<?php echo get_sub_field('logo'); ?>"></a> 
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell large-4 content">
                <?php if (get_sub_field('title')): ?>
                    <h1 class="headline green bar-<?php the_sub_field('horizontal_bar') ?>"><?php the_sub_field('title') ?></h1>
                <?php endif ?>
                <?php if (get_sub_field('subheadline')): ?>
                    <div class="h3 bold green subheadline"><?php the_sub_field('subheadline') ?></div>
                <?php endif ?>
                <?php if (get_sub_field('description')): ?>
                    <div class="copy green"><?php the_sub_field('description') ?></div>
                <?php endif ?>
            </div>
            <div class="cell large-7 form-cell">
                <div data-sticky-container>
                    <div class="form-wrapper box-shadow-over-white b-radius white-bkg">
                        <div class="form-image">
                            <?php echo wp_get_attachment_image( get_sub_field('image'), 'full', false, array( "class" => "b-radius")); ?>
                        </div>
                        <?php if ($cta_text !== '' && $cta_url !== ''): ?>
                            <div class="cta">
                                <a href="<?php echo $cta_url ?>" class="button text white cta" target="<?php echo $cta_target ?>"><?php echo $cta_text?></a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
