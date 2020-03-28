<?php

	$main_title = get_sub_field('title');
	$main_description = get_sub_field('description');


 ?>

<!-- CARD LAYOUT -->
<?php function cards() {  ?>

	<div class="cell medium-4 cards-wrapper">
		<div class="foo box-shadow-over-white" data-equalizer-watch="mcfoo">
			<div class="grid-x grid-padding-x grid-padding-y cards-cell">
				<div class="cell card-title">
					<h4><?php the_sub_field('title') ?></h4>
				</div>
				<div class="cell card-description">
					<div class="description">
						<?php the_sub_field('description') ?>
						<?php if( get_sub_field('cta') ) :

									$url = get_sub_field('cta')['url'];
									$title = get_sub_field('cta')['title'];
									$target = get_sub_field('cta')['target'];
							 ?>
							  <a href="<?php  echo $url; ?>" class="flex-m" target="<?php echo $target ?>"><?php echo $title ?>
		  						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/arrow.svg" alt="" class="arrow"></a>
						  <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
}

?>
<!-- END CARD LAYOUT  -->

<section class="carded_multicard_long_layout pad-1 diagonal-lines">
	<div class="grid-container">
		<div class="section-title">
			<div class="medium-4 cards-wrapper main-cell">
				<div class="foo main">
					<h2 class="title"><?php echo $main_title ?></h2>
					<img src="" alt="" class="divider">
					<?php echo $main_description; ?>
				</div>
			</div>
		</div>

		<div class="mobile-module-slider" data-equalizer="mcfoo">
			<?php if (have_rows('cards')): ?>
				<!-- <?php $i = 1;  ?> -->
			    <?php while(have_rows('cards')) : ?>

			    	<!-- <?php the_row(); ?>				  -->
					<?php cards(); ?>

			    <?php endwhile ?>
			<?php endif ?>
		</div>

	</div>
</section>
