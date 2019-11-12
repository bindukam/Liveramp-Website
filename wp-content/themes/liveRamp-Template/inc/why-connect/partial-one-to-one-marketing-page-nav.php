<?php $slug = $post->post_name; ?>

<div class="why-connect__section ctn page-nav__wrap">
  <div class="page-nav__content">
    <?php if (strpos($slug, 'site-optimization') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/one-to-one-marketing/site-optimization">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/search-gear-orange.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-orange-lt">
            Site Optimization <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>

    <?php if (strpos($slug, 'dynamic-creative-optimization') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/one-to-one-marketing/dynamic-creative-optimization">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/cart-stack-blue.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-blue">
            Dynamic Creative Optimization <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
