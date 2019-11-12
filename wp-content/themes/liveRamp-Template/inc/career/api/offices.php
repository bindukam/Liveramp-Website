<?php

class offices
{
    private $api_endpoint;

    function __construct($api_endpoint = 'https://api.greenhouse.io/v1/boards/liveramp/embed/offices'){
        $this->api_endpoint = $api_endpoint;
    }

    function get_offices(){
        $response = wp_remote_get( $this->api_endpoint);
        if(!is_wp_error($response)){
            $offices_obj = json_decode($response["body"]);
            return $this->purify_offices_data($offices_obj->offices);
        }
        return false;
    }

    private function purify_offices_data($offices){
        for($i=0; $i<count($offices); $i++){
            if($offices[$i]->id == 0){
                unset($offices[$i]);
            }
        }
        return $offices;
    }

}