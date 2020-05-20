<div class="bm-new-section grid-container"> 
    <div class="bm-section-outer"> 
        <?php if (have_rows('ctas')): ?>
            <?php while(have_rows('ctas')) : ?>
            <?php the_row(); ?>
                <div class="bm-section-inr"> 
                    <?php 
                        $title = get_sub_field('title');
                        $desc = get_sub_field('desc');
                        $url = get_sub_field('url');
                        $url_title = get_sub_field('url_title');
                        $target = get_sub_field('target');
                     ?>
                    <h2 class="bm-heading green"><?php echo $title ?></h2> 
                    <p class="bm-content"><?php echo $desc ?></p> 
                    <a href="<?php echo $url ?>" class="bm-cta" <?php echo ($target) ? ' target="_blank"':''; ?>><?php echo $url_title ?></a> 
                </div>
            <?php endwhile ?>   
        <?php endif ?>
    </div> 
</div>