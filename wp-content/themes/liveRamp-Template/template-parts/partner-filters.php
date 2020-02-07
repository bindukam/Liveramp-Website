<?php
    $feed_link = get_field('content_api_url','option');
    //$feed_link = 'http://lrpartnerdev.wpengine.com/api/?lang=us';  
    //$feed_link = 'http://lrpartnerdev.wpengine.com/api/?lang=au';  
    $data = json_decode(file_get_contents($feed_link));

    if (!$data) {
      $noData = '<a href="/partners/" class="oops">Oops - Hold on while we try again. (Or click here to reload)</a>';
    } 

?>
<?php //echo $feed_link; ?> 
<input type="search" value="" placeholder="Search the partner directory" id="search"/>
<div class="search-container">
  <h4 class="margin-bottom-2"><?php _translate('filters') ?></h4>
  <form id="partners-form">
    <?php
    $filterCount = 0;
    $filters = $data->filters;
    $filtersDump = array();

    foreach ($filters as $filter) : // loop through the different filers
      $tooltip = '';
      if( $filter->tooltip ) { 
        
        $tooltip = '<div class="tooltips"><span class="tooltip-toggle">i</span><span class="tooltip-content">'. $filter->tooltip .'</span></div>';
       } 
    ?>
      <div class="filter-group relative" id="<?php echo $filter->name; ?>" >
        <label name="<?php echo $filter->name; ?>"><?php echo $filter->display_name . $tooltip ; ?></label>
        <select name="<?php echo $filter->name; ?>" id="<?php echo $filter->tax_name; ?>" class="filter-dropdown ng-binding ng-scope" alt="<?php echo $filter->name; ?>">
           <option value="any" selected>Any</option>
            <?php
            $optionDump = $filter->items;
            foreach ($optionDump as $item) : ?>
               <option value="<?php echo $item->id; ?>" class="filteroption"><?php echo $item->display_name; ?></option>
            <?php
            endforeach;
            ?>
        </select>
      </div>
      <?php
      array_push($filtersDump, $optionDump);
   endforeach;
   ?>
   <div class="hide button outline" id="reset"><?php _translate('reset_filter') ?></div>
   <div class="share-icons horiz-social">
      <?php echo do_shortcode("[wp_social_sharing social_options='facebook,twitter,linkedin']") ?>
    </div>
  </form>
</div>


<div class="partners-container" id="partners-response">
<?php
foreach ($data->all_items as $partner) {
?>
  <div
  class="partner <?php echo $partner->level->slug ?>"
  data-partnername="<?php echo $partner->name ?>"
  data-categories="<?php
      foreach ($partner->categories as $category) {
        echo $category;
        echo " ";
      }
      ?>"
  data-region="<?php
      foreach ($partner->regions as $region) {
        echo $region;
        echo " ";
      }
      ?>"
  data-destination="<?php
      foreach ($partner->{'user-cases'} as $usercase) {
        echo $usercase;
        echo " ";
      }
      ?>"
  data-certification="<?php
      foreach ($partner->certifications as $certification) {
        echo $certification;
        echo " ";
      }
      ?>"
  data-level="<?php
      foreach ($partner->levels as $level) {
        echo $level;
        echo " ";
      }
      ?>">
      <a href="<?php echo home_url() ?><?php echo $partner->page_url ?>" alt="<?php echo $partner->name ?>">
          <div class="partner-content">
              <img src="<?php echo $partner->image_url ?>" class="partner-image">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.5 183.5" class="square-hoverborder"><path class="cls-1" d="M181.75,52.62V13.75a12,12,0,0,0-12-12H147.28"/><path class="cls-2" d="M66.75,181.75h103a12,12,0,0,0,12-12V114.31"/><path class="cls-1" d="M1.75,153.4v16.35a12,12,0,0,0,12,12H34.34"/><path class="cls-3" d="M40.42,1.75H13.75a12,12,0,0,0-12,12V61.31"/></svg>

              <!-- <h2 class="partner-title">
                <?php echo $partner->name ?>
              </h2> -->
          </div>
      </a>
  </div>
<?php
} //end partner foreach
?>
</div>
<div id="partners-results">

</div>
<div id="partners-showcase">
  <?php echo $noData; ?>
</div>
<button id="loadmore" class="hide button down-arrow">
   <?php _translate('load_more')  ?>
</button>
<script type="text/javascript" src="../wp-content/themes/liveRamp-Template/partner-integrations.js"></script>
