<?php

define('NYT_KICKER_META', '_psfc_kicker');

function psfc_kicker_meta() {

	$selected_item = '';

	if(isset($_GET["post"])) {
		$selected_item = get_post_meta( $_GET["post"], NYT_KICKER_META, true );
	}

    if(empty($selected_item)) {
		$selected = ' selected="selected" ';
    } else {
        $selected = '';
    }

	$dropdown_items = psfc_get_kicker_dropdown();

	if(!empty($dropdown_items)) {

		 echo <<<EOF
<div class="primary_kicker">
<select name="psfc_kicker" id="psfc_kicker" style="width:250px;">
<option value="" $selected>Select Primary Kicker</option>
EOF;

		 foreach ($dropdown_items as $item) {

		 	$item_value = htmlspecialchars( $item, ENT_NOQUOTES, 'UTF-8' );

		 	$selected = '';

		 	if ( esc_html( $item ) == esc_html( $selected_item ) ) {
		 		$selected = ' selected="selected" ';
		 	}

		 	echo <<<EOF
<option value="$item_value" $selected>$item</option>
EOF;
		 }

		echo <<<EOF
</select>
</div>
EOF;

		wp_nonce_field( 'nyt-kicker-nonce', 'psfc_kicker_nonce', false );
	}
}

function psfc_get_kicker_save($post_id) {

	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) )
		return $post_id;
	// Checks to see if we're POSTing
	if ('post' !== strtolower( $_SERVER['REQUEST_METHOD'] ))
		return $post_id;

	// Checks to make sure we came from the right page
	if ( !wp_verify_nonce( $_POST['psfc_kicker_nonce'], 'nyt-kicker-nonce' ) )
		return $post_id;

	// Checks user caps
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	update_post_meta($post_id, NYT_KICKER_META, $_POST["psfc_kicker"], get_post_meta( $post_id, NYT_KICKER_META, true ));

	return $post_id;
}

function psfc_get_kicker_dropdown() {
	return get_terms('category', array(	'fields'     => 'names',
										'orderby'    => 'name',
										'hide_empty' => 0)
					);
}

function psfc_get_kicker($post_id = 0, $default = false) {

    $post_id = (int) $post_id;

    if(empty($post_id)) {

        global $post;

        $post_id = $post->ID;

        if(empty($post_id))
            return '';
    }

	return get_post_meta( $post_id, NYT_KICKER_META, true );
}

function psfc_the_kicker($img = true) {
	$p_id = get_the_ID();
	if(empty($p_id))
		return;

    $kicker = psfc_get_kicker();
		$status = get_post_status();
		$s = '<span class="status-label">' . $status . '</span>';
		if ($status !== 'draft') {
			$s = '';
		}

    if(empty($kicker) && empty($status))
      return;

		$k = '';
    if(!empty($kicker)) {
      $kicker_term = get_term_by('name', $kicker, 'category');
      if(!empty($kicker_term) && is_object($kicker_term)){
        $kicker_link = get_category_link($kicker_term->term_id);
				$k = '<a href="'.$kicker_link.'" title="'.$kicker.'">'.$kicker.'</a>';
      }
    }

		echo <<<EOF
		<h6 class="kicker">$s $k</h6>
EOF;
}

function add_kicker_meta_box() {
  $types = array( 'post', 'artwork', 'page', 'code' );

  foreach( $types as $type ) {
    add_meta_box( 'psfc_kicker_div', 'Kicker', 'psfc_kicker_meta', $type, 'side', 'high');
  }

}
add_action('save_post', 'psfc_get_kicker_save', 0);
add_action('add_meta_boxes', 'add_kicker_meta_box');
?>
