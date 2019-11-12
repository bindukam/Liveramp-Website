<?php

// Query for this partner
$resource_links = new ResourceLinks(array(
  'type' => 'page',
  'id' => $post->ID
));
$resource_links->page_sections();

?>
