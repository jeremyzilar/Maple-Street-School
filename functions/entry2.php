<?php
  
  
  $before = '
    <div class="container">
      <div class="row">
        <article class="col-sm-8 entry">
          <div class="entry-content">';
  $after = '
          </div>
        </div>
      </div>
    </div>';
    
  function filter_where( $where = '' ) {
  	// posts in the last 30 days
  	$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
  	return $where;
  }
  
  function loop(){
    global $before;
    global $after;
    $i = 0;
    $grouped = false;
  	$grouping = false;
  	
  	if (current_user_can('manage_options')) {
      $args = array('post_status' => array( 'publish', 'pending', 'draft', 'future' ));
  	} else {
  	  $args = array('post_status' => 'publish');
  	}
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) : 
      while ($my_query->have_posts()) : $my_query->the_post();
        $grouping = 'aside' === get_post_format();
        $status = get_post_status();
        if ($grouping && ! $grouped) {
          echo $before;
          $grouped = true;
        } elseif (! $grouping && $grouped) {
          echo $after;
          $grouped = false;
        }
        get_template_part('content', get_post_format() );
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
  	$grouping = false;

  	if (current_user_can('manage_options')) {
      $args = array('post_status' => array( 'publish', 'pending', 'draft', 'future' ));
  	} else {
  	  $args = array('post_status' => 'publish');
  	}
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) : 
      while ($my_query->have_posts()) : $my_query->the_post();
        if (has_post_format('aside')) {
          $grouping = 'aside' === get_post_format();
          $status = get_post_status();
          if ($grouping && ! $grouped) {
            echo $before;
            echo '<h4>Worth Reading</h4>';
            $grouped = true;
          } elseif (! $grouping && $grouped) {
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