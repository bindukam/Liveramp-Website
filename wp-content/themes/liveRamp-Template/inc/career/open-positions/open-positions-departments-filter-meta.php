<?php

class OpenPositionsDepartmentFiltersMeta{
    public $exclude_departments;
    function __construct($exclude_departments='')
    {
        $this->exclude_departments = $exclude_departments;
        add_filter('acf/load_field/name=exclude_departments', array($this, 'department_filter_options_load_field' ));
    }


    public static function get_departments(){
        $remote_url = 'https://api.greenhouse.io/v1/boards/liveramp/embed/departments';
        $respose_from_greenhouse = wp_remote_get($remote_url);
        if(!is_wp_error( $respose_from_greenhouse )){
            $departments = json_decode($respose_from_greenhouse["body"]);
            return self::remove_department_named_no_department($departments->departments);
        }
        return false;
    }

    function remove_department_named_no_department($departments){
        $filtered_department = array();
        foreach($departments as $department){
            if(strtolower($department->name) != 'no department'){
                $filtered_department[] = $department;
            }
        }
        return $filtered_department;
    }

    public static function get_departments_with_jobs(){
            return self::remove_empty_departments(self::get_departments());
    }


    private function remove_empty_departments($departments){
        $filtered_department = array();
        foreach($departments as $department){
            if(!empty($department->jobs)){
                $filtered_department[] = $department;
            }
        }
        return $filtered_department;
    }


    function department_filter_options_load_field($field){
        $departments = self::get_departments();
        $department_choices = array();
        foreach($departments as $department){
            $department_choices[$department->id] = $department->name;
        }
        $field['choices'] = $department_choices;
        return $field;
    }


}

new OpenPositionsDepartmentFiltersMeta();