<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="grid-x align-center">
		<main id="search-results" class="cell large-8">
		


		<header class="margin-2">
			<h1 class="entry-title"><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h1>
		</header>

		<div class="margin-2">

			<?php if ( have_posts() ) : ?>
				<div class="margin-bottom-2">
					<?php get_search_form(); ?>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		</div>

		<?php
		if ( function_exists( 'foundationpress_pagination' ) ) :
			foundationpress_pagination();
		elseif ( is_paged() ) :
		// if ( is_paged() ) :
		?>
			<nav id="post-nav" class="margin-2">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php endif; ?>

		</main>
	<?php //get_sidebar(); ?>

	</div>
</div>
<?php get_footer();
