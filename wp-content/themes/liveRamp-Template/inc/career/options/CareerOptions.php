<?php

class CareerOptions
{

    function __construct(){
        add_action('wp_head', array($this, 'print_lr_departments'));
        add_filter('acf/load_field/name=lr_department', array($this, 'department_short_description_load_field' ));

    }

    /**
     * This function will add all departments objects as a javascript variable
     * on career page only.
     */
    function print_lr_departments(){
        global $post;

        $departments = $this->get_department_array_from_options_page();
            ?>
            <script type="text/javascript">
                var lr_departments = <?php echo json_encode( $departments ); ?>;
            </script>
            <?php
    }

    /**
     * Return departments array
     */

    function get_department_array_from_options_page(){

        if( have_rows('departments', 'option')  ):
            $departments = array();
            while( have_rows('departments', 'option') ): the_row();
                $departments[] = array('id' => get_sub_field('lr_department'), 'description' => get_sub_field('description') );
            endwhile;
        endif;
        return $departments;
    }


    /**
     * Return the departments as a key/value pair
     */

    function get_department_choices(){
        $respose_from_greenhouse = wp_remote_get('https://api.greenhouse.io/v1/boards/liveramp/embed/departments');
        if(!is_wp_error( $respose_from_greenhouse )){

            $departments = json_decode($respose_from_greenhouse["body"]);
            $departments = $departments->departments;

            $department_choices = array('' => 'Select a department...');
            foreach($departments as $department){
                $department_choices[$department->id] = $department->name;
            }

            // unset the department with id 0.  0 : No Department

            if(isset($department_choices[0])){
                unset($department_choices[0]);
            }

            $department_choices['all_open_positions'] = 'All Open Positions';
            $department_choices['all_open_positions_in_ny'] = 'All Open Positions in NY';


            return $department_choices;

        }

    }

    /*
     * Put the department select option on ACF option page
     */
    function department_short_description_load_field( $field ){
        $field['choices'] = $this->get_department_choices();
        return $field;
    }



    function all_open_positions()
    {
        $departments = $this->get_department_array_from_options_page();

        if( count( $departments ) ) {

            foreach ($departments as $department) {
                if ($department['id'] == 'all_open_positions') {
                    $all_open_position = $department;
                    return $all_open_position;
                }
            }
        }

        return false;
    }

    function all_open_positions_in_ny(){
        $departments = $this->get_department_array_from_options_page();

        if( count( $departments ) ) {

            foreach ($departments as $department) {
                if ($department['id'] == 'all_open_positions_in_ny') {
                    $all_open_positions_in_ny = $department;
                    return $all_open_positions_in_ny;
                }
            }
        }

        return false;
    }

}

new CareerOptions();
