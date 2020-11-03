<!-- new092920 -->
<section class="high_impact_quote">
    <div class="grid-container full">
        <div class="grid-x">
            <div class="quote-bg-text">
                <div class="quote-bg-text_inner">
                    <div class="quote-bg-text_item">
                    	<?php the_sub_field('background_quote') ?>
					</div>
				</div>
            </div>
            <div class="quote-pattern--radial--large">
            	<?php include ('modules-parts/high-impact-quote-svg.php') ?>
            </div>
            <div class="quote-container">
                <blockquote class="wbf-block-quote">
                    <p><?php the_sub_field('main_quote') ?></p>
                </blockquote>
                <div class="txt-with-divider">
                    <div class="txt-with-divider--item divider--light-blue"></div>
                </div>
                <h5 class="quote-caption"><?php the_sub_field('credit') ?></h5>
            </div>
        </div>
    </div>
</section>