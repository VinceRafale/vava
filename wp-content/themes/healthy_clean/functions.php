<?php
/**
 * healthy_clean functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, healthy_clean(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'health_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since healthy_clean 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run healthy_clean() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'healthy_clean' );

if ( ! function_exists( 'healthy_clean' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override healthy_clean() in a child theme, add your own healthy_clean to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since healthy_clean 1.0
 */
function healthy_clean() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'health', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'health' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	if ( ! defined( 'HEADER_TEXTCOLOR' ) )
		define( 'HEADER_TEXTCOLOR', '000' );

	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	if ( ! defined( 'HEADER_IMAGE' ) )
		define( 'HEADER_IMAGE', '%s/images/path.jpg' );
		if ( ! defined( 'image_img_tag' ) )
		define( 'image_img_tag', '%s/images/path.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to health_header_image_width and health_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'health_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'health_header_image_height', 198 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	//if ( ! defined( 'NO_HEADER_TEXT' ) )
		//define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See health_admin_header_style(), below.
	add_custom_image_header( '', 'health_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/berries.jpg',
			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Berries', 'health' )
		),
		'cherryblossom' => array(
			'url' => '%s/images/headers/cherryblossoms.jpg',
			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Cherry Blossoms', 'health' )
		),
		'concave' => array(
			'url' => '%s/images/headers/concave.jpg',
			'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Concave', 'health' )
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Fern', 'health' )
		),
		'forestfloor' => array(
			'url' => '%s/images/headers/forestfloor.jpg',
			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Forest Floor', 'health' )
		),
		'inkwell' => array(
			'url' => '%s/images/headers/inkwell.jpg',
			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Inkwell', 'health' )
		),
		'path' => array(
			'url' => '%s/images/headers/path.jpg',
			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Path', 'health' )
		),
		'sunset' => array(
			'url' => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Sunset', 'health' )
		)
	) );
}
endif;

if ( ! function_exists( 'health_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in healthy_clean().
 *
 * @since healthy_clean 1.0
 */
 
function health_admin_header_style() { ?>

<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since healthy_clean 1.0
 */
function health_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'health_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since healthy_clean 1.0
 * @return int
 */
function health_excerpt_length( $length ) {
	return 40;
	
}
add_filter( 'excerpt_length', 'health_excerpt_length' );


/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since healthy_clean 1.0
 * @return string "Continue Reading" link
 */
function health_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Read More <span class="meta-nav">&rarr;</span>', 'twen  tyten' ) . '</a>';
}
function my_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, $custom_more, $more_link );
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and health_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since healthy_clean 1.0
 * @return string An ellipsis
  */



/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since healthy_clean 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */



/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in healthy_clean's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since healthy_clean 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since healthy_clean 1.0
 * @deprecated Deprecated in healthy_clean 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
 
function health_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'health_remove_gallery_css' );

if ( ! function_exists( 'health_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own health_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since healthy_clean 1.0
 */
function health_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'health' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'health' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'health' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'health' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'health' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'health' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}

endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override health_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since healthy_clean 1.0
 * @uses register_sidebar
 */

function health_widgets_init() {
	
	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Categories Widget Area', 'health' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The Categories widget area', 'health' ),
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		
	) );
	
	register_sidebar( array(
		'name' => __( 'Blogroll Widget Area', 'health' ),
		'id' => 'blogroll-widget-area',
		'description' => __( 'The Blogroll widget area', 'health' ),
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Health Widget Area', 'health' ),
		'id' => 'health-widget-area',
		'description' => __( 'The Health widget area', 'health' ),
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
	) );
		
	register_sidebar( array(
		'name' => __( 'Footer Social Media Widget Area', 'health' ),
		'id' => 'footer-widget-social',
		'description' => __( 'The first Social media links widget area', 'health' ),
		'before_title' => '',
		'after_title' => '',
		'before_widget' => '',
		'after_widget' => '',
		
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Twitter Feed Widget Area', 'health' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The Twitter Feed widget area', 'health' ),
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '<div class="right"><a href="#"><i>Share</i></a></div></h3>',
		'before_widget' => '',
		'after_widget' => '',
		
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Facebook Feed Widget Area', 'health' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The facebook Feed widget area', 'health' ),
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'before_widget' => '',
		'after_widget' => '',
		
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Youtube Feed Footer Widget Area', 'health' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The youtube feed footer widget area', 'health' ),
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '<div class="right"><a href="#"><i>Share</i></a></div></h3>',
		'before_widget' => '',
		'after_widget' => '',
		
	) );

	
}
/** Register sidebars by running health_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'health_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using healthy_clean 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default healthy_clean styling.
 *
 * @since healthy_clean 1.0
 */

