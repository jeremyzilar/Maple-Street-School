<?php
$args = array(
	'theme_location'  => 'main-menu',
	'menu'            => '',
	'container'       => 'div',
	'container_class' => 'navbar',
	'container_id'    => '',
	'menu_class'      => 'nav nav-pills pull-right',
	'menu_id'         => '',
	'echo'            => true,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
);
wp_nav_menu( $args );
?>
