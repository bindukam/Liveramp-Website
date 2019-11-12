<?php
/**
 * insert partners as a wordpress post type
 */
class InsertPartners
{
  private $partners_data;
  private $simple_image;
  private $optimized_images_directory_path;

  function __construct(){
    $this->optimized_images_directory_path = $this->get_partners_logos_directory_path().'/optimized/';
    $this->partners_data = new PartnersData();
    add_action('upload_partners_logos_in_lr', array($this, 'insert'));
    $this->simple_image = new SimpleImage();
    $this->set_logos_upload_schedule();
  }

  function set_logos_upload_schedule(){
    if( !wp_next_scheduled( 'upload_partners_logos_in_lr' ) ) {
      wp_schedule_event( time(), 'daily', 'upload_partners_logos_in_lr' );
    }
  }

  public function insert(){
      $this->create_partners_logo_directory();
      $this->create_partners_optimized_logo_directory();
      $this->clear_lvrmp_partners_grid_transient();
        foreach ($this->partners_data->partners() as $partner) {
          $this->upload_partners_logo_in_local_dir($partner);
        }
  }

  function clear_lvrmp_partners_grid_transient(){
    delete_transient( '_lvrmp_partners_grid' );
  }


  function upload_partners_logo_in_local_dir($partner){
    $partners_image_name = $this->get_image_name($partner);
    $partners_logos_directory_path = $this->get_partners_logos_directory_path();
    $partners_image_name_with_path = $partners_logos_directory_path . '/' . $partners_image_name;

    //download the image from $partner->logo_url
    if (!function_exists('curl_init')) {
      return false;
    }

    setlocale(LC_ALL, "en_US.UTF8");
    $ch = curl_init($partner->logo_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    $image_data = curl_exec($ch);

    if ($image_data === false) {
      return false;
    }
    $image_size = curl_getinfo($ch, CURLINFO_SIZE_DOWNLOAD);
    curl_close($ch);

    //check for image exist
      if (file_exists($partners_image_name_with_path)) {
        //check if the image identical
        if($image_size != filesize($partners_image_name_with_path)){
          //delete the server image if not identical and update the new image
          unlink($partners_image_name_with_path); //delete the image from server
          file_put_contents($partners_image_name_with_path, $image_data); // upload image on server
          $this->simple_image
              ->load($partners_image_name_with_path)
              ->fit_to_width(150)
              ->save($this->optimized_images_directory_path.$partners_image_name);
        }
      }else{
        file_put_contents($partners_image_name_with_path, $image_data); // upload image on server
        $this->simple_image
            ->load($partners_image_name_with_path)
            ->fit_to_width(150)
            ->save($this->optimized_images_directory_path.$partners_image_name);
      }

    return true;
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

  function get_partners_logos_directory_path(){
    $upload_dir = wp_upload_dir();
    $basedir = $upload_dir['basedir'];
    $partners_logos_directory_path = $basedir . '/partners';
    return $partners_logos_directory_path;
  }


  function create_partners_logo_directory(){
    if (!file_exists($this->get_partners_logos_directory_path())) {
      return mkdir($this->get_partners_logos_directory_path(), 0775, true);
    }
    return true;
  }

  function create_partners_optimized_logo_directory(){
    if (!file_exists($this->get_partners_logos_directory_path().'/optimized')) {
      return mkdir($this->get_partners_logos_directory_path().'/optimized', 0775, true);
    }
    return true;
  }

}

new InsertPartners();
