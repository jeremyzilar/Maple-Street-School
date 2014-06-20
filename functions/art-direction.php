<?php

add_action( 'add_meta_boxes', 'art_add' );
function art_add() {
  $types = array( 'post', 'artwork', 'page', 'code' );
  foreach( $types as $type ) {
    add_meta_box( 'art_id', 'Art Direction', 'art', $type, 'normal', 'high' );
  }
	
}

function art( $post )
{
	$values = get_post_custom( $post->ID );
	$url = isset( $values['art_bgimage'] ) ? esc_attr( $values['art_bgimage'][0] ) : '';
	$check = isset( $values['art_text_color'] ) ? esc_attr( $values['art_text_color'][0] ) : '';
	$hide = isset( $values['art_hidden'] ) ? esc_attr( $values['art_hidden'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<style type="text/css" media="screen">
	  #art_box{}
	  #art_box label,
	  #art_box input,
	  #art_box small{}
	  #art_box label{
	    padding:0 2px;
	  }
    #art_source{
      width:30%;
    }
    #art_bgimage{
      width:100%;
    }
    #art_box small{
      padding:0 3px;
      color:#999;
    }
	</style>
	
	<div id="art_box">
  	<p>
  		<label for="art_bgimage">Background Image URL</label><br />
  		<input type="text" name="art_bgimage" id="art_bgimage" value="<?php echo $url; ?>" /><br />
  		<small>e.g. http://nytimes.com/<?php echo date('Y'); ?>/<?php echo date('m'); ?>/<?php echo date('d'); ?>/the-future-is-whole.png</small>
  	</p>

  	<p>
  		<input type="checkbox" name="art_text_color" id="art_text_color" <?php checked( $check, 'on' ); ?> />
  		<label for="art_text_color">Light Text</label>
  	</p>
		
  	<p>
  		<input type="checkbox" name="art_hidden" id="art_hidden" <?php checked( $hide, 'hidden' ); ?> />
  		<label for="art_hidden">Hide on Home Page</label>
  	</p>
	</div><!-- #arts_box -->
	<?php	
}


add_action( 'save_post', 'art_save' );
function art_save( $post_id )
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
	if( isset( $_POST['art_bgimage'] ) )
		update_post_meta( $post_id, 'art_bgimage', wp_kses( $_POST['art_bgimage'], $allowed ) );
		
	// This is purely my personal preference for saving checkboxes
	$chk = ( isset( $_POST['art_text_color'] ) && $_POST['art_text_color'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'art_text_color', $chk );
	
	// This is purely my personal preference for saving checkboxes
	$hidden = ( isset( $_POST['art_hidden'] ) && $_POST['art_hidden'] ) ? 'hidden' : '';
	update_post_meta( $post_id, 'art_hidden', $hidden );
}


?>