<?php $slug = $post->post_name; ?>

<div class="why-connect__section ctn page-nav__wrap">
  <div class="page-nav__content">
    <?php if (strpos($slug, 'ad-suppression') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/targeting/ad-suppression">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/no-windows-orange.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-orange">
            Ad Suppression <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>

    <?php if (strpos($slug, 'look-alike-modeling') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/targeting/look-alike-modeling">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/spyglass-green.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-green-lt">
            Look-alike Modeling <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>

    <?php if (strpos($slug, 'crm-retargeting') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/targeting/crm-retargeting">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/head-cloud-blue-grey.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-blue-grey">
            CRM Retargeting <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>

    <?php if (strpos($slug, 'cross-channel-marketing') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/targeting/cross-channel-marketing">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/bust-network-blue.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-blue">
            Cross-channel Marketing <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
