<?php

// [dropcap foo="foo-value"]
function dropcap_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'style' => 1
	), $atts));
	
	//get first char
	$first_char = substr($content, 0, 1);
	$text_len = strlen($content);
	$rest_text = substr($content, 1, $text_len);

	$return_html = '<span class="dropcap">'.$first_char.'</span>';
	$return_html.= do_shortcode($rest_text);
	
	return $return_html;
}
add_shortcode('dropcap', 'dropcap_func');

// fimage path shortcode
	function my_images_url($atts, $content = null) {
		 return get_bloginfo('template_url') . '/images'; 
	}
	add_shortcode("images_url", "my_images_url");

// [quote foo="foo-value"]
function quote_func($atts, $content) {
	
	$return_html = '<blockquote>'.do_shortcode($content).'</blockquote>';
	
	return $return_html;
}
add_shortcode('quote', 'quote_func');


function pre_func($atts, $content) {
	
	$return_html = '<pre>'.strip_tags($content).'</pre>';
	
	return $return_html;
}
add_shortcode('pre', 'pre_func');



// [Small button]
function small_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#088383',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="small_button"><span style="background-color:'.$bg_color.'; color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('small_button', 'small_button_func');

// [Medium button]
function medium_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#088383',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="medium_button"><span style="background-color:'.$bg_color.'; color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('medium_button', 'medium_button_func');

// [Button]
function button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',

	), $atts));
	
	$return_html = '<div class="read-more"><a href="'.$href.'"><span><span>' . do_shortcode( $content ) . '</span></span></a></div>';
	
	return $return_html;
}
add_shortcode('button', 'button_func');

// [Small button alt]
function small_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="small_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('small_button_alt', 'small_button_alt_func');

// [Medium button alt]
function medium_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="medium_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('medium_button_alt', 'medium_button_alt_func');

// [Big button alt]
function big_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="big_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('big_button_alt', 'big_button_alt_func');

// [Settings button]
function settings_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="settings_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('settings_button', 'settings_button_func');

// [Settings button alt]
function settings_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="settings_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('settings_button_alt', 'settings_button_alt_func');

// [Twitter button]
function twitter_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="twitter_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('twitter_button', 'twitter_button_func');

// [Twitter button alt]
function twitter_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="twitter_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('twitter_button_alt', 'twitter_button_alt_func');

// [Facebook button]
function facebook_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="facebook_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('facebook_button', 'facebook_button_func');

// [Facbook button alt]
function facebook_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="facebook_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('facebook_button_alt', 'facebook_button_alt_func');

// [Play button]
function play_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="play_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('play_button', 'play_button_func');

// [Play button alt]
function play_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="play_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('play_button_alt', 'play_button_alt_func');

// [Plus button]
function plus_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="plus_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('plus_button', 'plus_button_func');

// [Plus button alt]
function plus_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="plus_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('plus_button_alt', 'plus_button_alt_func');

// [Check button]
function check_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="check_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('check_button', 'check_button_func');

// [Check button alt]
function check_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="check_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('check_button_alt', 'check_button_alt_func');

// [House button]
function house_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="house_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('house_button', 'house_button_func');

// [House button alt]
function house_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="house_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('house_button_alt', 'house_button_alt_func');

// [Star button]
function star_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="star_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('star_button', 'star_button_func');

// [Star button alt]
function star_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="star_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('star_button_alt', 'star_button_alt_func');

// [Hearth button]
function heart_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="heart_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('heart_button', 'heart_button_func');

// [Hearth button alt]
function heart_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="heart_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('heart_button_alt', 'heart_button_alt_func');

// [Arrow button]
function arrow_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="arrow_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('arrow_button', 'arrow_button_func');

// [Arrow button alt]
function arrow_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="arrow_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('arrow_button_alt', 'arrow_button_alt_func');

// [Cross button]
function cross_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="cross_button" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('cross_button', 'cross_button_func');

// [Cross button alt]
function cross_button_alt_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'href' => '',
		'align' => 'bttn_left',
		'bg_color' => '#cccccc',
		'text_color' => '#444444',
		'style' => '',
		'color' => '',
	), $atts));
	
	$return_html = '<div class="'.$align.'"><a href="'.$href.'" class="cross_button_alt" style="background-color:'.$bg_color.';"><span style="color:'.$text_color.';">' . do_shortcode( $content ) . '</span></a></div>';
	
	return $return_html;
}
add_shortcode('cross_button_alt', 'cross_button_alt_func');

function notification_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="box-notification"><div class="box-notification-content">'.html_entity_decode(do_shortcode($content)).'</div></div>';
	
	return $return_html;
}
add_shortcode('notification_box', 'notification_func');

function error_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="box-error"><div class="box-error-content">'.html_entity_decode(do_shortcode($content)).'</div></div>';
	
	return $return_html;
}
add_shortcode('error_box', 'error_func');

