<?php


function do_grid_container_compensate( $atts, $content = null) {

	extract( shortcode_atts( array(
		'class' => '',
		), $atts ) );

	$salida = '';

	if ( $class ){
		$class = ' ' . $class;
	}

	$salida .= '<div class="grid-container-compensate' . $class . '">';

		$salida .=  do_shortcode( $content );

	$salida .= '</div>';

	return $salida;
}
add_shortcode("grid_container_compensate", "do_grid_container_compensate");


function do_grid_container( $atts, $content = null) {

	extract( shortcode_atts( array(
		'class' => '',
		), $atts ) );

	$salida = '';

	if ( $class ){
		$class = ' ' . $class;
	}

	$salida .= '<div class="grid-container' . $class . '">';

		$salida .=  do_shortcode( $content );

	$salida .= '</div>';

	return $salida;
}
add_shortcode("grid_container", "do_grid_container");


function do_grid_parent( $atts, $content = null) {

	extract( shortcode_atts( array(), $atts ) );

	$salida = '';

	$salida .= '<div class="compensate-padding clearfix">';

		$salida .=  do_shortcode( $content );

	$salida .= '</div>';

	return $salida;
}
add_shortcode("grid_parent", "do_grid_parent");


function do_grid( $atts, $content = null) {

	extract( shortcode_atts( array(
		'maxigrid'        => '100',
		'grid'            => '100',
		'minigrid'        => '100',
		'maxitablet_grid' => '100',
		'tablet_grid'     => '100',
		'minitablet_grid' => '100',
		'maximobile_grid' => '100',
		'mobile_grid'     => '100',
		'minimobile_grid' => '100',
		'class'           => '',
		), $atts )
	);

	$salida = '';
	$classes = 'grid-element';


	$classes .= ' grid-' . $grid;

	if ( is_numeric( $tablet_grid ) ) {
		$classes .= ' tablet-grid-' . $tablet_grid;
	}

	if ( is_numeric( $mobile_grid ) ) {
		$classes .= ' mobile-grid-' . $mobile_grid;
	}

	if ( is_numeric( $minimobile_grid ) ) {
		$classes .= ' minimobile-grid-' . $minimobile_grid;
	}

	if ( $class ){
		$classes .= ' ' . $class;
	}



	$salida .= '<div class="' . $classes . '">';

		$salida .=  do_shortcode( $content );

	$salida .= '</div>';

	return $salida;
}
add_shortcode("grid", "do_grid");


function do_columns( $atts, $content = null) {

	extract( shortcode_atts( array(
		'title' => '',
		'count' => 2,
		'gap'   => NULL,
		'rule'  => '',
		), $atts )
	);

	$salida = '';
	$classes = 'columns';
	$title_out = '';

	if ( is_numeric( $count ) ) {
		$classes .= ' count-' . $count;
	} else {
		$classes .= ' count-2';
	}

	if ( is_numeric( $gap ) ) {
		$classes .= ' gap-' . $gap;
	}

	if ( $rule ) {
		$classes .= ' rule-' . $rule;
	}

	if ($title) {
		$title_out = '<h2 class="title column-title">' . $title . '</h2>';
	}



	$salida .= '<div class="columns-container">';

		$salida .=  $title_out;

		$salida .= '<div class="' . $classes . '">';

			$salida .=  do_shortcode( $content );

		$salida .= '</div>';

	$salida .= '</div>';

	return $salida;
}
add_shortcode("columns", "do_columns");


function do_title( $atts, $content = null) {

	extract( shortcode_atts( array(
		'class' => '',
		), $atts )
	);

	$salida = '';


	if ($class) {
		$class =  ' ' . $class;
	}


	$salida .=  '<h2 class="title' . $class . '">' . $content . '</h2>';

	return $salida;
}
add_shortcode("title", "do_title");



// para contener el iframe de google maps
function do_image( $atts, $content = null) {

	extract( shortcode_atts( array(), $atts ) );

	$salida = '';

	$salida .= '<div class="image">';

		$salida .=  do_shortcode( $content );

	$salida .= '</div>';

	return $salida;
}
add_shortcode("image", "do_image");


// ---------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------


// para contener el iframe de google maps
function do_map( $atts, $content = null) {

	extract( shortcode_atts( array(), $atts ) );

	$salida = '';

	$salida .= '<div class="map clearfix">';

		$salida .=  do_shortcode( $content );

	$salida .= '</div>';

	return $salida;
}
add_shortcode("map", "do_map");


// ---------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------


function do_quote( $atts, $content = null) {

	extract( shortcode_atts( array(
		'class' => '',
		), $atts ) );

	$salida = '';

	$salida .= '<div class="quote clearfix ' . $class . '">';

		$salida .=  do_shortcode( $content );

	$salida .= '</div>';

	return $salida;
}
add_shortcode("quote", "do_quote");


// ---------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------

function get_current_post_title( $atts = null ){

	global $post;

	extract(shortcode_atts(array(
	), $atts));

	$value = $post->post_name;

	return $value;
}
add_shortcode('get_current_post_title', 'get_current_post_title');

//
function get_current_post_permalink(){

	global $post;

	$value = get_permalink( $post->ID );

	return '<a href="' . $value . '">' . $value . '</a>';
}
add_shortcode('get_current_post_permalink', 'get_current_post_permalink');

//
function get_current_post_meta( $atts = null ){

	extract(shortcode_atts(array(
		'meta' => '',
	), $atts));

	if ( $meta ) {

		global $post;

		$value = '';

		$value = get_post_meta( $post->ID, $meta, true );

		return $value;
	}
}
add_shortcode('get_current_post_meta', 'get_current_post_meta');


