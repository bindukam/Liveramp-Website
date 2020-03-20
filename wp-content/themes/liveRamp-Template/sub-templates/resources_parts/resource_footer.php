<?php $resource_footer = get_field('resource_footer');  ?>


<section class="blog-subscribe resource-footer">
	<div class="grid-x grid-padding-x grid-margin-x medium-blue-bkg subscribe b-radius align-middle align-center">
		<div class="cell medium-7">
			<div class="grid-x align-middle align-center">

				<div class="cell medium-auto text-left">
					<h2 class="core-blue"><?php echo $resource_footer['title'] ?></h2>
					<div class="white"><?php echo $resource_footer['description'] ?></div>
				</div>

				<div class="cell cta-wrapper medium-shrink text-left">
					<?php

						$url = $resource_footer['cta']['url'];
						$title = $resource_footer['cta']['title'];
						$target = $resource_footer['cta']['target'];

					 ?>
					  <a href="<?php echo $url ?>" class="button" target="<?php echo $target ?>"><?php echo $title ?></a>
				</div>

			</div>
		</div>

	</div>
</section>
