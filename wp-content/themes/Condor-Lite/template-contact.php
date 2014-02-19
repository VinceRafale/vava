<?php 
/*
Template Name: Contact
*/

$contact_email = "mail@mail.com";
$wpcrown_contact_email_error = "You entered an invalid email.";
$wpcrown_contact_name_error = "You forgot to enter your name.";
$wpcrown_contact_message_error = "You forgot to enter your message.";
$wpcrown_contact_thankyou = "Thank you! We will get back to you as soon as possible";

$wpcrown_contact_latitude = "47.02";
$wpcrown_contact_longitude = "28.83";
$wpcrown_contact_locTitle = "Chisinau";
$wpcrown_contact_zoomLevel = "10";

global $nameError;
global $emailError;
global $commentError;

//If the form is submitted
if(isset($_POST['submitted'])) {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = $wpcrown_contact_name_error;
			$hasError = true;
		} elseif(trim($_POST['contactName']) === 'Name') {
			$nameError = $wpcrown_contact_name_error;
			$hasError = true;
		}	else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = $wpcrown_contact_email_error;
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = $wpcrown_contact_email_error;
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = $wpcrown_contact_message_error;
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = $contact_email;
			$subject = 'Contact Form Submission from '.$name;	
			$body = "Nume: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From website <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			$emailSent = true;

	}
}

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_slider = get_post_meta($current_page_id, 'page_slider', true);
$page_tagline_text = get_post_meta($current_page_id, 'page_tagline_text', true);
$page_title = get_post_meta($current_page_id, 'page_title', true);

$page_tagline_button_text = get_post_meta($current_page_id, 'page_tagline_button_text', true);
$page_tagline_button_link = get_post_meta($current_page_id, 'page_tagline_button_link', true);

get_header(); 

?>

<script type='text/javascript'>
  jQuery(function() {
	// Location map //
	var locations = [
      ['<?php echo $wpcrown_contact_locTitle;?>', <?php echo $wpcrown_contact_latitude; ?>, <?php echo $wpcrown_contact_longitude; ?>, 4],
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: <?php echo $wpcrown_contact_zoomLevel;?>,
      center: new google.maps.LatLng(<?php echo $wpcrown_contact_latitude; ?>, <?php echo $wpcrown_contact_longitude; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    // end //
	
	});
</script>

			</div>
		
		</div>
		
	</div>
		
</div>
	
<div id="innerPage">
	
	<div id="innerTop">
			
		<div class="page-tagline">
			
			<div class="page-tagline-text">
				<h3><?php the_title(); ?></h3>
			</div>
			
		</div>		
		
	</div>

	<div class="innerContent">
	
		<div class="content">
		
			<!-- Content -->
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php the_content(); ?>
					
				<?php endwhile; endif; ?>
			
			<!-- End Content -->
	
	<div id="contact">
		
		<?php if(isset($emailSent) && $emailSent == true) { ?>
		
		<h4><?php echo $wpcrown_contact_thankyou ?></h4></div>

		<?php } else { ?>
		
		<?php if($nameError != '') { ?>
			<h4><?php echo $nameError;?></h4>  
		<?php } ?>
		
		<?php if($emailError != '') { ?>
		   <h4><?php echo $emailError;?></h4>
		<?php } ?>
		
		<?php if($commentError != '') { ?>
		   <h4><?php echo $commentError;?></h4>
		<?php } ?>
		
		
	
		<form name="contactForm" action="<?php the_permalink(); ?>" id="contact-form" method="post" class="contactform" >
	
		<div>
		
		<input type="text" onfocus="if(this.value=='Name')this.value='';" onblur="if(this.value=='')this.value='Name';" name="contactName" id="contactName" value="Name" class="input-textarea" />

		<br />
		<br />
	 
		<input type="text" onfocus="if(this.value=='Email')this.value='';" onblur="if(this.value=='')this.value='Email';" name="email" id="email" value="Email" class="input-textarea" />

		<br />
		<br />
	 
		<textarea name="comments" id="commentsText" cols="8" rows="5" ></textarea>
		
		<br />
		
		<input type="hidden" name="submitted" id="submitted" value="true" />
		<div style="float: right; margin-top: 20px;" class="read-more"><a href="#" onclick="javascript:document.contactForm.submit();"><span><span>SUBMIT</span></span></a></div>
		
		</div>
	
	</form>
	
	</div>

	<?php } ?>
	  
	<div id="map">
			
	</div>
	
	</div>

	</div>
	  
</div>
			
	
<?php get_footer(); ?>