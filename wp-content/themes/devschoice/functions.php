<?php

//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------


include 'includes/post_types.php';
include 'includes/setup.php';
include 'includes/helpers.php';
include 'includes/helpers_wpml.php';
include 'includes/hooks.php';
include 'includes/shortcodes.php';
include 'includes/aq_resizer.php';
include 'includes/pre_get_posts.php';

if ( is_admin() ) include ( 'wpalchemy/metaboxes_to_load.php' );

//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------



function theme_scripts_styles() {
	global $wp_styles;

	$path_to_js    = get_template_directory_uri() . '/_/js';
	$path_to_theme = get_template_directory_uri();

	wp_enqueue_script( 'modernizr', 				$path_to_js . '/modernizr-2.7.0.dev.js',  			array(), '1', 		false );

	wp_enqueue_style( 'font-opensans', 	'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700', 	array(), '0',   'all' );
	wp_enqueue_style( 'font-oswald', 	'http://fonts.googleapis.com/css?family=Oswald:400,700', 							array(), '0',   'all' );
	wp_enqueue_style( 'font-awesome', 	'//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', 				array(), '1', 	'all' );

	/*
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', 	    	array(), '1.8.3', 	false );
	*/

	wp_enqueue_script( 'respond',					$path_to_js . '/respond.min.js', 					array(), '1.0', 	false );
	wp_enqueue_script( 'mobilevars', 				$path_to_js . '/mobile_vars.js', 	               	array(), '1.0', 	false );
	wp_enqueue_script( 'cuadric', 					$path_to_js . '/cuadric.js', 	                	array(), '1.0', 	false );
	wp_enqueue_script( 'easing', 					$path_to_js . '/jquery.easing.js', 	            	array(), '1.0', 	false );
	wp_enqueue_script( 'mousewheel',				$path_to_js . '/jquery.mousewheel.min.js', 			array(), '1.0', 	false );
	wp_enqueue_script( 'flexslider', 				$path_to_js . '/jquery.flexslider.min.js', 			array(), '1.0', 	false );
	wp_enqueue_script( 'autosize',    				$path_to_js . '/jquery.autosize.js',        		array(), '1.3.', 	false );
	wp_enqueue_script( 'equalheights', 				$path_to_js . '/jquery.balanceheights.js', 			array(), '2.0', 	false );
	wp_enqueue_script( 'cuadric_image_hover',    	$path_to_js . '/jquery.cuadric_image_hover.js',		array(), '2.0', 	false );
	wp_enqueue_script( 'cuadric_readmore_hover',    $path_to_js . '/jquery.cuadric_readmore_hover.js',	array(), '1.0', 	false );
	wp_enqueue_script( 'easyTooltip', 				$path_to_js . '/easyTooltip.js',        	    	array(), '1.0', 	false );
	wp_enqueue_script( 'hoverintent', 				$path_to_js . '/hoverIntent.js', 					array(), '1.0', 	false );
	wp_enqueue_script( 'superfish', 				$path_to_js . '/superfish.js', 						array(), '1.0', 	false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'reset', 		$path_to_theme . '/reset.css', 			array(), '1',   'all' );
	wp_enqueue_style( 'unsemantic',	$path_to_theme . '/unsemantic.css', 	array(), '4',   'all' );
	wp_enqueue_style( 'flexslider', $path_to_theme . '/flexslider.css', 	array(), '2',   'all' );
	wp_enqueue_style( 'style', 		$path_to_theme . '/style.css', 			array(), '6',   'all' );
	wp_enqueue_style( 'menu', 		$path_to_theme . '/menu.css', 			array(), '5', 	'all' );
	wp_enqueue_style( 'forms', 		$path_to_theme . '/forms.css', 			array(), '3',   'all' );
	wp_enqueue_style( 'responsive', $path_to_theme . '/responsive.css', 	array(), '6',   'all' );

	if ( is_single() ) {
	//wp_enqueue_style( 'commments',  $path_to_theme . '/comments.css', 					    			array(), '0',   'all' );
	}

	// Load IE Stylesheet.
	//	wp_enqueue_style( 'theme-ie', get_template_directory_uri() . '/css/ie.css', array( 'theme-style' ), '20130213' );
	//	$wp_styles->add_data( 'theme-ie', 'conditional', 'lt IE 9' );


}
add_action( 'wp_enqueue_scripts', 'theme_scripts_styles' );

// ---------------------------------------------------------------------------------------------------------