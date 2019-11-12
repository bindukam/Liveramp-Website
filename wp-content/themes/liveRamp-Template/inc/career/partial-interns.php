<section class="block block-text-dk bg-grey-x-lt interns-say-body">
    <div class="ctn">
        <?php
        if( have_rows('each_intern') ):
            while ( have_rows('each_intern') ) : the_row();
                $name = get_sub_field("name");
                $image = get_sub_field("image");
                $message = get_sub_field("message");
                $link = get_sub_field("link");
                $link_text = get_sub_field("link_text");

                ?>
                <div class="row intern">
                    <div class="col-sm-4 intern-image-container">
                        <img class="intern-image wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s"  src="<?php echo $image; ?>" alt=""/>
                    </div>
                    <div class="col-sm-8 intern-content wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                        <h2 class="intern-title text-blue"><?php echo $name; ?></h2>
                        <p><?php echo $message; ?></p>
                        <div class="btn-ctn">
                            <a href="<?php echo $link; ?>" class="btn bg-blue blue-grey-hover"><?php echo $link_text; ?><span class="icon-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <!--.intern-->

            <?php

            endwhile;
        endif;
        ?>

    </div>
    <!-- /.ctn -->
</section>