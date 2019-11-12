<?php
$bg_color_class = get_sub_field('background_color') ? 'bg-'.get_sub_field('background_color') : 'bg-grey-lt';
$slant = get_sub_field('slant');
?>
<section class="block <?php echo $bg_color_class . ' ' . $slant; ?>">
    <div class="ctn">
        <div class="block-icons">
            <?php
            if( have_rows('icon') ):
                while ( have_rows('icon') ) : the_row();
                    $image = get_sub_field("image");
                    $title = get_sub_field("title");
                    $title_color = get_sub_field("title_color_");
                    $link_exists = get_sub_field("link_exists");
                    if($link_exists){
                        $link = get_sub_field("link");
                    }
                    $content = get_sub_field("content");
                    $_blank = get_sub_field("open_link_in_new_window") ? '_blank' : '';
                    ?>
                    <div class="block-icon-ctn wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">
                        <?php if($link_exists): ; ?> <a target="<?php echo $_blank; ?>" href="<?php echo $link; ?>"> <?php endif; ?>
                            <div class="icon-self">
                                <img src="<?php echo $image; ?>" alt=""/>
                            </div>
                            <h4 class="icon-title <?php echo $title_color; ?>"> <?php echo $title; ?></h4>
                            <?php if($link_exists): ; ?> </a> <?php endif; ?>
                        <p class="icon-cnt">
                            <?php echo $content; ?>
                        </p>
                    </div>

                <?php

                endwhile;
            endif;
            ?>
        </div>
    </div>
</section> <!-- /.facilities -->