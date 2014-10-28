<?php
// -----------------------------------------------------------------------------------------------
// !!!!!!!!!!!!!!!   que no se repita este nombre de instancia en otros metaboxes !!!!!!!!!!!!!!!!
// -----------------------------------------------------------------------------------------------
$custom_sidebar = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_sidebar',
	'title' => 'Custom Sidebar',
	'types' => array('page', 'post'),
	'template' => get_stylesheet_directory() . '/wpalchemy/custom_sidebar-meta.php',
	'prefix' => '_',
	
));