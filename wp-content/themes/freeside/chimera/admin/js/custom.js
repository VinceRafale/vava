jQuery(document).ready(function() { 

	/* Close/Open Option boxes */

	jQuery(".portlet-header h3.head").hover(function() {
		jQuery(this).addClass("ui-portlet-hover");
	},
	function(){
		jQuery(this).removeClass("ui-portlet-hover");
	});

	jQuery(".portlet-header h3.head").toggle(function() {
		jQuery(".ui-icon", this).removeClass("ui-icon-circle-arrow-n");
		jQuery(".ui-icon", this).addClass("ui-icon-circle-arrow-s");
		jQuery(this).parents(".portlet").css({height: '33px'});
	},
	
	function() {
		jQuery(".ui-icon",this).removeClass("ui-icon-circle-arrow-s");
		jQuery(".ui-icon",this).addClass("ui-icon-circle-arrow-n");
		jQuery(this).parents(".portlet").css({height: '100%'});
	});

	/* Admin UI Tabs */

	jQuery("#chimera_container").tabs();

	jQuery(".tab-content").tabs();

	jQuery("#chimera_container .ui-tabs-panel .ui-tabs .ui-tabs-panel").addClass('ui-state-default');

	/* Bind Reset Button */

	jQuery("a.reset-options").click(function () {
		jQuery(".reset-button").trigger('click');
	});

	/* Bind Reset Button */

	jQuery(".save_but_trigger").click(function () {
		jQuery("#chimeraform").submit();
	});
	
	/* Tooltip */

	jQuery('.tooltip').tooltip({
		track: true,
		delay: 0,
		showURL: false,
		showBody: " - ",
		fade: 250
	});
	
	/* Slides minimize */

	jQuery("a.minimize").toggle(function () {
		jQuery(this).html('<span class="ui-icon ui-icon-carat-2-n-s"></span>Maximize slides');
		jQuery(".sort_item").addClass('sort_closed')
		jQuery(this).removeClass('minimize').addClass('maximize');
		jQuery ('.ctrl').hide();
	},
	function (){
		jQuery(this).html('<span class="ui-icon ui-icon-carat-2-n-s"></span>Minimize slides');
		jQuery(".sort_item").removeClass('sort_closed')
		jQuery(this).addClass('minimize').removeClass('maximize');
		jQuery ('.ctrl').show();
	})


});