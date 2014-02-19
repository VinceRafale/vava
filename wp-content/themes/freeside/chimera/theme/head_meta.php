<?php
function chimera_wp_head() {
	
	global $shortname, $options;
		
	$stylesheet = get_option('chimera_alt_stylesheet');	
	echo "<script src='" . get_bloginfo('template_url') . "/includes/js/jquery.js' type='text/javascript'></script>\n";
	echo "<script src='" . get_bloginfo('template_url') . "/includes/js/slider.js' type='text/javascript'></script>\n";

	$animation_default = get_option('chimera_animation_fx');
	
	if ( $animation_pause != false ) {
		$anim_pause = '1';
	} else {
		$anim_pause = '0';
	}

	$options_per_group = 8;
	$group_name = 'chimera_dynamic_slider';
	$total_groups = ceil(get_option($group_name) / $options_per_group);

	echo "<script type='text/javascript'>
	//<![CDATA[
	$(document).ready(function() {
	    $('#slider ul').cycle({
				fx	: '";	

	if ( get_option('chimera_home_slider') == 'val1' ) {

		echo $animation_default;

	} else {
				
	for ($i = 1; $i <= $total_groups; $i++) {
		
			if ( get_option($group_name . '_animation_effect_' . $i) == 'default' ) {

				echo $animation_default . ', ';

			} else {

				echo get_option($group_name . '_animation_effect_' . $i) . ', ';

			}

	}
}
	echo "',
				
				
				pager:  '#pagination',
				next:   '#next_slide', 
				prev:   '#prev_slide'
			});
		});
		//]]>
		</script>\n";


	if (get_option($shortname.'_enable_google_fonts') != 'false' ) {

		if ( get_option($shortname.'_google_font_select') == 'Droid+Sans' || get_option($shortname.'_google_font_select') == 'Cantarell' ) {
			$weight = ':regular,bold';
		}

		$font_face = get_option($shortname.'_google_font_select');

		echo "<link href=' http://fonts.googleapis.com/css?family=". $font_face . $weight . "' rel='stylesheet' type='text/css' />";

		$newphrase = str_replace('+', ' ', $font_face);

		echo "<style type='text/css' media='screen'>
				#featured h1, #featured h2, #featured h3, #featured h4, #featured h5, #featured h6, .section_title {
					font-family: '" . $newphrase . "',arial,serif;
				}
			</style>";
		
	}



echo "<script src='". get_bloginfo('template_url') . "/includes/js/superfish.js' type='text/javascript'></script>\n";
echo "<script type='text/javascript'> 
	//<![CDATA[
		jQuery(document).ready(function() {
			jQuery('#header ul li ul').append('<li class=\"last\"></li>'); 
			jQuery('#header ul').superfish();
			jQuery('#header ul li:last-child').prev().addClass(\"lat\");
		}); 
	//]]>
</script>\n";
	
if ( get_option($shortname.'_fancybox') != 'false' ) {
echo "<link rel='stylesheet' href='" . get_bloginfo('template_url') . "/includes/css/fancybox.css' type='text/css' media='screen' />\n";
echo "<script src='" . get_bloginfo('template_url') . "/includes/js/fancybox.js' type='text/javascript'></script>\n";
echo "<script type='text/javascript'>
	//<![CDATA[
		jQuery(document).ready(function() {
			jQuery('a.mPreview, .feature_box a').fancybox();
			jQuery('a.mVideo').fancybox({
				'scrolling' : 'no'
				
				
			});
		}); 
	//]]>
</script>\n";
}

echo "<script src='" . get_bloginfo('template_url') . "/includes/js/tooltip.js' type='text/javascript'></script>\n";
echo "<script src='" . get_bloginfo('template_url') . "/includes/js/custom.js' type='text/javascript'></script>\n";

}

add_action('wp_head', 'chimera_wp_head');
?>