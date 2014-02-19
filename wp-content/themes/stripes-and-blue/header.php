<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="viewport" content="width=986, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Scada:400italic,700italic,400,700|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300|Open+Sans+Condensed:300,700,300italic' rel='stylesheet' type='text/css' />
<?php
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="container">
<div id="header">
<div id="title">
	<h1><a href="<?php echo home_url(); ?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
	<div class="description"><?php bloginfo('description'); ?></div>
</div>
<div id="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</div>
<div class="clear"></div>
</div><!-- /header -->