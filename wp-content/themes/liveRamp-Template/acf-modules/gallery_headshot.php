<!-- create unique salt to avoid conflics if module is used more than once on a page  -->
<?php
	$salt = rand(5,100);
	$tabs_id = 'tabs-'.$salt;

?>

<section class="gallery_headshot pad-section margin-bottom-1" id="headshot-section-<?php echo $salt ?>">
	<div class="grid-container z-5-r">

		<?php if ((get_sub_field('title')) || get_sub_field('description')): ?>
			<div class="grid-x">
				<div class="cell text-center margin-bottom-1">
					<?php if (get_sub_field('title')): ?>
						<h2 id="<?php echo sanitize_title_with_dashes(get_sub_field('title')) ?>"><?php the_sub_field('title') ?></h2>
						<div class="pad-ul no-lineheight margin-bottom-1">
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg">
						</div>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description') ?>
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>

		<div class="grid-x large-up-6 medium-up-4 small-up-1 grid-margin-x grid-margin-y">
			<?php if (have_rows('members')): ?>
				<?php $i = 1;  ?>
			    <?php while(have_rows('members')) : ?>
			    <?php the_row(); ?>
			    <?php $modal_id = 'modal_'.$i ?>
			    <?php $member_id = 'member_'.$i.'_'.$salt?>
			    	<div class="cell member text-center relative" id="<?php echo $member_id ?>" data-name="<?php the_sub_field('name') ?>" data-position="<?php the_sub_field('position') ?>" data-description="<?php the_sub_field('description') ?>" data-linkedin="<?php the_sub_field('linkedin') ?>" data-twitter="<?php the_sub_field('twitter') ?>" data-photo="<?php the_sub_field('photo') ?>" data-number="<?php echo $i ?>">
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
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/2toneUnderline.svg" class=
						"hide-for-medium">						
			    	</div>
			    	<?php ++$i ?>
			    <?php endwhile ?>
			<?php endif ?>
		</div>

	</div>
</section>




	<div class="reveal large team_modal" id="member_modal-<?php echo $salt ?>" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">
		<?php $terms = get_the_terms( get_the_ID(),'color_theme');  ?>
		<div id="<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
			 foreach ( $terms as $term ) {
				  echo  $term->slug ;
			 }
		}?>-theme" class="grid-x grid-padding-x align-middle">
			<div class="cell shrink ">
				<button class="previous modal_arrow modal_previous" data-member-id=""  data-show="" id="modal_previous"><i class="fal fa-angle-left fa-3x"></i></button>	
			</div>
			<div class="cell auto" data-card_id="" id="">
				<div class="grid-x grid-padding-x grid-padding-y">
					<div class="cell medium-7">
						<h2 class="name green modal_name" id="modal_name">NAME</h2>
						<div class="underline">
							<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="title underline">
						</div>
						<div class="description modal_description" id="modal_description">
							description
						</div>
						<div class="links">
							<a href="link" class="linkedin modal_linkedin" id="modal_linkedin">
								<i class="fab fa-linkedin fa-2x"></i>
							</a>
							<a href="link" class="twitter modal_twitter" id="modal_twitter">
								<i class="fab fa-twitter-square fa-2x"></i>

							</a>
						</div>

					</div>
					<div class="cell medium-5 photo-cell">
						<div class="photo-wrapper">

							<img src="photo" alt="" class="photo hard-shadow modal_photo" id="modal_photo">
						</div>
					</div>
				</div>
			</div>
			<div class="cell shrink">
			<button class="next modal_arrow modal_next" data-member-id=""  data-show="" id="modal_next"><i class="fal fa-angle-right fa-3x"></i></button>
			</div>
		</div>
		<button class="close-button" data-close aria-label="Close modal" type="button">
		   <span aria-hidden="true">&times;</span>
		 </button>
	</div>
<?php
	// total amount of headshots
	$row = get_sub_field('members');
	$total = count($row);

 ?>

