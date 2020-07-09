<section class="image_and_text_module pad-section">

	<?php
	if (get_sub_field('image')):
		$hide = '';
		$center = '';
		$size = 'medium-6';
	else:
		$hide = ' hide';
		$center = ' align-center text-center no-image';
		$size = 'medium-9';
	endif;

	if (get_sub_field('flip_module') === true):
		$orderContent = 'medium-order-2';
		$orderImage = 'medium-order-1';
		$flipped = ' flipped';
	else:
		$orderContent = 'medium-order-1';
		$orderImage = 'medium-order-2';
		$flipped = '';
	endif;

	?>
	

	<div class="grid-container">
		<div class="grid-x grid-padding-x align-top<?php echo $center; echo $flipped; ?>">
			<div class="<?php echo $size ?> cell content small-order-2 <?php echo $orderContent ?>">
				
				<?php if (get_sub_field('title')): ?>
					<div class="title_area">
						<h2 class="title">
							<?php the_sub_field('title') ?>
						</h2>
					</div>
					
				<?php endif ?>
				

				<?php if (get_sub_field('description')): ?>
					<?php the_sub_field('description'); ?>
				<?php endif ?>
				<?php if (get_sub_field('description_cont')): ?>
					<p class="tag1"><?php the_sub_field('description_cont'); ?>	</p>
				<?php endif ?>
				<?php if (get_sub_field('cta')):

					$url = get_sub_field('cta')['url'];
					$title = get_sub_field('cta')['title'];
					$target = get_sub_field('cta')['target'];

				?>
				<a href="<?php echo $url ?>" class="button cta outline tag2" target="<?php echo $target ?>"><?php echo $title ?></a>
				<?php endif ?>
			</div>
			<div class="cell align-top medium-6 image-container small-order-1 <?php echo $orderImage . $hide ?>">
				<div class="image-area">
                    <?php echo wp_get_attachment_image( get_sub_field('image'), 'full', '',array( "class" => "b-radius tab-image" ) ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
