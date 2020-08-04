<?php
$theme_uri = get_stylesheet_directory();
$theme_images = $theme_uri.'/dist/assets/images';
$theme_svg = $theme_images.'/svg';

$hero_image = get_sub_field('hero_image');
?>

<section class="lp-event-hero">
    <div class="hero-image" style="background-image: url(<?php echo $hero_image; ?>);"></div>
    <div class="grid-container ">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell large-4">
                <div class="header-logo">
                    <a href="<?php echo site_url(); ?>" rel="nofollow" aria-label="<?php bloginfo( 'name' ); ?>"><?php echo file_get_contents("$theme_svg/lr_logo.svg"); ?></a> 
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container grid-bottom">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12">
                <div class="float-bottom primary-bkg">
                    <?php if (get_sub_field('eyebrow_text')): ?>
                    <div class="eyebrow green">
                        <?php the_sub_field('eyebrow_text') ?>
                    </div>
                    <?php endif ?>
                    <div class="content">
                        <div class="col">
                            <?php if (get_sub_field('title')): ?>
                            <h1 class="headline green">
                                <?php the_sub_field('title') ?>
                            </h1>
                            <?php endif ?>
                            <?php if (get_sub_field('sponsor_text') && get_sub_field('sponsor_logo')): ?>
                            <div class="sponsor green">
                                <span><?php the_sub_field('sponsor_text') ?></span>
                                <span class="icon"><img src="<?php the_sub_field('sponsor_logo') ?>" alt="<?php the_sub_field('sponsor_text') ?>" /></span>
                            </div>
                            <?php endif ?>
                        </div>
                        <div class="col">
                            <?php if (get_sub_field('subheadline')): ?>
                            <div class="h3 bold green subheadline">
                                <?php the_sub_field('subheadline') ?>
                            </div>
                            <?php endif ?>
                            <?php if (get_sub_field('description')): ?>
                            <div class="copy green">
                                <?php the_sub_field('description') ?>
                            </div>
                            <?php endif ?>
                            <?php 
                            $booth_url = get_sub_field('cta_find_our_booth')['url'];
                            $booth_title = get_sub_field('cta_find_our_booth')['title'];
                            $booth_target = get_sub_field('cta_find_our_booth')['target'];
                            if ($booth_url): ?>
                            <div class="btn-row">
                                 <a href="#" class="button button-white booth">Find our booth</a>
                            </div>
                            <?php endif ?>
                            <?php if (get_sub_field('request_meeting')): ?>
                            <div class="btn-row">
                                 <a href="#" class="button cta solid-white register">Request a meeting</a>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
            <div class="cell large-5">
            </div>
        </div>
    </div>
</section>
