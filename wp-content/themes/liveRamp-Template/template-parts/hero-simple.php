<header class="hero hero-simple about-h1">

	<div class="hero__img__intro parallax">

		<div class="hero__intro">

			<?php $hero_title = ( get_field('hero_title_override') ) ?: get_the_title(); ?>
			<h1 class="animated fadeInLeft"><?php echo $hero_title; ?></h1>

		</div>

	</div>

</header>
