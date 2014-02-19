<?php

define("THEMENAME", "Condor-Lite");
define("SHORTNAME", "wpcrown");

//If clear cache
if(isset($_POST['method']) && !empty($_POST['method']) && $_POST['method'] == 'clear_cache')
{
	if(file_exists(TEMPLATEPATH."/cache/combined.js"))
	{
		unlink(TEMPLATEPATH."/cache/combined.js");
	}
	
	if(file_exists(TEMPLATEPATH."/cache/combined.css"))
	{
		unlink(TEMPLATEPATH."/cache/combined.css");
	}
	
	exit;
}

//If delete image
if(isset($_POST['field_id']) && !empty($_POST['field_id']))
{
	$current_val = get_option($_POST['field_id']);
	unlink(TEMPLATEPATH.'/cache/'.$current_val);
	delete_option( $_POST['field_id'] );
	
	echo 1;
	exit;
}

// Must be on wordpress 2.9 or above
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		
		/*
			THUMBNAIL SIZES
			please note - you must delete and re-add the thumbnails on each post/page if you change 
			the sizes below or you will not see the change take effect.
		*/
		
		
		set_post_thumbnail_size( 80, 80, true ); 
		add_image_size( 'small_thumb', 50, 50, true); // main thumb 
		add_image_size( 'blog_post_thumb', 519, 200, true); // main thumb 
		add_image_size( 'blog_post_full', 840, 250, true); // main thumb 
		add_image_size( 'portfolio_feat', 201, 140, true);
		add_image_size( 'portfolio_thumb', 225, 150, true);
		add_image_size( 'gallery_thumb', 175, 106, true); 
		add_image_size( 'nivoimage', 940, 340, true); 
		add_image_size( 'featured_list_image', 653, 320, true);	
		add_image_size( 'slideshow_small_image', 85, 85, true);
		add_image_size( 'index_header', 900, 342, true);
		add_image_size( 'image_rotator', 940, 342, true);
		add_image_size( 'carousel_thumb', 172, 120, true);
		add_image_size( 'slideshow', 940, 340, true);
	}
	
	// pagination function
	function pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'><span class='pagination_pages'>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

	// get  the post thumbnail src
	function get_the_post_thumbnail_src($img)
	{
	  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
	}
	
	// custom background
	add_custom_background();

/*
 *  Setup main navigation menu
 */
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
	// register menu
	register_nav_menus (
		array(
		'primary' =>__('Main menu'),
		)
	);
}

