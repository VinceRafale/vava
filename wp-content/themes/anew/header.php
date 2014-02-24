<!DOCTYPE html> 
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title(''); ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>
<script type="text/javascript">	
	window.onload=function(){
		for (var i=0; i < 5; i++)
		{
			document.getElementById('next').click();
			//setTimeout(document.getElementById('next').click();, 2000);
		}
	};
/*
	$(document).ready(function(){
			$('#next').trigger('click');
		  });
	
		window.onload = automatic_play(){
			alert("Ahoj");
			document.getElementById('next').click();
		};
*/
// alert("Ahoj");
</script>
<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="header">
	
		<?php if (has_nav_menu('topbar')): ?>
			<nav class="nav-container group" id="nav-topbar">
				<div class="nav-toggle"><i class="fa fa-bars"><img src="<?php echo home_url('/'); ?>wp-content/themes/anew/img/menu-alt-512.png" title="Menu" /></i></div>
				<div class="nav-text"><!-- put your mobile menu text here --></div>
				<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'topbar','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?></div>
				
				<div class="container">	
				</div><!--/.container-->
				
			</nav><!--/#nav-topbar-->
		<?php endif; ?>
		
		<div class="container">
			<?php if ( ot_get_option('header-image') == '' ): ?>

			<div class="pad group">
				<?php echo alx_site_title(); ?>

						
				<!-- Slider -->
				<div id="slider" class="slider">
					<div id="pod-slider" class="pod-slider">
					  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('slider') ) : ?>
											<?php include(TEMPLATEPATH . '/slider.php'); ?>
					<?php endif; ?>
					</div>
				</div>
				<!--  Slider end -->
			
				<?php alx_social_links() ; ?>
			</div>

			<?php endif; ?>
			<?php if ( ot_get_option('header-image') ): ?>
				<a href="<?php echo home_url('/'); ?>" rel="home">
					<img class="site-image" src="<?php echo ot_get_option('header-image'); ?>" alt="<?php get_bloginfo('name'); ?>">
				</a>
			<?php endif; ?>
		</div><!--/.container-->

	</header><!--/#header-->
	
	<div id="page" class="container">
		<div class="main group">