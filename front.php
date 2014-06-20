<?php
/*
Template Name: Homepage
*/
get_header(); ?>
  <?php include 'head.php'; ?>
  <?php 
  
  if ( is_user_logged_in() ) {
    include INC .'survey-msg.php';
    include INC .'process.php';
    include INC .'social.php';
    include INC .'team.php';
  } else {
    include INC .'temp-process.php';
    include INC .'social.php';
  }

  ?>  
	<div id="blog hidden">
		<?php //loop(); ?>
	</div>

<?php get_footer(); ?>