<section class="standard_video pad-section">
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-margin-y title-cell">

			<?php if ((get_sub_field('title')) || get_sub_field('description')): ?>
				<div class="cell small-12 text-center">
					<?php if (get_sub_field('title')): ?>
					    <h2 class="green"><?php the_sub_field('title') ?></h2>
					<div class="no-lineheight pad-ul">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="">
					</div>
	         <?php endif ?>
	         <?php if (get_sub_field('description')): ?>
	            <?php the_sub_field('description'); ?>
	         <?php endif ?>
				</div>

			</div>
		<?php endif ?>

		<div class="grid-x align-middle align-center">
			<div class="cell text-center  box-shadow-over-white b-radius no-overflow">
				<script src="https://fast.wistia.com/embed/medias/<?php the_sub_field('video_id') ?>.jsonp" async></script><script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0px 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_sub_field('video_id') ?> videoFoam=true  box-shadow-over-white b-radius" style="height:100%;position:relative;width:100%">&nbsp;</div></div></div>
			</div>
		</div>
	</div>
</section>

<script>
		$( document ).ready(function() {
		    console.log( "video ready!" );
		    // alert('booger');

		});
</script>