// beadcrumbs
	function breadcrumbs() {
 
	$delimiter = ' <span class="breadcrumb_current">&rarr;</span> ';
	$name = 'Home'; //text for the 'Home' link
	$currentBefore = ' <span class="breadcrumb_current"> ';
	$currentAfter = '</span>';
	$pageslug = $post->post_name;
 
	if ( !is_front_page() || is_paged() ) {
 
    global $post;
    $home = get_bloginfo('url');
    echo '<span class="breadcrumb">You are here:</span> <span class="breadcrumb_link"><a href="' . $home . '">' . $name . '</a></span> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo '<span class="breadcrumb_link">' . get_category_parents($thisCat, TRUE, ' ' . $delimiter . ' ') . '</a></span> ';
      echo $currentBefore . 'Archive by category &#39;';
      single_cat_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<span class="breadcrumb_link"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></span> ' . $delimiter . ' ';
      echo '<span class="breadcrumb_link"><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></span> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_home() ) {
	  echo $currentBefore;
      wp_title('',true,'');
      echo $currentAfter;
	  
	} elseif ( is_month() ) {
      echo '<span class="breadcrumb_link"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></span> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() && !is_attachment() ) {
	
	//
	
	if(get_post_type() != 'post')
	{
	
		if(get_post_type() != 'projects')
		{
		
			$post_type = get_post_type_object(get_post_type());

			$slug = $post_type->rewrite;
			echo '<span class="breadcrumb_link"> <a href="'.$home.'/'.$slug['slug'].'/">';
			echo $post_type->labels->singular_name;
			echo '</a> </span>';
			echo $delimiter;

			echo $currentBefore;
			the_title();
			echo $currentAfter;
			
		} else {
		
			$post_type = get_post_type_object(get_post_type());

			$slug = $post_type->rewrite;
			echo '<span class="breadcrumb_link">';
			echo '</span><span class="breadcrumb_current">Projects</span>';
			echo $delimiter;

			echo $currentBefore;
			the_title();
			echo $currentAfter;
			
		}	
		
	} else {
	
		$cat = get_the_category();
		$cat = $cat[0];
		echo '<span class="breadcrumb_link">' .get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . '</a></span> ';
		echo $currentBefore;
		the_title();
		echo $currentAfter;
			
	}		

	} elseif ( !is_single() && !is_page() && get_post_type() != 'post')
	{

		$post_type = get_post_type_object(get_post_type());
		echo $currentBefore;
		echo $post_type->labels->singular_name;
		echo $currentAfter;
	
	//
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo '<span class="breadcrumb_link">' . get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . '</a></span> ';
      echo '<span class="breadcrumb_link">' . get_permalink($parent) . '">' . $parent->post_title . '</a></span> ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<span class="breadcrumb_link"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></span> ';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo $currentBefore . ('Page') . ' ' . get_query_var('paged') . $currentAfter;
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
  }
}	

	// create tiny url
	function get_tiny_url($url) {
 
		if (function_exists('curl_init')) {
			$url = 'http://tinyurl.com/api-create.php?url=' . $url;
		 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			$tinyurl = curl_exec($ch);
			curl_close($ch);
		 
			return $tinyurl;
		}
		 
		else {
			# cURL disabled on server; Can't shorten URL
			# Return long URL instead.
			return $url;
		}
		 
	}

if ( function_exists( 'add_theme_suwpcrownort' ) ) {
	// Setup thumbnail suwpcrownort
	add_theme_suwpcrownort( 'post-thumbnails' );
	add_theme_suwpcrownort( 'automatic-feed-links' );
}

