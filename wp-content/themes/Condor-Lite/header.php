<?php $wpcrown_theme_version = '1.0'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
	
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style-default.css"  type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/nivo.css"  type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />

<?php if (get_option('wpcrown_favicon')) : ?>
<link rel="shortcut icon" href="<?php echo get_option('wpcrown_favicon'); ?>" type="image/x-icon" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Javascripts -->
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/jquery-1.5.2.min.js'></script>

<!-- fancy box -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

<!-- Nivo Slider -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.pack.js"></script>

<!-- Tabs -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.tools.min.js"></script>

<!-- jQuery UI -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-ui-1.8.5.min.js"></script>

<!-- Scripts -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>

<!-- Validator -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.validate.js"></script>

<!-- Google map -->
<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:light' rel='stylesheet' type='text/css' />

<?php wp_head(); ?>


<?php
	/*
    	Setup Google Analytic Code
    	*/
    	include (TEMPLATEPATH . "/google-analytic.php");
?>

</head>

<body>

<script type='text/javascript'>
  $(function() {
  
	$.featureList(
		$("#tabs li a"),
		$("#output li"), {
			start_item	:	0
		}
	);
  
	// Nivo slider
	$(window).load(function() {
        $('#slider').nivoSlider();
    });
	
	function mainmenu(){
		$(" #menu ul ul ").css({display: "none"}); // Opera Fix
		$(" #menu ul li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(200);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
	});
	}

 	$(document).ready(function(){
		mainmenu();
	});
	
	/* This is basic - uses default settings */
	$("a.project-list-thumb").fancybox();
	
	$("a.image").fancybox();
	
	$(".gallery a").fancybox();
		
	/* Using custom settings */
		
	$("a#inline").fancybox({
			'hideOnContentClick': true
	});
	
	/* Apply fancybox to multiple items */
	$(".youtube_video").click(function() {
	$.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'width'		    : 680,
			'height'		: 495,
			'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'			: 'swf',
			'swf'			: {
			   	 'wmode'		: 'transparent',
				'allowfullscreen'	: 'true'
			}
		});

	return false;
	
	});
	
	$(".vimeo_video").click(function(){
	$.fancybox({
			'padding':0,
			'autoScale':false,
			'transitionIn':'none',
			'transitionOut':'none',
			'title':this.title,
			'width':600,
			'height':398,
			'href':this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),'type':'swf'
			});
	return false;
	
	});
	
	// Image Rotator //
	//Show the paging and activate its first link
	$(".paging").show();
	$(".paging a:first").addClass("active");

	//Get size of the image, how many images there are, then determin the size of the image reel.
	var imageWidth = $(".window").width();
	var imageSum = $(".image_reel img").size();
	var imageReelWidth = imageWidth * imageSum;

	//Adjust the image reel to its new size
	$(".image_reel").css({'width' : imageReelWidth});
	
	//Paging  and Slider Function
	rotate = function(){
	    var triggerID = $active.attr("rel") - 1; //Get number of times to slide
	    var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

	    $(".paging a").removeClass('active'); //Remove all active class
	    $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

	    //Slider Animation
	    $(".image_reel").animate({
	        left: -image_reelPosition
	    }, 960 );

	}; 

	//Rotation  and Timing Event
	rotateSwitch = function(){
	    play = setInterval(function(){ //Set timer - this will repeat itself every 7 seconds
	        $active = $('.paging a.active').next(); //Move to the next paging
	        if ( $active.length === 0) { //If paging reaches the end...
	            $active = $('.paging a:first'); //go back to first
	        }
	        rotate(); //Trigger the paging and slider function
	    }, 7000); //Timer speed in milliseconds (7 seconds)
	};

	rotateSwitch(); //Run function on launch
	
	//On Hover
	$(".image_reel a").hover(function() {
	    clearInterval(play); //Stop the rotation
	}, function() {
	    rotateSwitch(); //Resume rotation timer
	});	

	// On Click
	$(".paging a").click(function() {
	    $active = $(this); //Activate the clicked paging
	    //Reset Timer
	    clearInterval(play); //Stop the rotation
	    rotate(); //Trigger rotation immediately
	    rotateSwitch(); // Resume rotation timer
	    return false; //Prevent browser jump to link anchor
	});
	// End  //
	
	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab

		return false;
	});
	
	//Toggle
	$(".togglebox").hide();
	//slide up and down when click over heading 2
	
	$("h4").click(function(){
	// slide toggle effect set to slow you can set it to fast too.
	$(this).toggleClass("active").next(".togglebox").slideToggle("slow");
	
	return true;
	
	});
	
	/* Slideshow */
	function changeSlide( newSlide ) {
        // cancel any timeout
        clearTimeout( slideTimeout );
        
        // change the currSlide value
        currSlide = newSlide;
        
        // make sure the currSlide value is not too low or high
        if ( currSlide > maxSlide ) currSlide = 0;
        else if ( currSlide < 0 ) currSlide = maxSlide;
        
        // animate the slide reel
        $slideReel.animate({
            left : currSlide * -960
        }, 400, 'swing', function() {
            // hide / show the arrows depending on which frame it's on
            if ( currSlide == 0 ) $slideLeftNav.hide();
            else $slideLeftNav.show();
            
            if ( currSlide == maxSlide ) $slideRightNav.hide();
            else $slideRightNav.show();
            
            // set new timeout if active
            if ( activeSlideshow ) slideTimeout = setTimeout(nextSlide, 1200);
        });
        
        // animate the navigation indicator
        $activeNavItem.animate({
            left : currSlide * 140
        }, 400, 'swing');
    }
    
    function nextSlide() {
        changeSlide( currSlide + 1 );
    }
    
    // define some variables / DOM references
    var activeSlideshow = true,
    currSlide = 0,
    slideTimeout,
    $slideshow = $('#slideshow'),
    $slideReel = $slideshow.find('#slideshow-reel'),
    maxSlide = $slideReel.children().length - 1,
    $slideLeftNav = $slideshow.find('#slideshow-left'),
    $slideRightNav = $slideshow.find('#slideshow-right'),
    $activeNavItem = $slideshow.find('#active-nav-item');
    
    // set navigation click events
    
    // left arrow
    $slideLeftNav.click(function(ev) {
        ev.preventDefault();
        
        activeSlideshow = false;
        
        changeSlide( currSlide - 1 );
    });
    
    // right arrow
    $slideRightNav.click(function(ev) {
        ev.preventDefault();
        
        activeSlideshow = false;
        
        changeSlide( currSlide + 1 );
    });
    
    // main navigation
    $slideshow.find('#slideshow-nav a.nav-item').click(function(ev) {
        ev.preventDefault();
        
        activeSlideshow = false;
        
        changeSlide( $(this).index() );
    });
	
	// function search
	var inactive = "inactive";
    var active = "active";
    var focused = "focused";

    jQuery("label.auto_clear").each(function(){      
        obj = document.getElementById(jQuery(this).attr("for"));
        if((jQuery(obj).attr("type") == "text") || (obj.tagName.toLowerCase() == "textarea")){           
            jQuery(obj).addClass(inactive);          
            var text = jQuery(this).text();
            jQuery(this).css("display","none");          
            jQuery(obj).val(text);
            jQuery(obj).focus(function(){    
                jQuery(this).addClass(focused);
                jQuery(this).removeClass(inactive);
                jQuery(this).removeClass(active);                                  
                if(jQuery(this).val() == text) jQuery(this).val("");
            }); 
            jQuery(obj).blur(function(){ 
                jQuery(this).removeClass(focused);                                                    
                if(jQuery(this).val() == "") {
                    jQuery(this).val(text);
                    jQuery(this).addClass(inactive);
                } else {
                    jQuery(this).addClass(active);       
                };              
            });             
        };  
    }); 
	
	// fade in #back-top
	jQuery(function () {

		// scroll body to 0px on click
		jQuery('.backtop a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	
	var currentPosition = 0;
	var slideWidth = 960;
	var slides = $('.slideContent');
	var numberOfSlides = slides.length;

	// Remove scrollbar in JS
	$('#slidesContainer').css('overflow', 'hidden');

	// Wrap all .slides with #slideInner div
	slides
		.wrapAll('<div id="slideInner"></div>')
	    // Float left to display horizontally, readjust .slides width
		.css({
	      'float' : 'left',
	      'width' : slideWidth
	});

	// Set #slideInner width equal to total width of all slides
	$('#slideInner').css('width', slideWidth * numberOfSlides);

	// Insert controls in the DOM
	$('#contentSlider')
	.prepend('<span class="control" id="leftControl">Clicking moves left</span>')
	.append('<span class="control" id="rightControl">Clicking moves right</span>');

	// Hide left arrow control on first load
	manageControls(currentPosition);

	// Create event listeners for .controls clicks
	$('.control')
	    .bind('click', function(){
	    // Determine new position
		currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
	    
		// Hide / show controls
	    manageControls(currentPosition);
	    // Move slideInner using margin-left
	    $('#slideInner').animate({
	      'marginLeft' : slideWidth*(-currentPosition)
	    });
	});

	// manageControls: Hides and Shows controls depending on currentPosition
	function manageControls(position){
	    // Hide left arrow if position is first slide
		if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
		// Hide right arrow if position is last slide
	    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
	}	
	
  });
</script>

<div id="backtop"></div>

<div id="top">

	<div id="top-inner">
		
		<div class="topBar"></div>
		
		<div id="topContentSection">
		
			<div id="topContent">
				
				<div id="logo">
				<a href="<?php echo get_option('home'); ?>">
					<?php if (get_option('wpcrown_logo')) { ?>
						<img src="<?php bloginfo('template_directory'); ?>/cache/<?php echo get_option('wpcrown_logo'); ?>" alt="Logo" />
					<?php } else { ?>
						<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="Logo" />
					<?php } ?>
				</a>
				</div>
				
				<div id="menu">
					<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'menu_id' => 'nav', 'link_before' => '<span><span>', 'link_after' => '</span></span>' )); ?>
				</div>
		