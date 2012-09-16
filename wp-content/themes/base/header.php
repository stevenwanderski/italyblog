<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php if (is_home() || is_front_page()) { echo bloginfo('name'); } else { echo wp_title(''); } ?></title>

<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo bloginfo('rss2_url'); ?>">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/media-queries.css">

<?php wp_enqueue_script("jquery"); ?>

<!-- respond.js (add media query support for IE) -->
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
<![endif]-->

<!-- html5.js (HTML5 Shiv for IE) -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- wp_header -->
<?php wp_head(); ?>

<?php // include theme.script.js  ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/theme.script.js"></script>

<?php // enqueue comment-reply.js (require for threaded comments)
	if ( is_singular() && get_option( 'thread_comments' ) )	wp_enqueue_script( 'comment-reply' ); 
?>

</head>

<body <?php body_class($class); ?>>

<div id="pagewrap">

	<header id="header" class="pagewidth">

		<h1><a href="/">italywith.us</a></h1>
		<h2>The adventures of Chicagoans living abroad</h2>

	</header>
	<!-- /#header -->

	<div id="body" class="pagewidth clearfix">