// Presstrends
function presstrends() {

// Add your PressTrends and Theme API Keys
$api_key = 'zl1noagk5lbksu0as60o1dwhyt2z8wuh2ruf';
$auth = '2vndymta3puh6uz1b6cj1xxlbxe6m7syp';

// NO NEED TO EDIT BELOW
$data = get_transient( 'presstrends_data' );
if (!$data || $data == ''){
$api_base = 'http://api.presstrends.io/index.php/api/sites/add/auth/';
$url = $api_base . $auth . '/api/' . $api_key . '/';
$data = array();
$count_posts = wp_count_posts();
$comments_count = wp_count_comments();
$theme_data = get_theme_data(get_template_directory() . '/style.css');
$plugin_count = count(get_option('active_plugins'));
$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
$data['posts'] = $count_posts->publish;
$data['comments'] = $comments_count->total_comments;
$data['theme_version'] = $theme_data['Version'];
$data['theme_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
$data['plugins'] = $plugin_count;
$data['wpversion'] = get_bloginfo('version');
foreach ( $data as $k => $v ) {
$url .= $k . '/' . $v . '/';
}
$response = wp_remote_get( $url );
set_transient('presstrends_data', $data, 60*60*24);
}}

add_action('wp_head', 'presstrends');

/**
*	Setup all theme's library
**/

/**
*	Setup admin setting
**/
include (TEMPLATEPATH . "/lib/admin.lib.php");
include (TEMPLATEPATH . "/lib/twitter.lib.php");

/**
*	Setup Sidebar
**/
include (TEMPLATEPATH . "/lib/sidebar.lib.php");


//Get JSmin class
include (TEMPLATEPATH . "/lib/jsmin.lib.php");


//Get custom function
include (TEMPLATEPATH . "/lib/custom.lib.php");


//Get custom shortcode
include (TEMPLATEPATH . "/lib/shortcode.lib.php");


// Setup theme custom widgets
include (TEMPLATEPATH . "/lib/widgets.lib.php");

// nivoSlider
include (TEMPLATEPATH . "/lib/nivoSlider.php");

$wpcrown_handle = opendir(TEMPLATEPATH.'/fields');
$wpcrown_font_arr = array();

while (false!==($wpcrown_file = readdir($wpcrown_handle))) {
	if ($wpcrown_file != "." && $wpcrown_file != ".." && $wpcrown_file != ".DS_Store") { 
		include (TEMPLATEPATH . "/fields/".$wpcrown_file);
	}
}
closedir($wpcrown_handle);


function wpcrown_add_admin() {
 
global $themename, $shortname, $options;
 
if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
 
	if ( isset($_REQUEST['action']) && 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) 
		{
			if($value['type'] != 'image' && isset($value['id']) && isset($_REQUEST[ $value['id'] ]))
			{
				update_option( $value['id'], $_REQUEST[ $value['id'] ] );
			}
		}
		
foreach ($options as $value) {

	if( isset($value['id']) && isset( $_REQUEST[ $value['id'] ] ) && $value['type'] != 'image' && $value['type'] != 'font') { 
		if($value['id'] != $shortname."_sidebar0")
		{
			//if sortable type
			if($value['type'] == 'sortable')
			{
				$sortable_array = serialize($_REQUEST[ $value['id'] ]);
				
				$sortable_data = $_REQUEST[ $value['id'].'_sort_data'];
				$sortable_data_arr = explode(',', $sortable_data);
				$new_sortable_data = array();
				
				foreach($sortable_data_arr as $key => $sortable_data_item)
				{
					$sortable_data_item_arr = explode('_', $sortable_data_item);
					
					if(isset($sortable_data_item_arr[0]))
					{
						$new_sortable_data[] = $sortable_data_item_arr[0];
					}
				}
				
				update_option( $value['id'], $sortable_array );
				update_option( $value['id'].'_sort_data', serialize($new_sortable_data) );
			}
			else
			{
				update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
			}
		}
		elseif(isset($_REQUEST[ $value['id'] ]) && !empty($_REQUEST[ $value['id'] ]))
		{
			//get last sidebar serialize array
			$current_sidebar = get_option($shortname."_sidebar");
			$current_sidebar[ $_REQUEST[ $value['id'] ] ] = $_REQUEST[ $value['id'] ];

			update_option( $shortname."_sidebar", $current_sidebar );
		}
	} 
	else if(isset($_FILES[ $value['id'] ]) || isset($_FILES[ $value['id'].'_upload' ])) {

		if($value['type'] == 'image')
		{
			if(is_writable(TEMPLATEPATH.'/cache') && !empty($_FILES[$value['id']]['name']))
			{
			    $current_time = time();
			    $target = TEMPLATEPATH.'/cache/'.$current_time.'_'.basename( $_FILES[$value['id']]['name']);
			    $current_file = TEMPLATEPATH.'/cache/'.get_option($value['id']);
			
			    if(move_uploaded_file($_FILES[$value['id']]['tmp_name'], $target)) 
			    {
			    	if(file_exists($current_file))
			    	{
				    	unlink($current_file);
				    }
			     	update_option( $value['id'], $current_time.'_'.basename( $_FILES[$value['id']]['name'])  );
			    }
			}
		}
		else if($value['type'] == 'font')
		{
			if(is_writable(TEMPLATEPATH.'/fonts') && !empty($_FILES[$value['id'].'_upload']['name']))
			{
				if($_FILES[$value['id'].'_upload']['type'] == 'text/javascript')
				{
			    	$target = TEMPLATEPATH.'/fonts/'.basename( $_FILES[$value['id'].'_upload']['name']);
					move_uploaded_file($_FILES[$value['id'].'_upload']['tmp_name'], $target);
				}
			}
		}
	}
	else 
	{ 
		delete_option( $value['id'] );
	} 
}

	header("Location: admin.php?page=functions.php&saved=true".$_REQUEST['current_tab']);
 
} 
else if( isset($_REQUEST['action']) && 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'wpcrown_admin', get_admin_url().'/images/generic.png');
}

