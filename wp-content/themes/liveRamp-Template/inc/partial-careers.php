<section class="careers" id="careers-scroll">
	<header class="header-careers">
		<div class="ctn">
			<h1 class="title"><?php _translate('career_search')  ?></h1>
		</div>
	</header>
	<nav class="nav-sort">
		<div class="ctn">
			<div class="select-ctn">
				<select class="menu-sort iso-select-careers">
					<option value="*"><?php _translate('all')  ?></option>
					<?php
						$terms = get_terms( 'careers_categories' );
						if ( !empty( $terms ) && !is_wp_error( $terms ) ):
							foreach ( $terms as $term ):
								echo '<option value=".filter-' . $term->slug . '">' . $term->name . '</option>';
							endforeach;
						endif;
					?>
				</select>
			</div>
			<div class="search-ctn">
				<div class="search-box">
					<input id="search-input" class="search-input" name="search" placeholder="" type="text" data-list=".search-list">
					<span class="icon-search"></span>
				</div>
				<ul class="search-list">
					<?php 
						$args = array( 'post_type' => 'careers' );
						$loop = new WP_Query( $args );
						while ($loop->have_posts()): $loop->the_post();
							$title = get_the_title();
							$title_class = preg_replace('([()\s=;\/])', '-', $title);
					?>
					<li><a href="#" data-careers="<?php echo $title_class; ?>"><?php echo $title; ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="careers-list">
		<div class="ctn">
			<div id="iso-careers" class="iso-careers">
				<?php
					$args = array( 'post_type' => 'careers' );
					$loop = new WP_Query( $args );
					while ($loop->have_posts()): $loop->the_post();
						$title = get_the_title();
						$title_class = preg_replace('([()\s=;\/])', '-', $title);
						$term_list = wp_get_post_terms( $post->ID, 'careers_categories');
						$terms = '';
						$terms_readable = '';
						$terms_sort = '';
						foreach ( $term_list as $term ):
							$terms .= 'filter-' . $term->slug;
							$terms_readable .= $term->name;
							$terms_sort .= str_replace(' ', '-', strtolower($term->name));
						endforeach;

						$id = get_field( 'application_id' );
				?>
				<div class="job-item <?php echo $title_class . ' ' . $terms; ?>" data-careers="<?php echo $terms_sort; ?>">
					<div class="job-item-inner">
						<p class="job-item-cat"><?php echo $terms_readable; ?></p>
						<h4 class="job-title"><a href="<?php the_permalink(); ?>?gh_jid=<?php echo $id; ?>" target="_blank"><?php echo get_the_title(); ?> <span class="icon-arrow-right"></span></a></h4>
					</div>
				</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>