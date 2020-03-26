<?php
/**
 * The template for displaying carrer jobs pages
 * Template Name: Career API Pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>


<?php 

	// get job deparment  information from Greenhouse 
	$departments = json_decode(file_get_contents('https://api.greenhouse.io/v1/boards/liveramp/departments'));
	$departments = $departments->departments;
	// var_dump($departments);

	// get job Location  information from Greenhouse 
	$locations = json_decode(file_get_contents('https://api.greenhouse.io/v1/boards/liveramp/offices'));
	$locations = $locations->offices;

	// get job listings  information from Greenhouse 
	$jobs = json_decode(file_get_contents('https://api.greenhouse.io/v1/boards/liveramp/jobs?content=true'));
	$jobs = $jobs->jobs;

 ?>


<?php $pageid = get_the_ID(); ?>

<?php include('acf-loop.php') ;?>	

<?php //include( 'template-parts/career_parts/careers_hero.php' ); ?>

<?php include( 'template-parts/career_parts/filters.php' ); ?>

<?php include( 'template-parts/career_parts/career_listings.php' ); ?>

<?php
get_footer();
