<!-- new092920 -->
<section class="carded_white_bg_icon_text">
    <div class="grid-container">
        
        <?php include ('modules-parts/card-intro.php') ?>

        <div class="grid-x">
            <ul role="list" class="cards">
                <?php if (have_rows('cards')): ?>
                    <?php while(have_rows('cards')) : the_row(); ?>
                        <li class="cards_item">
                            <div class="cards_item_inner">
                                <div class="card_icon-container"><img loading="lazy" src=" <?php the_sub_field('icon') ?>" class="card_icon--large"></div>
                                <div class="card_title-divider-container">
                                    <h4 class="card_title lsh-card_title green"><?php the_sub_field('title') ?></h4>
                                    <div class="card_title-divider divider--orange"></div>
                                </div>
                                <p class="card_text">
                                    <?php the_sub_field('text') ?>
                                </p>
                            </div>
                        </li>
                    <?php endwhile ?>
                <?php endif ?>
            </ul>
        </div>
</section>