function download_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="box-download"><div class="box-download-content">'.html_entity_decode(do_shortcode($content)).'</div></div>';
	
	return $return_html;
}
add_shortcode('download_box', 'download_func');

function information_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="box-information"><div class="box-information-content">'.html_entity_decode(do_shortcode($content)).'</div></div>';
	
	return $return_html;
}
add_shortcode('information_box', 'information_func');


function frame_left_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_left">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_left', 'frame_left_func');




function frame_right_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_right">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_right', 'frame_right_func');



function frame_center_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_center">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_center', 'frame_center_func');



function list_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
	), $atts));
	
	$return_html = '
		<style type="text/css">
			.wpcrown_list.'.$type.' ul li {
				display: block;
				background: url("'.get_bloginfo( 'stylesheet_directory' ).'/images/icons/'.$type.'.png") no-repeat top left;
			}
		</style>
	';
	
	$return_html.= '<div class="wpcrown_list '.$type.'">'.strip_tags($content,'<ul><li><a>').'</div>';
	
	return $return_html;
}
add_shortcode('list', 'list_func');

function toggle_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html.= '<div class="toggle">
				        <h4 class="trigger">'.$title.'</h4>
				        <div class="togglebox">
				          <div>'. $content .'</div>
				        </div>
				    </div>';
	
	return $return_html;
}
add_shortcode('toggle', 'toggle_func');


/*
* jQuery Tools - Tabs shortcode
*/
add_shortcode( 'tabgroup', 'etdc_tab_group' );
function etdc_tab_group( $atts, $content ){
$GLOBALS['tab_count'] = 0;

do_shortcode( $content );

if( is_array( $GLOBALS['tabs'] ) ){
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a class="" href="#">'.$tab['title'].'</a></li>';
$panes[] = '<div class="pane">'.$tab['content'].'</div>';
}
$return = "\n".'<!-- the tabs --><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><div class="panes">'.implode( "\n", $panes ).'</div>'."\n";
}
return $return;
}

add_shortcode( 'tab', 'etdc_tab' );
function etdc_tab( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

$GLOBALS['tab_count']++;
}


function highlight_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => 'red',
	), $atts));
	
	$return_html.= '<span class="highlight_'.$type.'">'.strip_tags($content).'</span>';
	
	return $return_html;
}
add_shortcode('highlight', 'highlight_func');



function tagline_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'button' => '',
		'href' => '',
	), $atts));
	
	$return_html.= '
		<div class="tagline" style="width:92%">
			<div class="tagline_text">
			    <h2 class="cufon">'.$title.'</h2>
			    <p>'.strip_tags(strip_shortcodes($content)).'</p>
			</div>
			<div class="tagline_button">
			    <a href="'.$href.'" class="button medium">'.$button.'</a>
			</div>
			<br class="clear"/>
		</div>
	';
	
	return $return_html;
}
add_shortcode('tagline', 'tagline_func');



function arrow_list_func($atts, $content) {
	
	$return_html = '<ul class="arrow_list">'.html_entity_decode(strip_tags($content,'<li><a>')).'</ul>';
	
	return $return_html;
}
add_shortcode('arrow_list', 'arrow_list_func');




function check_list_func($atts, $content) {
	
	$return_html = '<ul class="check_list">'.html_entity_decode(strip_tags($content,'<li><a>')).'</ul>';
	
	return $return_html;
}
add_shortcode('check_list', 'check_list_func');




function star_list_func($atts, $content) {
	
	$return_html = '<ul class="star_list">'.html_entity_decode(strip_tags($content,'<li><a>')).'</ul>';
	
	return $return_html;
}
add_shortcode('star_list', 'star_list_func');



function one_half_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="one-half">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_half', 'one_half_func');




function one_half_last_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="one-half last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_half_last', 'one_half_last_func');



function one_third_func($atts, $content) {
	
	$return_html = '<div class="one-third">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_third', 'one_third_func');




function one_third_last_func($atts, $content) {
	
	$return_html = '<div class="one-third last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_third_last', 'one_third_last_func');



