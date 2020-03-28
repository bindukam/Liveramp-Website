<!-- create unique salt to avoid conflics if module is used more than once on a page  -->
<?php
	$salt = rand(5,100);
	$tabs_id = 'tabs-'.$salt;
	$tabs_title_salt = 'tabs-title-'.$salt;

	if (get_sub_field('alternate_layout')) {
		$alternate_layout = 'alternate-layout';
	}
	else {
		$alternate_layout = '';
	}

	if (get_sub_field('hide_background')) {
		$waves_bkg = '';
	}
	else {
		$waves_bkg = 'waves-bkg';
	}

?>


<section class="tabbed_expanded_left_justified_vertical_tab_module pad-section <?php echo $waves_bkg; ?>">
	<div class="grid-container">

		<?php if ((get_sub_field('title')) || get_sub_field('description')): ?>
			<div class="grid-x">
				<div class="cell title-cell">
					<?php if (get_sub_field('title')): ?>
						<h2 class="title"><?php the_sub_field('title') ?></h2>
					<?php endif ?>
					<?php if (get_sub_field('description')): ?>
						<?php the_sub_field('description') ?>
					<?php endif ?>
					<div class="fixed-underline pad-ul">
						<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" >
					</div>
				</div>
			</div>
		<?php endif ?>

	</div>
	<div class="grid-container relative">
	  <div class="grid-x grid-padding-y align-center wrapper green-bg-box-before <?php echo $alternate_layout; ?>">
	  	<!-- TABS -->
	    <div class="cell medium-4 tabs-wrapper z-5-r">
	      <ul class="vertical tabs" id="<?php echo $tabs_id ?>" data-match-height="true" data-responsive-accordion-tabs="accordion medium-tabs large-tabs" data-allow-all-closed="true">
			<?php if (have_rows('tabs')): ?>
			<?php $i = 1;  ?>
			    <?php while(have_rows('tabs')) : ?>
			    <?php the_row(); ?>
			    	<?php

			    		($i == 1) ? $active = 'is-active' : $active = '' ;

			    		$link = '#panel-'.$salt.'-'.$i;
			    	?>
					<li class="tabs-title <?php echo $active ?>">
						    <a href="<?php echo $link ?>" class="tabs-title-a <?php echo $tabs_title_salt; ?>">
								<div class="title-grid">
									<div class="cell icon-cell">
										<div class="icon-circle">
											<img src="<?php the_sub_field('icon') ?>" alt="icon" class="icon">
										</div>
									</div>
									<div class="cell text">
										<?php the_sub_field('tab') ?>
									</div>
									<div class="cell arrow">
										<i class="far fa-chevron-right arrow"></i>
									</div>
								</div>


						     </a>
							  <!-- <img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/tabbed-divide.svg" alt="" class="tab-divider"> -->

					</li>
					<?php ++$i ?>
			    <?php endwhile ?>
			<?php endif ?>
	      </ul>
	    </div>
	    <!-- CONTENT -->
	    <div class="cell medium-7 panel-wrapper z-5-r">
	      <div class="tabs-content" data-tabs-content="<?php echo $tabs_id; ?>">

			<?php if (have_rows('tabs')): ?>
				<?php $i = 1;  ?>
			    <?php while(have_rows('tabs')) : ?>
			    <?php the_row(); ?>
			    <?php

			    	($i == 1) ? $active = 'is-active' : $active = '' ;

			    	$id = 'panel-'.$salt.'-'.$i;
			    ?>
			    <div class="tabs-panel <?php echo $active ?>" id="<?php echo $id ?>">
			      <div class="icon-wrapper">
			      	<div class="icon-circle show-for-medium">
			      		<img src="<?php the_sub_field('icon') ?>" alt="icon" class="icon">
			      	</div>
			      </div>
			      <div class="white">
						<h4>
							<?php the_sub_field('title') ?>
						</h4>
						<div class="small-separator">	</div>
						<?php the_sub_field('description') ?>
			      </div>

			    </div>

			    <?php ++$i ?>
			    <?php endwhile ?>
			<?php endif ?>

	      </div>
	    </div>
	  </div>
	</div>

</section>

<script>

	$( document ).ready(function() {
	    console.log( "ready!" );
	    var salt = <?php echo $salt; ?>;
	    var tabs_title_salt = '.tabs-title-'+salt;
	    console.log(tabs_title_salt);
	    var tabs_id = 'tabs-'+<?php echo $salt ?>;
	    console.log(tabs_id);
	    var panel = ".tabs-content[data-tabs-content='"+tabs_id+"']";
	    console.log(panel);

	    // check is layout is accorsion
	    var checkTabs = $('.vertical.accordion');

	    // if layout is tabs the run script
	    if (checkTabs.length == 0) {
	    	// I added the calss tabs-title-a to the a element in the the li tabs-title
	    	$(tabs_title_salt).hover(function() {
	    		// get needed elements to change
	    		var target = $(this).attr("href");
	    		var openPanel = $(panel).find('.tabs-panel.is-active');
	    		var openTab = $(tabs_title_salt+'.is-active');
	    		var activeTab = $(tabs_title_salt+"[aria-selected='true']");

	    		// console.log(target);
	    		// console.log(openPanel);

	    		// update the nedded elements on hover

	    		$(openPanel).removeClass('is-active');
	    		$(openTab).removeClass('is-active');
	    		$(activeTab).attr('aria-selected', 'false').parent().removeClass('is-active');
	    		$(target).addClass('is-active');
	    		$(this).attr('aria-selected', 'true').parent().addClass('is-active');


	    	}, function() {
	    		// code for hover off goes here, did not need to do anything but you can add something if needed
	    	});
	    };



	});

</script>
