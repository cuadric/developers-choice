<?php

// ---------------------------------------------------------------------------------------------------

add_filter( 'widget_text', 'do_shortcode' );

// ---------------------------------------------------------------------------------------------------

function theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', MY_TEXTDOMAIN ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'theme_wp_title', 10, 2 );

// ---------------------------------------------------------------------------------------------------

//Clean up the <head>, if you so desire.
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');

// ---------------------------------------------------------------------------------------------------

// quitamos el field "Website" del formulario de comentarios.
function url_filtered($fields) {
	if(isset($fields['url']))
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields', 'url_filtered');

// ---------------------------------------------------------------------------------------------------

// quitamos widgets chorras
function remove_dashboard_chorra_widgets() {

	global $wp_meta_boxes; //trace( $wp_meta_boxes ); // use to get all the widget IDs

	unset(
		//$wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'],
		//$wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'],
		$wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
		$wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'],
		$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
		//$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']
	);
}
add_action('wp_dashboard_setup', 'remove_dashboard_chorra_widgets');

// ---------------------------------------------------------------------------------------------------

// quitamos algunos menúes a los no Administradores
function cuadric_remove_some_admin_menu_items() {
	$user = wp_get_current_user();
	if ( ! $user->has_cap( 'activate_plugins' ) ) {
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'admin.php' );
		remove_menu_page( 'options-general.php' );
		remove_menu_page( 'edit.php?post_type=email_template' );
		remove_menu_page( 'edit.php?post_type=propietario' );
		remove_menu_page( 'edit.php?post_type=comprador' );
	}
}
add_action( 'admin_menu', 'cuadric_remove_some_admin_menu_items' );

// ---------------------------------------------------------------------------------------------------

// agregamos a la newsletter a los usuarios que envian cualuiqer formulario de la web
function my_easymail_add_subscriber ( $cf7 ) {
		$fields['email'] = $cf7->posted_data["email"];
		$fields['name'] = trim($cf7->posted_data["name"]);
		if ( function_exists ('alo_em_add_subscriber') && $fields['email'] != "" ) {
			alo_em_add_subscriber( $fields, 1, alo_em_get_language(true) );
		}
		return $cf7;
}
add_action( 'wpcf7_before_send_mail', 'my_easymail_add_subscriber' );

// ---------------------------------------------------------------------------------------------------

// add_editor_style('editor-style.css');
function my_theme_add_editor_styles() {
	if ( !is_admin() ) { return; }
	global $post;
	$post_type = get_post_type( $post->ID );
	if( $post_type == "page" || $post_type == "post" || $post_type == "blog" || $post_type == "cursos" ):
		$editor_style = 'editor-style-posts-pages.css';
	else:
		$editor_style = 'editor-style-' . $post_type . '.css';
	endif;

	add_editor_style( $editor_style );
}
// add_action( 'pre_get_posts', 'my_theme_add_editor_styles' );

// ---------------------------------------------------------------------------------------------------

// customizamos la página de login
function custom_login() {
	//echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/custom-login.css" />';
}
add_action('login_head', 'custom_login');

// customizamos el link del logo
function change_wp_login_url() {
	//return bloginfo('url');
}
add_filter('login_headerurl', 'change_wp_login_url');

function change_wp_login_title() {
	return get_option('blogname');
}
add_filter('login_headertitle', 'change_wp_login_title');

// ---------------------------------------------------------------------------------------------------

// Customizamos la extensión del excerpt
function cuadric_excerpt_length( $length ) {
	//return 40;
}
add_filter( 'excerpt_length', 'cuadric_excerpt_length' );

// Returns a "Continue Reading" link for excerpts
 function cuadric_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&raquo;</span>', MY_TEXTDOMAIN ) . '</a>';
}

// Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
function cuadric_auto_excerpt_more( $more ) {
	return ' &hellip;' . cuadric_continue_reading_link();
}
add_filter( 'excerpt_more', 'cuadric_auto_excerpt_more' );

// Adds a pretty "Continue Reading" link to custom post excerpts.
function cuadric_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= cuadric_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'cuadric_custom_excerpt_more' );

// ---------------------------------------------------------------------------------------------------