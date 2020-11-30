<div class="grid-x card-intro">

	<div class="cell">
		
		<div class="intro_icon green-border">
			<img src="<?php echo get_sub_field('intro_title_icon') ?>">
		</div>
		
		<div class="intro_divider">
			<div class="icon-divider-item divider-orange-tint green-lines"></div>
			<div class="icon-divider-item divider-orange green-faded2"></div>
		</div>
		
		<div class="intro_title green">
			<h2><?php echo get_sub_field('intro_title') ?></h2>
		</div>
	
		<?php if (get_sub_field('intro_text')): ?>
			<div class="intro_text">
				<?php echo get_sub_field('intro_text') ?>
			</div>
		<?php endif ?>
	
	</div>

</div>