if ( ! function_exists( 'health_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since healthy_clean 1.0
 */
 
function health_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'health' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'health' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'health_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since healthy_clean 1.0
 */
function health_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'health' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'health' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'health' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
 function excerpt_ellipse($text) {
   return str_replace('[...]', ' <a href="'.get_permalink().'">Read more...</a>', $text); }
   add_filter('the_excerpt', 'excerpt_ellipse');

function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    //$content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['pp']) > 0) { //'p'
   
      echo "<p>";
      echo content;
      echo "&nbsp;<a href='";
      echo "'>"."Read More &rarr;</a>";
      echo "</p>";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "<p>";
        echo $content;
        echo "...";
        echo "&nbsp;<a href='";
        the_permalink();
        echo "'><b>Read More</b></a>";
        echo "</p>";
   }
   else {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>"."<b>Read More</b></a>";
      echo "</p>";
   }
}



// Pagination

function pagination($pages = '', $range = 4)
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
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
} 

function content($num) {
$theContent = get_the_content();
$output = preg_replace('/<img[^>]+./','', $theContent);
//$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
//$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $theContent );
$limit = $num+1;
$content = explode(' ', $output, $limit);
array_pop($content);
$content = implode(" ",$content)."...";
echo "".$content."";
}
function my_footer() {
	//echo '<p>Get smart with the <a href="http://sansoftware.co.uk/clients/clean_healthy">Healthy WordPress Theme</a> from Healthy. ';
	//wp_loginout();
	//echo '</p>';
}

remove_action('thesis_hook_footer', 'thesis_attribution');
add_action('thesis_hook_footer', 'my_footer');


/*new addition*/
function hybrid_news_get_utility_header() {
	get_sidebar( 'header' );
}

function hybrid_news_save_meta_box( $settings ) {

	load_child_theme_textdomain( 'hybrid-news', get_stylesheet_directory() );
	
	$settings['feature_category'] = empty( $settings['feature_category'] ) ? '' : absint( $settings['feature_category'] );
	return $settings;
}

function hybrid_news_front_page_template() {

	/* If we're not looking at the front page template, return. */
	if ( !is_page_template( 'header.php' ) )
		return;

	/* Remove the breadcrumb trail. */
	add_filter( 'breadcrumb_trail', '__return_false' );
}

function hybrid_news_create_meta_box() {
	add_meta_box( 'hybrid-news -front-page-box', __( 'Front Page template settings', 'hybrid-news' ), 'hybrid_news_front_page_meta_box', 'appearance_page_theme-settings', 'normal', 'low' );
}

