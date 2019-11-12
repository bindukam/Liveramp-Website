<?php
	$title = get_the_title();
	$title_class = str_replace(' ', '-', strtolower($title));
	global $post;

?>

<article class="blog-item <?php echo $title_class; ?>" data-id="<?php the_ID(); ?>">
	<section class="blog-main">
		<header class="header-blog-item">
			<?php
				if ( has_post_thumbnail() )
				{
			?>
				<figure class="blog-thumbnail">
					<a href="<?php echo get_permalink(); ?>" data-id="<?php the_ID(); ?>">
					<?php
						the_post_thumbnail( 'blog-thumbnail', array('class'=>'responsive-image') );
					?>
					</a>
				</figure>
			<?php
				}
			?>
			<a href="<?php echo get_permalink(); ?>" data-id="<?php the_ID(); ?>">
				<h2 class="blog-title">
					<?php echo get_the_title(); ?>
				</h2>
			</a>
			<div class="blog-meta">
				<?php
					// functions.php : Blog Functions : blog_meta()
					blog_meta();
				?>
			</div>
			<?php
				$terms = get_the_terms( $post->ID, 'blog_categories' );
				if ( $terms && !is_wp_error( $terms ) ) :
					$terms_array = array();
					foreach ( $terms as $term ) {
						$terms_array[] = $term->name;
					}
					$the_term = join( ', ', $terms_array );
				endif;
				// echo '<p class="blog-category">' . $the_term . '</p>';
			?>
		</header>
		<section class="blog-cnt">
			<div class="cnt">
				<?php echo get_the_excerpt(); ?>
				<?php echo do_shortcode("[csbshare]"); ?>
			</div>
			<div class="btn-ctn">
				<a href="<?php echo get_permalink(); ?>" class="btn bg-orange blog-open" data-id="<?php the_ID(); ?>">Read More <span class="icon-arrow-right"></span></a>
			</div>
		</section>
	</section>
</article>
