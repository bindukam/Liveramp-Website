<section class="resources">
	<nav class="nav-sort">
		<div class="ctn">
			<ul class="menu-sort iso-filter-resources">
				<li><a href="#" data-resources="*">All</a></li>
				<?php
					$terms = get_terms( 'resources_categories' );
					if ( !empty( $terms ) && !is_wp_error( $terms ) ):
						foreach ( $terms as $term ):
							echo '<li><a href="#" data-resources=".filter-' . $term->slug . '">' . $term->name . '</a></li>';
						endforeach;
					endif;
				?>
			</ul>
			<div class="select-ctn">
				<select class="menu-sort iso-select-resources">
					<option value="*">All</option>
					<?php
						$terms = get_terms( 'resources_categories' );
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
						$args = array( 'post_type' => 'resources' );
						$loop = new WP_Query( $args );
						while ($loop->have_posts()): $loop->the_post();
							$title = get_the_title();
							$title_class = str_replace(' ', '-', strtolower($title));
					?>
					<li><a href="#" data-resources="<?php echo $title_class; ?>"><?php echo $title; ?></a></li>
					<?php endwhile; wp_reset_query(); ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="resources-list">
		<div class="ctn">
			<div id="iso-resources" class="iso-resources">
				<?php 
					$i = 0;
					$args = array( 'post_type' => 'resources' );
					$loop = new WP_Query( $args );
					while ($loop->have_posts()): $loop->the_post();
						$title = get_the_title();
						$title_class = str_replace(' ', '-', strtolower($title));
						$icon = get_field( 'icon' );
						$color = 'bg-' . get_field( 'color' );
						$term_list = wp_get_post_terms( $post->ID, 'resources_categories');
						$terms = '';
						foreach ( $term_list as $term ):
							$terms .= 'filter-' . $term->slug;
						endforeach;
						$marketo = get_field( 'marketo' );
						$download = get_field( 'download' );
				?>
				<div class="each-article <?php echo $title_class . ' ' . $terms; ?>">
					<div class="article-overlay">
						<div class="article-overlay-inner">
							<?php if ( $marketo ): ?>
							<p><a href="<?php echo get_field( 'marketo' ); ?>" target="_blank">Download the PDF<span class="icon-arrow-right"></span></a></p>
							<?php else: ?>	
							<p><a href="<?php the_permalink(); ?>" target="_blank">Take me to the Case Study<span class="icon-arrow-right"></span></a></p>
							<?php endif; ?>
						</div>
					</div>
					<h5 class="article-title"><?php echo $title; ?></h5>
					<div class="article-icon">
						<div class="icon-ctn <?php echo $color; ?>">
							<?php include dirname(__FILE__) . './../assets/img/svg/' . $icon . '.svg'; ?>
						</div>
					</div>
				</div>
				<?php 
					if ( get_field( 'form' ) ) $i++;
					endwhile; wp_reset_query(); 
				?>
			</div>
		</div>
	</div>
</section>

<section class="webinars" id="webinars">
	<figure class="webinars-section-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg/bg-webinars.jpg)">
	</figure>
	<div class="webinars-cnt">
		<div class="webinars-cnt-inner">
			<h1 class="title">Videos</h1>
			<div class="cnt">
				<p>See our list of upcoming and on-demand videos.</p>
			</div>
			<div class="btn-ctn">
				<a href="<?php echo get_home_url(); ?>/webinars" class="btn bg-blue">Go to Videos <span class="icon-arrow-right"></span></a>
			</div>
		</div>
	</div>
</section>