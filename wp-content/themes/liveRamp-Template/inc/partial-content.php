<?php
	$title = get_sub_field( 'title' );
	$subtitle = get_sub_field( 'subtitle' );
	$content = get_sub_field( 'content' );
	$angle = get_sub_field( 'slant' );
	$bg_image = get_sub_field( 'background_image' );
	$bg_color = get_sub_field( 'background_color' );
	$video = get_sub_field( 'video_exists' );
	$video_link = get_sub_field( 'video_link' ) ? get_sub_field( 'video_link' ) : null;
	$text_color = get_sub_field( 'text_dark' ) == true ? 'block-text-dk' : 'block-text-lt';
	$sidebar = get_sub_field( 'is_sidebar' );
	$add_extra_height = get_sub_field('add_extra_height') ? get_sub_field('add_extra_height') : null;

	if ( $bg_image ) {
		$bg = 'style="background-image: url(' . $bg_image . ');"';
	}

	if ( get_sub_field('button_exists') == true ) {
		$btn = true;
		$button_color = get_sub_field( 'button_color' );
		$button_hover_color = get_sub_field( 'button_hover_color' ) ? get_sub_field( 'button_hover_color' ) . '-hover' : 'orange-hover';
		$button_text = get_sub_field( 'button_text' );
		$button_link = get_sub_field( 'custom_button_link' ) ? get_sub_field( 'custom_button_link' ) : get_sub_field( 'button_link' );
	} else {
		$btn = false;
	}

	$classes = '';
	$classes .= 'block ';
	$classes .= 'bg-' . $bg_color . ' ';
	$classes .= $angle . ' ';
	$classes .= $text_color . ' ';
	if (isset($bg)) {
		$classes .= 'block-bg-img ';
	}
	if ($sidebar) {
		$classes .= ' has-sidebar';
	}
	if ($add_extra_height) {
		$classes .= ' has-extra-padding-bottom';
	}
?>

<section class="<?php echo $classes; ?>" <?php if ( isset($bg) ) echo $bg; ?>>
	<div class="ctn">
		<?php
			if ( $title || $subtitle ) {

				echo '<header class="header-block">';

				if ( $title ) {
					echo '<h1 class="title">' . $title . '</h1>';
				}

				if ( $subtitle ) {
					echo '<h3 class="subtitle">' . $subtitle . '</h3>';
				}

				echo '</header>';
			}

			if ( $content ) {
				echo '<div class="cnt">' . $content . '</div>';
			}

			if ( $sidebar ) {
				get_template_part( 'inc/partial', 'sidebar' );
			}

			if ( get_sub_field( 'icons_exist' ) == true ) {
				get_template_part( 'inc/partial', 'block-icons' );
			}

			if ( get_sub_field('jumpoff_images_exist') == true) {
				get_template_part( 'inc/partial', 'jumpoff-images' );
			}

			if ( $btn ) {
				$button = '';
				$button .= '<div class="btn-ctn">';
				$button .= '<a href="' . $button_link . '" class="btn bg-' . $button_color . ' ' . $button_hover_color . '">';
				$button .= $button_text;
				$button .= '<span class="icon-arrow-right"></span></a>';
				echo $button;
			}

			if ( $video ) {
				echo '<div class="video-btn-ctn"><a href="#" class="md-trigger" data-modal="md-block-video"><span class="icon-play"></span></a></div>';
			}
		?>
	</div>
</section>

<?php if ( $video ): ?>
<div class="md-modal md-effect md-webinar" id="md-block-video">
	<div class="md-content">
		<?php echo $video_link; ?>
	</div>
	<div class="md-close"></div>
</div>
<?php endif; ?>
