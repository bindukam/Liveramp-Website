<?php

function custom_rewrite_tag() {
	add_rewrite_tag('%partners%', '([^&]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);


function custom_rewrite_rule() {
	//add_rewrite_rule('^partners/([^/]*)/?','index.php?page_id=195&partner=$matches[1]','top');
	add_rewrite_rule('^partners/([^/]*)/?','index.php?pagename=partners&partner=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);


add_filter('query_vars', 'add_partner_var', 0, 1);
function add_partner_var($vars){
    $vars[] = 'partner';
    return $vars;
}
