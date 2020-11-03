<!-- new092920 -->
<section class="hero_text_left_image_right medium-blue-bkg">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell large-8 split-text">
				
				<img src="<?php the_sub_field('icon_image') ?>">
				
				<h1><?php the_sub_field('title') ?></h1>
				
				<?php if ( have_rows('content_field_options') ):

				    while ( have_rows('content_field_options') ) : the_row();

				        if ( get_row_layout() == 'text_block' ) :
				            
				           ?><p class="description"><?php echo get_sub_field('description'); ?></p><?php
				        
				        elseif ( get_row_layout() == 'icon_bullet_list' ): 
							
							$list_items = get_sub_field('list_items') ?>
							
							<ul>
								<?php foreach ($list_items as $list_item): ?>
									<li>
										<img src="<?php echo $list_item['icon'] ?>">
										<p><?php echo $list_item['item'] ?></p>
									</li>
								<?php endforeach ?>
							</ul>
				        
				        <?php endif;
				    endwhile;
				endif; ?>

			</div>
			
			<div class="cell large-4 split-image">
				<div class="img-area">
					<img src="<?php the_sub_field('hero_image') ?>">
				</div>
			</div>
		
		</div>
	</div>
</section>	