function wpcrown_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_style("jquery-ui", $file_dir."/functions/jquery-ui/css/ui-lightness/jquery-ui-1.8.10.custom.css", false, "1.0", "all");
wp_enqueue_style("colorpicker_css", $file_dir."/functions/colorpicker/css/colorpicker.css", false, "1.0", "all");
wp_enqueue_script("jquery-ui", $file_dir."/functions/jquery-ui/js/jquery-ui-1.8.10.custom.min.js", false, "1.0");
wp_enqueue_script("colorpicker_script", $file_dir."/functions/colorpicker/js/colorpicker.js", false, "1.0");
wp_enqueue_script("eye_script", $file_dir."/functions/colorpicker/js/eye.js", false, "1.0");
wp_enqueue_script("utils_script", $file_dir."/functions/colorpicker/js/utils.js", false, "1.0");
wp_enqueue_script("iphone_checkboxes", $file_dir."/functions/iphone-style-checkboxes.js", false, "1.0");
wp_enqueue_script("jslider_depend", $file_dir."/functions/jquery.dependClass.js", false, "1.0");
wp_enqueue_script("jslider", $file_dir."/functions/jquery.slider-min.js", false, "1.0");

/**
*	Check selected font
**/
$wpcrown_font = get_option('wpcrown_font');

