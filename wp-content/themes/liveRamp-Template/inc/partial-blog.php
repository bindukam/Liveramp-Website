<?php
	$blog_type = get_sub_field( 'type' );
?>

<div class="blog-search">
	<div class="ctn">
		<div class="breadcrumb">

			<?php
			// TODO Based on what archive is being viewed, generate breadcrumbs

			?>

		</div>
		<form action="/blog/" method="get" class="blog-search-form">
			<div class="ctn">
				<ul class="search-filter">
					<li data-filter="keyword">Keyword</li>
					<li data-filter="author">Author</li>
					<li data-filter="category">Category</li>
				</ul>
				<input type="text" input="s" name="s" class="s" />
			</div>
			<span class="icon-search"></span>
		</form>
	</div>
</div>

<section class="blog">
	<section class="iso-blog" id="iso-blog">
		<?php
			$paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
			$num = get_sub_field( 'type' ) == 'regular' ? 10 : -1;
			if ( $blog_type == 'regular' ) {
				$args = array( 
					'post_type' => 'blog', 
					'posts_per_page' => 10, 
					'orderby' => 'date', 
					'order' => 'DESC',
					'paged' => $paged
				);
			} else {
				$args = array( 
					'post_type' => 'blog', 
					'posts_per_page' => -1, 
					'orderby' => 'date', 
					'order' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'blog_categories', 
							'field' => 'slug',
							'terms' => $blog_type 
						),
					),
				);
			}
			
			$loop = new WP_Query( $args );
			while ($loop->have_posts()): $loop->the_post();
				get_template_part( 'inc/partial', 'each-blog' );
			endwhile; 
		?>
	</section>
	<?php if ( $blog_type == 'regular' ): ?>
	<div class="blog-btn-wrap">
		<div class="ctn">
			<div class="btn-ctn blogs-btn-ctn">
				<a class="get-more-blogs">See More Posts <span class="icon-arrow-right"></span></a>
			</div>
		</div>
	</div>
	<?php endif; ?>
</section>