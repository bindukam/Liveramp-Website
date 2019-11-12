<?php

/**
 * Add terms to filters
 */
function add_terms_to_filters( &$filters ) {

    foreach( $filters as &$filter ) {

        $filter['items'] = [];

        $terms = get_terms([
            'taxonomy' => $filter['tax_name'],
            'hide_empty' => true
        ]);

        foreach ($terms as $term) {

            if( $term->name !== 'Uncategorized' ) {

                array_push($filter['items'], [
                    'id' => $term->term_id,
                    'display_name' => $term->name,
                    'slug' => sanitize_title($term->name),
                    'visible' => true
                ]);
            }
        }
    }
}


/**
 * Attach filters to an item
 */
function attach_filters_to_item( $filters, &$item ) {

    foreach ($filters as $filter) {

        $terms = wp_get_post_terms( $item['id'], $filter['tax_name'] );

        $cat_ids = [];

        foreach( $terms as $term ) {

            array_push($cat_ids, $term->term_id );
        }

        $item[ $filter['name'] ] = $cat_ids;

        if( count( $terms ) ) {

            if( $terms[0]->name !== 'Uncategorized' ) {

                $item[ 'tax_slug' ] = ' tag-' . $terms[0]->slug;
                $item[ 'tax_name' ] = $terms[0]->name;
            }
        }
    }
}

/**
 * Enqueue scripts and styles
 */
