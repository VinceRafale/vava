<?php
/* Comment Form */
$args = array(
	'id_form' => 'comment-form-container',
	'id_submit' => 'btn-submit',
	'title_reply' => __( '','textdomain_techblog' ),
	'title_reply_to' => __( 'Leave a Reply to %s','textdomain_techblog' ),
	'cancel_reply_link' => __( 'Cancel Reply','textdomain_techblog' ),
	'label_submit' => __( 'Send Comment','textdomain_techblog' ),
			   
	'comment_field' => '
		<div class="message-field">
		<textarea cols="60" rows="5" name="comment" id="msg" class="text-input" placeholder="Message"></textarea><br>
		</div>
		',
		   
	'must_log_in' => '
		<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
	'comment_notes_before' => '<p class="comment-notes"></p>',
		
	'comment_notes_after' => '<p class="form-allowed-tags"></p>',
	
	'fields' => apply_filters( 'comment_form_default_fields', array(
		
	'author' => '
	<div class="name-field">
	<input type="text" name="author" id="name" size="50" class="text-input" placeholder="Enter Name" ' . $aria_req . ' />
	</div>
	',
			
	'email' => '
	<div class="email-field">
	<input type="text" name="email" id="email" size="50" class="text-input" placeholder="Enter Email" ' . $aria_req . ' />
	</div>
	',
		
	'url' => '
	<div class="website-field">
	<input id="url" class="text-input" name="url" type="text" placeholder="Enter Website URL" />
	</div>
	'

		)
			)
				);
?>




<div id="comments">
<?php if( have_comments() ){ ?>
<h3><?php comments_number() ?></h3>
          
<ol id="singlecomments" class="commentlist">
   <?php wp_list_comments('type=comment&callback=theme_comment'); ?>       
</ol>
<?php paginate_comments_links(); ?>
</div>
<hr />
<?php } ?>

<!-- Begin Form -->
<div class="comment-form-wrapper">
<h3>Let your voice be heard</h3>
<?php comment_form( $args ); ?>
</div>