<?php

// GA CODES

// uk UA-23899090-1
// fr UA-80672320-1
// com UA-23899090-1

$url = $_SERVER['SERVER_NAME'];

if( strpos( $url, 'uk' ) ) {

    // UK
    //define('GOOGLE_ANALYTICS', 'UA-23899090-3'); // removed
    define('GOOGLE_TAG_MANAGER', 'GTM-M989JH3');

    define('GOOGLE_CONVERSION_ID', 1032449543);
    define('GOOGLE_CONVERSION_LABEL', 'F3ZfCK3mgwcQh9yn7AM');
    define('GOOGLE_CONVERSION_LANGUAGE', 'en');

	define('BIZO_PARTNER_ID', "");

    define('MARKETO_APP_ID', 'app-sjl');
    define('MARKETO_FORM_ID', 1004);
    define('MARKETO_SCRIPT_ID', '320-CHP-056');

    define('BUGHERD', '8eyjx5jmwtdborsqv2lvdq');

    if( strpos( $url, 'staging' ) ) {

        define('CIVIC_COOKIES_API_KEY', 'badaba8946c45b04513a0f7f487767da162ffb13');

    } else {
        // Ours (live): 0948d0430f2ca793d1b134c3216cb8601d916349
        // Their old (live): e2803f3595742c4b362eb46b7f70fbf3a56ec999
        define('CIVIC_COOKIES_API_KEY', '0948d0430f2ca793d1b134c3216cb8601d916349');
    }

} else if( strpos( $url, 'fr' ) ) {

    // FR
    // define('GOOGLE_ANALYTICS', 'UA-80672320-1');
    define('GOOGLE_TAG_MANAGER', 'GTM-TXRCN3L');

    define('GOOGLE_CONVERSION_ID', 1032449543);
    define('GOOGLE_CONVERSION_LABEL', 'F3ZfCK3mgwcQh9yn7AM');
    define('GOOGLE_CONVERSION_LANGUAGE', 'en');

    define('BIZO_PARTNER_ID', "2532");

    define('MARKETO_APP_ID', 'app-sjl'); // old app-ab04
    define('MARKETO_FORM_ID', 999); // old 999
    define('MARKETO_SCRIPT_ID', '982-LRE-196'); // old 494-ONY-660

    define('BUGHERD', 'hmuxn1ckeotk6tox9iyf1g');

    if( strpos( $url, 'staging' ) ) {

        define('CIVIC_COOKIES_API_KEY', 'adb794f44a603d0a4360a8631570fbd65d7b2cb2');

    } else {

        // Ours (live): 288237770ed40990baec28ed703062cb40a51b20
        // Their old (live): f2e95429575bf77fccd1305e90cb7d7bfbe4307e
        define('CIVIC_COOKIES_API_KEY', '288237770ed40990baec28ed703062cb40a51b20');
    }

} else {
    // COM
    define('GOOGLE_ANALYTICS', 'UA-23899090-1');
    define('GOOGLE_TAG_MANAGER', 'GTM-WVJNW76'); // GTM-MDTTPX

    define('BIZO_PARTNER_ID', "2532");

    define('MARKETO_APP_ID', 'app-sj25');
    define('MARKETO_FORM_ID', 1076);
    define('MARKETO_SCRIPT_ID', '320-CHP-056');

    define('BUGHERD', 'x4szptnvky1xhuorepuqja');

    if( strpos( $url, 'app' ) ) { // Local

        define('CIVIC_COOKIES_API_KEY', '67f28ff86d89a8a3fe77141a0c362aea5ae9379d');
    }
}
