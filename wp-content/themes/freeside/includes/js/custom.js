// delay function
jQuery.fn.delay = function(time,func) {
	this.each(function() {
		setTimeout(func,time);
	})
	return this;
};

//image preloader

	jQuery(function () {
		jQuery('.img_cont img, a.img img_cont').hide();
	});

	var i = 0;
	var int=0;
	jQuery(window).bind("load", function() {
		var int = setInterval("doThis(i)",500);
	});

	function doThis() {
		var images = jQuery('.img_cont img, a.img img').length;
		if (i >= images) {
			clearInterval(int);
		}
		jQuery('.img_cont img:hidden, a.img img:hidden').eq(0).fadeIn(500);
		i++;//add 1 to the count
	}


jQuery(function () {

	var tabContainers = jQuery('div.tabs > div');
	
	jQuery('div.tabs ul.tabNav a').click(function () {
		tabContainers.slideUp();
		tabContainers.filter(this.hash).slideDown();
		jQuery('div.tabs ul.tabNav a').removeClass('selected');
		jQuery(this).addClass('selected');
		return false;
	}).filter('ul.tabNav a:first').click();

});

jQuery(document).ready(function(){

	jQuery("a.img").hover(function(){
		jQuery(this).animate({
		    opacity: 0.5,
		}).addClass('zoom');
	},
	function(){
		jQuery(this).animate({
		    opacity: 1,
		}).removeClass('zoom');
	});

	//Add class for page-navi

	jQuery(".n_prev").html('<span>Previous</span>');
	
	jQuery(".n_next").html('<span>Next</span>');

	//Hide (Collapse) the toggle containers on load
	jQuery(".toggle_content").hide(); 

	//Switch the "Open" and "Close" state per click
	jQuery(".toggle").toggle(function(){
		jQuery(this).addClass("toggle_active");
		jQuery('strong', this).slideUp();
		}, function () {
		jQuery(this).removeClass("toggle_active");
		jQuery('strong', this).slideDown();
	});

	//Slide up and down on click
	jQuery(".toggle").click(function(){
		jQuery(this).next(".toggle_content").slideToggle();
	});

	//Contact Form Widget
	jQuery('form#contactFormWidget').submit(function() {
		
		jQuery('form#contactFormWidget .error').remove();
		var hasError = false;
		jQuery('.requiredField').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				var labelText = jQuery(this).prev('label').text();
				//jQuery(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
				jQuery(this).addClass('inputError');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					var labelText = jQuery(this).prev('label').text();
					//jQuery(this).parent().append('<span class="error">You entered an invalid '+labelText+'.</span>');
					jQuery(this).addClass('inputError');
					hasError = true;
				}
			}
		});
	
		if(!hasError) {
			jQuery('form#contactFormWidget .button').fadeOut('normal', function() {
				if ( jQuery(this).hasClass("in_footer") ) {
					jQuery('.loadingImgWidgetFt').css({display:"block"});
				}else{
					jQuery('.loadingImgWidgetSb').css({display:"block"});
				}
			});
			var formInput = jQuery(this).serialize();
			var test = jQuery('#submitUrlWidget').val();

			jQuery.post(jQuery('#submitUrlWidget').val(),formInput, function(data){
				jQuery(this).delay(1500,function() {
				jQuery('form#contactFormWidget').fadeOut('fast', function() {		   
					jQuery(this).before('<p class="thanks"><strong>Thanks!</strong> Your email was successfully sent.</p>');
					});
				});
			});
		}
	
		return false;
	
	});

	//Contact Form
	jQuery('form#contact_form').submit(function() {
		
		// assign dynamic div height to body_block
		
		jQuery('form#contact_form .error').remove();
		var hasError = false;
		jQuery('.requiredFieldContact').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				var labelText = jQuery(this).prev('label').text();
				//jQuery(this).parent().append('<span class="error">You forgot to enter your '+labelText+'.</span>');
				jQuery(this).addClass('inputError');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					var labelText = jQuery(this).prev('label').text();
					//jQuery(this).parent().append('<span class="error">You entered an invalid '+labelText+'.</span>');
					jQuery(this).addClass('inputError');
					hasError = true;
				}
			}
		});
	
		if(!hasError) {
			jQuery('form#contact_form .button').fadeOut('normal', function() {
				jQuery('.loadingImg').css({display:"block"});
			});
		
			var formInput = jQuery(this).serialize();
			jQuery.post(jQuery('#submitUrl').val(),formInput, function(data){
				jQuery(this).delay(1500,function() {
				jQuery('form#contact_form').fadeOut('fast', function() {		   
					jQuery(this).before('<p class="thanks"><strong>Thanks!</strong> Your email was successfully sent.</p>');
					});
				});
			});
		}
	
		return false;
	
	});
	
	//Show featured area arrows on hover

	jQuery("#featured").hover(function() {
		jQuery(".sliderbutton").fadeIn();
	},
		function() {
		jQuery(".sliderbutton").fadeOut();
	});

	/* Tooltip */

	jQuery(function() {
		jQuery('.tooltip').tooltip({
			track: true,
			delay: 0,
			showURL: false,
			showBody: " - ",
			fade: 250
			});
		});

});