if(empty($wpcrown_font))
{
	$wpcrown_font = 'Sansation_700.font';
}
	
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function wpcrown_admin() {
 
global $themename, $shortname, $options;
$i=0;

?>
	
	<form method="post" enctype="multipart/form-data">
	<div class="wpcrown_wrap rm_wrap">
	
	<div class="header_wrap">
		<div style="float:left; width: 140px; border-right: dashed 1px #888; margin-top: 20px;">
		<a href="http://www.wpcrown.com" target="_blnk"><img src="<?php bloginfo('template_directory'); ?>/functions/images/logo.png" /></a>
		</div>
		
		<div style="float:left; padding-left: 20px; margin-top: 7px;">
		<h2><?php echo $themename; ?> Settings</h2>
		Version 1.0
		</div>
		<div style="float:right;margin:32px 0 0 0">
			<input name="save<?php echo $i; ?>" type="submit" value="Save changes" style="margin-left: 25px;"  class="input-submit" /><br/><br/>
 <input type="hidden" name="action" value="save" />
 <input type="hidden" name="current_tab" id="current_tab" value="#wpcrown_panel_general" />
		</div>
		<input type="hidden" name="wpcrown_admin_url" id="wpcrown_admin_url" value="<?php echo get_stylesheet_directory_uri(); ?>"/>
		<br style="clear:both"/><br/>
		
		<?php
$cache_dir = TEMPLATEPATH.'/cache';
 
if(!is_writable($cache_dir))
{
?>

	<div id="message" class="error fade">
	<p style="line-height:1.5em"><strong>
		The path <?php echo $cache_dir; ?> is not writable, please login with your FTP account and make it writable (chmod 777) otherwise all images won't display.
	</p></strong>
	</div>

<?php
}
?>

	</div>
	
	<div class="wpcrown_wrap">
	<div id="wpcrown_panel">
	<?php 
		foreach ($options as $value) {
			/*print '<pre>';
			print_r($value);
			print '</pre>';*/
			
			$active = '';
			
			if($value['type'] == 'section')
			{
				if($value['name'] == 'General')
				{
					$active = 'nav-tab-active';
				}
				echo '<a id="wpcrown_panel_'.strtolower($value['name']).'_a" href="#wpcrown_panel_'.strtolower($value['name']).'" class="nav-tab '.$active.'"><img src="'.get_stylesheet_directory_uri().'/functions/images/icon/'.$value['icon'].'" class="ver_mid"/>'.$value['name'].'</a>';
			}
		}
	?>
	</h2>
	</div>

	<div class="rm_opts">
	
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?> <?php break;
 
case "close":
?>
	
	</div>
	</div>


	<?php break;
 
case "title":
?>
	<br />


<?php break;
 
case 'text':
	
	//if sidebar input then not show default value
	if($value['id'] != $shortname."_sidebar0")
	{
		$default_val = get_option( $value['id'] );
	}
	else
	{
		$default_val = '';	
	}
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
		value="<?php if ($default_val != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
		<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	
	<?php
	if($value['id'] == $shortname."_sidebar0")
	{
		$current_sidebar = get_option($shortname."_sidebar");
		
		if(!empty($current_sidebar))
		{
	?>
		<ul id="current_sidebar" class="rm_list">

	<?php
		$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	
		foreach($current_sidebar as $sidebar)
		{
	?> 
			
			<li id="<?php echo $sidebar; ?>"><?php echo $sidebar; ?>&nbsp;<a href="<?php echo $url; ?>" class="button sidebar_del" rel="<?php echo $sidebar; ?>">Delete</a></li>
	
	<?php
		}
	?>
	
		</ul>
	
	<?php
		}
	}
	?>

	</div>
	<?php
break;

case 'password':
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
		value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>

	</div>
	<?php
break;

break;

case 'image':
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<a id="<?php echo $value['id']; ?>_btn" class="button" href="javascript:;" onclick="jQuery('#<?php echo $value['id']; ?>').trigger('click')">Upload Image</a>
	<input onchange="jQuery('#<?php echo $value['id']; ?>_btn').html('Upload '+jQuery(this).val())" name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="file"
		value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	
	<?php 
		if(is_file($cache_dir.'/'.get_option( $value['id'] )) && !is_bool(get_option( $value['id'] )))
		{
			$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	?>
	
	<div id="<?php echo $value['id']; ?>_wrawpcrowner" style="width:380px;font-size:11px;">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/cache/<?php echo get_option( $value['id'] ); ?>"/><br/><br/>
		Current Image <a href="<?php echo $url; ?>" class="image_del button" rel="<?php echo $value['id']; ?>">Delete</a>
	</div>
	<?php
		}
	?>

	</div>
	<?php
break;

case 'jslider':
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<div style="float:left;width:390px;margin-top:10px">
	<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="text" class="jslider"
		value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	</div>
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	
	<script>jQuery("#<?php echo $value['id']; ?>").slider({ from: <?php echo $value['from']; ?>, to: <?php echo $value['to']; ?>, step: <?php echo $value['step']; ?>, smooth: true });</script>

	</div>
	<?php
break;

case 'colorpicker':
?>
	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<div id="<?php echo $value['id']; ?>_bg" class="colorpicker_bg" onclick="jQuery('#<?php echo $value['id']; ?>').click()" style="background:<?php if (get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>">&nbsp;</div>
		<small><?php echo $value['desc']; ?></small>
		<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="text"
		value="<?php if ( get_option( $value['id'] ) != "" ) { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?>  class="color_picker"/>
	<div class="clearfix"></div>
	
	</div>
	
<?php
break;
 
case 'textarea':
?>

	<div class="rm_input rm_textarea"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<textarea name="<?php echo $value['id']; ?>"
		type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>

	</div>

	<?php
break;
 
case 'select':
?>

	<div class="rm_input rm_select"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<select name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $key => $option) { ?>
		<option
		<?php if (get_option( $value['id'] ) == $key) { echo 'selected="selected"'; } ?>
			value="<?php echo $key; ?>"><?php echo $option; ?></option>
		<?php } ?>
	</select> <small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>
	<?php
break;

