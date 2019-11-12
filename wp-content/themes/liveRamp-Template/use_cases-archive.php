<?php
/**
 * The template for displaying CPT archive pages
 * Template Name: Solution Finder
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();

 ?>

 <!-- PAGE BUILDER -->
 <?php
 	include('acf-loop.php');
  ?>
 <!-- END PAGE BUILDER -->

 <?php $terms = get_the_terms( get_the_ID(),'color_theme');  ?>
<section id="<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	foreach ( $terms as $term ) {
		 echo  $term->slug ;
	}
}?>-theme" class="solution-finder pad-section">
	<div class="grid-container">

		<form id="solution-form">

			<div>
				<span>I am in</span>
				<select name="role" id="role">
					<?php
					$roles =  get_terms( 'role', array(
									'hide_empty' => false,
								) );
					foreach ($roles as &$role) { ?>
						<option value="<?php echo $role->slug; ?>"><?php echo $role->name; ?></option>
					<?php	} ?>
				</select>
				
				<span>looking to</span>
				<select name="interest" id="interest">
					<?php
					$interests =  get_terms( 'interest', array(
									'hide_empty' => false,
								) );
					foreach ($interests as &$interest) { ?>
						<option value="<?php echo $interest->slug; ?>">
							<?php echo $interest->name; ?>
						</option>
					<?php
					}
					?>
				</select>
			</div>

			
			<div class="hide"> <!-- remove hide class to unhide sort-by filter -->
				<span>sort by</span>
				<select name="sort_by" id="sort_by">
					<?php
					$sort_bys =  get_terms( 'sort_by', array(
										'hide_empty' => false,
										'orderby' => 'slug',
										'order' => 'ASC'
								) );
					foreach ($sort_bys as &$sort_by) : ?>
						<option value="<?php echo $sort_by->slug; ?>">
							<?php echo $sort_by->name; ?>
						</option>
					<?php
					endforeach;
					?>
				</select>
			</div>

				<!-- <button>Apply Filters</button> -->


		</form>
      <div class="text-center margin-2">
         <button id="sf-submit" class="button outline down-arrow">Show Results</button>
      </div>


		<div id="sf-response" class="hide">


         <?php

            // WP_Query arguments
            $args = array(
            	'post_type'              => array( 'use_cases' ),
            	'nopaging'               => true,
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
            	while ( $query->have_posts() ) {
            		$query->the_post();
            		// do something
                  get_template_part( 'blog_archive_parts/solution_card' );
            	}
            } else {
            	// no posts found
               get_template_part( 'template-parts/content', 'none' );
            }

            // Restore original Post Data
            wp_reset_postdata(); ?>
		</div>
      <div id="sf-results" class="hide">
         <!-- Intentionally empty div - container for results of filter -->
      </div>
      <div  id="sf-showcase">
         <!-- Intentionally Empty div - container for shown results -->
      </div>

		<div class="text-center">
         <div id="loadmore" class="hide button outline down-arrow">More posts</div>
      </div>
	 </div> <!-- /grid-container -->

    <script type="text/javascript" src="../wp-content/themes/liveRamp-Template/solution-finder.js"></script>
    <div class="margin-neg">
       <?php
       if( have_rows('offer_strip') ):
       	while( have_rows('offer_strip') ): the_row();

             get_template_part( 'acf-modules/offer_strip' );

          endwhile;
       endif;
       ?>
   </div>

</section>




<?php
get_footer();
