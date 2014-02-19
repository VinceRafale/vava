<?php
	if ( ! isset( $content_width ) ) $content_width = 650;
	load_theme_textdomain( 'stripesandblue', get_template_directory() );

	add_theme_support( 'automatic-feed-links' );
	
    register_nav_menus( array(
		'primary' => __( 'Navigation', 'stripesandblue' )
	) );
	function stripesandblue_excerpt_length( $length ) {
		return 40;
	}
	add_filter( 'excerpt_length', 'stripesandblue_excerpt_length' );
	register_sidebar( array(
		'name' => __( 'Sidebar', 'stripesandblue' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
if ( ! function_exists( 'stripesandblue_comment' ) ) :

function stripesandblue_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'stripesandblue' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'stripesandblue' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-content"><?php comment_text(); ?></div>
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;
						echo get_avatar( $comment, $avatar_size );
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'stripesandblue' ),
							sprintf( ' <span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								sprintf( __( '%1$s at %2$s', 'stripesandblue' ), get_comment_date(), get_comment_time() )
						)
						);
					?>
					<?php edit_comment_link( __( 'Edit', 'stripesandblue' ), '<span class="edit-link">', '</span>' ); ?>

                <div class="clear"></div>
				</div>
			</footer>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'stripesandblue' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		<div class="clear"></div>
		</article>
	<?php
			break;
	endswitch;
}
endif;
?>