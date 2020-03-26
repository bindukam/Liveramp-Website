<section class="galley_hyperlink_grid pad-section">
	<div class="grid-container">

		<?php if ((get_sub_field('title')) || get_sub_field('description')): ?>
			<div class="grid-x title margin-bottom-2">
				<div class="cell text-center">
					<?php if (get_sub_field('title')): ?>
						<h2><?php the_sub_field('title') ?></h2>
						<div class="pad-ul no-lineheight margin-bottom-1">
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" >
						</div>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description') ?>
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>

			<?php
				// echo $post->ID; ,erge fix
				/*
					The code in this file is an example off the code that you would use in your template to
					show the first X number of rows of a repeater

					I'm sure there are more elegant ways to do the JavaScript, but what's here will work
				*/

				if (have_rows('links')) {
					// set the id of the element to something unique
					// this id will be needed by JS to append more content

					// $total = count(get_sub_field('links'));
					// echo $total;
					$i = 0;
					while(have_rows('links')) {
						the_row();
						++$i;
					}
					$total = $i;
					// echo $total;
					?>

						<div class="grid-x icon-wrapper grid-margin-x grid-margin-y align-left large-up-4 medium-up-2 small-up-1" id="my-repeater-list-id">
							<?php
								$number = 16; // the number of rows to show
								$count = 0; // a counter
								while (have_rows('links')) {
									the_row();
									?>
										<div class="cell">
											<?php

												$url = get_sub_field('link')['url'];
												$title = get_sub_field('link')['title'];
												$target = get_sub_field('link')['target'];

											 ?>
											  <a href="<?php echo $url ?>" class="link arrow-tag" target="<?php echo $target ?>"><?php echo $title; ?> 
											  </a>
										</div>
									<?php
									$count++;
									if ($count == $number) {
										// we've shown the number, break out of loop
										break;
									}
								} // end while have rows
							?>
						</div>
						<!--
							add a link to call the JS function to show more
							you will need to format this link using
							CSS if you want it to look like a button
							this button needs to be outside the container holding the
							items in the repeater field
						-->
						<?php
							if ($total < $number) {
								$style1 = 'style="display: none;"';
							}
						?>
						<div class="grid-x align-center align-middle grid-margin-y" <?php echo $style1; ?>>
							<div class="cell text-center pad-1">
								<a id="my-repeater-show-more-link" class="button outline down-arrow" href="javascript: my_repeater_show_more();">Show More</a>
							</div>
						</div>

						<!--
							The JS that will do the AJAX request
						-->
						<script type="text/javascript">
							var my_repeater_field_post_id = <?php echo $post->ID; ?>;
							var my_repeater_field_offset = <?php echo $number; ?>;
							var my_repeater_field_nonce = '<?php echo wp_create_nonce('my_repeater_field_nonce'); ?>';
							var my_repeater_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
							var my_repeater_more = true;

							function my_repeater_show_more() {
								// alert('goteem!');
								// make ajax request
								jQuery.post(
									my_repeater_ajax_url, {
										// this is the AJAX action we set up in PHP
										'action': 'my_repeater_show_more',
										'post_id': my_repeater_field_post_id,
										'offset': my_repeater_field_offset,
										'nonce': my_repeater_field_nonce
									},
									function (json) {

										// add content to container
										// this ID must match the containter
										// you want to append content to
										console.log(json['content']);

										jQuery('#my-repeater-list-id').append(json['content']);
										// update offset
										my_repeater_field_offset = json['offset'];
										// see if there is more, if not then hide the more link
										if (!json['more']) {
											// this ID must match the id of the show more link
											jQuery('#my-repeater-show-more-link').css('display', 'none');
										}
									},
									'json'
								);
							}

						</script>
					<?php
				} // end if have_rows

			?>


	</div>
</section>
