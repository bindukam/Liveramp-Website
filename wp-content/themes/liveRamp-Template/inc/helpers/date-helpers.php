<?php

function create_friendly_date_string($date_from = false, $date_to = false) {

	$dateString = '';

    $date_from_raw = false;
    $date_to_raw = false;

    if( $date_from ) {

        $date_from = new DateTime($date_from);
        $date_from_raw = $date_from->format('c');

        $date_format = 'M j, Y';

        if( $date_to ) {

            $date_to = new DateTime($date_to);
            $date_to_raw = $date_to->format('c');

            if( $date_to->getTimestamp() > $date_from->getTimestamp() ) {

                if( $date_to->format('Y') === $date_from->format('Y') ) {

                    if( $date_to->format('n') === $date_from->format('n') ) {

                        $dateString = $date_from->format('M j') . ' - ' . $date_to->format('j, Y');

                    } else {

                        $dateString = $date_from->format('M j') . ' - ' . $date_to->format('M j, Y');
                    }

                } else {

                    $dateString = $date_from->format($date_format) . ' - ' . $date_to->format($date_format);
                }
            }

        } else {

            $dateString = $date_from->format($date_format);
        }
    }

    return $dateString;
}
