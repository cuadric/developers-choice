<?php

// ---------------------------------------------------------------------------------------------------

// el link de Edita esta página, para el administrador
function edit_me() {

	$show = true;

	if ( isset($_GET['edit']) ) {
		$show = true;
	}

	if ($show) :

		echo '<span class="edit_link_container">';
			edit_post_link( __('[Editar]', MY_TEXTDOMAIN) );
		echo '</span>';

	endif;
}

// ---------------------------------------------------------------------------------------------------

// The excerpt based on words
// utilizado en script de aq_resizer
function my_string_limit_words($string, $word_limit){
	$words = explode(' ', $string, ($word_limit + 1));
	if( count($words) > $word_limit )
		array_pop($words);
	return implode(' ', $words).'... ';
}

// ---------------------------------------------------------------------------------------------------

function addthis_toolbox ( $the_url=NULL, $the_title=NULL, $the_description=NULL ){

	$custom_url = '';
	$custom_title = '';
	$custom_description = '';

	if( $the_url ) {
		$custom_url = 'addthis:url="' . $the_url . '" ';
	}
	if( $the_title ) {
		$custom_title = 'addthis:title="' . $the_title . '" ';
	}
	if( $the_description ) {
		$custom_description = 'addthis:description="' . $the_description . '" ';
	}
	$custom_data = $custom_url . $custom_titl . $custom_description;

	?>

	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style " <?php echo $custom_data ?>>
		<a class="addthis_button_preferred_1" <?php echo $custom_data ?>></a>
		<a class="addthis_button_preferred_2" <?php echo $custom_data ?>></a>
		<a class="addthis_button_preferred_3" <?php echo $custom_data ?>></a>
		<a class="addthis_button_preferred_4" <?php echo $custom_data ?>></a>
		<a class="addthis_button_compact" <?php echo $custom_data ?>></a>
		<?php /* <a class="addthis_counter addthis_bubble_style"></a>  */?>
	</div>

	<?php /*
	// esto va en el footer:
	?>
	<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
	<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50523bde4dce20cf"></script>
	<script type="text/javascript">
	   addthis.init();
	</script>
	<?php */ ?>
	<!-- AddThis Button END -->

	<?php
}

function addthis_toolbox_2 ($id = NULL){
	?>
	<div class="addthis_toolbox addthis_default_style ">
		<a class="addthis_button_facebook_like" fb:like:action="recommend" fb:like:layout="button_count"></a>
		<a class="addthis_button_tweet" tw:count="none"></a>
		<a class="addthis_button_google_plusone" g:plusone:size="medium" g:plusone:count="false" g:plusone:annotation="none"></a>
	</div>
	<?php
}

function addthis_toolbox_big(){
	?>
	<div class="compartelo">
		<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
			<a class="addthis_button_facebook_like" fb:like:action="recommend"></a>
			<a class="addthis_button_tweet" tw:count="none"></a>
			<a class="addthis_button_google_plusone" g:plusone:size="medium" g:plusone:count="false" g:plusone:annotation="none"></a>
		</div>
	</div>
	<?php
}
// ---------------------------------------------------------------------------------------------------

function posted_on() {
	printf( __( '
		<div class="postedon">
			<span class="sep">Posted </span>
			<a href="%1$s" title="%2$s" rel="bookmark">
				<time class="entry-date" datetime="%3$s" pubdate>%4$s</time>
			</a> by <span class="byline author vcard">%5$s</span>
		</div>

		', MY_TEXTDOMAIN ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_author() )
	);
}