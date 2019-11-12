<aside class="sidebar">
	<?php if ( get_sub_field( 'sidebar_media_type' ) == 'image' ): ?>
	<figure class="sidebar-media">
		<img src="<?php echo get_sub_field( 'sidebar_media' ); ?>" alt="">
		<figcaption>
			<p><?php echo get_sub_field( 'sidebar_media_caption' ); ?></p>
		</figcaption>
	</figure>
	<?php endif; ?>
	<ul class="asset-list">
	<?php while (have_rows( 'sidebar' )): the_row(); ?>
		<li class="asset-item">
			<?php $link = get_sub_field( 'custom_link' ) ? get_sub_field( 'custom_link' ) : get_sub_field( 'link' ); ?>
			<a href="<?php echo $link; ?>"><?php echo get_sub_field( 'name' ); ?> <span class="icon-arrow-right"></span></a>
		</li>
	<?php endwhile; ?>
	</ul>
</aside>