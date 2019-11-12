<section class="partners">
	<header class="header-partners">
		<nav class="nav-sort">
			<div class="ctn">
				<?php
				$partners_layout = new PartnersLayout();
				$partners_layout->dropdown_select_menu();
				?>

				<div class="search-ctn">
					<div class="search-box">
						<input id="search-input" class="search-input" name="search" placeholder="" type="text">
						<span class="icon-search"></span>
					</div>
					<?php /*
					<ul class="search-list">
					<?php
					$loop = new WP_Query( array( 'post_type' => 'partners' ) );
					while ($loop->have_posts()): $loop->the_post();
					$title = get_the_title();
					$title_class = str_replace(' ', '-', strtolower($title));
					$title_class = str_replace('[', '-', strtolower($title_class));
					$title_class = str_replace(']', '-', strtolower($title_class));
					$title_class = str_replace('+', '-', strtolower($title_class));
					$title_class = str_replace('.', '-', strtolower($title_class));
					if ( strpos($title_class, '/') != false ) {
					$title_class = str_replace('/', '-', $title_class);
				}
				if (beginsWithNumber($title_class)) {
				$title_class = '_' . $title_class;
			}
			?>
			<li><a href="#" data-partners="<?php echo $title_class; ?>"><?php echo $title; ?></a></li>
			<?php endwhile; ?>
			</ul>
			*/ ?>
		</div>
	</div>
</nav>
</header>
<section class="partners block">
	<div class="ctn">
		<div class="loading-partner-logos">

		</div>
		<?php
		$partners_layout_output = get_transient('_lvrmp_partners_grid');
		if (empty($partners_layout_output)) {
			ob_start();
			$partners_layout->partners_section();
			$partners_layout_output = ob_get_contents();
			ob_end_clean();
			set_transient('_lvrmp_partners_grid', $partners_layout_output, 4 * HOUR_IN_SECONDS);
		}
		echo $partners_layout_output;
		?>
	</div>
</section>
</section>
