<?php
	$dates = get_sub_field('dates');
	$location = get_sub_field('location');
	$cta_text = get_sub_field('cta_text');
	$cta_link = get_sub_field('cta_link');
	$logo = get_sub_field('logo');
	$bg_image = get_sub_field( 'background_image' );

	$bg = null;
	if ($bg_image) {
		$bg = 'style="background-image: url(' . $bg_image . ');"';
	}

	$classes = '';
	$classes .= 'rampup-block block ';
	if (isset($bg)) {
		$classes .= 'block-bg-img ';
	}
?>

<section class="<?php echo $classes; ?>" <?php if ( isset($bg) ) echo $bg; ?>>
	<div class="ctn">
		<header class="header-block">
			<img src="<?php echo $logo ?>" alt="" />
			<h3>
				<div class="subtitle-block"><?php echo $dates ?></div>
				<div class="subtitle-block subtitle-bullet">&middot;</div>
				<div class="subtitle-block"><?php echo $location ?></div>
			</h3>
			<div class="btn-ctn">
				<?php if (!empty($cta_link)): ?>
					<a href="<?php echo $cta_link ?>" target="_blank" class="btn">
						<?php echo $cta_text ?>
						<span class="icon-arrow-right"></span>
					</a>
				<?php else: ?>
					<p class="no-link"><span><?php echo $cta_text ?></span></p>
				<?php endif; ?>
			</div>
		</header>
	</div>
</section>
