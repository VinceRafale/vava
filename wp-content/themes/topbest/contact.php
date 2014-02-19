<?php /* Template Name: Contact Page */ ?>
<?php get_header(); ?>
        
        <!-- BEFORE CONTENT -->
		<div id="outerbeforecontent">
            <div class="container">
            	<div class="row">
                <div id="beforecontent" class="twelve columns" >
                    <div id="pagetitle-container">
                    	<h1 class="pagetitle"><?php the_title(); ?></h1>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- END BEFORE CONTENT -->

        
        <!-- MAIN CONTENT -->
        <div id="outermain">
        	<div class="container">
                <div class="row">
                	<section id="maincontent" class="twelve columns">
                    
                        <section class="content">
                                
                                <div class="row">
                                <div class="one_half columns">
                                	<h2>Fill the Form</h2>
                                    <div id="contactform">
                                    	  <?php
										// Contact subject
										$subject = "You Have a Message"; 
										
										// Details
										$message = $_POST['msg'];
										
										// Mail of sender
										$mail_from = $_POST['contact_email']; 
										
										// From 
										$header = 'from: '.$_POST['contact_name'].' '.$mail_from;
										
										if(isset($_POST['sendmail']) && !empty($_POST['sendmail'])) {
								
											if( $message != '' && $mail_from != '' && $_POST['contact_name'] != '' ){
								
												// Enter your email address
												$to = vp_option('contact_email');
												$send_contact=mail($to,$subject,$message,$header);
										
													echo '<div class="alert_box green">Success: Message was sent</div>';
										
											}else{
									
													echo '<div class="alert_box red">Error: Please Fill Out all the forms</div>';
									
												}
											}
											?>
                                            
                              <form action="" method="post">
                              <fieldset>
                              <input type="text" name="contact_name" size="50" placeholder="Your name" class="text-input">
                              <input type="text" name="contact_email" size="50" placeholder="Your email address" class="text-input">
                              <textarea cols="60" rows="5" name="msg" class="text-input" placeholder="Message"></textarea>
                              <br>
                              <input type="submit" class="button mini" id="submit_btn" value="Send Message" name="sendmail">
                              <br class="clear" />
                              </fieldset>
                              </form>
                                    </div><!-- end contactform -->
                                </div>
                                <div class="one_half columns">
                                    <?php
									// Start Loop
									while (have_posts()) : the_post();
									
										the_content();
										
									endwhile;
									// End Loop
									?>   
                                </div>

                                </div>                             
                                
                            
                        </section>
                    
                	</section>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        
<?php get_footer(); ?>