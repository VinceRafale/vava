<?php

if ( ! function_exists( 'chimera_comment' ) ) :

function chimera_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<a class="date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s', 'chimera' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'chimera' ), ' ' ); ?>
			<div class="clear"></div>
			<div class="gravatar">
				<?php echo get_avatar( $comment, 62 ); ?>
			</div>
			<div class="content">
				<span class="name">
					<b>
						<?php printf( __( '%s <span class="says">says:</span>', 'chimera' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</b>
				</span>
				<div class="text">
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', 'chimera' ); ?></em>
						<br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</div>
			<div class="clear"></div>
		</div>
	</li>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'chimera' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'chimera'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
