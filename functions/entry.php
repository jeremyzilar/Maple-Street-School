<?php
  
  
  $before = '
    <article class="entry entry-collection">
      <div class="entry-content">';
  $after = '
      </div>
    </article>';
  
  // If there are no tags then group them all.
  // If there are similar tags 2 or more posts in succession, then group those together.
  
    
  function filter_where( $where = '' ) {
  	// posts in the last 30 days
  	$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
  	return $where;
  }
  
  function tags_array($id){
    $tag_list = array();
    $tags = wp_get_post_tags($id);
    foreach ($tags as $tag) {
      $t = $tag->name;
      array_push($tag_list, $t);
    }
    return $tag_list;
  }
  
  function tags_list($id){
    $posttags = get_the_tags();
    if ($posttags) {
      foreach($posttags as $tag) {
        echo $tag->name . ' '; 
      }
    }
  }
  

  function loop(){
    global $before;
    global $after;
    $i = 0;
    $grouped = false;
  	$aside = false;
  	$tagflag = false;
    $a = array();
  	$tags = array();
  	
    // Shows Draft Posts on the front-end to Admin
  	if (current_user_can('manage_options')) {
      $args = array('post_status' => array( 'publish', 'pending', 'draft', 'future' ));
  	} else {
  	  $args = array('post_status' => 'publish');
  	}
    // The Query
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) : 
      while ($my_query->have_posts()) : $my_query->the_post();
        $post = $my_query->posts[$i];
        $aside = 'aside' === get_post_format();
        $t = tags_array(get_the_ID());
        $result = array_intersect($t, $tags);
        
        $prev_tags = false;
        $curr_tags = false;
        if (!empty($tags)) {        // Does the previous post have tags?
          $prev_tags = true;
        }
        if (!empty($t)) {           // Does this post have tags?
          $curr_tags = true;
        }
        if ($curr_tags == true && $aside) {   // If there are tags for this post...
          $result = array_intersect($t, $tags);     // are there similar ones?

          if (empty($result)) {
            // If the current one has tags, and the prev one didnt, then you want to end the prev one before starting the next
            if ($prev_tags == false && $grouped = true) {
              if ($i == 0) {
                echo $before;
                $grouped = true;
              } else {
                echo $after;
                echo $before;
                $grouped = true;
              }
            }
            // If the current one has tags, and the prev one also had tags, but the tags are incompatible,
            // then you want to end the prev one before starting the next
            if ($prev_tags == true && $grouped = true) {
              echo $after;
              echo $before;
              $grouped = true;
            }
            // If the current one has tags, and the prev one didnt, and grouped is false, then you want to start a new group.
            if ($prev_tags == false && $grouped = false) {
              echo $before;
              $grouped = true;
            }
          }
        } else { // If $curr_tags = false
          // If the current one doesn't have tags, and the prev one did, then you want to end the prev one before starting the next
          if ($prev_tags == true && $aside) {
            echo $after;
            echo $before;
            $grouped = true;
          }
          if ($prev_tags == true && !$aside) {
            echo $after;
            $grouped = false;
          }
          // If the current one doesn't have tags, and the prev one didnt, and they are not grouped, then you want to group them
          if ($prev_tags == false && ! $grouped && $aside) {
            echo $before;
            $grouped = true;
          }
        }
        if (!$aside && $grouped) {
          echo $after;
          $grouped = false;
        }

        // set the tags
        $tags = $t;
        get_template_part('content', get_post_format());

        $i++;
      endwhile;
    else :
        get_template_part( 'content', 'none' );
    endif;
  }
  
  
  function asides_loop(){
    global $before;
    global $after;
    add_filter( 'posts_where', 'filter_where' );
    $i = 0;
    $grouped = false;
  	$aside = false;

  	if (current_user_can('manage_options')) {
      $args = array('post_status' => array( 'publish', 'pending', 'draft', 'future' ));
  	} else {
  	  $args = array('post_status' => 'publish');
  	}
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) : 
      while ($my_query->have_posts()) : $my_query->the_post();
        if (has_post_format('aside')) {
          $aside = 'aside' === get_post_format();
          $status = get_post_status();
          if ($aside && ! $grouped) {
            echo $before;
            echo '<h4>Worth Reading</h4>';
            $grouped = true;
          } elseif (! $aside && $grouped) {
            echo $after;
            $grouped = false;
          }
          get_template_part('content', get_post_format() );
        }
      endwhile;
    else :
      get_template_part( 'content', 'none' );

    endif;
    remove_filter( 'posts_where', 'filter_where' );
  }
  
  
  function single_loop(){
    global $before;
    global $after;
    if ( have_posts() ) : 
      while ( have_posts() ) : the_post();
        echo has_post_format('aside') ? $before : '';
        get_template_part('content', get_post_format() );
        echo has_post_format('aside') ? $after : '';
      endwhile;
    else :
      get_template_part( 'content', 'none' );
    endif;
  }

?>