function wp_themes_option_menu(){
	    //add_submenu_page( 'tools.php', 'My Custom Submenu Page', 'My Custom Submenu Page', 'manage_options', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' ); 
		add_submenu_page('themes.php','Chiactivate options','Chiactivate options','administrator','themes_option','wp_themes_option_homepage');
	}
	
	function wp_themes_option_homepage(){
	global $wpdb;
		
		if($_POST['submit']=='Save' ){
		
				update_option('wp_twitter_url',$_POST['wp_twitter_url']);
				update_option('wp_facebook_url',$_POST['wp_facebook_url']);
				update_option('wp_linkedin_url',$_POST['wp_linkedin_url']);
				update_option('wp_youtube_url',$_POST['wp_youtube_url']);
				
								
				update_option('wp_phone',$_POST['wp_phone']);
				update_option('wp_theme_text',$_POST['wp_theme_text']);
				update_option('wp_theme_color',$_POST['wp_theme_color']);
				update_option('feature_category',$_POST['feature_category']);
				update_option('feature_num_posts',$_POST['feature_num_posts']);			
				update_option('wp_banner_act',$_POST['wp_banner_act']);
				
				
				wp_banner_act

?>
			<div class="updated">Home page content updated successfuly.</div>
<?php
		}
?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
        
		<h2>Health clean Page Setup</h2>
        <br />
		<form action="" name="frm" id="frm" method="POST" enctype="multipart/form-data">
		<strong>Tiwtter </strong><br/>
		<input type="text" name="wp_twitter_url" id="wp_twitter_url" size="80" value="<?php echo get_option('wp_twitter_url',true); ?>"/><br/>
		<strong>Facebook </strong><br/>
		<input type="text" name="wp_facebook_url" id="wp_facebook_url" size="80" value="<?php echo get_option('wp_facebook_url',true); ?>"/><br/>
		<strong>Linkedin Link </strong><br/>
		<input type="text" name="wp_linkedin_url" id="wp_linkedin_url" size="80" value="<?php echo get_option('wp_linkedin_url',true); ?>"/><br/>
		<strong>YouTube </strong><br/>
		<input type="text" name="wp_youtube_url" id="wp_youtube_url" size="80" value="<?php echo get_option('wp_youtube_url',true); ?>"/><br/>
<div style="border-top:2px solid #0284df ; height:2px; width:100%;  margin:5px 0;"></div>

<?php $categories = get_categories();?>
<h2>Home Phone</h2></br>
		<strong>Phone number:  </strong><br/>
		<input type="text" name="wp_phone" id="wp_phone" size="80" value="<?php echo get_option('wp_phone',true); ?>"/><br/>
	
<h2>Gallery option</h2><br/>
	
		<strong>Enable:</strong>
        <input type="radio" name="wp_banner_act" id="wp_banner_act"  value="1" <?php if( get_option('wp_banner_act',true)==1) echo "Checked"; ?> /></br>Enable gallery for homepage<br/>
		<strong>Disable:</strong>
        <input type="radio" name="wp_banner_act" id="wp_banner_act"  value="0" <?php if( get_option('wp_banner_act',true)==0) echo "Checked"; ?>/></br>Disable gallery for homepage<br/><br/>

<h2>Theme Colors</h2><br />
	<div style=" color:<?php echo get_option('wp_theme_color',true); ?>; font-size:18px; font-weight:bold;">Hello World</div><br />
	
	<input type="radio" name="wp_theme_color" id="wp_theme_color" value="blue" onclick="ChangeFontColor('blue')" <?php if( get_option('wp_theme_color',true)=="blue") echo "Checked"; ?> >Default
	<input type="radio" name="wp_theme_color" id="wp_theme_color" value="red" onclick="ChangeFontColor('red')" <?php if( get_option('wp_theme_color',true)=="red") echo "Checked"; ?>>Red
	<input type="radio" name="wp_theme_color" id="wp_theme_color" value="green" onclick="ChangeFontColor('green')" <?php if( get_option('wp_theme_color',true)=="green") echo "Checked"; ?>>Green
	<input type="radio" name="wp_theme_color" id="wp_theme_color" value="brown" onclick="ChangeFontColor('brown')" <?php if( get_option('wp_theme_color',true)=="brown") echo "Checked"; ?>>Brown
	<input type="radio" name="wp_theme_color" id="wp_theme_color" value="yellow" onclick="ChangeFontColor('yellow')" <?php if( get_option('wp_theme_color',true)=="yellow") echo "Checked"; ?>>Yellow

<br />

<h2>Slider Option</h2>
<?php $categories = get_categories(); ?>
<table>
		<tr>
			<th><label for="<?php echo get_option( 'feature_category' ); ?>"><?php _e( 'Feature Category:', 'hybrid-news' ); ?></label></th>
			<td>
			<select id="feature_category" name="feature_category">
			
					<option value="" <?php selected( get_option( 'feature_category' ), '' ); ?>></option>
				<?php foreach ( $categories as $cat ) { ?>
					<option value="<?php echo esc_html( $cat->name ); ?>" <?php selected( get_option( 'feature_category' ), $cat->name ); ?>><?php echo esc_html( $cat->name ); ?></option>
				<?php } ?>
				</select> 
				<?php _e( 'Leave blank to use sticky posts.', 'hybrid-news' ); ?>
			</td>
		</tr>
		<tr>
			<th><label for="<?php echo get_option( 'feature_num_posts' ); ?>"><?php _e( 'Featured Posts:', 'hybrid-news' ); ?></label></th>
			<td>
				<input type="text" id="feature_num_posts" name="feature_num_posts" value="<?php echo esc_attr( get_option( 'feature_num_posts' ) ); ?>" size="2" maxlength="2" />
				<label for="<?php echo get_option( 'feature_num_posts' ); ?>"><?php _e( 'How many feature posts should be shown?', 'hybrid-news' ); ?></label>
			</td>
		</tr>
</table>
<br />
<input type="submit" value="Save" name="submit" />
	


		</form>
	</div>
<?php
	}
add_action('admin_menu','wp_themes_option_menu'); 

add_action( 'template_redirect', 'hybrid_news_front_page_template' );

?>