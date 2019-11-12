<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

	if (get_the_post_thumbnail_url()) {
		$overlay = 'overlay';
		$big_header = '';

	}
	else {
		$overlay = '';
		$big_header = 'big-header';
		$add_waves = 'add-waves';

	}

	$post = get_post();

	// var_dump(get_post());
	$post_id = get_the_ID();

	$terms = get_the_terms( get_the_ID(), 'blog_categories' );

	// var_dump($terms);

	$term = $terms[0]->name;
	$term_id = $terms[0]->term_id;





get_header(); ?>


<?php get_footer();