function arc_scripts() {

    global $post;

    $url = $_SERVER['SERVER_NAME'];

    if( is_post_type_archive(['blog', 'engineering']) || is_singular(['blog', 'engineering', 'resource_link']) || is_search() ) {

        $blog_styles_file = 'blog.css';
        $modified_time = filemtime( get_template_directory() . "/$blog_styles_file" );

        wp_register_style( 'blog', get_template_directory_uri() . "/$blog_styles_file?" . $modified_time, false, null, 'screen' );
        wp_enqueue_style( 'blog', get_template_directory_uri() . "/$blog_styles_file?" . $modified_time );

        // wp_enqueue_script('custom-scrollbar-js',THEME_DIR . '/assets/js/lib/jquery.mCustomScrollbar.concat.min.js',array('jquery'),'1',true);

        $javascript_file = 'blog.min.js';

        if ($javascript_file) {

            //wp_enqueue_script( 'vendor', get_template_directory_uri() . "/_js/vendor.js?" . $modified_time, 'jquery', '1', true );

            // get modified time for smart caching
            $modified_time = filemtime(get_template_directory()."/_js/$javascript_file");
            wp_enqueue_script( 'blog', get_template_directory_uri() . "/_js/$javascript_file?" . $modified_time, 'vendor', '1', true );

            // Copied from function above
            //wp_enqueue_script('liveramp-api-js', 'https://app.greenhouse.io/embed/job_board/js?for=liveramp', array('jquery'), '1', true);
            wp_enqueue_script('marketoForms', get_field('marketo_form_url', 'option') . '/js/forms2/js/forms2.min.js');
            wp_enqueue_script('custom-scrollbar-js',THEME_DIR . '/assets/js/lib/jquery.mCustomScrollbar.concat.min.js',array('jquery'),'1',true);
            wp_enqueue_script('main', THEME_DIR . '/bld/bld.min.js', array('jquery'), '1', true);

        }

    } else {

        $styles_file = 'style.min.css';
        $modified_time = filemtime( get_stylesheet_directory() . "/$styles_file" );

        wp_enqueue_style( 'main', get_stylesheet_directory_uri() . "/$styles_file?" . $modified_time, false, null, 'screen' );

        /**
        * Remove jQuery from being automatically output on front end
        */
        if (!is_admin()) {
            wp_deregister_script('jquery');
        }

        // work out if there is a codekit concatenated/minified version. If so, include that, otherwise, include main.js. If no javascript, don't include anything!
        $javascript_file = (file_exists(get_stylesheet_directory() . '/_js/scripts.min.js')) ? 'scripts.min.js'
                    : (file_exists(get_stylesheet_directory() . '/_js/scripts.js') ? 'scripts.js' : false);

        //I am for testing. Do not commit me.
        //$javascript_file = 'scripts.js';
        //for realz tho

        if( $javascript_file ) {

            // get modified time for smart caching
            $modified_time = filemtime(get_template_directory()."/_js/$javascript_file");
            wp_enqueue_script( 'vendor', get_template_directory_uri() . "/_js/vendor.js?" . $modified_time, 'jquery', '1', true );
            wp_enqueue_script( 'main', get_template_directory_uri() . "/_js/$javascript_file?" . $modified_time, 'vendor', '1', true );
        }
    }

    if( is_page_template('page-careers-all.php') ) {

        $javascript_file = (file_exists(get_stylesheet_directory() . '/_js/careers.min.js')) ? 'careers.min.js'
                    : ((file_exists(get_stylesheet_directory() . '/_js/careers.js')) ? 'careers.js' : false);

        $javascript_file = 'careers.js';
        wp_enqueue_script( 'careers', get_template_directory_uri() . "/_js/$javascript_file?" . $modified_time, 'vendor', '1', true );
    }

    if( is_page_template('page-job.php') )
    {
        wp_enqueue_script('liveramp-api-js', 'https://app.greenhouse.io/embed/job_board/js?for=liveramp', array(), '1', true);
    }

// =============================================================================
//  Resources OLD
// =============================================================================

    if( is_page_template('page-resources.php') ) {

        $categories = [];

        $post_type = 'resources';

        $taxonomy = get_object_taxonomies( $post_type )[0];

        $terms = get_terms([
            'taxonomy' => $taxonomy, //'resources_categories',
            'hide_empty' => false
        ]);

        $filter_items = [];

        foreach ($terms as $term) {

            array_push($filter_items, [
                'id' => $term->term_id,
                'display_name' => $term->name,
                'slug' => sanitize_title($term->name)
            ]);
        }

        // $video_index = count( $filter_items ); // Category indexes aren't being incremented - ids taken from wordpress @todo maybe increment them

        $video_index = 99; // Use 99 as there are not likely to be this many categories / have this category id

        $count_videos = wp_count_posts( 'webinars' );

        if( isset($count_videos->publish) ) {

            array_push($filter_items, [
                'id' => $video_index,
                'display_name' => 'Videos',
                'slug' => 'videos'
            ]);
        }

        $filters = [
            [
                'name' => 'categories',
                'tax_name' => $taxonomy,
                'name_in_partners' => 'categories', // only because the property names aren't matching up (!)
                'display_name' => 'Categories',
                'type' => 'or',
                'style' => 'inline',
                'items' => $filter_items,
                'has_all_button' => true,
                'all_button_text' => ( strpos( $url, 'fr' ) ) ? 'Toutes' : 'All'
            ]
        ];

        if( strpos( $url, 'fr' ) ) {

            $filters[0]['update_url'] = true;
        }

        $args = array(
            'post_type' => [ $post_type, 'webinars' ],
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'ASC'
        );

        // We then pass these to a wordpress query, and setup our loop
        $items_query = new WP_Query( $args );

        $sorted_resources = [];

        if( $items_query->have_posts() ) : while( $items_query->have_posts() ): $items_query->the_post();

            $cat = get_the_category();

            $target_blank = false;

            if( $marketo_url = get_field('marketo') ) {

                $url = $marketo_url;
                $target_blank = true;

            } elseif( $pdf_url = get_field('download') ) {

                $url = $pdf_url;
                $target_blank = true;

            } elseif( get_post_type() === 'webinars' ) {

                $url = false;

            } else {

                $url = get_the_permalink();
            }


            $this_item = [
                'id' => get_the_id(),
                'name' => get_the_title(),
                'pdf_url' => get_field('download'),
                'color' => strtolower(str_replace(' ', '-', get_field('color'))),
                'link_url' => get_the_permalink(),
                'marketo_url' => get_field('marketo')
                //'icon' => get_field('resource_icon')
            ];

            $play_video_text = ( strpos( $_SERVER['SERVER_NAME'], 'fr' ) ) ? 'Lire la vidéo' : 'Play Video';
            $go_to_video_text = ( strpos( $_SERVER['SERVER_NAME'], 'fr' ) ) ? 'Aller à la vidéo' : 'Go to Video';

            foreach ($filters as $filter) {
                // If has categories
                // print_r( wp_get_post_terms( get_the_id(), $filter['tax_name'] ) );

                $terms = wp_get_post_terms( get_the_id(), $filter['tax_name'] );

                $cat_ids = [];

                foreach( $terms as $term ) {

                    array_push($cat_ids, $term->term_id );
                }

                $this_item[ $filter['name'] ] = $cat_ids;

                if( count( $terms ) ) {

                    $this_item[ 'icon' ] = $terms[0]->slug;
                }
            }

            if( get_post_type() === 'webinars' ) {

                $this_item[ 'categories' ] = [];

                $this_item[ 'icon' ] = 'webinars';

                array_push( $this_item[ 'categories' ], $video_index);

                $pattern = '/vimeo\.com(\/video)?\/(?<code>\d+)/i';

                $matches = [];

                $embed = '';

                if( preg_match($pattern, get_field('webinar_link'), $matches) !== false )
                {
                    if(isset($matches['code'])):

                        $embed = Resources::make_vimeo_iframe($matches['code'], '<span>'.$play_video_text.'</span>');

                    else:

                        $url = get_field('webinar_link');
                        $target_blank = true;
                        $embed = '<span>'.$go_to_video_text.'</span>';

                    endif;
                }
                else {

                }

                $this_item[ 'video_embed' ] = $embed;
            }

            $this_item[ 'url' ] = $url;
            $this_item[ 'target_blank' ] = $target_blank;

            array_push( $sorted_resources, $this_item );

        endwhile; endif;

        // Reset postdata
        wp_reset_postdata();

        $filter_data = [
            'all_items' => array_reverse($sorted_resources),
            'filters' => $filters,
            'display_count' => 12,
            'read_more_text' => ( strpos( $_SERVER['SERVER_NAME'], 'fr' ) ) ? 'Voir plus' : 'Load more'
        ];

        wp_enqueue_script('filter_object', get_template_directory_uri() . '/ajax.js');
        wp_localize_script( 'filter_object', 'filter_data', $filter_data );
    }

// =============================================================================
//  Resources NEW
// =============================================================================

    if( is_page_template('page-resources-new.php') ) {

        $categories = [];

        $post_type = 'resources';

        $taxonomy = get_object_taxonomies( $post_type )[0];

        $terms = get_terms([
            'taxonomy' => $taxonomy, //'resources_categories',
            'hide_empty' => false
        ]);

        $filter_items = [];

        foreach ($terms as $term) {

            array_push($filter_items, [
                'id' => $term->term_id,
                'display_name' => $term->name,
                'slug' => sanitize_title($term->name)
            ]);
        }

        // $video_index = count( $filter_items ); // Category indexes aren't being incremented - ids taken from wordpress @todo maybe increment them

        $filters = [
            [
                'name' => 'categories',
                'tax_name' => 'resources_categories',
                'display_name' => 'Type',
                'type' => 'or',
                'style' => 'dropdown',
                'items' => $filter_items,
                'has_all_button' => true,
                'all_button_text' => ( strpos( $url, 'fr' ) ) ? 'Toutes' : 'All'
            ],
            [
                'name' => 'audience',
                'tax_name' => 'resources_audiences',
                'display_name' => 'Audience',
                'type' => 'or',
                'style' => 'dropdown',
                'items' => $filter_items,
                'has_all_button' => true,
                'all_button_text' => ( strpos( $url, 'fr' ) ) ? 'Toutes' : 'All'
            ],
            [
                'name' => 'topics',
                'tax_name' => 'resources_topics',
                'display_name' => 'Topics',
                'type' => 'or',
                'style' => 'dropdown',
                'items' => $filter_items,
                'has_all_button' => true,
                'all_button_text' => ( strpos( $url, 'fr' ) ) ? 'Toutes' : 'All'
            ]
        ];

        if( strpos( $url, 'fr' ) ) {

            $filters[0]['update_url'] = true;
        }

        add_terms_to_filters( $filters );

        $featured_resources = get_field('featured_resources');
        $mid_banner_featured_article = get_field('mid_banner_featured_article');
        $slider = get_field('slider');

        $not_id_ids = [];

        if( !empty($featured_resources) ) {

            foreach( $featured_resources as $resource ) {
                array_push($not_id_ids, $resource->ID);
            }
        }

        if( !empty($slider) )
        {
            foreach( $slider as $resource ) {
                array_push($not_id_ids, $resource->ID);
            }
        }

        if( $mid_banner_featured_article ) {

            array_push($not_id_ids, $mid_banner_featured_article->ID);
        }

        $args = array(
            'post_type' => [ $post_type, 'webinars' ],
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            // 'post__not_in' => $not_id_ids
            // 'meta_query' => array(
            //     'relation' => 'OR',
            //         array(
            //         'key' => 'featured_resources',
            //         'compare' => 'NOT EXISTS'
            //     )
            // )
        );

        // We then pass these to a wordpress query, and setup our loop
        $items_query = new WP_Query( $args );

        $sorted_resources = [];

        if( $items_query->have_posts() ) : while( $items_query->have_posts() ): $items_query->the_post();

            $cat = get_the_category();

            $target_blank = false;
            $is_marketo = false;
	        $is_video = has_term('video', 'resources_categories');

            if( $marketo_url = get_field('marketo') ) {
                $url = $marketo_url;
                $target_blank = true;
	            $is_marketo = true;
            } elseif( $pdf_url = get_field('download') ) {
                $url = $pdf_url;
                $target_blank = true;
            } elseif ( $webinar_url = get_field( 'webinar_link' ) ) {
	            $url          = $webinar_url;
	            $target_blank = true;
            } elseif( $is_video ) {
	            $url = get_field('webinar_link');
	            $target_blank = true;
            } else {
                $url = get_the_permalink();
            }

            $image_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'small');
            $has_thumbnail = get_field('use_vimeo_thumbnail') === 'Yes' ? true : false;
	        $video_link = get_field( 'webinar_link' );

	        if((Resources::is_vimeo($video_link) || (Resources::is_vimeo($video_link) && $is_marketo === true)) && $has_thumbnail === true) :
		        $image_url = Resources::get_vimeo_thumbnail_url($video_link);
	        endif;

            //if( !$image_url ) {
              //  $resource_image_no = rand(10,22);
              //  $image_url = 'http://liverampprod.staging.wpengine.com/wp-content/themes/liveramp/_img/resources-'.$resource_image_no.'.png';
            //}

            $this_item = [
                'id' => get_the_id(),
                'name' => get_the_title(),
                'pdf_url' => get_field('download'),
                'color' => strtolower(str_replace(' ', '-', get_field('color'))),
                'link_url' => get_the_permalink(),
                'image_url' =>  $image_url,
                'marketo_url' => get_field('marketo'),
                'category_string' => ( get_post_type() === 'webinars' ) ? 'Video' : get_terms_string_for_post('resources_categories'),
                'cta_text' => Resources::tile_cta_text(),
                'is_video' => ( $is_video ) ? true : false,
                'remove_play_icon' => get_field('remove_play_icon_on_tile'),
                'is_vimeo' => Resources::is_vimeo($url),
                'vimeo_id' => Resources::vimeo_url_to_id($url),
                'vimeo_class' => 'btn play-button-' . Resources::vimeo_url_to_id($url) . ' js-vimeo-container',
	            'has_thumbnail' => $has_thumbnail
            ];

            if( in_array( get_the_id(), $not_id_ids ) )
            {
                $this_item['show_on_no_filters'] = false;
                $this_item['show_on_text_filter_only'] = true;
            }

            $play_video_text = ( strpos( $_SERVER['SERVER_NAME'], 'fr' ) ) ? 'Lire la vidéo' : 'Play Video';
            $go_to_video_text = ( strpos( $_SERVER['SERVER_NAME'], 'fr' ) ) ? 'Aller à la vidéo' : 'Go to Video';

            attach_filters_to_item( $filters, $this_item );

            if( $is_video && isset($video_index)) {
                array_push( $this_item[ 'categories' ], $video_index);

                $pattern = '/vimeo\.com(\/video)?\/(?<code>\d+)/i';

                $matches = [];

                $embed = '';

                if( preg_match($pattern, get_field('webinar_link'), $matches) !== false )
                {
                    if(isset($matches['code'])): ?>

                        <?php $embed .= '<div class="video">'; ?>

                            <?php $embed .= '<div class="img-wrap js-vimeo-container" video-id="' . $matches['code'] . '"></div>'; ?>

                            <?php $embed .= '<span class="full-size-overlay play-button-' . $matches['code'] . '"></span>'

                            . '<span>'.$play_video_text.'</span>'
                        . '</div>'; ?>

                        <?php $embed .= '<div class="fluid-media-wrapper">' ?>

                            <?php $embed .= '<iframe src="https://player.vimeo.com/video/' . $matches['code'] . '?api=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="video"></iframe>' .
                            '</div>' ?>

                    <?php else:

                        if( $is_video ) {
	                        $url = get_field('webinar_link');
	                        $target_blank = true;
                            $embed = '<span>'.$go_to_video_text.'</span>';
                        }

                    endif;
                }

                $this_item[ 'video_embed' ] = $embed;
            }

            if(empty($url)) {
                $url = get_field('marketo') ;
            }

	        $this_item[ 'url' ] = $url;
            $this_item[ 'target_blank' ] = $target_blank;

	        array_push( $sorted_resources, $this_item );

        endwhile; endif;

        // Reset postdata
        wp_reset_postdata();

        $filter_data = [
            'all_items' => $sorted_resources,
            'filters' => $filters,
            'display_count' => 12,
            'read_more_text' => ( strpos( $_SERVER['SERVER_NAME'], 'fr' ) ) ? 'Voir plus' : 'Load more'
        ];

        wp_enqueue_script('filter_object', get_template_directory_uri() . '/ajax.js');
        wp_localize_script( 'filter_object', 'filter_data', $filter_data );
    }

