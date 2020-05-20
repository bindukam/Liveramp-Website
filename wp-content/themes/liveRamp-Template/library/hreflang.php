<?php if( have_rows('hreflang') ) { ?>
	
	<?php while ( have_rows('hreflang') ) { the_row();?>
		<link rel="alternate" href="<?php echo the_sub_field('url');?>" hreflang="<?php echo the_sub_field('locale');?>" />
	<?php }  ?>

<?php } ?>