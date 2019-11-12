<section class="careers-collage block">
	<div class="ctn">
		<div class="masonry-ctn">
			<?php while (have_rows('collage_item')): the_row(); ?>
			<div class="collage-item" style="background-image: url(<?php echo get_sub_field( 'image' ); ?>)">
				<div class="collage-item-overlay">
					<?php echo get_sub_field( 'content' ); ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>