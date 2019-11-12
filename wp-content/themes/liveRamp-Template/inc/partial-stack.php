<section class="marketing-stack__wrap block bg-white block-angle-none block-text-dk z-index-37">
  <header class="ctn header-block">
    <h2 class="title"><?php echo get_post_meta(get_the_ID(), '_cmb_headline', true); ?> </h2>
    <h3 class="subtitle"><?php echo get_post_meta(get_the_ID(), '_cmb_detail', true); ?></h3>
  </header>
  <div class="ctn stack">
    <?php
    $i = 0;
    while (have_rows('stack_item')): the_row();
    $icon = get_sub_field('icon');
    $is_svg = LiveRampUtility::is_svg($icon['url']);
    $title = get_sub_field('title');
    $bg = get_sub_field('background_color');
    $content = get_sub_field('content');
    $size = get_sub_field('stack_size');
    $logo = $title ? 'block-stack md-trigger ' : 'block-liveramp ';

    ?>
    <div class="<?php echo $logo . $size . ' bg-' . $bg; ?>" data-modal="md-block-<?php echo $i; ?>">
      <div class="stack-inner">
        <?php if (file_exists(get_attached_file($icon['id'])) && $is_svg): ?>
          <div class="stack-svg">
            <?php include get_attached_file($icon['id']); ?>
          </div>

        <?php else: ?>
          <div class="stack-icon">
            <img src="<?php echo $icon['url'] ?>">
          </div>

          <?php
        endif;

        if ($title):
          echo '<p class="stack-title">' . $title . '</p>';
        endif;
        ?>
      </div>
    </div>
    <?php $i++; endwhile;
    wp_reset_query(); ?>
    <div class="stack stack-underwear">
      <div class="block-stack-underwear stack-sm"></div>
      <div class="block-stack-underwear stack-sm"></div>
      <div class="block-stack-underwear stack-sm"></div>
      <div class="block-stack-underwear stack-sm"></div>
      <div class="block-stack-underwear stack-sm"></div>
      <div class="block-stack-underwear stack-sm"></div>
      <div class="block-stack-underwear stack-lg"></div>
      <div class="block-stack-underwear stack-sm"></div>
      <div class="block-stack-underwear stack-sm"></div>
      <div class="block-stack-underwear stack-md"></div>
      <div class="block-stack-underwear stack-md"></div>
      <div class="block-stack-underwear stack-sm"></div>
    </div>
  </div>
</section>

<?php
$i = 0;
while (have_rows('stack_item')): the_row();
$icon = get_sub_field('icon');
$title = get_sub_field('title');
$title_sm = strtolower(str_replace(' ', '-', $title));
$content = get_sub_field('content');
$cta_text = get_sub_field('cta_text');
?>
<div class="md-modal md-effect md-modal-stack" id="md-block-<?php echo $i; ?>">
  <div class="md-content md-stack">
    <h3 class="md-stack-title"><?php echo $title; ?></h3>

    <div class="cnt md-stack-cnt">
      <?php echo $content; ?>
    </div>
    <div class="md-stack-logos">
      <?php
      $partners = array();
      if (have_rows('partners')):
        while (have_rows('partners')) : the_row();
        $partner_id = get_sub_field('partner_for_popup_window');
        ?>

        <div class="md-stack-logo-item">
          <?php
          $partner = get_partner_by_id($partner_id);
          ?>

          <a href="<?php echo get_home_url() . '/partners/partner-details?pid='.$partner->id; ?> ">
            <img style="width: 165px; height: auto;"
            src="<?php echo $partner->logo_url; ?>">
          </a>
        </div>
        <?php
      endwhile;
    endif;
    ?>
  </div>
  <div class="btn-ctn">
    <?php if (empty($cta_text)) {
      $cta_text = $title . ' Partners';
    } ?>
    <a href="<?php echo get_home_url() . '/partners/#' . $title_sm; ?>" class="btn"><?php echo $cta_text; ?> <span
      class="icon-arrow-right"></span></a>
    </div>
  </div>
  <div class="md-close"></div>
</div>
<?php $i++; endwhile; ?>
