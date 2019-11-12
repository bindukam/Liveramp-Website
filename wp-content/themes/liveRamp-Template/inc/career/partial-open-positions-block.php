<?php
    $title = get_sub_field("title");
    $bg_color = CareerBlockUtility::bg_color_class('green-lt');
    $career_page_type = get_sub_field("career_page_type");

switch ($career_page_type) :
    case 'career-home':
        require_once __DIR__ . '/open-positions/open-positions-block-for-career-home.php';
        break;
    case 'career-department':
        require_once __DIR__ . '/open-positions/open-positions-block-for-career-department.php';
        break;
    endswitch;
