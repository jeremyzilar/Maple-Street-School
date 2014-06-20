<?php

add_action('init', 'cptui_register_my_taxes_behaviors');
function cptui_register_my_taxes_behaviors() {
register_taxonomy( 'behaviors',array (
  0 => 'post',
  1 => 'page',
  2 => 'artwork',
  3 => 'code',
),
array( 'hierarchical' => true,
	'label' => 'Behaviors',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => true,
	'labels' => array (
  'search_items' => 'Behavior',
  'popular_items' => '',
  'all_items' => 'All Behaviors',
  'parent_item' => '',
  'parent_item_colon' => '',
  'edit_item' => 'Edit Behavior',
  'update_item' => 'Update Behavior',
  'add_new_item' => 'Add New Behavior',
  'new_item_name' => 'Add New Behavior',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => '',
  'choose_from_most_used' => '',
)
) ); 
}

?>