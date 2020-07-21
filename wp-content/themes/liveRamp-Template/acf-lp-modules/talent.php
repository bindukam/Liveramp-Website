<?php

$eyebrow = get_sub_field('eyebrow');

?>

<section class="lp-talent">
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell  large-6 content">
                <?php if (get_sub_field('title')): ?>
                    <h2 class="xx"><?php the_sub_field('title') ?></h2>
                 <?php endif ?>
                <?php if (get_sub_field('description')): ?>
                    <div class="desc"><?php the_sub_field('description') ?></div>
                 <?php endif ?>


                <?php if (get_sub_field('testimonial_quote')): ?>
                    <div class="quote"><?php the_sub_field('testimonial_quote') ?></div>
                 <?php endif ?>
                <?php if (get_sub_field('testimonial_name')): ?>
                    <div class="quote-name"><?php the_sub_field('testimonial_name') ?></div>
                 <?php endif ?>
                <?php if (get_sub_field('testimonial_logo')): ?>
                    <div class="quote"><?php the_sub_field('testimonial_logo') ?></div>
                 <?php endif ?>
            </div>
            <div class="cell large-5">
                <?php if (get_sub_field('list_headline')): ?>
                    <h5 class="list-headline"><?php the_sub_field('list_headline') ?></h5>
                 <?php endif ?>
                <?php if (have_rows('list')): ?>
                    <?php while(have_rows('list')) : ?>
                    <?php the_row(); ?>
                <?php
                        $headshot = '';
                        $logo = '';
                        $name = '';
                        $job_title = '';
                        if (get_sub_field('headshot')) {
                            $headshot = get_sub_field('headshot');
                        }
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
                        <div class="icon"><?php echo $headshot; ?></div>
                        <div class="copy"><?php echo $name; ?></div>
                        <div class="copy"><?php echo $job_title; ?></div>
                        <div class="copy"><?php echo $logo; ?></div>
                    </div>
                    <?php endwhile ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
