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
<?php setPostViews(get_the_ID()); ?>
<section class="blog-header medium-blue-bkg <?php echo $add_waves; ?>" id='blog-header'>
	<div class="grid-container">
		<div class="grid-x align-center header-grid  <?php echo $big_header ?>">
			<div class="cell breadcrumbs-wrapper">
				<div class="breadcrumbs-cell white">
					<p id="breadcrumbs">
					<a href="/blog">Back to blog</a>
					</p>
					
					<?php
						//if ( function_exists('yoast_breadcrumb') ) {
						 // yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						//}
					?>
				</div>

			</div>
			<?php
			// If a featured image is set, insert into layout and use Interchange
			// to select the optimal image size per named media query.
			if ( !has_post_thumbnail( $post->ID ) ) : ?>
				<div class="cell medium-8 title-wrapper">
					<div class="terms core-blue">
						<p><?php echo $term; ?></p>
					</div>
					<div class="title white">
						<?php the_title( '<h1 class="flexo-regular">', '</h1>', true ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<section class="blog-post">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">

			<!-- sticky social links here -->
			<div class="cell medium-2 social-icons show-for-medium">
				<div data-sticky-container>
					<div class="sticky social-sticky" data-sticky data-top-anchor="blog-header:bottom" data-btm-anchor="post-footer:top" data-margin-top='10' data-margin-bottom='15'>
						<?php echo DISPLAY_ULTIMATE_PLUS(); ?>
						<div class="share-icons">
							
						</div>

					</div>
				</div>
			</div>
			<!-- end social sticky links -->

			<div class="medium-8 article <?php echo $overlay ?>" id="article">
				<?php
			// If a featured image is set, insert into layout and use Interchange
			// to select the optimal image size per named media query.
			if ( has_post_thumbnail( $post->ID ) ) : ?>

				<div class="feature-image-wrapper header">
					<div class="featured-hero b-radius" role="banner" data-interchange="[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small], [<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'featured-large' ); ?>, large], [<?php the_post_thumbnail_url( 'featured-xlarge' ); ?>, xlarge]">
					</div>
				</div>

				<div class="title-wrapper">
					<div class="terms">
						<p><?php echo $term; ?></p>
					</div>
					<div class="title">
						<?php the_title( '<h1>', '</h1>', true ); ?>
					</div>
					<div class="meta-wrapper">
						<p><?php the_date() ?>&nbsp;&nbsp;|&nbsp;&nbsp; <?php the_author(); ?>&nbsp;&nbsp;<?php if ($term): ?>
							|&nbsp;&nbsp;<?php echo $term ?>
						<?php endif ?></p>
					</div>
				</div>

			<?php endif; ?>
				<div class="article-content">
					<?php the_content(); ?>
				</div>
				<!-- Comment functionality hidden for now: bug #622 -->			
				<div class="post-footer" id='post-footer'>
					<div class="grid-x">
						<?php //if (comments_open() || get_comments_number()): ?>
							<!--<div class="cell medium-6 leave-comment-wrapper">
								<div class="leave-comment" id="leave-comment">
									Leave a comment >
								</div>
							</div>-->
						<?php //endif ?>
						<div class="social-share-footer cell auto text-right">
							<?php echo DISPLAY_ULTIMATE_PLUS(); ?>
						</div>
					</div>

					<?php //if (comments_open() || get_comments_number()): ?>
						<!--<div class="comments-wrapper" id="comments-wrapper">
							<div class="comments">
								<?php //comments_template(); ?>
							</div>
						</div>-->
					<?php //endif ?>

				</div>

			</div>
			<div class="cell right-column medium-2">

			</div>

		</div>
	</div>
</section>


			<?php

				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'blog-post' ),
					'posts_per_page'         => '3',
					'tax_query'              => array(
						array(
							'taxonomy'         => 'blog_categories',
							'terms'            => $term_id,
						),
					),
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) { ?>
					<section class="blog-footer">
						<div class="grid-container related-posts">
							<div class="grid-x grid-margin-x grid-margin-y">
								<div class="cell text-center">
									<h3>Related Posts</h3>
									<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/small-blue-line.svg" alt="small blue line" class="pad-1">
								</div>
							</div>
							<div class="grid-x grid-margin-x medium-up-3 grid-padding-y " data-equalizer='related-content'>


					<?php
					while ( $query->have_posts() ) {
						$query->the_post(); ?>
						<div class="cell related-post-wrapper click-card">
							<div class="grid-x">
								<div class="cell shrink related-image b-radius" style="background-image:url(<?php the_post_thumbnail_url( '' ); ?>)">

								</div>
								<div class="cell auto">
									<div class="content" >
										<div class="term">
											<?php echo $term ?>
										</div>
										<div class="title">
											<?php  the_title() ?>
										</div>
										<div class="author">
											<?php the_author(); ?>
										</div>
									</div>
								</div>
							</div>


						</div>

				<?php } ?>
						</div>
					</div>
				</section>

				<?php
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();

			 ?>


<?php get_template_part( 'blog_archive_parts/blog_subscribe' ); ?>



<script>

	$( document ).ready(function() {
	    console.log( "blog ready!" );

	    $('#leave-comment').on('click', function() {
	    	event.preventDefault();
	    	$('section#respond').show();

	    	/* Act on the event */
	    });

	    // remove absolute position from social icons

	    $('.sfsiplus_norm_row').css({
	    	position: 'unset'
	    });



	});

</script>
<?php if (!empty(get_field('subscribe_form_id', 'option'))) {  ?>

	<script src="<?php echo get_field('marketo_form_url', 'option') ?>/js/forms2/js/forms2.min.js"></script>
	
	<script>
			jQuery( document ).ready(function() {

			   /* config area - replace with your instance values */

			   var mktoFormConfig = {
			   		podId : "<?php echo get_field('marketo_form_url', 'option') ?>",
			   		munchkinId : "320-CHP-056",
			   	   formIds : [<?php echo get_field('subscribe_form_id', 'option') ?>]
			   };

			   /* ---- NO NEED TO TOUCH ANYTHING BELOW THIS LINE! ---- */

			   function mktoFormChain(config) {

			   	/* util */
			   	var arrayFrom = Function.prototype.call.bind(Array.prototype.slice);

			   	/* const */
			   	var MKTOFORM_ID_ATTRNAME = "data-formId";

			   	/* fix inter-form label bug! */
			   	MktoForms2.whenRendered(function(form) {
			   		var formEl = form.getFormElem()[0],
			   			rando = "_" + new Date().getTime() + Math.random();
			   			jQuery('form').removeClass().removeAttr('style');
			   			// jQuery('form style').remove();
			   			jQuery('.mktoGutter').remove();
			   			jQuery('.mktoClear').remove();
			   			jQuery('.mktoOffset').remove();
			   			jQuery('.mktoAsterix').remove();
			   			jQuery('input').css('width', '');
			   			jQuery('.mktoButtonWrap').css('margin-left', '2rem');
			   			jQuery('.mktoButton').addClass('button cta');
			   			jQuery('.mktoFormCol').css('margin-bottom', '');
			   			jQuery('form button').html('<i class="far fa-angle-right"></i>').removeClass('button cta');
			   			jQuery('.form-wrapper').fadeIn('400'),

			   		arrayFrom(formEl.querySelectorAll("label[for]")).forEach(function(labelEl) {
			   			var forEl = formEl.querySelector('[id="' + labelEl.htmlFor + '"]');
			   			if (forEl) {
			   				labelEl.htmlFor = forEl.id = forEl.id + rando;
			   			}
			   		});

			   		form.onSuccess(function(values, followUpUrl) {
			   		       // Get the form's jQuery element and hide it
			   		       var instance = form.getFormElem().attr('data-forminstance');
			   		       var response = '.response_'+instance
			   		       form.getFormElem().hide();
			   		       jQuery(response).fadeIn('400');
			   		       console.log(instance);

			   		       // Return false to prevent the submission handler from taking the lead to the follow up url
			   		       return false;
			   		   });
			   	});

			   	/* chain, ensuring only one #mktoForm_nnn exists at a time */
			   	arrayFrom(config.formIds).forEach(function(formId) {
			   		var loadForm = MktoForms2.loadForm.bind(MktoForms2,config.podId,config.munchkinId,formId),
			   			formEls = arrayFrom(document.querySelectorAll("[" + MKTOFORM_ID_ATTRNAME + '="' + formId + '"]'));

			   		(function loadFormCb(formEls) {
			   			var formEl = formEls.shift();
			   			formEl.id = "mktoForm_" + formId;

			   			loadForm(function(form) {
			   				formEl.id = "";
			   				if (formEls.length) {
			   					loadFormCb(formEls);
			   				}
			   			});
			   		})(formEls);
			   	});
			   }

			   mktoFormChain(mktoFormConfig);


			});
	</script>
<?php } ?>
<?php get_footer();
