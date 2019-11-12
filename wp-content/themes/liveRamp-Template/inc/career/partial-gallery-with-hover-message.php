<?php
$background_color = CareerBlockUtility::bg_color_class();
$title = get_sub_field('title');
 ?>

<section class="block liveramp-life <?php echo $background_color; ?>">
    <div class="ctn-liquid">
        <header class="header-block">
            <h1 class="title wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1.2s"><?php echo $title; ?></h1>
        </header>
        <div class="row">

            <?php
            if( have_rows('gallery_section') ):
                while ( have_rows('gallery_section') ) : the_row();
                    $title = get_sub_field("title");
                    $image = get_sub_field("image");
                    $hover_message = get_sub_field("hover_message");
                    $hover_background_color = get_sub_field("hover_background_color");
                    $link = get_sub_field("link");
                    ?>
                    <div class="col-md-4 col-sm-6 event wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                        <div class="event-image-container">
                            <a href="<?php echo $link; ?>">
                                <img class="event-image" src="<?php echo $image; ?>" alt=""/>
                                <div class="event-detail-overlay overlay">
                                    <div class="event-detail <?php echo $hover_background_color; ?>">
                                        <p class="align-vertical"> <?php echo $hover_message; ?> </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="event-title">
                            <h2><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                        </div>
                    </div>
                    <!-- /.event -->
                <?php

                endwhile;
            endif;
            ?>

        </div>
<!-- /.row -->
    </div>
</section> <!-- /.liveramp-life -->