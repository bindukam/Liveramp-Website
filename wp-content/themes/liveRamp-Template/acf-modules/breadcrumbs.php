<section class="breadcrumbs primary-bkg">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
					  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
			</div>
		</div>
	</div>
</section>
