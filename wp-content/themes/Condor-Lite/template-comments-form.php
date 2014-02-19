<?php if ('open' == $post->comment_status) : ?>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<h6>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</h6><br/>
	<?php else : ?>

			<h5>Wanna say something?</h5>
			
				<div class="comment_input">
					<!-- Start of form --> 
					<form name="comm" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="contactform"> 

						<?php if ( is_user_logged_in() ) : ?>

					Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a><br/><br/>

			<?php else : ?>
			
					<input type="text" onfocus="if(this.value=='Name <?php if ($req) echo "(required)"; ?>')this.value='';" onblur="if(this.value=='')this.value='Name <?php if ($req) echo "(required)"; ?>';" name="author" class="input-textarea"  value="Name <?php if ($req) echo "(required)"; ?>" id="author" />
	              	
					<br />
	              	<br />
	                
	              	<input type="text" onfocus="if(this.value=='Email (Will not be published) <?php if ($req) echo "(required)"; ?>')this.value='';" onblur="if(this.value=='')this.value='Email (Will not be published) <?php if ($req) echo "(required)"; ?>';" name="email" class="input-textarea" value="Email (Will not be published) <?php if ($req) echo "(required)"; ?>" id="email" />
	              	
	                <br />
	              	<br />
					
					<input type="text" onfocus="if(this.value=='URL')this.value='';" onblur="if(this.value=='')this.value='URL';" name="url" class="input-textarea" value="URL" id="url" />
	              	
	                <br />
	              	<br />

			<?php endif; ?>
						
					<textarea name="comment" cols="8" rows="5" id="comment" tabindex="4"></textarea>		
						
					<div style="float: right; margin-top: 20px;" class="read-more"><a href="#" onclick="javascript:document.comm.submit();"><span><span>SUBMIT</span></span></a></div>
					<?php comment_id_fields(); ?> 
					<?php do_action('comment_form', $post->ID); ?>

					</form> 
				</div>
				<!-- End of form --> 
			

	<?php endif; // If registration required and not logged in ?>

<?php endif; // if comment is open ?>
