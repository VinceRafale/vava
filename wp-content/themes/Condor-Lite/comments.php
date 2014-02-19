<?php
if ( post_password_required() ) { ?>
	<p>This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}

if( have_comments() ) : ?> 
					
	<br/>
	<h4><span class="comments"><?php comments_number('No comment', 'One Comment', '% Comments'); ?> for "<?php the_title(); ?>"</span></h4><br/>
	
	<div id="comments">
		<?php wp_list_comments( array('callback' => 'wpcrown_comment', 'avatar_size' => '74') ); ?>
	</div>	
					
	<!-- End of thread -->
<?php endif; ?>  


<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="pagination"><p><?php previous_comments_link(); ?> <?php next_comments_link(); ?></p></div><br class="clear"/><div class="line"></div><br/><br/>
<?php endif; // check for comment navigation ?>


<?php if ('open' == $post->comment_status) : ?> 

	<div class="comment_here">
		<?php include(TEMPLATEPATH . '/template-comments-form.php'); ?>
	</div>
			
<?php endif; ?> 