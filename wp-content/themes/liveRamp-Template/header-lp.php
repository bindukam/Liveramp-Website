<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 // THEM URI to link to images within the assets folder
 $theme_uri = get_stylesheet_directory();
 // Theme assets folder
 $theme_images = $theme_uri.'/dist/assets/images';
 $theme_svg = $theme_images.'/svg';

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="noindex">	

		<?php include ('library/hreflang.php') ?>

		<!-------------------- LOCAL CODE SPECIFIC TO LOCATION -------------------->
		<?php 
			$code_loop = get_field('code_loop', 'option'); 

			//echo '<pre style="background-color:white">'.print_r($code_loop, 1).'</pre>';
			foreach ($code_loop AS $code) {
				echo "\n" . '<!-- '.strtoupper($code['title']).' -->';
				echo "\n" . $code['code_block'] . "\n";
			}
		?>
		
		<!-------------------- END LOCAL CODE SPECIFIC TO LOCATION -------------------->

		<!-------------------- GLOBAL CODE -------------------->

		<!-- VIMEO TRACKING CODE -->
		<script type='text/javascript' defer='defer' src='<?php echo $theme_uri; ?>/dist/assets/js/10577812.js'></script>
		<!-- END VIMEO TRACKING CODE -->

		<!-- VIMEO PLAYER API -->
		<script type='text/javascript' src="<?php echo $theme_uri; ?>/dist/assets/js/vimeo-player.js"></script>
		<!-- END VIMEO PLAYER API -->

		<!-- wistia script  -->
		<script type='text/javascript' charset="ISO-8859-1" src="<?php echo $theme_uri; ?>/dist/assets/js/E-v1.js" async></script>

		<!-------------------- END GLOBAL CODE -------------------->


		<!-- iframe resizer  -->
		<style>	.ubermenu  svg.ubermenu-image {	max-width: 1em; } </style>

		<?php wp_head(); ?>
		
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $theme_uri; ?>/dist/assets/js/slick.css"/> -->

		<!-- CSS code -->
		<style><?php the_field('css_code', 'option') ?></style>
		<!-- End CSS code -->		

		<!-- Bugherd Code  -->
		<?php the_field('bugherd_code', 'option') ?>
		<!-- End Bugherd Code -->

		<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=boxtwtjwrzcua9blxferxg" async="true"></script>

		<!-- AddEvent Code  -->
        <script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
		<!-- End AddEvent Code -->
	</head>

    <body <?php body_class(); ?>>

	<!-- GTM Body Code -->
	<?php the_field('gtm_body_code', 'option') ?>
	<!-- End GTM Body Code -->	

    <?php
        $colors = get_the_terms( get_the_ID(),'color_theme');
        $blogcolor = get_the_terms( 1024874,'color_theme');
    ?>

    <?php
    if (!empty( $colors ) && !is_wp_error( $colors ) ){
        $thecolortheme = $colors[0]->slug ;
    }
    ?>

   <div id="<?php echo $thecolortheme; ?>-theme" class="color-theme">
