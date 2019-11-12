<?php $slug = $post->post_name; ?>

<div class="why-connect__section ctn page-nav__wrap">
  <div class="page-nav__content">
    <?php if (strpos($slug, 'targeting') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/targeting">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/arrow-in-target-blue.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-blue">
            Targeting <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>

    <?php if (strpos($slug, 'measurement') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/measurement">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/bar-graph-up-orange.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-orange">
            Measurement <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>

    <?php if (strpos($slug, 'one-to-one-marketing') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/one-to-one-marketing">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/flare-blue-grey.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-blue-grey">
            One-to-One Marketing <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
