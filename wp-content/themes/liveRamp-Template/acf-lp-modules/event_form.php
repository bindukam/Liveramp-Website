<?php
    $theme_uri = get_template_directory_uri();
    $theme_images = $theme_uri.'/dist/assets/images';
    $theme_svg = $theme_images.'/svg';
    
    $img = get_sub_field('event_image');
    if($img) {
        $style = " background-image:url('".$img."') ";
    }
?>

<section class="lp-event-form overlay-me">
	<div class="grid-container module">
        <div class="grid-x grid-padding-x">
			<div class="cell large-6 left-col" style="<?php echo $style; ?>">
                <div class="block primary-bkg">
                    <?php if (get_sub_field('title')): ?>
                    <h2 class="green"><?php the_sub_field('title') ?></h2>
                    <?php endif ?>
                    <?php if (get_sub_field('description')): ?>
                    <div class="green"><?php the_sub_field('description') ?></div>
                    <?php endif ?>
                </div>
			</div>
			<div class="cell large-6 right-col form-cell">
                <?php
                    $gf_id = get_sub_field('register_gravity_form_id');
                    if($gf_id) {
                        gravity_form($gf_id, false, false, false, null, false, 12);
                    }
                ?>
            </div>
        </div>
	</div>
</section>
<div class="lp-form-footer-overlay"></div>
