<?php

class AddressMetaUtility {

    private $meta_key = '_address_liveramp';
    private $addresses_meta;
    private $addresses = array();

    function __construct(){
        $this->addresses_meta = $this->get_addresses_meta_value();
        $this->set_addresses();
    }

    private function get_addresses_meta_value(){
        return get_post_meta(get_the_ID(), $this->meta_key, true);
    }

    private function set_addresses(){
        foreach($this->addresses_meta as $address_meta){
            $address = array();
            $image = $this->set_image_path_or_url($address_meta['image'], $address_meta['image_id']);
            $image_type = $this->is_svg($address_meta['image']) ? 'svg' : 'regular_image_format';
            $address['contact_info'] = $this->contact_info($address_meta['address']);
            $address['map_url'] =  $address_meta['map'];
            $address['image'] = $image;
            $address['image_type'] = $image_type;
            array_push($this->addresses, $address);
        }
    }

    private function contact_info($address_text){
        return explode("\n",$address_text);
    }


    private function set_image_path_or_url($image_url, $image_id){
        if($this->is_svg($image_url)){
           return get_attached_file( $image_id );
        }
        return $image_url;
    }

    private function is_svg($image_url)
    {
        $extension =  substr(strrchr($image_url,'.'), 1);
        if($extension == 'svg'){
            return true;
        }
        return false;
    }

    function addresses(){
        return $this->addresses;
    }


}