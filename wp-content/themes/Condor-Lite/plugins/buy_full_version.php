<?php

/*
	Begin Create Troubleshooting Options
*/

add_action('admin_menu', 'wpcrown_theme_full');

function wpcrown_theme_full() {

  add_submenu_page('functions.php', 'Full Version', 'Full Version', 'manage_options', 'wpcrown_theme_full', 'wpcrown_theme_full_options');
  add_menu_page('Full Version', 'Full Version', 'administrator', basename(__FILE__), 'wpcrown_theme_full_options', get_stylesheet_directory_uri().'/functions/images/screen.png');

}

function wpcrown_theme_full_options() {

  	if (!current_user_can('manage_options'))  {
    	wp_die( __('You do not have sufficient permissions to access this page.') );
  	}
  	
  	$plugin_url = get_stylesheet_directory_uri().'/plugins/buy_full_version';
?>

<div class="wrap rm_wrap">
	<div class="header_wrap">
		<div style="float:left; margin-top: 15px;">
			<h2 style=" color: #eee; text-shadow: none;">Full Version Theme</h2>
		</div>
		<div id="icon-themes" class="icon32" style="float:right;margin:20px 0 0 0"><br></div>
		<br style="clear:both"/><br/>
	</div>	
				<div class="theme-block" style="margin-top:40px;">
					<img src="http://www.wpcrown.com/wp-content/uploads/2011/10/condor3-380x230.png" /><br/><br/>
					<div class="theme_detail_wrapper">
						<div class="theme_name">
							<span class="theme_title"><strong>Condor - Full Version</strong></span><br/>
						</div>
						<div class="theme_buy">
							<a href="http://www.wpcrown.com/project/condor/" class="button-primary" target="_blank">$35 BUY NOW</a>
						</div>
					</div>
				</div>
</div>	
<br style="clear:both"/>

<?php

}

/*
	End Create Troubleshooting Options
*/

?>