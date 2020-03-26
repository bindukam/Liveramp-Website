<section class="gallery_headshot" id="headshot-section">
	<div class="grid-container">

		<?php if ((get_sub_field('title')) || get_sub_field('description')): ?>
			<div class="grid-x">
				<div class="cell text-center">
					<?php if (get_sub_field('title')): ?>
						<h2><?php the_sub_field('title') ?></h2>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description') ?>
					<?php endif ?>
				</div>
			</div>	
		<?php endif ?>

		<div class="grid-x large-up-6 medium-up-4 small-up-2 grid-margin-x grid-margin-y">
			<?php if (have_rows('members')): ?>
				<?php $i = 1;  ?>
			    <?php while(have_rows('members')) : ?>
			    <?php the_row(); ?>
			    <?php $modal_id = 'modal_'.$i ?>
			    <?php $member_id = 'member_'.$i?>
			    	<div class="cell member text-center" id="<?php echo $member_id ?>" data-name="<?php the_sub_field('name') ?>" data-position="<?php the_sub_field('position') ?>" data-description="<?php the_sub_field('description') ?>" data-linkedin="<?php the_sub_field('linkedin') ?>" data-twitter="<?php the_sub_field('twitter') ?>" data-photo="<?php the_sub_field('photo') ?>">
			    		<div class="photo-circle-wrapper">
			    			<div class="circle-wrapper">
			    				<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/headhsot-circle-green.svg" alt="photo circle" class="photo-circle">
			    			</div>
			    			<div class="photo-wrapper">
			    				<img src="<?php the_sub_field('photo') ?>" alt="<?php the_sub_field('name') ?>" class="photo">
			    			</div>
			    			
			    		</div>
			    		<p class="name"><?php the_sub_field('name') ?></p>
			    		<p class="position"><?php the_sub_field('position') ?></p>
			    	</div>
			    	<?php ++$i ?>
			    <?php endwhile ?>   
			<?php endif ?>
		</div>
		
	</div>
</section>

<?php 
	$row = get_sub_field('members');
	$total = count($row);
 ?>

<?php if (have_rows('members')): ?>
	<?php $i = 1;  ?>
	
    <?php while(have_rows('members')) : ?>
    <?php the_row(); ?>
    	
    	<?php 
    		$modal_id = 'modal_'.$i;
    		$card_id = 'card_id_'.$i;
    		($i == 1) ? $previous = 'modal_'.$total : $previous ='modal_'.($i-1);
    		($i == $total) ? $next = 'modal_1' : $next ='modal_'.($i+1);
    	?>
    	<div class="reveal large team_modal" id="<?php echo $modal_id ?>" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">
    		
    		<div class="grid-x grid-padding-x align-middle">
    			<div class="cell shrink ">
    				<i class="fal fa-angle-left fa-3x previous arrow" data-show="<?php echo $previous; ?>"></i>
    			</div>
    			<div class="cell auto" data-card_id="<?php echo $card_id ?>" id="<?php echo $card_id ?>">
    				<div class="grid-x grid-padding-x grid-padding-y">
    					<div class="cell medium-7">
    						<h2 class="name green"><?php the_sub_field('name') ?></h2>
    						<div class="underline">
    							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="title underline">
    						</div>
    						<div class="description">
    							<?php the_sub_field('description') ?>
    						</div>
    						<div class="links">
    							<a href="<?php the_sub_field('linkedin') ?>" class="linkedin">
    								<i class="fab fa-linkedin fa-2x"></i>
    							</a>
    							<a href="<?php the_sub_field('twitter') ?>" class="twitter">
    								<i class="fab fa-twitter-square fa-2x"></i>
    								
    							</a>
    						</div>
    						<div class="test-button">test</div>
    					</div>
    					<div class="cell medium-5 photo-cell">
							<div class="photo-wrapper">

								<img src="<?php the_sub_field('photo') ?>" alt="<?php the_sub_field('name') ?>" class="photo">	
							</div>
    					</div>
    				</div>
    			</div>
    			<div class="cell-shrink">
    				<i class="fal fa-angle-right fa-3x next arrow" data-show="<?php echo $next ?>"></i>
    			</div>
    		</div>
    		<button class="close-button" data-close aria-label="Close modal" type="button">
    		   <span aria-hidden="true">&times;</span>
    		 </button>
    	</div>
    	<?php ++$i ?>
    <?php endwhile ?>   
<?php endif ?>

<script>
	$( document ).ready(function() {
	    console.log( "modal ready!" );
	    $('.arrow').on('click', function() {
	    	event.preventDefault();
	    	var show = $(this).attr('data-show');
	    	var close = $('.reveal[aria-hidden="false"]').attr('id');
	    	var close_id = '#'+close;
	    	var open_id = '#'+show;
	    	
	    	
	    	$(close_id).foundation('close');
	    	$(open_id).foundation('open');
	    	e.preventDefault();
	    	/* Act on the event */

	    });

	    $('.test-button').on('click', function() {
	    	event.preventDefault();
	    	$('name').text('Bill');
	    	/* Act on the event */
	    });

	});
</script>
