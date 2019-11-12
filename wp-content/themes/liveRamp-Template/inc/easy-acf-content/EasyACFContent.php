<?php

/**
*
* Helper class for integrating with ACF field definition API. Primary purpose is to
* cut down on verbosity associated with coded ACF definitions.
*
* Supports the following ACF types:
* - Text
* - Textarea
*
* Definitions live in ./definitions subfolder and are loaded on class construction.
*
* Data access is expected to happen via the ACF provided get_fields() method.
*
* Author: Quango, Inc
* http://quangoinc.com
*
*/

class EasyACFContent {

  public function __construct() {
    if (!function_exists("register_field_group")) { return; }

    $this->group_id_prefix = 'group_';
    $this->group_title_prefix = 'Copy Content - ';
    $this->field_id_prefix = 'field_';

    // Include field definitions
    $this->definitions = [];
    foreach (glob(dirname(__FILE__) . "/definitions/*.php") as $filename) {
      $this->definitions[] = require $filename;
    }

    // Register primary groups
    $this->register_easy_acf_groups();
  }

  private function register_easy_acf_groups() {
    $this->register_field_group_helper(
      array(
        'groups' => $this->definitions
      )
    );
  }

  private function register_field_group_helper($opts) {

    // Parse group definitions
    foreach ($opts['groups'] as $group_i => $group) {
      $group_title = $this->make_field_group_id(
        $this->group_title_prefix . $group['title']
      );

      // Parse field definitions
      $acf_fields = array();
      foreach ($group['fields'] as $field_i => $field) {

        // Extend field definition w/ defaults
        $acf_field = array_merge(
          $field,
          array(
            'key' => $this->make_field_id($group_title, $field['label']),
            'name' => $this->make_field_title($field['label']),
            'formatting' => 'html'
          )
        );

        // Add additional definitions per type
        switch ($field['type']) {
          case 'text':
            break;

          case 'textarea':
            $acf_field['rows'] = 4;
            break;
        }

        $acf_fields[] = $acf_field;
      }

      // Init field group
      $acf_group = array(
        'id' => $group_title,
    		'title' => $group['title'],
        'fields' => $acf_fields,
        'location' => array(
    			array(
    				array(
    					'param' => 'page',
    					'operator' => '==',
    					'value' => strval($group['show_on_page_id']),
    					'order_no' => 0,
    					'group_no' => 0,
    				),
    			),
    		),
    		'options' => array(
    			'position' => 'acf_after_title',
    			'layout' => 'default',
    			'hide_on_screen' => array(
    				0 => 'the_content',
    			),
    		),
    		'menu_order' => -50,
      );

      // Insert into ACF
      register_field_group($acf_group);
    }
  }

  private function make_field_group_id($title) {
    return $this->group_id_prefix . $this->systemize_string($title);
  }

  private function make_field_id($group_title, $field_title) {
    return $this->field_id_prefix . $group_title . '_' . $this->make_field_title($field_title);
  }

  private function make_field_title($field_title) {
    return $this->systemize_string($field_title);
  }

  private function systemize_string($str) {
    $to_ret = strtolower($str);
    $to_ret = preg_replace('/[\s-]/i', '_', $to_ret);   // replace spaces with underscores
    $to_ret = preg_replace('/[^\w]/i', '', $to_ret);    // eliminate non alphanum
    $to_ret = preg_replace('/(_)\1+/', '$1', $to_ret);  // remove series of underscores > 1 occurance
    return $to_ret;
  }
}

global $EasyACFContent;
$EasyACFContent = new EasyACFContent();
