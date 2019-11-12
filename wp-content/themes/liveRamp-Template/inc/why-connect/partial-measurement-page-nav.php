<?php $slug = $post->post_name; ?>

<div class="why-connect__section ctn page-nav__wrap">
  <div class="page-nav__content">
    <?php if (strpos($slug, 'cross-channel-attribution') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/measurement/cross-channel-attribution">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/people-in-cart-blue-grey.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-blue-grey">
            Cross-channel Attribution <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>

    <?php if (strpos($slug, 'closed-loop-measurement') === false): ?>
      <div class="page-nav__item">
        <a href="/why-data-connectivity/measurement/closed-loop-measurement">
          <div class="page-nav__item-icon">
            <img src="<?php echo THEME_DIR ?>/assets/img/why-connect/bar-graph-cycle-green.png" alt="" />
          </div>
          <h2 class="page-nav__item-title color-green-lt">
            Closed-loop Measurement <span class="icon-arrow-right"></span>
          </h2>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
