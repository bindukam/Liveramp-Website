<?php

function get_terms_string_for_post($taxonomy = false, $terms = false) {

	if( !$taxonomy && !$terms ) {

		$taxonomy = get_object_taxonomies( $post_type )[0];
	}

	if( !$terms ) {
		$terms = wp_get_post_terms( get_the_id(), $taxonomy );
	}

    $term_string = '';

    if( !empty($terms)) {
        foreach( $terms as $index => $term ) {
            $term_string .= ( $index > 0 ) ? ', ' . $term->name : $term->name;
        }
    }

    return $term_string;
}
