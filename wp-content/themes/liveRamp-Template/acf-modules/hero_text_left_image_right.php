<!-- new092920 -->
<section class="hero_text_left_image_right green-bkg">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell split-text green">
				
				<div class="iconn"><img src="<?php the_sub_field('icon_image') ?>"></div>
				
				<h1><?php the_sub_field('title') ?></h1>
				
				<?php if ( have_rows('content_field_options') ):

				    while ( have_rows('content_field_options') ) : the_row();

				        if ( get_row_layout() == 'text_block' ) :
				            
				           ?><p class="description green"><?php echo get_sub_field('description'); ?></p><?php
				        
				        elseif ( get_row_layout() == 'icon_bullet_list' ): 
							
							$list_items = get_sub_field('list_items') ?>
							
							<ul class="<?php echo (get_sub_field('list_or_columns')=='List') ? 'List':'Columns';?>">
								<?php foreach ($list_items as $list_item): ?>
									<li>
										<div class="list-icon"><img src="<?php echo $list_item['icon'] ?>"></div>
										<p class="green"><?php echo $list_item['item'] ?></p>
									</li>
								<?php endforeach ?>
							</ul>
				        
				        <?php endif;
				    endwhile;
				endif; ?>

			</div>
			
			<div class="cell split-image">
				<div class="img-area">
					<img src="<?php the_sub_field('hero_image') ?>">
				</div>
			</div>
		
		</div>
	</div>
</section>	