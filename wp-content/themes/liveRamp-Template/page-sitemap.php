<?php /* Template Name: Sitemap */ ?>
<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php while(have_posts()) : the_post();?>

	<section class="primary-bkg wysiwyg-hero pad-1">
		<div class="grid-container ">
			<div class="grid-x grid-margin-x wysiwyg-grid align-center">
				<div class="cell white">
					
				</div>
					<div class="cell large-10 white content">

						<h1>
							<?php the_title(); ?>
						</h1>


					</div>
			</div>
		</div>
	</section>

	<section class="content pad-section">
		<div class="grid-container">
		<div class="grid-x grid-margin-x">
				<div class="cell sitemap">
					<?php
					$excluded = get_field('exclude_pages');
					$i = 0;
					foreach ($excluded as $exclude){
						if ($i == 0) { 
							$exclude_list = $exclude.'';
						} 
						if ($i > 0) { 
							$exclude_list = $exclude_list.', '.$exclude;
						}
						$i++;
					}

					wp_list_pages(
					array(
						'exclude' => $exclude_list,
						'title_li' => '',
					)
					);
					?>
				</div>
			</div>
		</div>
	</section>

<?php endwhile ?>

<?php
get_footer();
