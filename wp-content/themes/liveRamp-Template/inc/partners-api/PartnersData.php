<?php

if( !class_exists('PartnersData') ) {


class PartnersData {

    /**
     * Data I need to pass from here
     * 	    foreach ( $terms as $term ):
     *      echo '<option value=".filter-' . $term->slug . '">' . $term->name . '</option>';
     *      endforeach;
     * Return an associate array which will contain all categories as
     * array(
     * array($cat_unique_key => $cat_name),
     * array($cat_unique_key => $cat_name)
     * .
     * .
     * ); this format.
     */

    // key => value lists of partner properties
    public $categories_list = array();
    public $regions_list = array();
    public $certifications_list = array();
    public $levels_list = array();
    public $use_cases_list = array();

    private  $partners = array();
    private $json_api_destination_url;

  public function __construct($json_api_destination_url = 'https://connect.liveramp-live.dev.cc/public/destinations.json'){
     // public function __construct($json_api_destination_url = ABSPATH . 'wp-content/themes/liveramp/inc/partners-api/partners.json'){

        $this->json_api_destination_url = $json_api_destination_url;
        $this->set_partners();
        $this->sort_partners();
    }

    function sort_partners(){
        usort($this->partners, function($a, $b)
        {
            return strcmp(strtolower($a->name), strtolower($b->name));
        });
    }


    private function set_partners(){
       $cache_name = 'lvrmp_partners_data';
       $partners_json_str = get_transient($cache_name);
       if (empty($partners_json_str)) {
          $partners_json_str = file_get_contents( $this->json_api_destination_url );
         set_transient( $cache_name, $partners_json_str, 12 * HOUR_IN_SECONDS );
       }

        if( $partners_json_str ) {
          $partners = json_decode($partners_json_str);

          if( !empty( $partners ) ) {
            foreach($partners as $partner) {
                $partner->categories = $this->reset_partners_category_structure($partner->categories);
                $partner->category_classes = $this->insert_category_classes($partner->categories);
                $partner->title_class = $this->insert_title_class($partner->name);
                $partner->logo_url_in_liveramp_server = $this->insert_logo_url_in_liveramp_server($partner);
                array_push($this->partners, $partner);

                // Set partner filter lists based on partner settings
                $this->set_partner_filter_lists($partner);
            }
          }
        }
    }

    function insert_logo_url_in_liveramp_server($partner){
        $partners_image_name = $this->get_image_name($partner);
        $partners_image_dir = $this->get_partners_image_path();
        $optimized_partners_image_name_with_path = $partners_image_dir . '/optimized/' . $partners_image_name;
        if(file_exists($optimized_partners_image_name_with_path)){
            return $this->get_partners_image_url().'optimized/'.$this->get_image_name($partner);
        }else{
            return $partner->logo_url;
        }
    }

    /**
     * @desc return partners image name based on the id
     * @param $partner
     * @return string
     */
    public function get_image_name($partner) {
        $image_ext = pathinfo($partner->logo_url, PATHINFO_EXTENSION);
        $image_name = $partner->id .'.'. $image_ext;
        return $image_name;
    }

    function get_partners_image_url(){
        $upload_dir = wp_upload_dir();
        $baseurl = $upload_dir['baseurl'];
        $partners_url = $baseurl . '/partners/';
        return $partners_url;
    }


    function get_partners_image_path(){
        $upload_dir = wp_upload_dir();
        $basedir = $upload_dir['basedir'];
        $partners_image_dir = $basedir . '/partners';
        return $partners_image_dir;
    }


    private function set_partner_filter_lists($partner) {
      // Categories
      if ($partner->categories) {
        foreach($partner->categories as $category) {
          $this->categories_list[strtolower(preg_replace('/[^a-z0-9]+/i', '-', $category))] = $category;
        }
      }

      // Regions
      if ($partner->availabilities) {
        foreach($partner->availabilities as $region) {
          $this->regions_list[strtolower(preg_replace('/[^a-z0-9]+/i', '-', $region))] = $region;
        }
      }

      // Certifications
      if ($partner->certifications) {
        foreach($partner->certifications as $certification) {
          $this->certifications_list[strtolower(preg_replace('/[^a-z0-9]+/i', '-', $certification))] = $certification;
        }
      }

      // Levels
      if ($partner->level) {
        $this->levels_list[strtolower(preg_replace('/[^a-z0-9]+/i', '-', $partner->level))] = $partner->level;
      }

      // Use Cases
      if ($partner->use_cases) {
        foreach($partner->use_cases as $use_case) {
          $this->use_cases_list[strtolower(preg_replace('/[^a-z0-9]+/i', '-', $use_case))] = $use_case;
        }
      }
    }

    private function insert_title_class($title){
        $title_class = str_replace(' ', '-', strtolower($title));
        $title_class = str_replace('/', '-', strtolower($title_class));
        $title_class = str_replace('[', '-', strtolower($title_class));
        $title_class = str_replace(']', '-', strtolower($title_class));
        $title_class = str_replace('+', '-', strtolower($title_class));
        $title_class = str_replace('.', '-', strtolower($title_class));
        return $title_class;
    }


    private function reset_partners_category_structure($categories){
        $categories_with_slug_key = array();
        if(is_array($categories)){
            foreach($categories as $category){
                $category_slug = $this->get_slug_from_name($category);
                $categories_with_slug_key[$category_slug] = $category;
            }
        }

        return $categories_with_slug_key;
    }

    /**
     * @param $category name
     * @return $category_slug
     */

    private function get_slug_from_name($category){
        $category_slug = str_replace(' ', '-', strtolower($category));
        return $category_slug;
    }

    function partners(){
        return $this->partners;
    }


   private function insert_category_classes($categories){
       $category_classes = '';
       foreach ( $categories as $category_key => $category ){
           $category_classes .= ' filter-' . $category_key;
       }
       return $category_classes;
   }


    function categories(){
        $categories = array();
        foreach($this->partners as $partner){
            foreach($partner->categories as $category_key => $category){
                array_push($categories, array($category_key => $category));
            }
        }
        return $this->array_unique_multidimensional($categories);
    }

    function array_unique_multidimensional($input)
    {
        $serialized = array_map('serialize', $input);
        $unique = array_unique($serialized);
        return array_intersect_key($input, $unique);
    }

    function get_partner_by_id( $id ) {
        foreach($this->partners as $partner) {
            if ($partner->id == $id) {
                return $partner;
            }
        }
        return false;
    }

}

}