function two_third_func($atts, $content) {
	
	$return_html = '<div class="two-third">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('two_third', 'two_third_func');




function two_third_last_func($atts, $content) {
	
	$return_html = '<div class="two-third last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('two_third_last', 'two_third_last_func');




function one_fourth_func($atts, $content) {
	
	$return_html = '<div class="one-fourth">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fourth', 'one_fourth_func');




function one_fourth_last_func($atts, $content) {
	
	$return_html = '<div class="one-fourth last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fourth_last', 'one_fourth_last_func');



function one_fifth_func($atts, $content) {
	
	$return_html = '<div class="one-fifth">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fifth', 'one_fifth_func');




function one_fifth_last_func($atts, $content) {
	
	$return_html = '<div class="one-fifth last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fifth_last', 'one_fifth_last_func');



function one_sixth_func($atts, $content) {
	
	$return_html = '<div class="one-sixth">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_sixth', 'one_sixth_func');




function one_sixth_last_func($atts, $content) {
	
	$return_html = '<div class="one-sixth last">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_sixth_last', 'one_sixth_last_func');


function accordion_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'close' => 0,
	), $atts));
	
	$close_class = '';
	
	if(!empty($close))
	{
		$close_class = 'wpcrown_accordion_close';
	}
	
	$return_html = '<div class="wpcrown_accordion '.$close_class.'"><h3><a href="#">'.$title.'</a></h3>';
	$return_html.= '<div><p>';
	$return_html.= do_shortcode($content);
	$return_html.= '</p></div></div><br class="clear"/>';
	
	return $return_html;
}
add_shortcode('accordion', 'accordion_func');


function recent_posts_func($atts) {
	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 3,
	), $atts));

	$return_html = wpcrown_posts('recent', $items, FALSE, 'black', FALSE);
	
	return $return_html;
}
add_shortcode('recent_posts', 'recent_posts_func');



function popular_posts_func($atts) {
	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 3,
	), $atts));

	$return_html = wpcrown_posts('poopular', $items, FALSE, 'black', FALSE);
	
	return $return_html;
}
add_shortcode('popular_posts', 'popular_posts_func');


/**
*	Begin Portfolio slider shortcodes
**/

function slide_img_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
	), $atts));

	if(empty($wpcrown_slider_height))
	{
		$wpcrown_slider_height = 405;
	}
	
	$wpcrown_slider_height_offset = $wpcrown_slider_height - 405;
	
	$return_html = '<li>';
	$return_html.= '<img src="'.get_bloginfo( 'stylesheet_directory' ).'/timthumb.php?src='.$src.'&h='.intval(400+$wpcrown_slider_height_offset).'&w=939&zc=1" alt=""/>';
	$return_html.= '</li>'. PHP_EOL;
	
	return $return_html;
}
add_shortcode('slide_img', 'slide_img_func');


function slide_vimeo_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'video_id' => '',
	), $atts));

	if(empty($wpcrown_slider_height))
	{
		$wpcrown_slider_height = 405;
	}
	
	$wpcrown_slider_height_offset = $wpcrown_slider_height - 405;
	
	$return_html = '<li>';
	$return_html.= '<object width="939" height="'.intval(400+$wpcrown_slider_height_offset).'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="939" height="'.intval(400+$wpcrown_slider_height_offset).'" wmode="transparent"></embed></object>';
	$return_html.= '</li>'. PHP_EOL;
	
	return $return_html;
}
add_shortcode('slide_vimeo', 'slide_vimeo_func');


function slide_youtube_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'video_id' => '',
	), $atts));

	if(empty($wpcrown_slider_height))
	{
		$wpcrown_slider_height = 405;
	}
	
	$wpcrown_slider_height_offset = $wpcrown_slider_height - 405;
	
	$return_html = '<li>';
	$return_html.= '<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$video_id.'&hd=1" style="width:939px;height:'.intval(400+$wpcrown_slider_height_offset).'px"><param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$video_id.'&hd=1" /></object>';
	$return_html.= '</li>'. PHP_EOL;
	
	return $return_html;
}
add_shortcode('slide_youtube', 'slide_youtube_func');

/**
*	End Portfolio slider shortcodes
**/


function pricing_func($atts, $content) {
	
	//extract short code attr
	extract(shortcode_atts(array(
		'size' => '',
		'title' => '',
		'column' => 3,
	), $atts));
	
	$width_class = 'three';
	switch($column)
	{
		case 3:
			$width_class = 'three';
		break;
		case 4:
			$width_class = 'four';
		break;
		case 5:
			$width_class = 'five';
		break;
	}
	
	$return_html = '<div class="pricing_box '.$size.' '.$width_class.'">';
	
	if(!empty($title))
	{
		$return_html.= '<div class="header">';
		$return_html.= '<span>'.$title.'</span>';
		$return_html.= '</div><br/>';
	}
	
	$return_html.= do_shortcode($content);
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('pricing', 'pricing_func');

function youtube_func($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$video_id.'&hd=1" style="width:'.$width.'px;height:'.$height.'px"><param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$video_id.'&hd=1" /></object>';
	
	return $return_html;
}
add_shortcode('youtube', 'youtube_func');


function vimeo_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<object width="'.$width.'" height="'.$height.'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'" wmode="transparent"></embed></object>';
	
	return $return_html;
}
add_shortcode('vimeo', 'vimeo_func');


