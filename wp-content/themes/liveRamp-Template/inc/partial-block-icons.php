<div class="block-icons">
	<?php while (have_rows( 'icons' )): the_row(); ?>
	<div class="block-icon-ctn">
		<?php if ( is_front_page() ): ?>
		<a href="<?php echo get_sub_field( 'page_link' ); ?>">
		<?php endif; ?>
			<div class="icon-self bg-<?php echo get_sub_field( 'icon_color' ); ?>">
				<?php include dirname(__FILE__) . './../assets/img/svg/' . get_sub_field( 'icon' ) . '.svg'; ?>
			</div>
			<h4 class="icon-title text-<?php echo get_sub_field( 'icon_color' ); ?>"><?php echo get_sub_field( 'title' ); ?></h4>
		<?php if ( is_front_page() ) echo '</a>'; ?>
		<p class="icon-cnt"><?php echo get_sub_field( 'content' ); ?></p>
	</div>
	<?php endwhile; ?>
</div>