<?php

/**
 * Get the bootstrap of custom Metabox
 */
if ( file_exists(  __DIR__ . '/../vendors/CMB2/init.php' ) ) {
    require_once  __DIR__ . '/../vendors/CMB2/init.php';
}

require_once  'AddressMeta.php';
require_once  'MarketingStackMeta.php';


//Meta utility functions

require_once 'utility/AddressMetaUtility.php';