function twitter_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 5,
		'username' => ''
	), $atts));
	
	$return_html = '';
	
	if(!empty($username))
	{
		include_once (TEMPLATEPATH . "/lib/twitter.lib.php");
		$obj_twitter = new Twitter($username); 
		$tweets = $obj_twitter->get($items);
	
		$return_html.= '<ul class="twitter">';
		
		foreach($tweets as $tweet)
		{
		    $return_html.= '<li>';
		    
		    if(isset($tweet[0]))
		    {
		    	$return_html.= '<a href="'.$tweet[2][0].'">'.$tweet[0].'</a>';
		    }
		    
		    $return_html.= '</li>';
		}
		
		$return_html.= '</ul>';
	}
	
	return $return_html;
}
add_shortcode('twitter', 'twitter_func');


function flickr_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 9,
		'flickr_id' => ''
	), $atts));
	
	$return_html = '';
	
	if(!empty($flickr_id))
	{
		$photos_arr = get_flickr(array('type' => 'user', 'id' => $flickr_id, 'items' => $items));

		$return_html.= '<ul class="flickr">';
		
		foreach($photos_arr as $photo)
		{
		    $return_html.= '<li>';
		    $return_html.= '<a href="'.$photo['url'].'" title="'.$photo['title'].'"><img src="'.$photo['thumb_url'].'" alt="" class="frame img_nofade" /></a>';$return_html.= '</li>';
		}
		
		$return_html.= '</ul><br class="clear"/>';
	}
	
	return $return_html;
}
add_shortcode('flickr', 'flickr_func');


function chart_func($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 590,
		'height' => 250,
		'type' => '',
		'title' => '',
		'data' => '',
		'label' => '',
		'colors' => '',
	), $atts));
	
	switch($type)
	{
		case '3dpie':
			$type_q = 'p3';
		break;
		case 'pie':
			$type_q = 'p';
		break;
		case 'line':
			$type_q = 'lc';
		break;
	}
	
	$content_bg = get_option('wpcrown_content_bg_color');
	$content_bg = substr($content_bg, 1);
	
	$return_html = '<img src="http://chart.apis.google.com/chart?cht='.$type_q.'&#038;chtt='.$title.'&#038;chl='.$label.'&#038;chco='.$colors.'&#038;chs='.$width.'x'.$height.'&#038;chd=t:'.$data.'&#038;chf=bg,s,'.$content_bg.'" alt="'.$title.'"/>';
	
	return $return_html;
}
add_shortcode('chart', 'chart_func');


function table_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'color' => '',
	), $atts));
	
	switch(strtolower($color))
		{
			case 'black':
				$bg_color = '#000000';
				$text_color = '#ffffff';
			break;
			default:
			case 'gray':
				$bg_color = '#666666';
				$text_color = '#ffffff';
			break;
			case 'white':
				$bg_color = '#f5f5f5';
				$text_color = '#444444';
			break;
			case 'blue':
				$bg_color = '#004a80';
				$text_color = '#ffffff';
			break;
			case 'yellow':
				$bg_color = '#f9b601';
				$text_color = '#ffffff';
			break;
			case 'red':
				$bg_color = '#9e0b0f';
				$text_color = '#ffffff';
			break;
			case 'orange':
				$bg_color = '#fe7201';
				$text_color = '#ffffff';
			break;
			case 'green':
				$bg_color = '#7aad34';
				$text_color = '#ffffff';
			break;
			case 'pink':
				$bg_color = '#d2027d';
				$text_color = '#ffffff';
			break;
			case 'purple':
				$bg_color = '#582280';
				$text_color = '#ffffff';
			break;
		}
	
	$bg_color_light = '#'.hex_lighter(substr($bg_color, 1), 20);
	$border_color = '#'.hex_lighter(substr($bg_color, 1), 10);
	
	$return_html = '<style>
	#content_wrapper .table_'.strtolower($color).' table 
	{
		border:1px solid '.$border_color.';
	}
	#content_wrapper .table_'.strtolower($color).' table tr th
	{
		background: -webkit-gradient(linear, left top, left bottom, from('.$bg_color_light.'), to('.$bg_color.'));background: -moz-linear-gradient(top,  '.$bg_color_light.',  '.$bg_color.');filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\''.$bg_color_light.'\', endColorstr=\''.$bg_color.'\');color:'.$text_color.';
	}
	#content_wrapper .table_'.strtolower($color).' table tr th, #content_wrapper .table_'.strtolower($color).' table tr td
	{
		border-bottom:1px solid '.$border_color.';
	}
	#content_wrapper table tr:last-child
	{
		border-bottom: 0;
	}
	</style>';
	$return_html.= '<div class="table_'.strtolower($color).'">';
	$return_html.= html_entity_decode(do_shortcode($content));
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('table', 'table_func');

?>