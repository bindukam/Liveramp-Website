
<section class="landing  text-lt" style="background-image: url(<?php echo get_sub_field("banner_image"); ?>);">
    <div class="ctn">
        <?php if( have_rows('title') ):
            while ( have_rows('title') ) : the_row();
                echo '<h1 class="title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s">' .   get_sub_field('heading') . '</h1>';
            endwhile;
        endif; ?>
        <h3 class="subtitle wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1.2s"> <?php echo get_sub_field( 'content' ); ?> </h3>
        <?php  echo CareerBlockUtility::get_button(); ?>
    </div>
</section> <!-- /.landing  -->

