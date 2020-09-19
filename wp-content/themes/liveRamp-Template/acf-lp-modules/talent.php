<?php

$eyebrow = get_sub_field('eyebrow');

?>

<section class="lp-talent pad-section">
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell  large-6 content">
                <?php if (get_sub_field('title')): ?>
                <h2 class="title">
                    <?php the_sub_field('title') ?>
                </h2>
                <?php endif ?>
                <?php if (get_sub_field('description')): ?>
                <div class="desc">
                    <?php the_sub_field('description') ?>
                </div>
                <?php endif ?>


                <?php if (get_sub_field('testimonial_quote')): ?>
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
                        <?php echo wp_get_attachment_image( get_sub_field('testimonial_logo'), 'full', '',array( "class" => "circle-image" ) ); ?>
                    </div>
                    <?php endif ?>
                </div>
                <?php endif ?>
            </div>
            <div class="cell large-5">
                <?php if (get_sub_field('list_headline')): ?>
                <h3 class="list-headline">
                    <?php the_sub_field('list_headline') ?>
                </h3>
                <div class="fixed-underline">
                    <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" >
                </div>
                <?php endif ?>
                <?php if (have_rows('list')): ?>
                <?php while(have_rows('list')) : ?>
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
                        BEFORE
                        <div class="circle">
                            <?php echo wp_get_attachment_image( get_sub_field('headshot'), 'full', false, array( "class" => "circle-image" ) ); ?>
                        </div>
                        AFTER
                    </div>
                    <div class="item-col">
                        BEFORE
                        <div class="speaker-name">
                            <?php echo $name; ?>
                        </div>
                        <div class="copy">
                            <?php echo $job_title; ?>
                        </div>
                        <?php echo wp_get_attachment_image( get_sub_field('company_logo'), 'full' ); ?>
                        AFTER
                    </div>
                </div>
                <?php endwhile ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
