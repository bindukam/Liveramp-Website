<?php
/**
 * The template for displaying carrer jobs pages
 * Template Name: Career Jobs
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// https://boards-api.greenhouse.io/v1/boards/liveramp/jobs/


get_header(); ?>

<?php $pageid = get_the_ID(); ?>

<?php $grid = $_GET['grid'] ?>

<section class="job-posting">
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="cell text-center">
				<div id="grnhse_app"></div>
			</div>
		</div>
	</div>
</section>

<script src="https://boards.greenhouse.io/embed/job_board/js?for=liveramp"></script>

<?php
get_footer();
