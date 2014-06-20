<?php

add_action( 'add_meta_boxes', 'art_label_add' );
function art_label_add() {
  $types = array( 'post', 'artwork', 'page', 'code' );
  foreach( $types as $type ) {
    add_meta_box( 'art_label_id', 'Art Label', 'art_label', $type, 'normal', 'high' );
  }
	
}

function art_label( $post ) {
	$values = get_post_custom( $post->ID );
	$years = isset( $values['art_label_years'] ) ? esc_attr( $values['art_label_years'][0] ) : '';
	$medium = isset( $values['art_label_medium'] ) ? esc_attr( $values['art_label_medium'][0] ) : '';
	$check = isset( $values['art_label_other'] ) ? esc_attr( $values['art_label_other'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<style type="text/css" media="screen">
	  #art_label_box{}
	  #art_label_box label,
	  #art_label_box input,
	  #art_label_box small{}
	  #art_label_box label{
	    padding:0 2px;
	  }
    #art_label_source{
      width:30%;
    }
    #art_label_years{
      width:25%;
    }
    #art_label_box small{
      padding:0 3px;
      color:#999;
    }
	</style>
	
	<div id="art_label_box">
  	<p>
  		<label for="art_label_years">Year</label><br />
  		<input type="text" name="art_label_years" id="art_label_years" value="<?php echo $years; ?>" /><br />
  		<small>e.g. 2001</small>
  	</p>
		
  	<p>
  		<label for="art_label_medium">Medium</label><br />
  		<input type="text" name="art_label_medium" id="art_label_medium" value="<?php echo $medium; ?>" /><br />
  		<small>e.g. pen on paper</small>
  	</p>

  	<p>
  		<input type="checkbox" name="art_label_other" id="art_label_other" <?php checked( $check, 'on' ); ?> />
  		<label for="art_label_other">Other</label>
  	</p>
	</div><!-- #arts_box -->
	<?php	
}


add_action( 'save_post', 'art_label_save' );
function art_label_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['art_label_years'] ) )
		update_post_meta( $post_id, 'art_label_years', wp_kses( $_POST['art_label_years'], $allowed ) );
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['art_label_medium'] ) )
		update_post_meta( $post_id, 'art_label_medium', wp_kses( $_POST['art_label_medium'], $allowed ) );
		
	// This is purely my personal preference for saving checkboxes
	$chk = ( isset( $_POST['art_label_other'] ) && $_POST['art_label_other'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'art_label_other', $chk );
}


?>