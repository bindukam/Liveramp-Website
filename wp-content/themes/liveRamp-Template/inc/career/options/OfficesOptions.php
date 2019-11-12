<?php

class OfficesOptions
{

    private $offices;

    function __construct(){
        $offices = new offices();
        $this->offices = $offices->get_offices();
        add_filter('acf/load_field/name=choose_office', array($this, 'set_offices_options_on_acf' ));
    }

    function set_offices_options_on_acf($field){

        $office_choices = array('' => 'Select a office...');
        foreach($this->offices as $office){
            $office_choices[$office->id] = $office->name;
        }
        $field['choices'] = $office_choices;
        return $field;
    }

}

new OfficesOptions();


