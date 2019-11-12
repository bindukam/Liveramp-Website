<?php
/**
 * insert partners as a wordpress post type
 */
class InsertPartners
{
  private $partners_data;
  private $simple_image;
  private $optimized_images_directory_path;
  private $optimized_images_directory_url;

  function __construct(){
    $this->optimized_images_directory_path = $this->get_partners_logos_directory_path().'/optimized/';
    $this->optimized_images_directory_url = $this->get_partners_logos_directory_url().'/optimized/';
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


  /**
   * Download partners logo into local directory.
   */
  public function insert(){
    $log = new LR_Logger();
    $log->add("upload-partner-logos-cron", "Cron Started at @ " . date('d/m/Y g:i:s A', time())."\n\n");

      $this->create_partners_logo_directory();
      $this->create_partners_optimized_logo_directory();
      $this->clear_lvrmp_partners_grid_transient();
        foreach ($this->partners_data->partners() as $partner) {
          $this->upload_partners_logo_in_local_dir($partner);
        }

    $log->add("upload-partner-logos-cron", "\n\nCron Finished at @ " . date('d/m/Y g:i:s A', time()));
    $log->add("upload-partner-logos-cron", "Next 'upload_partners_logos_in_lr' cron schedule at @ "
        . date('d/m/Y g:i:s A', wp_next_scheduled( 'upload_partners_logos_in_lr' ))
        . "::". date('d/m/Y g:i:s A', time())."\n\n");

  }

  function clear_lvrmp_partners_grid_transient(){
    delete_transient( '_lvrmp_partners_grid' );
    $log = new LR_Logger();
    $log->add("upload-partner-logos-cron", "_lvrmp_partners_grid transient deleted.");
  }


  function upload_partners_logo_in_local_dir($partner){
    $log = new LR_Logger();
    $partners_image_name = $this->get_image_name($partner);
    $partners_logos_directory_path = $this->get_partners_logos_directory_path();
    $partners_image_name_with_path = $partners_logos_directory_path . '/' . $partners_image_name;
    $partners_image_name_with_url = $this->get_partners_logos_directory_url() . '/' . $partners_image_name;

    //download the image from $partner->logo_url
    if (!function_exists('curl_init')) {
      $log->add("upload-partner-logos-cron", "Upload partners logo in local dir exit unexpectedly as the curl_init function does not exist.Please contact with hosting provider to enable curl for your account.");
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
        $log->add("upload-partner-logos-cron", "Partner's image already exist in local server. ".$partners_image_name_with_url ."\nNow checking is this image updated or not in partner's API  server.");

        //check if the image identical
        if($image_size != filesize($partners_image_name_with_path)){
          $log->add("upload-partner-logos-cron", $partners_image_name_with_url ." this image updated on partners API server.");

          //delete the server image if not identical and update the new image
          unlink($partners_image_name_with_path); //delete the image from server
          $log->add("upload-partner-logos-cron", $partners_image_name_with_url ." deleted from local server.");

          file_put_contents($partners_image_name_with_path, $image_data); // upload image on server
          $log->add("upload-partner-logos-cron", $partners_image_name_with_url ." redownloaded from API server.");

          $this->simple_image
              ->load($partners_image_name_with_path)
              ->fit_to_width(150)
              ->save($this->optimized_images_directory_path.$partners_image_name);
          $log->add("upload-partner-logos-cron", $partners_image_name_with_url ." optimized and saved at ". $this->optimized_images_directory_url . $partners_image_name);

        }else{
          $log->add("upload-partner-logos-cron", $partners_image_name_with_url ." We get the local partner's image ". $partners_image_name_with_url ." and API server image ".$partner->logo_url." is identical so leave the local image without replacing with API server's one.");
        }

      }else{
        $log->add("upload-partner-logos-cron", "Partner's image not exist in local server. ".$partners_image_name_with_url ." Now downloading the image from API server.");

        file_put_contents($partners_image_name_with_path, $image_data); // upload image on server
        $this->simple_image
            ->load($partners_image_name_with_path)
            ->fit_to_width(150)
            ->save($this->optimized_images_directory_path.$partners_image_name);

        $log->add("upload-partner-logos-cron", $partners_image_name_with_url ." optimized and saved at ". $this->optimized_images_directory_url.$partners_image_name);
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



  function get_partners_logos_directory_url(){
    $upload_dir = wp_upload_dir();
    $base_url = $upload_dir['baseurl'];
    $partners_logos_directory_url = $base_url . '/partners';
    return $partners_logos_directory_url;
  }


  function create_partners_logo_directory(){
    $log = new LR_Logger();
    if (!file_exists($this->get_partners_logos_directory_path())) {
      $log->add("upload-partner-logos-cron", "Local partners image directory missing!");

      if(mkdir($this->get_partners_logos_directory_path(), 0775, true)){
        $log->add("upload-partner-logos-cron", "Local partners image directory created at ". $this->get_partners_logos_directory_path());

        return true;
      }
      return false;
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
