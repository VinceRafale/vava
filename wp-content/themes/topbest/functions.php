<?php
ob_start();

/*-----------------------------------------------------------------------------------*/
/*	Load FONTS
/*-----------------------------------------------------------------------------------*/
function load_fonts() {
         wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,700italic,400italic');
         wp_enqueue_style( 'googleFonts');
        }
add_action('wp_print_styles', 'load_fonts');

/*-----------------------------------------------------------------------------------*/
/*	Load CSS Files
/*-----------------------------------------------------------------------------------*/
function theme_styles()  {  

		// Load CSS
		wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', array());
		wp_enqueue_style( 'inner', get_template_directory_uri() . '/css/inner.css', array());
		wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/layout.css', array());
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array());
		wp_enqueue_style( 'color', get_template_directory_uri() . '/css/color.css', array());
		wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/css/prettyPhoto.css', array());
		
    }
add_action( 'wp_enqueue_scripts', 'theme_styles' );



/*-----------------------------------------------------------------------------------*/
/*	Load Jquery Files
/*-----------------------------------------------------------------------------------*/
function theme_scripts() {
	
	// Load Responsive Navigation
	wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/jquery-1.7.1.min.js', array(), true, true);
	wp_enqueue_script( 'hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array(), true, true);
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array(), true, true);
	wp_enqueue_script( 'supersubs', get_template_directory_uri() . '/js/supersubs.js', array(), true, true);
	wp_enqueue_script( 'prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), true, true);
	wp_enqueue_script( 'fade', get_template_directory_uri() . '/js/fade.js', array(), true, true);
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery-easing-1.3.js', array(), true, true);
	wp_enqueue_script( 'tweetable', get_template_directory_uri() . '/js/jquery.tweetable.js', array(), true, true);
	wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array(), true, true);
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), true, true);
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), true, true);
	wp_enqueue_script( 'flexslider-custom', get_template_directory_uri() . '/js/flexslider-custom.js', array(), true, true);
	
	wp_enqueue_script( 'isotop', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), true, true);
	
	
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
/*	Add Sidebars
/*-----------------------------------------------------------------------------------*/
/* Blog Single */
if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Blog Single Sidebar',
		'before_widget' => '<li class="widget-container">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	
/* Blog double */
if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Blog Double Sidebar',
		'before_widget' => '<div class="widget-item">',
		'after_widget'  => '<div class="clear"></div></div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));
	
/* Single page */
if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Single Page Widget',
		'before_widget' => '<div class="widget-item">',
		'after_widget'  => '<div class="clear"></div></div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));
	
/* Footer */
if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Footer Widget',
		'before_widget' => '<div class="three columns"><ul><li class="widget-container">',
		'after_widget'  => '</li></ul></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

/* Footer */
if ( function_exists('register_sidebar') )
	register_sidebars(1,array(
		'name' => 'Portfolio Widget',
		'before_widget' => ' <li class="widget-container">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));


/*-----------------------------------------------------------------------------------*/
/*	Attach Widgets and options framework
/*-----------------------------------------------------------------------------------*/
get_template_part('widgets/recent-posts');
get_template_part('widgets/popular-posts');
get_template_part('vafpress/bootstrap');

/*-----------------------------------------------------------------------------------*/
/*	Featured Images and Image Sizes
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 960;
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

add_image_size( 'blog-standard', 680,196, true );
add_image_size( 'slider', 940,380, true );
add_image_size( 'widget-latest', 58,58, true );
add_image_size( 'portfolio-threecol', 370,208, true );
add_image_size( 'portfolio-fourcol', 370,395, true );


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
		
		$content = implode(" ",$content).".";
		echo $content;
	}


/*-----------------------------------------------------------------------------------*/
/*	Custom Posts
/*-----------------------------------------------------------------------------------*/

/* Sliders Custom Post */
	register_post_type( 'slider', /* this can be seen at the URL as a parameter and a unique id for the custom post */
		array(
			'labels' => array(
				'name' => __( 'Slider','Slider' ), /* The Label of the custom post */
				'singular_name' => __( "Sliders", 'textdomain_topbest' ) /* The Label of the custom post */
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'slider'), /* The slug of the custom post */
			'supports' => array( 'title', 'editor', 'thumbnail' ), /* enable basic for text editing */
		)
	);

/* Portfolio Custom Posts */
	register_post_type( 'portfolio', /* this can be seen at the URL as a parameter and a unique id for the custom post */
		array(
			'labels' => array(
				'name' => __( 'Portfolio','Porfolio' ), /* The Label of the custom post */
				'singular_name' => __( "Portfolio's", 'textdomain_topbest' ) /* The Label of the custom post */
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'portfolio'), /* The slug of the custom post */
			'supports' => array( 'title', 'thumbnail' ), /* enable basic for text editing */
		)
	);
	
/* Portfolio Custom Posts */
	register_post_type( 'services', /* this can be seen at the URL as a parameter and a unique id for the custom post */
		array(
			'labels' => array(
				'name' => __( 'Services','Services' ), /* The Label of the custom post */
				'singular_name' => __( "Services", 'textdomain_topbest' ) /* The Label of the custom post */
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'services'), /* The slug of the custom post */
			'supports' => array( 'title', 'editor' ), /* enable basic for text editing */
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
				'name' => __( 'Portfolio Category', 'textdomain_topbest' ),
				'singular_name' => __( 'Porfolio Category', 'textdomain_topbest' )
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
			echo '<div class="wp-pagenavi">';
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
					 
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
			
		for ($i=1; $i <= $pages; $i++)
			{
		if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
		echo ($paged == $i)? "<span class='current'><span>".$i."</span></span>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
			}
		}
			
		if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
		echo "</div>\n";
			}
		}



/*-----------------------------------------------------------------------------------*/
/*	Function for Views Count
/*-----------------------------------------------------------------------------------*/
function countviews( $postid ){
	
	$meta_key = 'popularity_count';
	$meta_value = get_post_meta( $postid, $meta_key, true );
	
	/* Update the value if on single page */
	if( is_single() ){
	update_post_meta( $postid, $meta_key, $meta_value+1 );
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
        <div class="comment-arrow"></div>
        
        <div class="avatar-img"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 55 ); ?></div>
                        

        <cite class="fn"><?php printf(__('%s','textdomain_techblog'), get_comment_author_link()) ?></cite>
                            
        
		<span class="tdate">
		<?php printf( __('%1$s at %2$s', 'textdomain_techblog'), get_comment_date(),  get_comment_time()) ?>
        </span>&nbsp;/&nbsp;
        <span class="reply"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], reply_text => 'Comment Reply'))) ?></span>

		<!-- Start Comment Text -->
        <div class="commenttext">
        <?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','textdomain_techblog') ?></em>
        <br /><br />
        <?php endif; ?>
        
        <?php comment_text() ?>
        <?php edit_comment_link(__('(Edit)','textdomain_techblog'),'  ','' ); ?> 
        </div>
        <!-- Start Comment Text -->
        
                      
         </div>
        <!-- End Comment List -->   

<?php }


ob_end_clean();
?>