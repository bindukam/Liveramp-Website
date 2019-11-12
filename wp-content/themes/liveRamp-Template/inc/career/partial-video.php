<?php
$title = get_sub_field("title");
$sub_title = get_sub_field("sub_title");
$video_url = get_sub_field("video_url");
$button_exists = get_sub_field("button_exists");

if ($button_exists):
    $first_button_text = get_sub_field("first_button_text");
    $first_button_link = get_sub_field("first_button_link");
    $first_button_color = get_sub_field("first_button_color");
    $first_button_hover_color = get_sub_field("first_button_hover_color");

    $second_button_text = get_sub_field("second_button_text");
    $second_button_link = get_sub_field("second_button_link");
    $second_button_color = get_sub_field("second_button_color");
    $second_button_hover_color = get_sub_field("second_button_hover_color");
endif;

?>

<section class="block block-text-dk bg-grey-x-lt block-angle-up">
    <div class="ctn">
        <div class="row">
            <div class="col-md-7">
                <div class="video wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                    <iframe width="100%" height="410px" src="<?php echo $video_url; ?>" frameborder="0"
                            allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1 video-content">
                <h2 class="video-title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                    <?php echo $title; ?>
                </h2>

                <h3 class="video-title-small wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                    <?php echo $sub_title; ?>
                </h3>

                <?php if ($button_exists): ?>
                    <?php if (!empty($first_button_text)): ?>
                        <div class="btn-ctn btn-inside-eng-video wow fadeInUp" data-wow-delay="300ms"
                             data-wow-duration="1.2s">
                            <a href="<?php echo $first_button_link; ?>" class="btn <?php echo 'bg-' . $first_button_color . ' ' . $first_button_hover_color . '-hover'; ?>"> <?php echo $first_button_text; ?> <span
                                    class="icon-arrow-right"></span></a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($second_button_text)): ?>
                        <div class="btn-ctn wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                            <a href="<?php echo $second_button_link; ?>"
                               class="btn btn-thin <?php echo 'bg-' . $second_button_color . ' ' . $second_button_hover_color . '-hover'; ?>"><?php echo $second_button_text; ?><span
                                    class="icon-arrow-right"></span></a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- /.ctn -->
</section>