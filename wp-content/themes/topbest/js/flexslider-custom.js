jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
          animation: "fade",              //String: Select your animation type, "fade" or "slide"
		  directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
		  controlNav: false  //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        });
		
});