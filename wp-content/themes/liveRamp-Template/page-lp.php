<?php
/**
 * The template for displaying CPT archive pages
 * Template Name: Landing Page Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header('lp'); ?> 

<?php 
    include('acf-lp-loop.php');
?>

<?php
get_footer('lp');
?>