<script>
	$( document ).ready(function() {
	    console.log( "modal ready!" );
	    $('#headshot-section-<?php echo $salt ?> .member').on('click', function() {
	    	event.preventDefault();
	    	// console.log(this);
	    	// get total amount of headh shots to set next and previous buttons
	    	var total = <?php echo $total ?>;
	    	var i = $(this).attr('data-number');
	    	i = parseInt(i);

	    	var previous,
	    		next,
	    		modal_id;

	    	if (i == 1) {
	    		previous = total;
	    	}
	    	else {
	    		previous = i-1;
	    	};

	    	if (i == total) {
	    		next = 1;
	    	}
	    	else {
	    		next = i+1;
	    	};


	    	console.log(previous);

	    	// get data to add to modal
	    	var name = $(this).attr('data-name');
	    	var description = $(this).attr('data-description');
	    	var photo = $(this).attr('data-photo');
	    	var twitter = $(this).attr('data-twitter');
	    	var linkedin = $(this).attr('data-linkedin');
	    	var member_id = $(this).attr('id');
	    	// console.log(member_id);

	    	// add proper data to modal
	    	$('.modal_name').text(name);
	    	$('.modal_description').html(description);
	    	$('.modal_photo').attr('src', photo);
	    	$('.modal_linkedin').attr('href', linkedin);
	    	$('.modal_twitter').attr('href', twitter);
	    	$('.modal_previous').attr('data-show', previous);
	    	$('.modal_next').attr('data-show', next);
			// console.log(name);

			if(!twitter) {
				$('.modal_twitter').addClass('hide');
			}
			else {
				$('.modal_twitter').removeClass('hide');	
			}
			
			if(!linkedin) {
				$('.modal_linkedin').addClass('hide');
			}
			else {
				$('.modal_linkedin').removeClass('hide');	
			}
			

	    	$('#member_modal-<?php echo $salt ?>').foundation('open');
			// $('#gallery-headshot-<?php echo $salt ?> #member_modal').addClass('<?php echo $salt ?>')

	    	/* Act on the event */

	    });

	    $('#member_modal-<?php echo $salt ?> .modal_arrow').on('click', function() {
	    	event.preventDefault();
	    	var salt = <?php echo $salt ?>;
	    	// console.log(this);
	    	// get the id for the next modal data show
	    	var id = $(this).attr('data-show');
	    	var member_id = '#member_'+id+'_'+salt;

	    	var i = id;

	    	var total = <?php echo $total ?>;

	    	i = parseInt(i);

	    	var previous,
	    		next,
	    		modal_id;

	    	if (i == 1) {
	    		previous = total;
	    	}
	    	else {
	    		previous = i-1;
	    	};

	    	if (i == total) {
	    		next = 1;
	    	}
	    	else {
	    		next = i+1;
	    	};

	    	// var name = $(member_id).attr('data-name');
	    	// $('#modal_name').text(name);

	    	// get data to add to modal
	    	var name = $(member_id).attr('data-name');
	    	var description = $(member_id).attr('data-description');
	    	var photo = $(member_id).attr('data-photo');
	    	var twitter = $(member_id).attr('data-twitter');
	    	var linkedin = $(member_id).attr('data-linkedin');


			//parse html from description
			// let html = new DOMParser().parseFromString(description, 'text/xml');

	    	// add proper data to modal
	    	$('.modal_name').text(name);
	    	$('.modal_description').html(description);
	    	$('.modal_photo').attr('src', photo);
	    	$('.modal_linkedin').attr('href', linkedin);
	    	$('.modal_twitter').attr('href', twitter);
	    	$('.modal_previous').attr('data-show', previous);
	    	$('.modal_next').attr('data-show', next);
			// console.log(twitter);
	    	// console.log('this');

			if(!twitter) {
				$('.modal_twitter').addClass('hide');
			}
			else {
				$('.modal_twitter').removeClass('hide');	
			}
			
			if(!linkedin) {
				$('.modal_linkedin').addClass('hide');
			}
			else {
				$('.modal_linkedin').removeClass('hide');	
			}

	    	/* Act on the event */
	    });

	});
</script>
