<?php
	/*
	
	Template Name: Static featured area
	
	*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width; initial-scale=0.75; maximum-scale=1.0; user-scalable=0;">
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html" CHARSET=<?php bloginfo( 'charset' ); ?>>
<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); echo '/styles/' . get_option('chimera_alt_stylesheet') ?>">
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('chimera_rss_url') != false ) { echo get_option('chimera_rss_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php if ( get_option('chimera_social_rss') != false ) { echo get_option('chimera_social_rss'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<!--[if IE]>
<?php include ('ie.php'); ?>
<![endif]-->

<?php



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
<body class="home sidebar-left" ?>
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
	<div id="featured" class="feat_alt">
		<div class="wrapper clear">
<?php 

$slider_cat = get_option('chimera_slider_cat');
$slider_entries = get_option('chimera_slider_entries');
$the_query3 = new WP_Query('cat=' . $slider_cat . '&showposts=' . $slider_entries . '&orderby=post_date&order=desc');


 ?>
	<div class="alternate">
		<div class="feat_text">
			<h4><?php echo stripslashes(get_option('chimera_featured_title')); ?></h4>
			<h5><?php echo stripslashes(get_option('chimera_featured_text')); ?></h5>
			<?php if ( get_option('chimera_static_but_left_title') != false && get_option('chimera_static_but_left_link') != false ) { ?>
			<a href="<?php echo get_option('chimera_static_but_left_link'); ?>" title="<?php echo get_option('chimera_static_but_left_title'); ?>" class="button_big big_<?php echo get_option('chimera_static_but_left_bg'); ?> float-<?php echo get_option('chimera_static_but_left_align'); ?>"><?php echo get_option('chimera_static_but_left_title'); ?><i></i></a>
			<?php } ?>
			<?php if ( get_option('chimera_static_but_right_title') != false && get_option('chimera_static_but_right_link') != false ) { ?>
			<a href="<?php echo get_option('chimera_static_but_right_link'); ?>" title="<?php echo get_option('chimera_static_but_right_title'); ?>" class="button_big big_<?php echo get_option('chimera_static_but_right_bg'); ?> float-<?php echo get_option('chimera_static_but_right_align'); ?>"><?php echo get_option('chimera_static_but_right_title'); ?><i></i></a>
			<?php } ?>
			</div>
			<?php if ( get_option('chimera_enable_screenshot_link') != 'false' ){ ?>
			<a href="<?php echo get_option('chimera_slider_link'); ?>" title="<?php echo get_option('chimera_slider_title'); ?>" id="screenshot"><img src="<?php echo get_option('chimera_slider_img'); ?>" alt="<?php echo get_option('chimera_slider_title'); ?>" /></a>
			<?php } else { ?>
			<div id="screenshot">
			<?php if ( get_option('chimera_slider_img') != false ) { ?>
				<img src="<?php echo get_option('chimera_slider_img'); ?>" alt="<?php echo get_option('chimera_slider_title'); ?>" />
			<?php } ?>
			</div>
		<?php } ?>
	</div>
	</div>
	</div>
	<div class="clear"></div>
<?php
	if ( get_option('chimera_breadcrumb_slider') == 'true' ) { $breadcrumb_hide = ' class="hide"'; } else { $breadcrumb_hide = ''; }
	
?>
			<div id="breadcrumb"<?php echo $breadcrumb_hide ?>>
				<div id="pagination" class="pagination"></div>
			</div>

</div>
		<div id="main_content">
			<div class="wrapper">
				<?php if (get_option('chimera_homepage_content_top') != 'None') { ?>

				<?php echo chimera_get_page_content(get_option('chimera_homepage_content_top'));

					echo '<div class="break"></div>';

				} ?>
				<?php if ( get_option('chimera_frontpage_blog_section') != 'false' ) { ?>
				<div class="main_wrapper">
					<h3 class="section_title home_section">
							<?php echo get_option('chimera_frontpage_blog_title'); ?>
							<a class="home-rss" href="<?php bloginfo('url'); ?>?cat=<?php echo $cat_id;?>&amp;feed=rss2" title="<?php echo $frontpage_categories; ?> Feed"></a>
					</h3>
							<?php						
									if(have_posts()) :

										$cat_id = get_option('chimera_frontpage_category');

										$frontpage_entries = get_option('chimera_frontpage_entries');

										$the_query2 = new WP_Query('cat=' . $cat_id . '&showposts=' . $frontpage_entries . '&orderby=post_date&order=desc');

													$counter = 0;

													while ($the_query2->have_posts()) : $the_query2->the_post();
														$counter++;
														$counter2++;
														$entry_img = get_post_meta($post->ID,'post_image', true);
														$entry_vid = get_post_meta($post->ID,'post_video', true);	

											include('includes/blog_post.php');

							?>

										<?php endwhile;	else:	?>

									<div class="post highlight">
										<?php _e( 'There are no blog posts', 'chimera' ); ?>
										<div class="clear"></div>
									</div>

								<?php	endif;	?>

												</div>
												<div class="main_sidebar">
													<?php if ( !function_exists('register_sidebar') || !dynamic_sidebar("homepage_widgets") ) : ?><?php endif; ?>
												</div>
							<?php } ?>
												<div class="clear"></div>




				<?php echo chimera_get_page_content(get_option('chimera_homepage_content_bottom')); ?>

				<?php get_footer(); ?>