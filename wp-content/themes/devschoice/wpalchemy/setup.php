<?php

include_once get_stylesheet_directory() . '/wpalchemy/MetaBox.php';
 
//include_once get_stylesheet_directory() . '/wpalchemy/MediaAccess.php';   // descomentar para poder utilizar el media upload
//$wpalchemy_media_access = NEW WPAlchemy_MediaAccess(); 
	

if (is_admin()) wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/wpalchemy/meta.css');