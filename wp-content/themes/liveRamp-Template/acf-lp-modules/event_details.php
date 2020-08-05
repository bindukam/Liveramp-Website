<?php

$eyebrow = get_sub_field('eyebrow');

?>

<section class="lp-event-details">
    
    <?php if (get_sub_field('top_divider_line')): ?>
    <div class="divider-line"></div>
    <?php endif ?>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell">
                <?php if (get_sub_field('eyebrow_text')): ?>
                <h3 class="eyebrow">
                    <?php the_sub_field('eyebrow_text') ?>
                </h3>
                <?php endif ?>
            </div>
        </div>
        <div class="grid-x grid-margin-x align-justify">
            <div class="cell large-2 content">
                <?php
                $featured_date = '';
                $featured_class = '';
                if (get_sub_field('featured_event')) {
                    $featured_class = ' featured primary-bkg ';
                    $featured_date = ' featured-date ';
                }
                ?>
                <?php
                    if (get_sub_field('event_date')) {

                        $date = get_sub_field('event_date');
                        $m = date("M", strtotime($date));
                        $d = date("d", strtotime($date));

                ?>
                <div class="date <?php echo $featured_date; ?>">
                    <div class="month"><?php echo $m; ?></div>
                    <div class="day"><?php echo $d; ?></div>
                </div>

                <div class="date-info show-med-down">
                    <?php if (get_sub_field('event_time')): ?>
                    <div class="green">
                        <?php the_sub_field('event_time') ?>
                    </div>
                    <?php endif ?>
                    <div class="green">
                    <?php if (get_sub_field('event_location')): ?>
                        <?php the_sub_field('event_location') ?>
                    </div>
                    <?php endif ?>
                </div>

                <?php } ?>
                
            </div>
            <div class="cell  large-10 content">
                <div class="event-block <?php echo $featured_class; ?>">
                    <div class="col">
                        <?php if (get_sub_field('featured_event')): ?>
                        <div class="featured-title">
                            Featured Event
                        </div>
                        <?php endif ?>
                        <?php if (get_sub_field('event_time')): ?>
                        <div class="green show-for-large">
                            <?php the_sub_field('event_time') ?>
                        </div>
                        <?php endif ?>
                        <div class="green show-for-large">
                        <?php if (get_sub_field('event_location')): ?>
                            <?php the_sub_field('event_location') ?>
                        </div>
                        <?php endif ?>

                        <?php if (get_sub_field('title')): ?>
                        <div class="title h3">
                            <?php the_sub_field('title') ?>
                        </div>
                        <?php endif ?>
                        <?php if (get_sub_field('sponsor_text') && get_sub_field('sponsor_logo')): ?>
                        <div class="sponsor">
                            <span><?php the_sub_field('sponsor_text') ?></span>
                            <span class="icon"><img src="<?php the_sub_field('sponsor_logo') ?>" alt="<?php the_sub_field('sponsor_text') ?>" /></span>
                        </div>
                        <?php endif ?>
                        <?php if (get_sub_field('event_image')): ?>
                        <div class="event-image">
                            <img src="<?php the_sub_field('event_image') ?>" title="<?php the_sub_field('title') ?>" />
                        </div>
                        <?php endif ?>
                        <?php if (get_sub_field('description')): ?>
                        <div class="desc">
                            <?php the_sub_field('description') ?>
                        </div>
                        <?php endif ?>

                        <?php if (get_sub_field('speakers_headline')): ?>
                        <h3 class="list-headline">
                            <?php the_sub_field('speakers_headline') ?>
                        </h3>
                        <?php endif ?>

                        <?php 
                        if (have_rows('speakers_list')) {
                            while(have_rows('speakers_list')) {
                                the_row();
                                $speaker = '';
                                if (get_sub_field('speaker')) {
                                    $speaker = get_sub_field('speaker');
                        ?>
                                    <div class="speaker">
                                        <?php echo $speaker; ?>
                                    </div>
                        <?php   }
                            }
                        }
                        ?>

                    </div>
                    <div class="col">
                        <?php if (get_sub_field('register')): ?>
                        <div class="btn-row">
                             <a href="#" class="button cta register">Register</a>
                        </div>
                        <?php endif ?>
                        <?php if (get_sub_field('add_to_calendar')): ?>
                        <div class="btn-row">
                             <a href="#" class="button cta register">Add to calendar</a>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="cell large-5">
            </div>
        </div>
    </div>
</section>
