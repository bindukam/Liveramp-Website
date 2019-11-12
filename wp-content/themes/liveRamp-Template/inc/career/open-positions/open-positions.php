<?php
class OpenPositions{

    public $department_ids_to_exclude = array();
    function __construct($department_ids_to_exclude = array())
    {
        if(!empty($department_ids_to_exclude)){
            $this->department_ids_to_exclude = $department_ids_to_exclude;
        }
    }

    function get_filtered_departments(){
        $departments = OpenPositionsDepartmentFiltersMeta::get_departments();
        if(empty($this->department_ids_to_exclude)){
            return $departments;
        }
        $filtered_departments = array();
        foreach($departments as $department){
            if(!in_array($department->id, $this->department_ids_to_exclude )){
                $filtered_departments[]= $department;
            }
        }
        return $filtered_departments;
    }


    function open_positions_html(){
        $departments = $this->get_filtered_departments();
        $html = '<section class="block block-text-dk">
                   <div class="open-positions">';
        foreach($departments as $department){
            $html.= '<div class="open-positions-by-department">';
            $html.= '<h2>' . $department->name . '</h2>';
            $html.=  '<ul>';
            foreach ($department->jobs as $job) {
                $html.= '<li><a href="/jobs/?gh_jid=' . $job->id . 'class="transition">' .  $job->title . '</a></li>';
            }
            $html.=  '</ul>
                               </div>';
        }
        $html.= '</div>
            </section>';
        return $html;
    }
    

}
