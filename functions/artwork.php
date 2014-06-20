<?php

add_action('init', 'cptui_register_my_cpt_artwork');
function cptui_register_my_cpt_artwork() {
register_post_type('artwork', array(
'label' => 'Artwork',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'art',
'with_front' => true),
'query_var' => true,
'has_archive' => true,
'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
'taxonomies' => array('category'),
'labels' => array (
  'name' => 'Artwork',
  'singular_name' => 'Artwork',
  'menu_name' => 'Artwork',
  'add_new' => 'Add Artwork',
  'add_new_item' => 'Add New Artwork',
  'edit' => 'Edit',
  'edit_item' => 'Edit Artwork',
  'new_item' => 'New Artwork',
  'view' => 'View Artwork',
  'view_item' => 'View Artwork',
  'search_items' => 'Search Artwork',
  'not_found' => 'No Artwork Found',
  'not_found_in_trash' => 'No Artwork Found in Trash',
  'parent' => 'Parent Artwork',
)
) ); }

?>