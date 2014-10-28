<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->


<?php // --------------------------------------------------------------------------------------------------- ?>


<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Alternative fixed scale: -->
	<!-- meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" -->

	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />'; ?>

	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">

	<link type="text/plain" rel="author" href="humans.txt" />


	<?php // --------------------------------------------------------------------------------------------------- ?>


	<!--[if lt IE 9]>
	    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	  <![endif]-->


	<?php // --------------------------------------------------------------------------------------------------- ?>

	<?php wp_head(); ?>

</head>