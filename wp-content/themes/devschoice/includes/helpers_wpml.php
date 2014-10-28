<?php

// ---------------------------------------------------------------------------------------------------

// hojas de estilo y javascript de WPML que no uso en mis themes
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

// ---------------------------------------------------------------------------------------------------



// convierte el ID de una página dada en el ID de su página en el idioma en que el usuario está viendo el sitio
function lang_page_id($id){
  if(function_exists('icl_object_id')) {
	return icl_object_id($id,'page',true);
  } else {
	return $id;
  }
}
// convierte el ID de un post dado en el ID de su post en el idioma en que el usuario está viendo el sitio.
// Si el post_type sobre el que se está consultando es distinto de 'post' entonces se debe llamar a la función con el parámetro post_type puesto en el post_type correspondiente.
function lang_post_id($id, $type='post'){
  if(function_exists('icl_object_id')) {
	return icl_object_id($id, $type, true);
  } else {
	return $id;
  }
}
// convierte el ID de una categoría dada en el ID de su categoría en el idioma en que el usuario está viendo el sitio
function lang_category_id($id){
  if(function_exists('icl_object_id')) {
	return icl_object_id($id,'category',true);
  } else {
	return $id;
  }
}
// crea una lista de los demás idiomas en los que está traducido un post dado.
function icl_post_languages(){
	$languages = icl_get_languages('skip_missing=1');
	//trace($languages);
	if( 1 < count($languages) ){
		echo '<div class="other_past_languages">';
			echo __('This post is also available in: ', MY_TEXTDOMAIN);
			foreach($languages as $l){
				if(!$l['active']) $langs[] = '<a href="'.$l['url'].'">'.$l['translated_name'].'</a>';
			}
			echo join(', ', $langs);
		echo '</div>';
	}
}

// ---------------------------------------------------------------------------------------------------



// lista de idiomas para la cabecera
function languages_list_header(){
	if( function_exists('icl_get_languages') ){

		$languages = icl_get_languages('skip_missing=1&orderby=id&order=asc');
		/*
			icl_get_languages('skip_missing=N&orderby=KEY&order=DIR')
			* N=0/1
			* KEY=id/code/name (name -> translated_name), (defaut: id)
			* DIR=asc/desc (defaut: asc)
		*/

		if(!empty($languages)){
			echo '<div id="header_language_list"><ul>';

			foreach($languages as $l){
				echo '<li class="lang_item">';
				$c = ($l['active']) ? 'class="active" ' : '';
				if($l['country_flag_url']){
					if(!$l['active']) echo '<a href="'.$l['url'].'">';
					echo '<img ' . $c . 'src="' . $l['country_flag_url'] . '" alt="' . $l['language_code'] . '" title="' . $l['native_name'] . '" />';
					//echo $l['language_code'];
					if(!$l['active']) echo '</a>';
				}

				echo '</li>';
			}
			echo '</ul></div>';
		}
	}
}



// ---------------------------------------------------------------------------------------------------

// obtenemos el ID de la página original (en español) de la que la página solicitada es traducción.
function get_original_page_id( $cur_id = NULL ){
	if($cur_id == NULL ){
		$cur_id = get_current_id(); // o bien $post->ID (???)
	}
	$cur_page_type = 'page';
	if( function_exists('icl_object_id') ){
		return icl_object_id( $cur_id, $cur_page_type, true, "es" );
	}else{
		return $cur_id;
	}
}

// obtenemos el ID del post original (en español) del que el post solicitado es traducción.
function get_original_post_id( $cur_id = NULL ){
	if($cur_id == NULL ){
		$cur_id = get_current_id(); // o bien $post->ID (???)
	}
	$cur_post_type = get_query_var('post_type');//'post';  // cuidado!!  la función icl_object_id() debe recibir específicamente el post_type correcto!!!
	if( function_exists('icl_object_id') ){
		return icl_object_id( $cur_id, $cur_post_type, true, "es" );
	}else{
		return $cur_id;
	}
}

// ---------------------------------------------------------------------------------------------------