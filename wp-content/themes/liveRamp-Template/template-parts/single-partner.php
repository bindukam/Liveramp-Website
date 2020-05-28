<?php
$partner_url = get_query_var('partner'); // Checks to see if there is a single partner slug in the URL e.g. liveramp.com/partners/{ partner-slug }
// It's a single partner page
if( $api_url = get_field('content_api_url', 'options') )
{
   //http://lrpartnerdev.wpengine.com/wp-json/acf/?lang=us
   $theurl = 'https://partners.liveramp.com/wp-json/wp/v2/partner/?slug=' . $partner_url . '/&_embed=true';
   $data = json_decode(file_get_contents($theurl));
   //echo '<pre style="background-color:white">'.print_r($data, 1).'</pre>';

   // get the id pf the partner
   $partner_id = $data[0]->id;
   // echo $partner_id;

   $categoriesData = $data[0]->_embedded->{'wp:term'}[0];
   $regionsData = $data[0]->_embedded->{'wp:term'}[1];
   $useCasesdata = $data[0]->_embedded->{'wp:term'}[2];
   $certificationsData = $data[0]->_embedded->{'wp:term'}[3];
   $levelsData = $data[0]->_embedded->{'wp:term'}[4];
   $titleData = $data[0]->title->rendered;
   $contentData = $data[0]->content->rendered;
   $img = $data[0]->_links->{'wp:attachment'}[0]->href;
   //$imageData = json_decode(file_get_contents($img)); // 4.27.20 - didn't work in some cases
   //$imgData = $imageData[0]->guid->rendered;
   $imgData = $data[0]->acf->image_url->url; // 4.27.20 - replacement
   $urlData = $data[0]->acf->external_url;


   $datafilters = json_decode(file_get_contents('https://partners.liveramp.com/api/?lang=us'));
   $filters = $datafilters->filters;
   $categorytool = '<div class="tooltips"><span class="tooltip-toggle">i</span><span class="tooltip-content">' . $filters[0]->tooltip . '</span></div>';
   // $regiontool = $filters[1]->tooltip;
   $usecasetool = '<div class="tooltips"><span class="tooltip-toggle">i</span><span class="tooltip-content">' . $filters[2]->tooltip . '</span></div>';
   $certtool = '<div class="tooltips"><span class="tooltip-toggle">i</span><span class="tooltip-content">' . $filters[3]->tooltip . '</span></div>';
   $leveltool = '<div class="tooltips"><span class="tooltip-toggle">i</span><span class="tooltip-content">' . $filters[4]->tooltip . '</span></div>';

   if( $api_url ): 
      ?>

      <section class="single-partner">
         <div class="white primary-bkg pad-section no-overflow no-margin-bottom">
            <div class="grid-container relative">
               <div class="grid-x margin-1">
         			<div class="cell">
         				<a href="/partners" class="white bold breadcrumb">
                        <?php _translate('back_to_partners')  ?>
                     </a>
         			</div>
         		</div>

               <div class="grid-x partner-hero">
                  <div class="medium-12 large-6 cell">
                     <h6><?php _translate('our_partnership_with')  ?></h6>
                     <h2>
                        <?php echo $titleData; ?>
                     </h2>
                     <div class="small-separator">
                     </div>
                     <?php echo $contentData; ?>
                     <?php if ($urlData) : ?>
                        <a href="<?php echo $urlData ?>"><button class="button outline margin-top-1" ><?php _translate('visit_website')  ?></button></a> 
                     <?php endif; ?>
                  </div>
                  <div class="medium-12 large-6 cell flex-c partner-image align-self-middle">
                     <div class="img-bg-circle">
                        <img src="<?php echo swaphttp ($imgData) ?>">
                     </div>
                  </div>
               </div>
            </div>

         </div>
         <?php if ( $categoriesData || $certificationsData || $regionsData || $levelsData ) : ?>
         <div class="pad-section light-gray-bkg partner-info">
            <div class="grid-container">
               <div class="grid-x align-justify" data-equalizer>

                  <?php if ($categoriesData) : ?>
                  <div class="medium-3 cell relative" id="categories">
                     <div class="info-tag" data-equalizer-watch>Categories<?php echo $categorytool; ?></div>
                     <?php foreach ($categoriesData as $cat){ echo '<p>'.$cat->name.'</p>';  } ?>

                  </div>
                  <?php endif; ?>

                  <?php if ($regionsData) : ?>
                  <div class="medium-3 cell" id="region">
                     <div class="info-tag" data-equalizer-watch>Region Served</div>
                     <?php foreach ($regionsData as $reg){ echo '<p>'.$reg->name.'</p>'; } ?>
                  </div>
                  <?php endif; ?>

                  <?php if ($levelsData) : ?>
                  <div class="medium-3 cell relative" id="level">
                     <div class="info-tag" data-equalizer-watch>Certification Level<?php echo $leveltool; ?></div>
                     <?php foreach ($levelsData as $levl){ echo '<p>'.$levl->name.'</p>'; } ?>
                  </div>
                  <?php endif; ?>

                  <?php if ($certificationsData) : ?>

                  <div class="medium-3 cell relative" id="certifications">
                     <h3 class="info-tag" data-equalizer-watch>Partner Certification<?php echo $certtool; ?></h3>
                     <?php
                     if ($certificationsData[1]) { $certslider = " slider-1card"; } ?>
                        <div class="grid-x align-center<?php echo $certslider ?>">
                        <?php foreach ($certificationsData as $cert){?>
                           <div class="cell small-4 certification <?php echo $cert->slug ?>"></div>
                        <?php } ?>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>

            </div>

         </div>
      <?php endif; ?>


      </section>


      <?php
      wp_reset_postdata();

      $key = 'lvrmp_resource_links_partners';
      
      // QUERY FOR RESOURCES MATCHING OUR PARTNER
      $args = array(
      	'post_type' => 'resource_link',
         'meta_query' => array(
            array(
               'key'     => 'lvrmp_resource_links_partners',
               'value'   => "([[:<:]])$partner_url([[:>:]])",
               'compare' => 'REGEXP'
            )
         )

         // 'resource_link_type' => 'video'

      );
      $resourceQuery = new WP_Query( $args );
      // dump query
      // var_dump($args['meta_query']);
      // echo '<pre>'.var_dump($args['meta_query'][0]['value']).'</pre>';
      // echo '<pre>',var_dump($post),'</pre>';
      // echo $partner_val;

      if ( $resourceQuery->have_posts() ) :
       

         //IF THERE ARE MATCHING RESOURCES: =========?>

         <section class="resources pad-section">
            <div class="grid-container">
               <div class="title-cell text-center">
                  <h2 class="primary"><?php _translate('resources')  ?></h2>
                  <?php the_field('resource_subheader', 'options') ?>
                  <div class="no-lineheight pad-ul">
      					<img src="<?php echo get_template_directory_uri() ?>/dist/assets/images/svg/title-underline.svg" alt="" class="title-underline">
      				</div>
               </div>

              <div class="<?php echo $slider3card;?> grid-x resource-container" data-equalizer>

                  <?php

                  // get resource type
                  $types = get_terms( array(
                     'taxonomy' => 'resources_categories',
                     'hide_empty' => true,
                  ) );
                  //FOR EACH POST:      
                  while ( $resourceQuery->have_posts() ) :
                     $resourceQuery->the_post();   

                     // dump post
                     // echo '<pre>'.var_dump($resourceQuery).'</pre>';
                     $backup = $post; 
                     
                     if ( get_field('thumbnail') ){ 
                        if ( is_array(get_field('thumbnail'))) {
                           $image = get_field('thumbnail')['url'];
                        } else {
                           $image = get_field('thumbnail');
                        }
                     } else { 
                        $image = '/wp-content/uploads/2019/06/blankResource.png'; 

                     }

                     $fill = ' background-size:cover;'; 

                     if ( get_field('link_url') ){ 
                        $url = get_field('link_url');
                        $data_blank = 'data-blank="true"';

                     } else {
                        $url = '/';

                     }

                     $icon = '<img src="/wp-content/uploads/2019/05/Document-1.svg" alt="" class="icon">';

                     $linktype = get_field('link_type');

                     foreach($types as $type) {
                        if ($value == $type->slug) {
                           $typeid = 'resources_categories_' . $type->term_id . '';
                           $icon_url = get_field('icon', $typeid );
                           $icon = '<img src="'.swaphttp($icon_url).'" class="icon">';
                        }
                     }

                     if ($linktype === 'resource')  :
                        $field = get_field_object('field_55e4df5574184');
                        $value = get_field('doc_sub_type');
                        $term_name = $field['choices'][ $value ];

                        $term_id_icon =  $term[0]->term_id;

                        
                        foreach($types as $type) {
                           if ($value == $type->slug) {
                              $typeid = 'resources_categories_' . $type->term_id . '';
                              $icon_url = get_field('icon', $typeid );
                              $icon = '<img src="'.$icon_url.'" class="icon">';

                              if (get_field('resource_card_bg', $typeid )) {
                                 $image = get_field('resource_card_bg', $typeid )[url];
                              }
                           }
                        }
            
                     elseif ($linktype === 'video') :
                        $term_name = 'Video';
                        $data_blank = 'data-blank="false"';

                        foreach($types as $type) {
                           if ($type->slug == 'video') {
                              $typeid = 'resources_categories_' . $type->term_id . '';
                              $icon_url = get_field('icon', $typeid );
                              $icon = '<img src="'.swaphttp($icon_url).'" class="icon">';
                           }
                        }

                     elseif ($linktype ===  'news') :
                        $term_name = 'News';

                        if ( is_array(get_field('blog_post') ) ) {
                           $url = get_field('blog_post')[0]->guid;
                           // var_dump(get_field('blog_post'));

                        };

                     elseif ($linktype ===  'pressrelease') :
                        $term_name = 'News';

                     endif;

                  ?>

                     <div class="cell small-12 medium-4 resource-card click-card grid-y hover-bump" data-url="<?php echo $url; ?>" <?php echo $data_blank; ?> data-equalizer-watch>

                        <div style="background-image:url('<?php echo $image;?>');<?php echo $fill;?>" class="resource-image"></div>
                        <div class="pad-2">
                           <span class="orange margin-bottom-1 flex-m">
                              <?php echo $icon.' '.$term_name; ?>
                           </span>
                           <h4><?php the_title(); ?></h4>
                        </div>



                     </div>
                  <?php endwhile; ?>
                  </div>
               <div class="full-width flex-c margin-top-2">
                  <button class="hide button outline down-arrow" id="loadmore"><?php _translate('load_more')  ?></button>
               </div>
            </div>

         </section>

      	<?php wp_reset_postdata();
      endif; // end resourceQuery =================

      ?>

<section class="offer_strip green-bkg relative round wave-graphic">

	<div class="grid-container z-5-r">
		<div class="grid-x align-middle align-center pad-1">
			<div class="cell medium-4 text-center">
				 <a href="/contact?ref=<?php echo $partner_url ?>" target="_blank" class="button"><?php _translate('get_in_touch')  ?></a>
			</div>
		</div>
	</div>

</section>

<div class="footer-overlay">

</div>
<?php 

endif;
}?>


