<div class="jumpoff-logos">
	<h2>Integrated with:</h2>
	<ul class="jumpoff-logos-list">
		<?php while (have_rows( 'jumpoff_images' )): the_row(); ?>
		<li class="jumpoff-logo-ctn">
			<img src="<?php echo get_sub_field( 'image' ); ?>">
		</li>
		<?php endwhile; ?>
	</ul>
</div>