// =============================================================================
//  About - News
// =============================================================================

    if( is_page_template('page-about.php') ) {

        // This is devised by half custom fields (press release/ featured) and half post types ('news')
        $filters = [
            [
                'name' => 'categories',
                'name_in_partners' => 'categories', // only because the property names aren't matching up (!)
                'display_name' => 'Categories',
                'type' => 'name_compare',
                'style' => 'inline',
                'items' => [
                    [
                        'name' => 'is_featured',
                        'display_name' => ( strpos( $url, 'fr' ) ) ? 'Article vedette' : 'Featured Stories',
                        'slug' => ( strpos( $url, 'fr' ) ) ? 'article-vedette' : 'featured-stories'
                    ],
                    [
                        'name' => 'is_press_release',
                        'display_name' => ( strpos( $url, 'fr' ) ) ? 'Communiqués de presse' : 'Press Releases',
                        'slug' => ( strpos( $url, 'fr' ) ) ? 'communiques-de-presse' : 'press-releases'
                    ]
                ],
                'has_all_button' => true,
                'all_button_text' => ( strpos( $url, 'fr' ) ) ? 'Toutes' : 'All'
            ]
        ];


        if( strpos( $url, 'fr' ) ) {

            $filters[0]['update_url'] = true;
        }

        $post_type = ( strpos( $url, 'fr' ) ) ? 'asset' : 'news';

        $args = array(
            // We want to call all posts the custom post type 'help'
            'post_type' => $post_type,
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'ASC'
        );

        if( strpos( $url, 'fr' ) ) {
            // only get the news type from the meta query

            $args['meta_key'] = 'field_lvrmp_news_fields_0_field_lvrmp_news_postdate';

            $args['meta_query'] = array(
                array(
                    'key' => 'field_lvrmp_asset_type',
                    'value' => 'news',
                    'compare' => '='
                )
            );

            $args['orderby'] = 'meta_value';
            //$args['order'] = 'DESC';
        }

        // We then pass these to a wordpress query, and setup our loop
        $post_query = new WP_Query( $args );

        $sorted_items = [];

        if( $post_query->have_posts() ) : while( $post_query->have_posts() ): $post_query->the_post();

            $cat = get_the_category();

            $target_blank = true;

            // FR uses different field field_lvrmp_news_link, and wraps it in a loop, this is due to data inherited from the old site
            if( have_rows('field_lvrmp_news_fields') ): while( have_rows('field_lvrmp_news_fields') ) : the_row();

                $link = get_sub_field('field_lvrmp_news_link');
                $is_featured = get_sub_field('field_lvrmp_news_featured');
                $is_press = get_sub_field('field_lvrmp_news_press_release');
                $image = get_sub_field('field_lvrmp_news_image');
                $image_url = $image['url'];

                endwhile;
            else:
                $link = get_field('external_link');
                $is_featured = get_field('is_featured');
                $is_press = get_field('is_press');
                $image_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'small' );
                $date = $post -> post_date;

            endif;

            if( !$link )
            {
                $link = get_the_permalink();
                $target_blank = false;
            }

            array_push( $sorted_items, array(
                'id' => get_the_id(),
                'name' => get_the_title(),
                'is_featured' => $is_featured,
                'is_press_release' => $is_press,
                'external_link' => $link,
                'link_url' => get_the_permalink(),
                'image_url' => $image_url,
                'target_blank' => $target_blank,
                'date' => strtotime($date)
            ));

        endwhile; endif;

        wp_reset_postdata();

        $filter_data = [
            'all_items' => $sorted_items,
            'filters' => $filters,
            'display_count' => 12,
            'read_more_text' => ( strpos( $_SERVER['SERVER_NAME'], 'fr' ) ) ? 'Voir plus' : 'Load more'
        ];

        wp_enqueue_script('filter_object', get_template_directory_uri() . '/ajax.js');
        wp_localize_script( 'filter_object', 'filter_data', $filter_data );
    }

