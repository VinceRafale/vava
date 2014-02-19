<?php
/**
 * Neyla Header Code
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 
 * 
 *
 */
?><!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php	/*	 * Print the <title> tag based on what is being viewed.	 */	global $page, $paged;	wp_title( '|', true, 'right' );	// Add the blog name.	bloginfo( 'name' );	// Add the blog description for the home/front page.	$site_description = get_bloginfo( 'description', 'display' );	if ( $site_description && ( is_home() || is_front_page() ) )		echo " | $site_description";	// Add a page number if necessary:	if ( $paged >= 2 || $page >= 2 )		echo ' | ' . sprintf( __( 'Page %s', 'neyla' ), max( $paged, $page ) );	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="<?php echo get_template_directory_uri() . '/js/libs/modernizr-2.5.3.min.js'; ?>" type="text/javascript"></script>


<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or<a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=APP_ID";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  
<div id="page" class="hfeed">
	<header id="branding" role="banner">
			<section class="widthfix">
				<?php $theme_options = neyla_get_theme_options(); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" id="logo" rel="home"><img src="<?php echo esc_attr ( $theme_options['logo_img_src']) ?>" alt="<?php echo esc_attr ( $theme_options['logo_img_alt']) ?>" title="<?php echo esc_attr ( $theme_options['logo_img_title']) ?>"/><span><?php bloginfo( 'name' ); ?></span></a>
				<!--<h2 id="site-description"><?php //bloginfo( 'description' ); ?></h2> -->
                
			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'neyla' ); ?></h3>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'neyla' ); ?>"><?php _e( 'Skip to primary content', 'neyla' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'neyla' ); ?>"><?php _e( 'Skip to secondary content', 'neyla' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                <div class="nav-buttons">
                           
                <a href="#" id="signup-top"></a>
                <a href="#" id="sign-in"><span>Sign</span> <span class="light-blue">In</span> <span class="down-arrow"></span></a>
                </div>
			</nav><!-- #access -->
                
			</section>        
        	<?php
				// Check to see if the header image has been removed
				
//I Will Comment this lines, because in our theme we don`t have header image, but we can use the code later, for letting users to customize
//middle part main image  

/*			

	$header_image = get_header_image();
				if ( ! empty( $header_image ) ) :
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */  /* 
							
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
					<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
				<?php endif; // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>

			<?php
				// Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) :
			?>
				<div class="only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">
				<?php get_search_form(); ?>
				</div>
			<?php
				else :
			?>
				<?php get_search_form(); ?>
			<?php endif; */ ?>
 
	</header><!-- #branding -->
   <section class="main-menu-bar">
   <nav id="main-menu" rol="navigation" class="widthfix">
   <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
   </nav>
   </section>

	<div id="main">