<?php

$theme_uri = get_stylesheet_directory();
$theme_images = $theme_uri.'/dist/assets/images';
$theme_svg = $theme_images.'/svg';

?>

<section class="hero-with-form primary-bkg with-image-block">
    <div class="grid-container ">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell green-bkg large-4">
                <div class="header-logo">
                    <a href="<?php echo site_url(); ?>" rel="nofollow" aria-label="<?php bloginfo( 'name' ); ?>"><?php echo file_get_contents("$theme_svg/lr_logo.svg"); ?></a> 
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell large-4 content">
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
            <div class="cell large-7 form-cell">
                <div data-sticky-container>
                    <div class="form-wrapper box-shadow-over-white b-radius white-bkg">
                        <div class="form-image">
                            <?php echo wp_get_attachment_image( get_sub_field('image'), 'full', false, array( "class" => "b-radius")); ?>
                        </div>
                        <?php if (get_sub_field('cta')):

                            $url = get_sub_field('cta')['url'];
                            $title = get_sub_field('cta')['title'];
                            $target = get_sub_field('cta')['target'];
                        ?>
                            <div class="cta">
                                <a href="<?php echo $url ?>" class="button text white cta" target="<?php echo $target ?>"><?php echo $title ?></a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
