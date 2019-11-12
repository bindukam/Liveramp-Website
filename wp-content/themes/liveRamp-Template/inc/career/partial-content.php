<?php
$title = get_sub_field( 'title' );
$content= get_sub_field( 'content' );
$text_color_class = get_sub_field('text_dark') ? 'text-dk' : 'text-lt';
$bg_color_class = get_sub_field('background_color') ? 'bg-'.get_sub_field('background_color') : 'bg-white';
?>
<section class="block <?php echo $text_color_class . ' '. $bg_color_class; ?>">
    <div class="ctn">
                <header class="header-block">
                    <h1 class="title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s"> <?php echo $title; ?> </h1>
                    <?php if(!empty($content)): ?>
                        <h3 class="subtitle slogan text-black wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1.2s">
                            <?php echo $content; ?>
                        </h3>
                    <?php endif; ?>
                    <?php echo CareerBlockUtility::get_button(); ?>
                </header>
    </div>
    <!-- /.ctn -->
</section>
