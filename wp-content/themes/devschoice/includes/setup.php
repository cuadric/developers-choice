<?php

// Options Framework (https://github.com/devinsays/options-framework-plugin)
/*
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
	require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
}
*/

//-------------------------------------------------------------------------------

function theme_setup() {

	load_theme_textdomain( MY_TEXTDOMAIN, get_template_directory() . '/languages' );

		$locale = get_locale();
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if ( is_readable($locale_file) )
			require_once($locale_file);

	register_nav_menu( 'primary', __( 'Primary Navigation', MY_TEXTDOMAIN ) );

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5' );

	// add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );

	// add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );

}
add_action( 'after_setup_theme', 'theme_setup' );

//-------------------------------------------------------------------------------

// Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Header Sidebar', MY_TEXTDOMAIN ),
		'id'            => 'sidebar-header',
		'description' 	=> __( 'Sidebar de la cabecera', MY_TEXTDOMAIN ),
		'before_widget' => '<aside id="sidebar-header" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', MY_TEXTDOMAIN ),
		'id'            => 'sidebar-primary',
		'description' 	=> __( 'The primary widget area', MY_TEXTDOMAIN ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Contact', MY_TEXTDOMAIN ),
		'id'            => 'sidebar-contact',
		'description' 	=> __( 'Sidebar de contacto del pie', MY_TEXTDOMAIN ),
		'before_widget' => '<aside id="sidebar-contact" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar', MY_TEXTDOMAIN ),
		'id'            => 'sidebar-footer',
		'description' 	=> __( 'La banda inferior del pie', MY_TEXTDOMAIN ),
		'before_widget' => '<aside id="sidebar-footer" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

//-------------------------------------------------------------------------------