// =============================================================================
//  About - News
// =============================================================================

    if( is_page_template('page-events.php') || is_page_template('page-events-new.php') ) {

        $post_type = 'events';

        $filters = [
            [
                'name' => 'locations',
                'tax_name' => 'events_locations',
                'display_name' => 'Locations',
                'sub_children_hierarchy' => true,
                'type' => 'or', // name_compare, and
                'style' => 'dropdown',
                'items' => [],
                'has_all_button' => true,
                'all_button_text' => ''
            ],
            [
                'name' => 'liveramp_will_be',
                'tax_name' => 'events_liveramp',
                'display_name' => 'Type',
                'sub_children_hierarchy' => true,
                'type' => 'or',
                'style' => 'dropdown',
                'items' => [],
                'has_all_button' => false,
                'all_button_text' => false
            ],
            [
                'name' => 'dates',
                'tax_name' => false,
                'display_name' => 'Date',
                'sub_children_hierarchy' => false,
                'type' => 'or',
                'style' => 'dropdown',
                'items' => [
                    [
                        'id' => 1,
                        'display_name' => 'This Month',
                        'slug' => 'this-month',
                        'visible' => true
                    ],
                    [
                        'id' => 2,
                        'display_name' => 'Next Month',
                        'slug' => 'next-month',
                        'visible' => true
                    ],
                    [
                        'id' => 3,
                        'display_name' => 'Previous Events',
                        'slug' => 'previous-events',
                        'visible' => true,
                        'make_other_filters_visible' => ['has_event_in_future']
                    ]
                ],
                'has_all_button' => false,
                'all_button_text' => false
            ]
        ];

        foreach( $filters as &$filter )
        {
            if( $filter['tax_name'] ) {

                /** Get all taxonomy terms */
                $terms = get_terms( $filter['tax_name'], array(
                       "orderby"    => "term_group", // so the parents come first and the loop below works
                       "hide_empty" => true,
                       "visible" => true
                    )
                );

                foreach( $terms as $term ) {

                    if( !$filter['sub_children_hierarchy'] || ( !$term->parent && $filter['sub_children_hierarchy'] ) )
                    {
                        $filter['items'][] = array(
                            'id' => $term->term_id,
                            'display_name' => $term->name,
                            'slug' => sanitize_title($term->name),
                            'children' => [],
                            'visible' => true
                        );

                    } else {

                        foreach ($filter['items'] as &$filter_item) {

                            if( $filter_item['id'] === $term->parent ) {

                                $filter_item['children'][] = array(
                                    'id' => $term->term_id,
                                    'display_name' => $term->name,
                                    'slug' => sanitize_title($term->name),
                                    'visible' => true
                                );
                            }
                        }
                    }
                }
            }
        }

        $taxonomies = get_object_taxonomies( $post_type );

        $taxonomy = $taxonomies[0]; // category

        $slider = get_field('slider');

        $not_id_ids = [];

        if( !empty($slider) )
        {
            foreach( $slider as $resource ) {
                array_push($not_id_ids, $resource->ID);
            }
        }

        $args = array(
            // We want to call all posts the custom post type 'help'
            'post_type' => $post_type,
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'meta_key' => 'date_from',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'post__not_in' => $not_id_ids,
			'meta_query' => array(
				array(
					'key' => 'date_from',
					'value' => date("Y-m-d", strtotime("-14 months")),
					'compare' => '>='
				)
			)
        );

        // We then pass these to a wordpress query, and setup our loop
        $post_query = new WP_Query( $args );

        $sorted_items = [];

        $has_past_events = false;
        $has_events_this_month = false;
        $has_events_next_month = false;

        if( $post_query->have_posts() ) : while( $post_query->have_posts() ): $post_query->the_post();

            $cat = get_the_category();

            $dateString = '';

            $date_from_raw = false;
            $date_to_raw = false;
            $date_from_full = false;
            $date_to_full = false;

            if( $date_from = get_field('date_from') ) {

                $date_from = new DateTime(get_field('date_from'));
                $date_from_raw = $date_from->format('c');
                $date_from_full = $date_from->format('j F Y');

                $date_format = 'M j, Y';

                if( get_field('date_to') ) {

                    $date_to = new DateTime(get_field('date_to'));
                    $date_to_raw = $date_to->format('c');
                    $date_to_full = $date_to->format('j F Y');

                    if( $date_to->getTimestamp() > $date_from->getTimestamp() ) {

                        if( $date_to->format('Y') === $date_from->format('Y') ) {

                            if( $date_to->format('n') === $date_from->format('n') ) {

                                $dateString = $date_from->format('M j') . ' - ' . $date_to->format('j, Y');

                            } else {

                                $dateString = $date_from->format('M j') . ' - ' . $date_to->format('M j, Y');
                            }

                        } else {

                            $dateString = $date_from->format($date_format) . ' - ' . $date_to->format($date_format);
                        }
                    }

                } else {

                    $dateString = $date_from->format($date_format);
                }
            }

            if( $url = get_field('external_link') ) {

                $target_blank = true;
            } else {

                $url = get_the_permalink();
                $target_blank = false;
            }

            $this_item = array(
                'id' => get_the_id(),
                'name' => get_the_title(),
                'link_url' => $url,
                'target_blank' => $target_blank,
                'image_url' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'small' ),
                'description' => rm_excerpt(30),
                'location_names' => '',
                'date' => $dateString,
                'date_from_raw' => $date_from_raw,
                'date_to_raw' => $date_to_raw,
                'date_from_full_text' => $date_from_full,
                'date_to_full_text' => $date_to_full,
                'show_on_no_filters' => true
            );

            foreach( $filters as &$filter )
            {
                // If has categories
                $terms = wp_get_post_terms( get_the_id(), $filter['tax_name'] );

                $cat_ids = [];

                $past = false;

                if( $date_to_raw ) {

                    if( strtotime($date_to_raw) < time() ) {

                        $past = true;
                    }

                } else {

                    if( strtotime($date_from_raw) < time() ) {

                        $past = true;
                    }
                }

                if( $filter['tax_name'] === 'events_locations')
                {
                    foreach( $terms as $term ) {

                        $this_item['location_names'] .= $term->name . ' ';

                        if( !$past ) {

	                        foreach( $filter['items'] as &$option) {

	                        	if( $option['display_name'] === $term->name ) {

	                        		$option['has_event_in_future'] = true;
	                        	}

								foreach( $option['children'] as &$child ) {

									if( $child['display_name'] === $term->name ) {

		                        		$option['has_event_in_future'] = true;
		                        		$child['has_event_in_future'] = true;
		                        	}
								}
	                        }
	                    }
                    }

                } else if( $filter['name'] === 'dates' ) {

                    if( $date_from_raw ) {

                        if( $past ) {

                            $has_past_events = true;
                            array_push( $cat_ids, 3 );
                            $this_item['show_on_no_filters'] = false;

                        } else {

                            if ( strtotime($date_from_raw) < strtotime('first day of next month')) {

                                $has_events_this_month = true;
                                array_push( $cat_ids, 1 );

                            } else if ( strtotime($date_from_raw) < strtotime('last day of next month')) {

                                $has_events_next_month = true;
                                array_push( $cat_ids, 2 );
                            }
                        }
                    }
                }

                foreach( $terms as $term ) {

                    array_push( $cat_ids, $term->term_id );

                    if( $term->parent ) {

                        array_push( $cat_ids, $term->parent );
                    }
                }

                $this_item[ $filter['name'] ] = $cat_ids;

                // Include first slug
                if( count( $terms ) ) {

                    $this_item[ 'slug' ] = $terms[0]->slug;
                }
            }

            array_push( $sorted_items, $this_item );

        endwhile; endif;

        wp_reset_postdata();

        // Hide event dropdowns if there are no events
        if( !$has_past_events ) { $filters[2]['items'][2]['visible'] = false; }
        if( !$has_events_this_month ) { $filters[2]['items'][0]['visible'] = false; }
        if( !$has_events_next_month ) { $filters[2]['items'][1]['visible'] = false; }

        $filter_data = [
            'all_items' => $sorted_items,
            'filters' => $filters,
            'display_count' => 12,
            'search_properties' => [ 'date_from_full_text', 'date_to_full_text', 'location_names' ],
            'read_more_text' => ( strpos( $_SERVER['SERVER_NAME'], 'fr' ) ) ? 'Voir plus' : 'Load more'
        ];

        wp_enqueue_script('filter_object', get_template_directory_uri() . '/ajax.js');
        wp_localize_script( 'filter_object', 'filter_data', $filter_data );
    }

    $ajaxData = array(
        'ajaxurl' => admin_url('admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'ajax-users-nonce' ),
    );

    wp_localize_script( 'app', 'WPaAjax', $ajaxData );
}

add_action( 'wp_enqueue_scripts', 'arc_scripts' );
