<?php

	$margin = 0;
	$offset = 0;

	if (get_sub_field('image_position')) :
		$offset = get_sub_field('image_position');
	endif;

	if( $offset < 0 ):
		$margin = $offset * -1;
	endif;

?>
<style>
	
	.offset {
		margin-bottom: 2em;
	}
	@media screen and (min-device-width: 1024px) {
		.offset {
			margin-bottom: <?php echo $margin ?>px;
		}
	}
	.negative-margin {
		margin-bottom: <?php echo $offset ?>px !important;

	}

	.negative-offset {
		bottom: <?php echo $offset ?>px;
	}
	.hero_linework_and_imagery .image .hero-image {
		max-height: <?php echo ( 380 + $margin ) ?>px;
	}

</style>
<section class="hero_linework_and_imagery green-bkg <?php the_sub_field('module_height') ?> offset">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center relative">
			<div class="cell large-5 content">
				<?php if (get_sub_field('title')) : ?>
					<h1 class="title white <?php if (get_sub_field('description')) : ?>title_wdescription<?php endif ?>"><?php the_sub_field('title') ?></h1>
				<?php endif ?>

				<?php if (get_sub_field('description')) : ?>
					<div class="white description">
						<?php the_sub_field('description') ?>
					</div>
				<?php endif ?>

				<?php if( get_sub_field('cta') ):  ?>
					<div class="cta">
						<?php

							$url = get_sub_field('cta')['url'];
							$title = get_sub_field('cta')['title'];
							$target = get_sub_field('cta')['target'];

						 ?>
						 <a href="<?php echo $url ?>" class="button outline" target="<?php echo $target ?>"><?php echo $title ?></a>
					</div>
				<?php endif; ?>

			</div>

			<div class="cell large-7 image negative-offset show-for-large">
				 <?php echo wp_get_attachment_image( get_sub_field('image'), '', '',array( "class" => "hero-image" ) ); ?>
			</div>

			<?php
				$align_bottom = (get_sub_field('align_mobile_to_bottom')) ? "align-self-bottom" : 'pad-1';

				$mobile_image = (get_sub_field('mobile_image')) ? get_sub_field('mobile_image') : get_sub_field('image');

				$mobile_offset = (get_sub_field('mobile_image')) ? '' : ' negative-margin';
			 ?>

			<div class="cell large-7 mobile-image hide-for-large <?php echo $align_bottom.$mobile_offset; ?>">
				 <?php echo wp_get_attachment_image( $mobile_image, '', '',array( "class" => "" ) ); ?>
			</div>

		</div>
	</div>
</section>
