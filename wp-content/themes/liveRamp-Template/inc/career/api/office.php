<?php

class office
{
    private  $id;
    private  $name;
    private  $api_endpoint;
    private  $departments = array();

    function __construct($id, $api_endpoint_base_url='https://api.greenhouse.io/v1/boards/liveramp/embed/office?id='){
        $this->id = $id;
        $this->api_endpoint = $api_endpoint_base_url . "$id";
        $this->set_office_properties();
    }

    function get_office_data(){
        $response = wp_remote_get( $this->api_endpoint);
        if(!is_wp_error($response)){
            return  json_decode($response["body"]);
        }
        return false;
    }

    function set_office_properties(){
        $office_data = $this->get_office_data();
        if($office_data){
            $this->name = $office_data->name;
            $this->departments = $office_data->departments;
        }

    }

    function get_departments(){

        $this->remove_departments_with_no_job_opening($this->departments);
        return $this->departments;
    }

    function remove_departments_with_no_job_opening(){
        $department_count = count($this->departments);
        for($i=0; $i<$department_count; $i++){
            if(empty($this->departments[$i]->jobs)){
                unset($this->departments[$i]);
            }
        }
        return $this->departments;
    }
}
