<?php
/* Comment Form */
$args = array(
	'id_form' => 'comment-form-container',
	'id_submit' => 'submit_btn',
	'title_reply' => __( '','textdomain_techblog' ),
	'title_reply_to' => __( 'Leave a Reply to %s','textdomain_techblog' ),
	'cancel_reply_link' => __( 'Cancel Reply','textdomain_techblog' ),
	'label_submit' => __( 'Send Comment','textdomain_techblog' ),
			   
	'comment_field' => '<textarea cols="60" rows="5" name="comment" id="msg" class="text-input" placeholder="Message"></textarea><br><div class="clear"></div>',
		   
	'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
	'comment_notes_before' => '<p class="comment-notes"></p>',
		
	'comment_notes_after' => '<p class="form-allowed-tags"></p>',
	
	'fields' => apply_filters( 'comment_form_default_fields', array(
		
	'author' => '<input type="text" name="author" id="name" size="50" class="text-input" placeholder="Enter Name" ' . $aria_req . ' />',
			
	'email' => '<input type="text" name="email" id="email" size="50" class="text-input" placeholder="Enter Email" ' . $aria_req . ' />',
		
	'url' => '<input id="url" class="text-input" name="url" type="text" placeholder="Enter Website URL" />'

		)
			)
				);
?>

<ol class="commentlist">
<?php wp_list_comments('type=comment&callback=theme_comment'); ?>
</ol><br />

<!-- Comment Pagination -->
<?php paginate_comments_links(); ?>
<!-- Comment Pagination -->

<div id="contactform">
<?php comment_form( $args ); ?>
</div><!-- end contactform -->