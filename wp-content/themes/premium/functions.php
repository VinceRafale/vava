<?php
ob_start();

require_once('vafpress/bootstrap.php');

/*-----------------------------------------------------------------------------------*/
/*	Load FONTS
/*-----------------------------------------------------------------------------------*/
function load_fonts() {
         wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic');
         wp_enqueue_style( 'googleFonts');
        }
add_action('wp_print_styles', 'load_fonts');


/*-----------------------------------------------------------------------------------*/
/*	Load CSS Files
/*-----------------------------------------------------------------------------------*/
function theme_styles(){  

// Load CSS
wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array());
wp_enqueue_style( 'responsive', get_template_directory_uri() . '/style/css/media-queries.css', array());
wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/style/js/fancybox/jquery.fancybox.css', array());
wp_enqueue_style( 'fancybox-buttons', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-buttons0ff5.css', array());
wp_enqueue_style( 'fancybox-thumbs', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-thumbs0ff5.css', array());
wp_enqueue_style( 'fontello', get_template_directory_uri() . '/style/type/fontello.css', array());
wp_enqueue_style( 'custom-colors', get_template_directory_uri() . '/style/css/'.vp_option('color_scheme').'.css', array());
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );


/*-----------------------------------------------------------------------------------*/
/*	Load Jquery Files
/*-----------------------------------------------------------------------------------*/
function theme_scripts() {
	
	// Load Responsive Navigation
	wp_enqueue_script( 'jquery-file', get_template_directory_uri() . '/style/js/jquery.min.js', array(), true, true);
	wp_enqueue_script( 'ddsmoth', get_template_directory_uri() . '/style/js/ddsmoothmenu.js', array(), true, true);
	wp_enqueue_script( 'isotop', get_template_directory_uri() . '/style/js/jquery.isotope.min.js', array(), true, true);
	wp_enqueue_script( 'twitter', get_template_directory_uri() . '/style/js/twitter.min.js', array(), true, true);
	wp_enqueue_script( 'selectnav', get_template_directory_uri() . '/style/js/selectnav.js', array(), true, true);
	wp_enqueue_script( 'slickform', get_template_directory_uri() . '/style/js/jquery.slickforms.js', array(), true, true);
	wp_enqueue_script( 'easytab', get_template_directory_uri() . '/style/js/jquery.easytabs.min.js', array(), true, true);
	wp_enqueue_script( 'themepunch-plugin', get_template_directory_uri() . '/style/js/jquery.themepunch.plugins.min.js', array(), true, true);
	wp_enqueue_script( 'themepunch-revolution', get_template_directory_uri() . '/style/js/jquery.themepunch.revolution.min.js', array(), true, true);
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/style/js/jquery.fitvids.js', array(), true, true);
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/style/js/jquery.fancybox.pack.js', array(), true, true);
	wp_enqueue_script( 'fancy-button', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-buttons0ff5.js', array(), true, true);
	wp_enqueue_script( 'fancy-thumbs', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-thumbs0ff5.js', array(), true, true);
	wp_enqueue_script( 'fancy-media', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-mediae209.js', array(), true, true);
	wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/style/js/scripts.js', array(), true, true);
	
	// Load Comment Script
	if( is_single() ){ 
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );



/*-----------------------------------------------------------------------------------*/
/*	Register Navigation Menu
/*-----------------------------------------------------------------------------------*/
/* Main Nav Menu */
register_nav_menu( 'header_menu','Navigation Menu for Header' );


/*-----------------------------------------------------------------------------------*/
/*	Function to Limit words and Filter Tags or elements
/*-----------------------------------------------------------------------------------*/
	function content($num) {
		$theContent = get_the_content();
			$output = preg_replace('/<a[^>]+./','', $theContent);
			$output = preg_replace( '/<a>.*<\/a>/', '', $output );
			$output = preg_replace('/<img[^>]+./','', $theContent);
			$output = preg_replace( '/<div>.*<\/div>/', '', $output );
			$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
			$output = preg_replace( '/<h1>.*<\/h1>/', '', $output );
			$output = preg_replace( '/<h2>.*<\/h2>/', '', $output );
			$output = preg_replace( '/<h3>.*<\/h3>/', '', $output );
			$output = preg_replace( '/<h4>.*<\/h4>/', '', $output );
			$output = preg_replace( '/<h5>.*<\/h5>/', '', $output );
			$output = preg_replace( '/<h6>.*<\/h6>/', '', $output );
			$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
			$limit = $num+1;
			
		$content = explode(' ', $output, $limit);
		array_pop($content);
		
		$content = implode(" ",$content)."";
		echo $content;
	}
	



/*-----------------------------------------------------------------------------------*/
/*	Add Sidebars
/*-----------------------------------------------------------------------------------*/
/* Blog Single */
if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Blog Sidebar',
		'before_widget' => '<div class="sidebox widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
	
/* Footer Widget */
if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Footer Widget',
		'before_widget' => '<div class="one-fourth widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	
	

/*-----------------------------------------------------------------------------------*/
/*	Featured Images and Image Sizes
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 960;
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

add_image_size( 'portfolio-full', 1120,550, true );
add_image_size( 'portfolio-fourcol', 268,180, true );
add_image_size( 'portfolio-threecol', 324,220, true );
add_image_size( 'blog-post', 700,359, true );
add_image_size( 'blog-related', 270,210, true );

add_image_size( 'slider', 1024,519, true );

/* Function to remove the height and with */
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Posts
/*-----------------------------------------------------------------------------------*/

/* Sliders Custom Post */
	register_post_type( 'slider', /* this can be seen at the URL as a parameter and a unique id for the custom post */
		array(
			'labels' => array(
				'name' => __( 'Slider','premium_textdomain' ), /* The Label of the custom post */
				'singular_name' => __( "Sliders", 'premium_textdomain' ) /* The Label of the custom post */
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'slider'), /* The slug of the custom post */
			'supports' => array( 'title', 'thumbnail' ), /* enable basic for text editing */
		)
	);

/* Portfolio Custom Posts */
	register_post_type( 'portfolio', /* this can be seen at the URL as a parameter and a unique id for the custom post */
		array(
			'labels' => array(
				'name' => __( 'Portfolio','premium_textdomain' ), /* The Label of the custom post */
				'singular_name' => __( "Portfolio's", 'premium_textdomain' ) /* The Label of the custom post */
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'portfolio'), /* The slug of the custom post */
			'supports' => array( 'title', 'editor', 'thumbnail' ), /* enable basic for text editing */
		)
	);
	
/* Services Custom Posts */
	register_post_type( 'services', /* this can be seen at the URL as a parameter and a unique id for the custom post */
		array(
			'labels' => array(
				'name' => __( 'Services','premium_textdomain' ), /* The Label of the custom post */
				'singular_name' => __( "Services", 'premium_textdomain' ) /* The Label of the custom post */
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'services'), /* The slug of the custom post */
			'supports' => array( 'title' ), /* enable basic for text editing */
		)
	);
	
function portfolio_taxonomie() {

	register_taxonomy(
		'portfolio',
		array( 'portfolio' ),
		array(
			'public' => true,
			'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Portfolio Category', 'premium_textdomain' ),
				'singular_name' => __( 'Porfolio Category', 'premium_textdomain' )
			),
		)
	);
}

add_action( 'init', 'portfolio_taxonomie', 0 );	



/*-----------------------------------------------------------------------------------*/
/*	Function for Pagination
/*  
/*  Credits goes to Kriesi ( http://www.kriesi.at )
/*-----------------------------------------------------------------------------------*/	
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
			echo '<ul>';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
					 
		if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
			
		for ($i=1; $i <= $pages; $i++)
			{
		if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
		echo ($paged == $i)? "<li><a href='#' class='current'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
			}
		}
			
		if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
		echo "</ul>\n";
			}
		}







