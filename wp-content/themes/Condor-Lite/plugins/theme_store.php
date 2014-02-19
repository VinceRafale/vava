<?php

/*
	Begin Create Troubleshooting Options
*/

add_action('admin_menu', 'wpcrown_theme_store');

function wpcrown_theme_store() {

  add_submenu_page('functions.php', 'Theme Store', 'Theme Store', 'manage_options', 'wpcrown_theme_store', 'wpcrown_theme_store_options');
  add_menu_page('Theme Store', 'Theme Store', 'administrator', basename(__FILE__), 'wpcrown_theme_store_options', get_stylesheet_directory_uri().'/functions/images/screen.png');

}

function wpcrown_theme_store_options() {

  	if (!current_user_can('manage_options'))  {
    	wp_die( __('You do not have sufficient permissions to access this page.') );
  	}
  	
  	$plugin_url = get_stylesheet_directory_uri().'/plugins/theme_store';
?>

<div class="wrap rm_wrap">
	<div class="header_wrap">
		<div style="float:left; margin-top: 15px;">
			<h2 style=" color: #eee; text-shadow: none;">Theme Store</h2>
		</div>
		<div id="icon-themes" class="icon32" style="float:right;margin:20px 0 0 0"><br></div>
		<br style="clear:both"/><br/>
	</div>
	
	<div style="padding:40px 0 0 0;background:#fff; width: 840px;">
		<?php
			
			// Get store data from API
			$per_page = 10;
			
			if(isset($_GET['start']))
			{
				$start = $_GET['start'];
			}
			else
			{
				$start = 0;
			}
			$end = $start+$per_page-1;
			$next = $end+1;
			$prev = $start-$per_page;
			
			$store_stat_url = 'http://www.wpcrown.com/theme-store/stat.php';
			
			$ch = curl_init();
			$timeout = 5; // set to zero for no timeout
			curl_setopt ($ch, CURLOPT_URL, 'http://www.wpcrown.com/theme-store/themes_store.php');
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$file_contents = curl_exec($ch);
			curl_close($ch);
			
			$data = $file_contents;

			$themes_arr = unserialize($data);
			
			$themes_arr = array_merge(array(),$themes_arr);
			$count_themes = count($themes_arr);
			
			if($next<=$count_themes)
			{
				$has_next = TRUE;
			}
			else
			{
				$has_next = FALSE;
			}
			
			if($start>$per_page-1)
			{
				$has_prev = TRUE;
			}
			else
			{
				$has_prev = FALSE;
			}
				
			//wpcrown_debug($themes_arr);
			if(is_array($themes_arr) && !empty($themes_arr))
			{
				$current = 1;
				for($i=$start;$i<=$end;$i++)
				{
					if(isset($themes_arr[$i]))
					{
		?>
		
				<div class="theme-block">
					<img src="<?php echo $themes_arr[$i]['preview']; ?>" /><br/><br/>
					<div class="theme_detail_wrapper">
						<div class="theme_name">
							<?php 
								$theme_name_arr = explode('-', $themes_arr[$i]['name']);
								
								$theme_name = $theme_name_arr[0];
								$theme_desc = $theme_name_arr[1];
							?>
							<span class="theme_title"><strong><?php echo $theme_name; ?></strong></span><br/>
							<span class="theme_desc"><?php echo $theme_desc; ?></span>
						</div>
						<div class="theme_buy">
							<a href="<?php echo $themes_arr[$i]['url']; ?>" class="button-primary" target="_blank">$<?php echo $themes_arr[$i]['price']; ?> BUY</a>
							<a href="<?php echo $themes_arr[$i]['demo']; ?>" class="button" target="_blank">DEMO</a>
						</div>
					</div>
				</div>
		
		<?php
						$current++;
					}
				}
				
				echo '<br style="clear:both"/>';
			}
			else
			{
		?>
				<div style="margin:auto;text-align:center">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/functions/images/attention-alert-warning-icone-6427-48.png"/>
					<p>Themes Store is not available now. <br/>Please check your network connection and try again later.</p>
				</div>
				<br style="clear:both"/>
				
		<?php
			}
		?>
	</div>
	
	<?php
		if($has_next OR $has_prev)
		{
	?>
			<br style="clear:both"/>
			<div style="margin:0 0 0 20px">
			
			<?php
				if($has_prev)
				{
			?>
			<div style="float:left;margin:0 10px 15px 0">
				<a href="<?php echo get_admin_url(); ?>admin.php?page=theme_store.php&start=<?php echo $prev; ?>" class="button"><< PREVIOUS</a>
			</div>
			<?php 
				}
			?>
			
			<?php
				if($has_next)
				{
			?>
			<div style="float:left;margin:0 10px 15px 0">
				<a href="<?php echo get_admin_url(); ?>admin.php?page=theme_store.php&start=<?php echo $next; ?>" class="button">NEXT >></a>
			</div>
			<?php 
				}
			?>
			
			</div>
			<br style="clear:both"/>
	<?php
		}
	?>
	
</div>
<br style="clear:both"/>

<?php

}

/*
	End Create Troubleshooting Options
*/

?>