<script type="text/javascript">

   //call funtion by passing css selectors for group and item, and a number for posts per group
   function loadbyGroup(groupContainer, item = ' > *', postsPerGroup = 3) {
      let array = document.querySelectorAll(`${groupContainer} ${item}`),
          group = 1,
          loadmore = document.querySelector("#loadmore");

      array.forEach(function(theitem, i){

         if (i >= (group * postsPerGroup) ) {
            group += 1;
         }

         theitem.dataset.group = group;

         if (group !== 1) {
            theitem.classList.add('hide');
            loadmore.classList.remove('hide');
         }

      });

      let activeGroup = 1,
      groupsToSkip = 2;

      loadmore.addEventListener('click', function(){
         activeGroup += groupsToSkip;

         let newGroup = document.createElement('div');
         newGroup.classList.add("full-width", "grid-x");
         document.querySelector(groupContainer).append(newGroup);

         array.forEach(function(theitem, i){

            if ( theitem.dataset.group <= activeGroup 
            && theitem.dataset.group > activeGroup - groupsToSkip ) {
                  newGroup.append(theitem);
                  theitem.classList.remove('hide');
                  loadmore.classList.add('hide');

            } else if ( theitem.dataset.group > activeGroup ) {
               loadmore.classList.remove('hide');

            }

            newGroup.classList.toggle('result-swap'); // add animation class...
            setTimeout(function(){
               newGroup.classList.remove('result-swap'); // ...then remove animation class
            }, 1100);
         });
      });
   }
   loadbyGroup('.resource-container', '.resource-card', 3);
</script>

