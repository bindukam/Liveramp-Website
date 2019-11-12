<?php

class ExcludeDepartmentsOption{

    function __construct()
    {
        add_action('wp_head', array($this, 'print_lr_departments_to_exclude'));
    }

    /**
     * This function will add all departments objects as a javascript variable
     * on career page only.
     */
    function print_lr_departments_to_exclude(){

        $department_ids_to_exclude = get_field('exclude_departments', 'option');
        //var_dump($department_ids_to_exclude); die('all done :)');
        ?>
        <script type="text/javascript">
            var lr_departments_to_exclude = <?php echo json_encode( $department_ids_to_exclude ); ?>;
        </script>
        <?php
    }

}

new ExcludeDepartmentsOption();