case 'font':
?>

	<div class="rm_input rm_font"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<div id="<?php echo $value['id']; ?>_wrawpcrowner" style="float:left;width:380px;font-size:11px;">
	<select name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $key => $option) { ?>
		<option
		<?php if (get_option( $value['id'] ) == $key) { echo 'selected="selected"'; } ?>
			value="<?php echo $key; ?>"><?php echo $option; ?></option>
		<?php } ?>
	</select> 
	<br/><br/><div id="wpcrown_preview_font">Preview Font Style</div>
	<br/><br/>
	
	<strong>Upload New Font (.js file only)</strong><br/>
	<a id="<?php echo $value['id']; ?>_btn" class="button" href="javascript:;" onclick="jQuery('#<?php echo $value['id']; ?>_upload').trigger('click')">Browse for Font</a>
	<input onchange="jQuery('#<?php echo $value['id']; ?>_btn').html('Upload '+jQuery(this).val())" name="<?php echo $value['id']; ?>_upload"
		id="<?php echo $value['id']; ?>_upload" type="file"
		value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	</div>
	
	<small>
		For new fonts go to <a href="http://cufon.shoqolate.com/generate/">Cufon site</a> and generate font javascript file (.js) and upload it here. You can find free fonts on <a href="http://fontsquirrel.com/">Fontsquirrel</a>, <a href="http://www.dafont.com/">Dafont</a>.
	</small>
	
	<div class="clearfix"></div>
	</div>
	<?php
break;
 
case 'radio':
?>

	<div class="rm_input rm_select"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<div style="float:left;width:350px">
	<?php foreach ($value['options'] as $key => $option) { ?>
	<div style="float:left;margin:0 20px 20px 0">
		<input style="float:left;" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" type="radio"
		<?php if (get_option( $value['id'] ) == $key) { echo 'checked="checked"'; } ?>
			value="<?php echo $key; ?>"/><?php echo html_entity_decode($option); ?>
	</div>
	<?php } ?>
	</div>
	
		<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>
	<?php
break;

case 'sortable':
?>

	<div class="rm_input rm_select"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<div style="float:left;width:100%;margin-top:15px;">
	<?php 
	$sortable_array = unserialize(get_option( $value['id'] ));
	
	$current = 1;
	
	if(!empty($value['options']))
	{
	foreach ($value['options'] as $key => $option) { 
		if($key > 0)
		{
	?>
	<div class="wpcrown_checkbox" style="float:left;margin:0 20px 20px 0;font-size:11px">
		<div class="wpcrown_checkbox_wrawpcrowner">
		<input style="float:left;" id="<?php echo $value['id']; ?>[]" name="<?php echo $value['id']; ?>[]" type="checkbox"
		<?php if (is_array($sortable_array) && in_array($key, $sortable_array)) { echo 'checked="checked"'; } ?>
			value="<?php echo $key; ?>" rel="<?php echo $value['id']; ?>_sort" alt="<?php echo html_entity_decode($option); ?>" />&nbsp;<span style="margin-top:-3px"><?php echo html_entity_decode($option); ?></span>
		</div>
	</div>
	<?php }
	
			if($current>1 && ($current-1)%4 == 0)
			{
	?>
	
			<br style="clear:both"/>
	
	<?php		
			}
			
			$current++;
		}
	}
	?>
	 
	 <br style="clear:both"/>
	 
	 <div class="wpcrown_sortable_header" style="width:570px"><?php echo $value['sort_title']; ?></div>
	 <div class="wpcrown_sortable_wrawpcrowner" style="width:570px">
	 Drag each item for sorting.<br/>
	 <ul id="<?php echo $value['id']; ?>_sort" class="wpcrown_sortable" rel="<?php echo $value['id']; ?>_sort_data"> 
	 <?php
	 	$sortable_data_array = unserialize(get_option( $value['id'].'_sort_data' ));
	 
	 	if(!empty($sortable_data_array))
	 	{
	 	foreach($sortable_data_array as $key => $sortable_data_item)
	 	{
	 		if (is_array($sortable_array) && in_array($sortable_data_item, $sortable_array)) {
	 ?>
	 	<li id="<?php echo $sortable_data_item; ?>_sort" class="ui-state-default"><?php echo $value['options'][$sortable_data_item]; ?></li> 	
	 <?php
	 		}
	 	}
	 	}
	 ?>
	 </ul>
	 
	 </div>
	 
	</div>
	
	<input type="hidden" id="<?php echo $value['id']; ?>_sort_data" name="<?php echo $value['id']; ?>_sort_data" value="" style="width:100%"/>
	<br style="clear:both"/><br/>
	
	<div class="clearfix"></div>
	</div>
	<?php
