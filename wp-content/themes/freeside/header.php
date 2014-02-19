<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width; initial-scale=0.75; maximum-scale=1.0; user-scalable=0;">
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); echo '/styles/' . get_option('chimera_alt_stylesheet') ?>" />

<link rel="alternate" type="text/xml" title="RSS .92" href="<?php if ( get_option('chimera_social_rss') != false ) { echo get_option('chimera_social_rss'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if IE]>
<?php include ('ie.php'); ?>
<![endif]-->

<!--[if IE 7]>
<style type="text/css">
#header {
	position:absolute;
	z-index:10;
    } 
#header .wrapper .menu ul li ul li ul {	
    z-index:10;
    position:absolute;
	left:205px;}
#slider, .alternate {top:80px;margin-bottom:120px;}     
</style>
<![endif]-->
<?php if ( get_option('chimera_custom_css') != false ) { ?>
<style type="text/css" media="screen">
	<?php echo get_option('chimera_custom_css'); ?>

</style>
<?php

}

if ( get_option('chimera_logo_position') != false ) { ?>
<style type="text/css" media="screen">
	#header ul.logo img {
		margin-top: <?php echo get_option('chimera_logo_position') ?>;
	}

</style>
<?php
}
if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>
<?php 
$bodycls = '';
if ( is_home() ) { $bodycls = 'home'; } else { $bodycls = 'single'; }
if ( is_category() || is_search() || is_tag() || is_archive() || is_year() || is_day() || is_month() ) { $bodycls .= ' sidebar_' . get_option('chimera_sidebar_position'); } else { $bodycls .= ' sidebar_'.chimera_post_sidebar_position($post->ID); } 	
		
?>
<body <?php body_class($bodycls); ?>>  
    
 <!--[if IE 6]>  <?php include ('ifie6.php'); ?><![endif]-->
	<div id="header">
		<div class="wrapper">
			<ul class="logo">
				<li>
<?php if ( get_option('chimera_logo') != false ) { ?>
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_option('chimera_logo'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
<?php }?>
				</li>
			</ul>
<?php wp_nav_menu( array( 'link_after' => '<i></i>', 'theme_location' => 'header-menu' ) ); ?>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div id="featured"
<?php 
	if ( is_home() ) {
		if ( get_option('chimera_home_slider') == 'val3' ) {
			echo 'class="feat_alt"';
		}
		
		} else { $title_descr = get_post_meta($post->ID, 'title_descr', true); if ( get_option('chimera_enable_title_descr') != 'false') { if ( $title_descr != false ) { ?> class="w_title_descr"<?php } } } ?>>
		<div class="wrapper clear">
<?php require ($GLOBALS['chimera_theme_path'] . 'header_extras.php'); ?>
		</div>
	</div>
<?php if ( !is_home() ) {

	if ( get_option('chimera_breadcrumb_nav') != 'true' ) { 

?>
			<div id="breadcrumb">
				<div class="wrapper">
<?php if (class_exists('simple_breadcrumb')) { $bc = new simple_breadcrumb; } ?>
<?php if ( get_option('chimera_enable_breadcrumb_search') != 'false' ) { ?>
					<div class="breadcrumb_search">
						<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
							<input type="text" value="Search" onclick="value=''" name="s" id="s" />
						</form>
					</div>
<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
<?php } } else { 

	if ( get_option('chimera_breadcrumb_slider') == 'true' ) { $breadcrumb_hide = ' class="hide"'; } else { $breadcrumb_hide = ''; }
	
?>
			<div id="breadcrumb"<?php echo $breadcrumb_hide ?>>
				<div id="pagination" class="pagination"></div>
			</div>
<?php } ?>

		<div id="main_content">
			<div class="wrapper">