<?php

// ---------------------------------------------------------------------------------------------------

// esqueleto de un pre_get_posts
function catch_search( &$query ) {
	if ( !is_admin() && $query->is_main_query() ) :
		if ( isset( $_GET['buscar'] ) ) :
			$query->set( 'posts_per_page', 4 );
			$query->set( 'es_busqueda_vivienda', 1 );
		endif;
	endif;
	//remove_action( 'pre_get_posts', 'custom_post_author_archive' ); // run once!
}
// add_action( 'pre_get_posts', 'catch_search' );

// ---------------------------------------------------------------------------------------------------