break;
 
case "checkbox":
?>

	<div class="rm_input rm_checkbox"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>
<?php break; 

case "iphone_checkboxes":
?>

	<div class="rm_input rm_checkbox"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" class="iphone_checkboxes" name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>

<?php break; 

case "html":
?>

	<div class="rm_input rm_checkbox"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<?php echo $value['html']; ?>

	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>

<?php break; 
	
case "section":

$i++;

?>

	<div id="wpcrown_panel_<?php echo strtolower($value['name']); ?>" class="rm_section">
	<div class="rm_title">
	<h3><img
		src="<?php echo get_stylesheet_directory_uri(); ?>/functions/images/trans.png"
		class="inactive" alt="""><?php echo $value['name']; ?></h3>
	<span class="submit"><input class="button-primary" name="save<?php echo $i; ?>" type="submit"
		value="Save changes" /> </span>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options"><?php break;
 
}
}
?>
 	
 	<div class="clearfix"></div>
 	</form>
	</div>


	<?php
}

add_action('admin_init', 'wpcrown_add_init');
add_action('admin_menu', 'wpcrown_add_admin');


/**
*	Setup all theme's plugins
**/
// Setup shortcode generator plugin
include (TEMPLATEPATH . "/plugins/shortcode_generator.php");
include (TEMPLATEPATH . "/plugins/theme_store.php");
include (TEMPLATEPATH . "/plugins/buy_full_version.php");
	
	// projects page pagination corrects
	define('HOME_PAGE_DEFAULT_PROJECTS', 4);
	function feat_projects_query_posts(array $query = array('post_type' => 'project', 'posts_per_page' => 4))
	{
		global $wp_query;
		wp_reset_query();

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$defaults = array(
			'paged'				=> $paged,
			'posts_per_page'	=> HOME_PAGE_DEFAULT_PROJECTS
		);
		$query += $defaults;

		$wp_query = new WP_Query($query);
	}
	
	// projects page pagination corrects
	define('PER_PAGE_DEFAULT_PROJECTS', 16);
	function projects_query_posts(array $query = array('post_type' => 'project', 'posts_per_page' => 16))
	{
		global $wp_query;
		wp_reset_query();

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$defaults = array(
			'paged'				=> $paged,
			'posts_per_page'	=> PER_PAGE_DEFAULT_PROJECTS
		);
		$query += $defaults;

		$wp_query = new WP_Query($query);
	}
	
	

function wpcrown_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Awpcrownend to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and awpcrownend to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

function my_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );

}
add_filter( 'wp_nav_menu', 'my_menu_notitle' );
add_filter( 'wp_page_menu', 'my_menu_notitle' );
add_filter( 'wp_list_categories', 'my_menu_notitle' );

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
function wpautopnobr($content) {
	return wpautop($content, (is_page() ? true : false));
}
add_filter('the_content', 'wpautopnobr');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, awpcrownly this function
add_filter('the_content', 'wpcrown_formatter', 99);
add_filter('widget_text', 'wpcrown_formatter', 99);

//Long posts should require a higher limit, see http://core.trac.wordpress.org/ticket/8553
@ini_set('pcre.backtrack_limit', 500000);

//Make widget suwpcrownort shortcode
add_filter('widget_text', 'do_shortcode');

if (isset($_GET['activated']) && $_GET['activated']){
	global $wpdb;
	
    wp_redirect(admin_url("themes.php?page=functions.php&activate=true"));
}
?>