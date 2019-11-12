<?php

// Rafael Marques Excerpt Function
function rm_excerpt($limit = null, $separator = null) {

    // Set standard words limit
    if (is_null($limit)){
        $excerpt = explode(' ', get_the_excerpt(), '15');
    } else {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
    }

    // Set standard separator
    if (is_null($separator)){
        $separator = '...';
    }

    // Excerpt Generator
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).$separator;
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

    return $excerpt;
}
