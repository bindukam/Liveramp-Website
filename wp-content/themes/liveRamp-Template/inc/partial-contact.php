<section class="contact-ctn">
	<div class="ctn">
		<h1 class="title">Contact Us</h1>
		<div class="cnt">
			<p>We're located in the technology hub of San Francisco — and we’re always happy to entertain. If you’re interested in bringing your existing audience online, or being one of our publishing or adtech partners, drop us a line. We'd love to tell you our story and hear yours.</p>
		</div>
		<section class="contact-form">
			<script src="<?php echo get_field('marketo_form_url', 'option') ?>/js/forms2/js/forms2.min.js"></script>
			<form id="mktoForm_<?php echo get_field('contact_form_id', 'option') ?>"></form>
			<script>
			// <![CDATA[
			MktoForms2.loadForm("<?php echo get_field('marketo_form_url', 'option') ?>", "982-LRE-196", <?php echo get_field('contact_form_id', 'option') ?>);
			// ]]>
			</script>
		</section>
		<section class="contact-info">
            <?php

            $address_meta_utility = new AddressMetaUtility();
            foreach($address_meta_utility->addresses() as $address):  ?>
            <div class="each-contact">
                    <div class="contact-svg-ctn">
                        <div class="contact-svg-self">
                            <?php
                            if($address['image_type'] == 'svg'){
                                include $address['image'];
                            }else{
                                echo '<img class="align-vertical address-image" src="'.$address['image'].'">';
                            }
                            ?>
                        </div>
                    </div>
                <div class="each-contact-info">
                    <?php foreach($address['contact_info'] as $contact) : ?>
                    <p><?php echo $contact; ?></p>
                    <?php endforeach; ?>
                    <p><a href="<?php echo $address['map_url']; ?>" target="_blank">View Map <span class="icon-arrow-right"></span></a></p>
                </div>
            </div>
            <?php endforeach; ?>
		</section>
	</div>
</section>

