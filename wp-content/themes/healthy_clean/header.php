<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>


<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'health' ), max( $paged, $page ) );

	?></title>
	
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />
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


$query = "SELECT * FROM ".$wpdb->base_prefix."options WHERE option_name='wp_theme_color'";
$q = mysql_query($query);
$row = mysql_fetch_array($q);
if($row['option_value']=="blue") { ?>
<link href="<?php bloginfo('template_directory'); ?>/css/blue/style.css" rel="stylesheet" type="text/css" />

<?php } else if($row['option_value']=="red") { ?>
<link href="<?php bloginfo('template_directory'); ?>/css/red/style.css" rel="stylesheet" type="text/css" />

<?php } else if($row['option_value']=="green"){ ?>
<link href="<?php bloginfo('template_directory'); ?>/css/green/style.css" rel="stylesheet" type="text/css" />

<?php } else if($row['option_value']=="brown"){ ?>
<link href="<?php bloginfo('template_directory'); ?>/css/brown/style.css" rel="stylesheet" type="text/css" />

<?php } else if($row['option_value']=="yellow"){ ?>
<link href="<?php bloginfo('template_directory'); ?>/css/yellow/style.css" rel="stylesheet" type="text/css" />
<?php }
else
{
?>
<link href="<?php bloginfo('template_directory'); ?>/css/blue/style.css" rel="stylesheet" type="text/css" />
<?
} ?>

<!--
  jQuery library
-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.2.min.js"></script>
<!--
  jCarousel library
-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jcarousel.min.js"></script>
<!--
  jCarousel skin stylesheet
-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/skin.css" />

<script type="text/javascript">
var $a = jQuery.noConflict();
$a(document).ready(function() 
{
    $a('#mycarousel').jcarousel();
});

</script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.js"></script>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/front-page.css" />


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
//<![CDATA[

function ChangeFontColor(color) {

document.getElementById('wp_theme_text').style.color=''+color+'';

}

//]]>
</script>

</head>

<body onLoad="return abc();"
 <?php body_class(); ?>>

<div id="wrapper" class="hfeed">
<div class="we_are">
<img src="<?php bloginfo("template_directory");?>/images/hd.jpg"/>	WE ARE NOW RESPONSE
</div>
<div class="we_would">
<img src="<?php bloginfo("template_directory");?>/images/as.jpg"/> WE WOULD LOVE YOUR FEEDBACK
</div>
<div id="tel">
<img align="left" src="<?php bloginfo('template_directory'); ?>/images/phone_icon.png" />
<div class="phone">
<span><?php if(get_option('wp_phone', true)=='1')
echo "000 000 000";
else
echo get_option('wp_phone', true);
?></span><br/>
<font>24*7 Toll Free Number</font>
</div>
</div>
<div class="logo">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
						<span><?php bloginfo('description'); ?></span>
					</div>
	<div id="header">
	

	 
			<div id="masthead">
			<div id="branding" role="banner">
		<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?> 
		
			<?php //the_excerpt( 'before_content' ); // Before content hook ?>
			<div id="slider-container">
	<?php /*?><a class="slider-prev" title="<?php esc_attr_e( 'Previous Post', 'hybrid-news' ); ?>"><?php _e( 'Previous', 'hybrid-news' ); ?></a>
					<a class="slider-next" title="<?php esc_attr_e( 'Next Post', 'hybrid-news' ); ?>"><?php _e( 'Next', 'hybrid-news' ); ?></a><?php */?>
			<div id="slider">
			
				

			<?php
				if ( get_option( 'feature_category' ) )
				
					$feature_query = array( 'cat' => get_option( 'feature_category' ), 'showposts' => get_option( 'feature_num_posts' ), 'ignore_sticky_posts' => true );
				else
					$feature_query = array( 'post__in' => get_option( 'sticky_posts' ), 'showposts' => get_option( 'feature_num_posts' ) );
			?>

				<?php $loop = new WP_Query( $feature_query ); ?>

				<?php while ( $loop->have_posts() ) : $loop->the_post(); $do_not_duplicate[] = $post->ID; ?>

			<div class="slider-head">
					
				<div class="image">
					<?php  the_post_thumbnail('medium', array(500,150)); ?>
					
				</div>

						<div class="feature-content">
						   <h3><strong><?php the_title(); ?></strong><h3>
							<?php the_excerpt(); ?>							
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a>							
							</div>
					</div>

				<?php endwhile; ?>

			</div>

			<!--<div class="slider-controls">

	<a class="slider-pause" title="<?php //esc_attr_e( 'Pause', 'hybrid-news' ); ?>"><?php //_e( 'Pause', 'hybrid-news' ); ?></a>

			</div>-->

		</div>
					
                <?php  //if ( function_exists( 'get_smooth_slider' ) ) { get_smooth_slider(); } ?>
				
				<?php /*?><div id="site-description"><?php bloginfo( 'description' ); ?></div><?php */?>
				
				
				<?php
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					//if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
							//has_post_thumbnail( $post->ID ) &&
							//( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							//$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						//echo get_the_post_thumbnail( $post->ID );
					//elseif ( get_header_image() ) : ?>					
						<?php /*?><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" /><?php */?>
					<?php ///endif; ?>
					
			</div><!-- #branding -->
			
			
			<div id="access" role="navigation">
			
			
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'health' ); ?>"><?php _e( 'Skip to content', 'health' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
		</div><!-- #masthead -->
	</div><!-- #header -->
	<div id="main">