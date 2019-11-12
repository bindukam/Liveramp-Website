<section class="webinars">
	<nav class="nav-sort">
		<div class="ctn">
			<ul class="menu-sort iso-filter-webinars">
				<li><a href="#" data-webinars="*">All</a></li>
				<?php
					$terms = get_terms( 'webinars_categories' );
					if ( !empty( $terms ) && !is_wp_error( $terms ) ):
						foreach ( $terms as $term ):
							echo '<li><a href="#" data-webinars=".filter-' . $term->slug . '">' . $term->name . '</a></li>';
						endforeach;
					endif;
				?>
			</ul>
			<div class="select-ctn">
				<select class="menu-sort iso-select-webinars">
					<option value="*">All</option>
					<?php
						$terms = get_terms( 'webinars_categories' );
						if ( !empty( $terms ) && !is_wp_error( $terms ) ):
							foreach ( $terms as $term ):
								echo '<option value=".filter-' . $term->slug . '">' . $term->name . '</option>';
							endforeach;
						endif;
					?>
				</select>
			</div>
		</div>
	</nav>
	<div class="webinars-list">
		<div class="ctn">
			<div id="iso-webinars" class="iso-webinars">
				<?php 
					$i = 0;
					$args = array( 'post_type' => 'webinars' );
					$loop = new WP_Query( $args );
					while ($loop->have_posts()): $loop->the_post();
						$title = get_the_title();
						$title_class = str_replace(' ', '-', strtolower($title));
						$term_list = wp_get_post_terms( $post->ID, 'webinars_categories');
						$terms = '';
						foreach ( $term_list as $term ):
							$terms .= 'filter-' . $term->slug;
						endforeach;
				?>
				<div class="webinar-item <?php echo $title_class . ' ' . $terms; ?>">
					<figure class="webinars-img"><a href="#" data-toggle="modal" data-target="#webinarModal<?php echo $i; ?>">
						<?php echo get_the_post_thumbnail(); ?>
						<div class="video-btn-ctn">
							<span class="icon-play"></span>
						</div>
					</a></figure>
					<h5 class="webinar-title"><?php the_title(); ?></h5>
					<div class="webinar-cnt">
						<?php the_content(); ?>
					</div>
				</div>
				<?php $i++; endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>


<?php 
	$i = 0;
	$args = array( 'post_type' => 'webinars' );
	$loop = new WP_Query( $args );
	while ($loop->have_posts()): $loop->the_post();
?>
        <!-- Modal -->
        <div class="modal fade" id="webinarModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="webinar" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <?php  echo get_field( 'webinar_link' ); ?>
                    </div>
                </div>
            </div>
        </div>
<?php

    $i++;
	endwhile; 
	wp_reset_query();

?>






