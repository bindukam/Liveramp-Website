<!-- new092920 -->
<section class="carded_2_up_landscape pad-section pale-blue-bkg">

	<div class="grid-container">

		<div class="grid-x intro">

			<?php if (1||(get_sub_field('title')) || (get_sub_field('description'))): ?>
				<div class="cell medium-9 small-12 text-center">
					
					<div class="lsh-intro_icon">
						<img src="https://assets.website-files.com/5f24978228a63bcebae76027/5f4ef13b33ab646641c826a4_icon_section-intro_what-can-i-do-with-safe-haven%402x.png" alt="What can I do with Safe Haven?" class="icon_what-is-data-connectivity">
					</div>
					
					<div class="intro_icon_divider">
						<div class="icon-divider--item divider--orange"></div>
						<div class="icon-divider--item divider--orange-tint"></div>
					</div>
					
					 <h2 class="green">What can I do with Safe Haven?<?php the_sub_field('title') ?></h2>
				
				</div>
			<?php endif ?>

		</div>

		<div class="grid-x cards">
			<?php $xx=0;if (1||have_rows('cards')): ?>
			    <?php while(++$xx<3 || have_rows('cards')) : ?>
			    <?php the_row(); ?>
			    	<div class="cell card4 z-5-r">
			    		<div class="grid-x grid-padding-x grid-padding-y box-shadow-over-white b-radius">
			    			<div class="cell large-12 medium-12 small-12 content" data-equalizer-watch='foo'>
			    				<div class="text">
			    					<h3 class='title'>Audience-building<?php the_sub_field('title') ?></h3>
			    					<div class="card_title-divider divider--orange"></div>
			    					Cookies are disappearing, and you need a new marketing foundation to build upon for the next decade. Safe Haven preserves your audience data investment and creates powerful collaborative opportunities to safely and securely grow a more accurate, dynamic view of your customers.
			    					<?php the_sub_field('content') ?>
			    				</div>

								<?php if (1|| get_sub_field('cta') ) : ?>
				    				<div class="cta">
				    					<?php

				    						$url = get_sub_field('cta')['url'];
				    						$title = get_sub_field('cta')['title'];
				    						$target = get_sub_field('cta')['target'];

				    					 ?>
				    					 <a href="<?php echo $url ?>" class="button" target="<?php echo $target ?>"><?php echo $title ?>Learn More</a>
				    				</div>
								<?php endif; ?>
			    			</div>
			    		</div>
			    	</div>
			    <?php endwhile ?>
			<?php endif ?>
		</div>

	</div>

</section>