/*-----------------------------------------------------------------------------------*/
/*	Comments list Function
/*-----------------------------------------------------------------------------------*/

/* Fetch Comments */
function theme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        
		<!-- Start Comment List -->
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        
        <div class="user"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 55 ); ?></div>
        
        <div class="message">
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], reply_text => 'Reply'))) ?>
        <div class="info">
        <h2><?php printf(__('%s','premium_textdomain'), get_comment_author_link()) ?></h2>
        <div class="meta"><?php printf( __('%1$s at %2$s', 'premium_textdomain'), get_comment_date(),  get_comment_time()) ?></div>
        </div>
        
        <!-- Comment Text -->
        <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','premium_textdomain') ?></em>
        <br /><br />
        <?php endif; ?>
                
        <?php comment_text() ?>
        <?php edit_comment_link(__('(Edit)','premium_textdomain'),'  ','' ); ?>
        <!-- Comment Text -->
        </div>
                      
         </div>
        <!-- End Comment List -->   

<?php }
/*-----------------------------------------------------------------------------------*/
/*	Filters
/*-----------------------------------------------------------------------------------*/

// filter to replace class on reply link

//           class name             function name
add_filter('comment_reply_link', 'replace_reply_link_class');


function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='reply-link", $class);
    return $class;
}



/**
 * Add "first" and "last" CSS classes to dynamic sidebar widgets. Also adds numeric index class for each widget (widget-1, widget-2, etc.)
 */
function widget_first_last_classes($params) {

	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets	

	if(!$my_widget_num) {// If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else { // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class="widget-' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options

	if($my_widget_num[$this_id] == 1) { // If this is the first widget
		$class .= 'first ';
	} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
		$class .= 'last ';
	}

	$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

	return $params;

}
add_filter('dynamic_sidebar_params','widget_first_last_classes');



ob_end_clean();
?>