<?php
if( have_rows('links') ):
    while ( have_rows('links') ) : the_row();
        ?><link rel="<?php echo the_sub_field('type');?>" href="<?php echo the_sub_field('href');?>" hreflang="<?php echo the_sub_field('language');?>" />
        <?php
    endwhile;
endif;
?>
