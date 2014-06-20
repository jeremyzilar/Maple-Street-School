<?php

add_action('init', 'cptui_register_my_cpt_code');
function cptui_register_my_cpt_code() {
register_post_type('code', array(
'label' => 'Code',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => true,
'rewrite' => array('slug' => 'code',
'with_front' => true),
'has_archive' => true,
'query_var' => true,
'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
'taxonomies' => array('category'),
'labels' => array (
  'name' => 'Code',
  'singular_name' => 'code',
  'menu_name' => 'Code',
  'add_new' => 'Add code',
  'add_new_item' => 'Add New code',
  'edit' => 'Edit',
  'edit_item' => 'Edit code',
  'new_item' => 'New code',
  'view' => 'View code',
  'view_item' => 'View code',
  'search_items' => 'Search Code',
  'not_found' => 'No Code Found',
  'not_found_in_trash' => 'No Code Found in Trash',
  'parent' => 'Parent code',
)
) ); }

?>