// ---------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------


function do_block( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'tag' => 'div',
		'id' => '',
		'class' => '',
	), $atts));

	if ( $class ) {
		$class = ' ' . $class;
	}
	if ( $id ) {
		$id = ' id="' . $id . '"';
	}

	$salida =  '<' . $tag . ' class="block' . $class . '"' . $id . '>' . do_shortcode( $content ) . '</' . $tag . '>';

	return $salida;
}
add_shortcode("block", "do_block");
//Uso: [block class="una_clase" id="un_id"]El contenido, que puede contener shortcodes.[/block]

function do_block_inner( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'tag' => 'div',
		'id' => '',
		'class' => '',
	), $atts));

	$salida =  '<' . $tag . ' class="block inner ' . $class . '" id="' . $id . '">' . do_shortcode( $content ) . '</' . $tag . '>';

	return $salida;
}
add_shortcode("block_inner", "do_block_inner");


// ---------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------


function do_featured_image_header( $atts, $content = null) {

	global $post;

	extract( shortcode_atts( array(
		'class' => '',
		), $atts )
	);

	$salida = '';
	$classes = '';

	if ( $class != '' ) {
		$classes .= ' ' . $class;
	}


	$salida .= '<div class="full_width featured_image_header' . $classes . '">';


		$attr = array(
			'alt'	=> '',
			'title'	=> '',
		);
		$salida .= get_the_post_thumbnail( $post->ID, 'extra-large', $attr );

	$salida .= '</div>';

	return $salida;
}
add_shortcode("featured_image_header", "do_featured_image_header");


// ---------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------

function do_slider( $atts, $content = null ) {

		global $post;


		extract(shortcode_atts(array(
			'position' => 'left',
			//'caption_width'    => '40%',
			//'caption_height'   => '10%',
		), $atts));

		$output = '';


		if ( $content ) :  // mostramos solo las imágenes que haya puesto el usuario dentro del shortcode.


					$output .= '<section class="slider clearfix">';
						$output .= '<div id="single_slider" class="image_slider flexslider">';
							$output .= '<ul class="slides">';
								$output .= do_shortcode( $content );
							$output .= '</ul>';
						$output .= '</div>';
					$output .= '</section>';


		else: // mostramos automáticamente todos los attachments del post

					$args = array(
						'post_type' => 'attachment',
						'numberposts' => -1,
						'post_status' => null,
						'post_parent' => $post->ID,
						'orderby' => 'menu_order',
						'order' => 'ASC',
					);

					$attachments = get_posts( $args );


					if ( $attachments ) :

							$output .= '<section class="slider clearfix">';
								$output .= '<div id="single_slider" class="image_slider flexslider">';
									$output .= '<ul class="slides">';

										foreach ( $attachments as $attachment ) :

											/*
											trace($attachment);

											WP_Post Object
											(
											    [ID]                    => 68
											    [post_author]           => 1
											    [post_date]             => 2014-05-12 21:35:21
											    [post_date_gmt]         => 2014-05-12 19:35:21
											    [post_content]          => Una description para la imagen X
											    [post_title]            => Un title para esta img
											    [post_excerpt]          => Un caption para la imagen XXX
											    [post_status]           => inherit
											    [comment_status]        => open
											    [ping_status]           => open
											    [post_password]         =>
											    [post_name]             => acieroid-web_3-2
											    [to_ping]               =>
											    [pinged]                =>
											    [post_modified]         => 2014-05-12 21:35:21
											    [post_modified_gmt]     => 2014-05-12 19:35:21
											    [post_content_filtered] =>
											    [post_parent]           => 63
											    [guid]                  => http://acieroid.cuadric.com/wp-content/uploads/2014/05/acieroid-web_3.jpg
											    [menu_order]            => 5
											    [post_type]             => attachment
											    [post_mime_type]        => image/jpeg
											    [comment_count]         => 0
											    [filter]                => raw
											)
											*/


											$output .= '<li>';

												$output .= wp_get_attachment_image( $attachment->ID, 'large' );

												if ( $attachment->post_content ) :

													$caption_class = ' ' . $caption_position;

													$output .= '<div class="caption' . $caption_class . '">';
														$output .= apply_filters( 'the_content', $attachment->post_content );
													$output .= '</div>';

												endif;

											$output .= '</li>';

										endforeach;

									$output .= '</ul>';
								$output .= '</div>';
							$output .= '</section>';

					endif;

		endif;




	return $output;
}

add_shortcode('slider', 'do_slider');




function do_slide( $atts, $content = null ) {

	extract(shortcode_atts(array(
	), $atts));

	$output = '';

	$output .= '<li>';
		$output .= do_shortcode( $content );
	$output .= '</li>';

	return $output;
}
add_shortcode('slide', 'do_slide');



function do_slide_image( $atts, $content = null ) {

	extract(shortcode_atts(array(
	), $atts));

	$output = do_shortcode( strip_tags($content, '<img>') );

	return $output;
}
add_shortcode('slide_image', 'do_slide_image');



function do_slide_caption( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'position' => 'left',
		//'caption_width'    => '40%',
		//'caption_height'   => '10%',
	), $atts));

	$output = '';

	$caption_class = ' ' . $position;

	$output .= '<div class="caption' . $caption_class . '">';
		$output .= do_shortcode( $content );
	$output .= '</div>';


	return $output;
}
add_shortcode('slide_caption', 'do_slide_caption');



