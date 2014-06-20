<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="keywords" content="Park Slope Food Coop, Food Coop, Brooklyn, Cooperative" />
	<meta name="description" content="A member owned cooperative in Brooklyn, New York." />

  <link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts via Typekit -->
  <script type="text/javascript" src="http://use.typekit.com/tbw7hzq.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <!-- Font Awesome / http://fortawesome.github.io/ -->
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Open Graph Tags -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Redesigning the Park Slope Food Coop" />
  <meta property="og:description" content="The Coop is redesigning, and you’re a part of it." />
  <meta property="og:url" content="http://new.foodcoop.com/" />
  <meta property="og:site_name" content="Redesigning the Park Slope Food Coop" />
  <meta property="og:image" content="<?php echo THEME . '/img/art/building.jpg'; ?>" />
  <meta property="og:image" content="<?php echo THEME . '/img/art/shopping-floor.jpg'; ?>" />

  <!-- Twitter -->
	<link rel="me" href="https://twitter.com/foodcoop" />

	<!-- RSS -->
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

  <?php wp_head(); ?>

  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<!-- All good things start here -->

<body <?php body_class(); ?>>

<?php
  include INC . 'head-short.php';
?>

