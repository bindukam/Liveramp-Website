<?php

  if(!isset($pageid)){
    $pageid=null;
  }

  if(have_rows('modules', $pageid)){


    while(have_rows('modules', $pageid)){
      the_row();

      if ( !get_sub_field('deactivate') ) {

        // Carded: Multi-Colored Content Cards
        if(get_row_layout()=='multi_colored_content_cards'){
          include ('acf-modules/multi_colored_content_cards.php');
        }

        // Carded: 4-Card Grid
        if(get_row_layout()=='carded_4_card_grid'){
          include ('acf-modules/carded_4_card_grid.php');
        }

        // Tabbed: Horizontal Tabbed Module
        if(get_row_layout()=='tabbed_horizontal_tabbed_module'){
          include ('acf-modules/tabbed_horizontal_tabbed_module.php'); 
        }

        // Offer Strip
        if(get_row_layout()=='offer_strip'){
          include ('acf-modules/offer_strip.php'); 
        }

        // Offer Strip with Image
        if(get_row_layout()=='offer_strip_with_image'){
          include ('acf-modules/offer_strip_with_image.php'); 
        }
        // 3 CTAs
        if(get_row_layout()=='three_ctas'){
          include ('acf-modules/three_ctas.php'); 
        }

        // Carded Square 6-Card Content
        if(get_row_layout()=='carded_square_6-card_content'){
          include ('acf-modules/carded_square_6-card_content.php');
        }

        // Hero Linework and Imagery
        if(get_row_layout()=='hero_linework_and_imagery'){
          include ('acf-modules/hero_linework_and_imagery.php');
        }

        // Carousel: Right Justified Quote / High Impact Statement Module
        if(get_row_layout()=='carousel-quote-impact-stmt'){
          include ('acf-modules/carousel-quote-impact-stmt.php');
        }

        // Content Standard Image and Text Module
        if(get_row_layout()=='content_standard_image_and_text_module'){
          include ('acf-modules/content_standard_image_and_text_module.php');
        }

        // Content Standard Image and Text Module
        if(get_row_layout()=='content_larger_image_and_text_module'){
          include ('acf-modules/content_larger_image_and_text_module.php');
        }

        // Resource : 3 Card Image and Text
        if(get_row_layout()=='resource_3_card_image_and_text'){
          include ('acf-modules/resource_3_card_image_and_text.php');
        }

        // Resource : 3 Card Image and Text
        if(get_row_layout()=='resource_5or6_card'){
          include ('acf-modules/resource_5or6_card.php');
        }

        // Resource : CTA Split Navigation Module
        if(get_row_layout()=='cta_split_navigation_module'){
          include ('acf-modules/cta_split_navigation_module.php');
        }

        // Hero: Customer Quote Carousel
        if(get_row_layout()=='hero_customer_quote_carousel'){
          include ('acf-modules/hero_customer_quote_carousel.php');
        }

        // Hero: Customer Quote Carousel
        if(get_row_layout()=='tabbed_expanded_left_justified_vertical_tab_module'){
          include ('acf-modules/tabbed_expanded_left_justified_vertical_tab_module.php');
        }

        // Hero: Simple Text
        if(get_row_layout()=='hero_simple_text'){
          include ('acf-modules/hero_simple_text.php');
        }

        // Hero: Centered Text
        if(get_row_layout()=='hero_centered_text'){
          include ('acf-modules/hero_centered_text.php');
        }

        // Gallery Icon Grid
        if(get_row_layout()=='gallery_icon_grid'){
          include ('acf-modules/gallery_icon_grid.php');
        }

        // Gallery: Hyperlink Grid
        if(get_row_layout()=='galley_hyperlink_grid'){
          include ('acf-modules/galley_hyperlink_grid.php');
        }

        // Breadcrumbs
        if(get_row_layout()=='breadcrumbs'){
          include ('acf-modules/breadcrumbs.php');
        }


        // Standard Video
        if(get_row_layout()=='standard_video'){
          include ('acf-modules/standard_video.php');
        }

        // Gallery: Headshot
        if(get_row_layout()=='gallery_headshot'){
          include ('acf-modules/gallery_headshot.php');
        }

        // Carded Multicard Long Layout
        if(get_row_layout()=='carded_multicard_long_layout'){
          include ('acf-modules/carded_multicard_long_layout.php');
        }

        // Tabbed: Detailed Use Case
        if(get_row_layout()=='tabbed_detailed_use_case'){
          include ('acf-modules/tabbed_detailed_use_case.php');
        }

        // Simple Header
        if(get_row_layout()=='simple_header'){
          include ('acf-modules/simple_header.php');
        }


       // Tabbed: Adjustable padding
       if(get_row_layout()=='adjustable_padding'){
         include ('acf-modules/adjustable_padding.php'); 
       }

        // Blog - Hero
        if(get_row_layout()=='blog_hero'){
          include ('acf-modules/blog_hero.php');
        }

         // Blog -  insert posts
        if(get_row_layout()=='latest_posts_top_6'){
          include ('acf-modules/latest_posts.php');
        }


         // Engineering Blog 
        if(get_row_layout()=='engineering_blog'){
          include ('acf-modules/engineering_blog.php');
        }

         // News Archive
        if(get_row_layout()=='news_archive'){
          include ('acf-modules/news_archive.php');
        }

         // Events Archive
        if(get_row_layout()=='events_archive'){
          include ('acf-modules/events_archive.php');
        }

         // Testimonials Archive
        if(get_row_layout()=='testimonials_archive'){
          include ('acf-modules/testimonials_archive.php');
        }

         // Video Hero
        if(get_row_layout()=='video_hero'){
          include ('acf-modules/video_hero.php');
        }


      }
    }
  }
?>
