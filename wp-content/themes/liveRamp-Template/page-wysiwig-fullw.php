<?php /* Template Name: WYSIWIG Page Full Width */ ?>
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
	<?php if ( get_field('title') || get_field('pre_title') || get_field('description') ) : ?>

	<section class="primary-bkg wysiwyg-hero pad-1" style="margin-bottom: 0">
		<div class="grid-container ">
			<div class="grid-x grid-margin-x wysiwyg-grid">
				<div class="cell white">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
				</div>
					<div class="cell medium-7 white content">

						<p>
							<?php the_field('pre_title'); ?>
						</p>
						<h1>
							<?php the_field('title'); ?>
						</h1>
						<div class="description">
							<?php the_field('description'); ?>
						</div>



					</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="content">
		<?php the_content(); ?>
	</section>

<?php endwhile ?>

<?php
get_footer();
