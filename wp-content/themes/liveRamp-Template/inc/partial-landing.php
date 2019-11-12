<?php 
	$rows = count(get_sub_field('each_landing'));
	$slider = $rows > 1 ? 'id="landing-slidr"' : '';
	if ($rows > 1) 
		echo '<div class="slider-wrap"><div class="slider-ctn"' . $slider . '>';

	while (have_rows('each_landing')): the_row();
		$title = get_sub_field( 'title' );
		$subtitle = get_sub_field( 'subtitle' );
		$size = get_sub_field( 'size' ) == 'normal' ? '' : 'landing-large';
		$bg_image = get_sub_field( 'background_image' );
		$text_color = get_sub_field( 'text_color' );

		if ( isset($text_color) ) {
			$text = ($text_color == 'dark') ? '' : 'text-lt';
		}

		if ( get_sub_field('button_exists') == true ) {
			$btn = true;
			$button_color = get_sub_field( 'button_color' );
			$button_hover_color = get_sub_field( 'button_hover_color' ) ? get_sub_field( 'button_hover_color' ) . '-hover' : 'orange-hover';
			$button_text = get_sub_field( 'button_text' ) ? get_sub_field( 'button_text' ) : 'Read More';
			$button_link = get_sub_field( 'custom_button_link' ) ? get_sub_field( 'custom_button_link' ) : get_sub_field( 'button_link' );
		} else {
			$btn = false;
		}

		if ( $bg_image ) {
			$bg = 'style="background-image: url(' .$bg_image . ')"';
		}

		if ( get_sub_field( 'is_jumpoff' ) == true ) {
			$bg_color = get_sub_field( 'background_color' );
			$bg_icon = get_sub_field( 'jumpoff_icon' );
		}
?>

<section class="landing <?php echo $size . ' ' . $text; if (isset($bg_color)) echo ' landing-jumpoff bg-' . $bg_color; ?>" <?php if (isset( $bg )) echo $bg; ?>>
	<div class="ctn">
		<h1 class="title"><?php echo $title; ?></h1>
		<?php if ($subtitle): ?>
		<h3 class="subtitle"><?php echo $subtitle; ?></h3>
		<?php 
			endif;
			if ( $btn ) {
				$button = '';
				$button .= '<div class="btn-ctn">';
				$button .= '<a href="' . $button_link . '" class="btn bg-' . $button_color . ' ' . $button_hover_color . '">';
				$button .= $button_text;
				$button .= '<span class="icon-arrow-right"></span></a>';
				echo $button;
			}
			if ( isset($bg_icon) ): ?>
		<div class="jumpoff-icon-ctn">
			<?php include dirname(__FILE__) . './../assets/img/svg/' . $bg_icon . '.svg'; ?>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php 
	endwhile; 
	if ($rows > 1) 
		echo '</div></div>';
?>