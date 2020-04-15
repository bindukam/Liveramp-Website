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
		$add_waves = 'extra-padding';

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
						<a href="/blog"><?php _translate('back_to_blog')  ?></a>
					</p>

				</div>

			</div>
			<?php
			
			// if ( !get_the_post_thumbnail_url() ) : ?>
				<div class="cell medium-8 title-wrapper">
					<div class="terms white">
						<p><?php echo $term; ?></p>
					</div>
					<div class="title white">
						<?php the_title( '<h1 class="flexo-regular">', '</h1>', true ); ?>
					</div>
					<div class="meta-wrapper">
						<p class="white"><?php the_date() ?>&nbsp;&nbsp;|&nbsp;&nbsp; <?php the_author(); ?> </p>
					</div>
				</div>
			<?php //endif; ?>
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
					
						<div class="share-icons">
							<?php echo do_shortcode("[wp_social_sharing]") ?>
						</div>

					</div>
				</div>
			</div>
			<!-- end social sticky links -->

			<div class="medium-8 article <?php echo $overlay ?>" id="article">
				<?php
			// If a featured image is set, insert into layout and use Interchange
			// to select the optimal image size per named media query.
			// if ( has_post_thumbnail( $post->ID ) ) :
			
				if (!get_the_post_thumbnail_url()) {
					$background_url = get_template_directory_uri().'/dist/assets/images/blog_Default_Image@2x.png';
				}
				else{
					$background_url = get_the_post_thumbnail_url('', 'large');?>

					<div class="feature-image-wrapper header">
						<div class="featured-hero b-radius" role="banner" style="background-image:url(<?php echo $background_url ?>)">
						</div>
					</div>
					
				<?php } ?>
				

			<?php //endif; ?>
				<div class="article-content">
					<?php the_content(); ?>
				</div>
				<!-- Comment functionality hidden for now: bug #622 -->				
				<div class="post-footer" id='post-footer'>
					<div class="grid-x">
						<div class="social-share-footer cell auto text-right center-social">
							<?php echo do_shortcode("[wp_social_sharing]") ?>
						</div>
						
					</div>

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
									<h3><?php _translate('related_posts')  ?></h3>
									<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/small-blue-line.svg" alt="small blue line" class="pad-1">
								</div>
							</div>
							<div class="grid-x grid-margin-x medium-up-3 grid-padding-y " data-equalizer='related-content'>
								<?php
								while ( $query->have_posts() ) {
									$query->the_post(); ?>
									<div class="cell related-post-wrapper click-card" data-url="<?php the_permalink(); ?>">
										<div class="grid-x">
											<div class="cell shrink related-image b-radius" style="background-image:url(<?php the_post_thumbnail_url( '' ); ?>)">

											</div>
											<div class="cell auto">
												<div class="content" >
													<div class="term">
														<?php echo $term ?>
													</div>
													<div class="title">
														<a href="<?php the_permalink(); ?>" class="title gray">
															<?php  the_title() ?>
														</a>
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


<script>
$( document ).ready(function() {
	$('#leave-comment').on('click', function() {
		event.preventDefault();
		$('section#respond').show();
	});

	$('.sfsiplus_norm_row').css({
		position: 'unset'
	});
});

</script>

<?php get_template_part( 'template-parts/blog_archive_parts/blog_subscribe' ); ?>
<?php get_footer();
