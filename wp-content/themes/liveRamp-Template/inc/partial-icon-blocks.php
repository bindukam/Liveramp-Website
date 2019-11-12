<?php 
	$i = 0;
	while (have_rows('icon_block')): the_row(); 
	$slant = ($i % 2 == 0) ? 'block-angle-up' : 'block-angle-down';
	$bg = ($i % 2 == 0) ? 'bg-grey-x-lt' : 'bg-white';
?>
<section class="block js-icon-<?php echo strtolower( get_sub_field( 'title' ) ); ?> <?php echo $slant . ' ' . $bg; ?>">
	<div class="ctn">
		<div class="icon-block">
			<h1 class="icon-block-title"><?php echo get_sub_field( 'title' ); ?></h1>
			<div class="icon-block-icon"><a href="<?php echo get_sub_field( 'button_link' ) ?>">
				<div class="icon-self bg-<?php echo get_sub_field( 'icon_color' ); ?>">
					<?php include dirname(__FILE__) . './../assets/img/svg/' . get_sub_field( 'icon' ) . '.svg'; ?>
				</div>
			</a></div>
			<div class="icon-block-cnt">
				<?php 
					echo get_sub_field( 'content' ); 
					if ( get_sub_field( 'bullets' ) ):
						$html = '<ul class="icon-block-bullets">';
						while ( have_rows( 'bullets' ) ): the_row();
							$html .= '<li>' . get_sub_field( 'bullet_item' ) . '</li>';
						endwhile;
						$html .= '</ul>';
						echo $html;
					endif;
					$btn = get_sub_field( 'button' );
					$btn_link = get_sub_field( 'button_link' );
					if ( $btn && $btn_link ) {
				?>
				<div class="btn-ctn">
					<a href="<?php echo $btn_link; ?>" class="btn"><?php echo $btn; ?><span class="icon-arrow-right"></span></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php $i++; endwhile; ?>