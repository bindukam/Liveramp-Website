<?php

$partners_layout = new PartnersLayout();
$partners_data = $partners_layout->partners_data;

if (have_rows('partners')) {
  ?>
  <div class="ctn why-connect__section partners-grid__wrap">
    <div class="partners-grid__content">
      <h3 class="partners-grid__title color-orange">Integrated with:</h3>
        <?php
        while (have_rows('partners')) {
          the_row();
          $partner_id = get_sub_field('partner_for_grid');
          $partner = $partners_data->get_partner_by_id($partner_id);
          ?>
          <div class="partners-grid__item">
            <a href="<?php echo get_home_url() . '/partners/partner-details?pid='.$partner->id; ?> ">
              <div class="partners-grid__item-img" style="background-image: url('<?php echo $partner->logo_url; ?>')"></div>
            </a>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
  <?php
}
