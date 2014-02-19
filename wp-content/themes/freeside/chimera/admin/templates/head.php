<link rel="stylesheet" media="screen" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/chimera/admin/css/admin_ui.css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo get_bloginfo('template_directory'); ?>/chimera/admin/js/colorpicker/css/colorpicker.css" />
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/chimera/admin/js/tooltip.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/chimera/admin/js/custom.inputs.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/chimera/admin/js/custom.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/chimera/admin/js/ajaxupload.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/chimera/admin/js/colorpicker/js/colorpicker.js"></script>
<script type="text/javascript" language="javascript">
function chimera_get_total_options(elemId)
{
	var id = jQuery('div#' + elemId + '_sortable').children('div').last().attr('id');
	if (id == undefined)
		return 0;
	var elements = id.split('_');
	var num = elements[elements.length-1];
	num = parseInt(jQuery.trim(num));
	if (num == NaN)
		return 0;
	return num;
}
function chimera_add_option_to_group(elemId, templateId)
{
	num = chimera_get_total_options(elemId);
	num++;
	jQuery('#' + templateId + ' [id]').each(function(){
		oldId = jQuery(this).attr('id');
		if (oldId.indexOf(elemId) != -1)
		{
			oldIdElements = oldId.split('_');
			oldIdElements[oldIdElements.length-1] = num;
			jQuery(this).attr('id', oldIdElements.join('_'));
		}
	});
	jQuery('#' + templateId + ' [name]').each(function(){
		oldId = jQuery(this).attr('name');
		if (oldId.indexOf(elemId) != -1)
		{
			oldIdElements = oldId.split('_');
			oldIdElements[oldIdElements.length-1] = num;
			jQuery(this).attr('name', oldIdElements.join('_'));
		}
	});
	content = jQuery('#' + templateId).html();
	var id = 'option_' + num;
	template = '<div id="' + id +'" class="ui-state-default sort_item">' + "\n";
	template += '<div class="position">'+num+'</div>';
	template += '<div class="remove"><a title="Remove" href="javascript:void(0)" onclick="chimera_remove_option_from_group(this, \'' + elemId + '\')" class="btn ui-state-default ui-corner-all"><span class="ui-icon ui-icon-circle-plus"></span>Remove</a></div><div class="clear"></div>';
	template += '<div class="ctrl">'+content+'</div>';
	template += '<div class="clear"></div></div>' + "\n";
	jQuery('#' + elemId + '_sortable').append(template);
	jQuery('#' + templateId + ' [id]').each(function(){
		oldId = jQuery(this).attr('id');
		if (oldId.indexOf(elemId) != -1)
		{
			oldIdElements = oldId.split('_');
			oldIdElements[oldIdElements.length-1] = 't';
			jQuery(this).attr('id', oldIdElements.join('_'));
		}
	});
	jQuery('#' + templateId + ' [name]').each(function(){
		oldId = jQuery(this).attr('name');
		if (oldId.indexOf(elemId) != -1)
		{
			oldIdElements = oldId.split('_');
			oldIdElements[oldIdElements.length-1] = 't';
			jQuery(this).attr('name', oldIdElements.join('_'));
		}
	});
	chimera_add_ajax_upload();
	chimera_make_images_selectable();
}
function chimera_remove_option_from_group(elem, groupId)
{
	jQuery(elem).parent().parent().remove();
	chimera_rename_options_from_group(groupId);
}
function chimera_rename_options_from_group(elemId)
{
	counter = 0;
	jQuery('#' + elemId + '_sortable').children().each(function(){
		counter++;
		jQuery(this).children('div.position').text(counter);
		jQuery(this).attr('id', 'option_' + counter);
	});
	counter = 0;
	jQuery('#' + elemId + '_sortable').children().each(function(){
		counter++;
		jQuery(this).find('[id]').each(function() {
			oldId = jQuery(this).attr('id');
			if (oldId.indexOf(elemId) != -1)
			{
				oldIdElements = oldId.split('_');
				oldIdElements[oldIdElements.length-1] = counter;
				jQuery(this).attr('id', oldIdElements.join('_'));
			}
		});
	});
	counter = 0;
	jQuery('#' + elemId + '_sortable').children().each(function(){
		counter++;
		jQuery(this).find('[name]').each(function() {
			oldId = jQuery(this).attr('name');
			if (oldId.indexOf(elemId) != -1)
			{
				oldIdElements = oldId.split('_');
				oldIdElements[oldIdElements.length-1] = counter;
				jQuery(this).attr('name', oldIdElements.join('_'));
			}
		});
	});
}
function chimera_add_sidebar()
{
	totalSidebars = jQuery('#sidebars_container #total_sidebars').html();
	num = parseInt(jQuery.trim(totalSidebars));
	if (num == 0)
	{
		jQuery('#sidebars_container #empty_sidebar').hide();
	}
	num++;
	name = jQuery('#chimera_sidebar_generator_new').attr('value');
	template = '<li id="chimera_sidebars_generator_' + num + '">' + "\n";
	template += '<span class="ttl">' + num + '. <b>' + name + '</b></span' + "\n";
	template += '<a class="btn ui-state-default ui-corner-all float-right" href="javascript:void(0);" onclick="chimera_delete_sidebar(\'' + name + '\', \'chimera_sidebars_generator_' + num + '\')"><span class="ui-icon ui-icon-closethick"></span>Delete</a>' + "\n";
	template += '<div class="clear"></div>' + "\n";
	template + '</li>' + "\n";
	jQuery('#sidebars_container').append(template);
	jQuery('#sidebars_container #total_sidebars').html(num);
	jQuery('#chimera_sidebar_generator_new').attr('value', '');
}
function chimera_get_theme_version_info(documentId)
{
	var data = {
		action: 'chimera_ajax_post_action',
		type: 'version_check',
		data: null
	};
	jQuery.post('<?php echo admin_url("admin-ajax.php"); ?>', data, function(response) {
		jQuery('#' + documentId).html(response);
	});
}
function chimera_delete_sidebar(sidebar_name, sidebar_container)
{
	var data = {
		action: 'chimera_ajax_post_action',
		type: 'delete_sidebar',
		data: sidebar_name
	};
	jQuery.post('<?php echo admin_url("admin-ajax.php"); ?>', data, function(response) {
		if (response == 'true')
		{
			totalSidebars = jQuery('#sidebars_container #total_sidebars').html();
			num = parseInt(totalSidebars.trim());
			num--;
			jQuery('#sidebars_container #total_sidebars').html(num);
			if (num == 0)
			{
				jQuery('#sidebars_container #empty_sidebar').show();
			}
			jQuery('#opt_saved').html('Custom sidebar successfully deleted !');
			jQuery('#opt_saved').fadeIn('fast');
			jQuery('#opt_saved').blur();
			
			setTimeout(function(){
				jQuery('#opt_saved').fadeOut("slow");
			},700);
			jQuery('#' + sidebar_container).slideUp();
			jQuery('#' + sidebar_container).remove();
		} else {
			jQuery('#opt_saved').html('Custom sidebar could not be deleted !');
			jQuery('#opt_saved').fadeIn('fast');
			jQuery('#opt_saved').blur();
			setTimeout(function(){
				jQuery('#opt_saved').fadeOut("slow");
			},700);
		}
	});
}
function chimera_toggle_element_by_value(radio_name, radio_value, element_to_toggle)
{
	jQuery("input[name='" + radio_name + "']").click(function() {
		if (jQuery(this).attr('value') == radio_value)
		{
			if (jQuery(this).attr('checked'))
			{
				jQuery(element_to_toggle).slideDown();
			}
		} else {
			jQuery(element_to_toggle).slideUp();
		}
	});
	jQuery("input[name='" + radio_name + "']").each(function() {
		if (jQuery(this).attr('value') == radio_value)
		{
			if (jQuery(this).attr('checked'))
			{
				jQuery(element_to_toggle).show();
			}
			else
			{
				jQuery(element_to_toggle).hide();
			}
		}
	});
}
function chimera_check_radio_by_name_and_value(name, value)
{
    jQuery("input[name='" + name + "']").each(function() {
		if (jQuery(this).attr('value') == value)
		{
			this.checked = true;
		}
	});
}
function chimera_add_ajax_upload()
{
	//AJAX Upload
	jQuery('.image_upload_button').each(function(){
	var clickedObject = jQuery(this);
	var clickedID = jQuery(this).attr('id');
	new AjaxUpload(this, {
		  action: '<?php echo admin_url("admin-ajax.php"); ?>',
		  name: clickedID, // File upload name
		  data: { // Additional data to send
				action: 'chimera_ajax_post_action',
				type: 'upload',
				data: clickedID },
		  autoSubmit: true, // Submit file after selection
		  responseType: false,
		  onChange: function(file, extension){},
		  onSubmit: function(file, extension){
				clickedObject.html('<span class="ui-icon ui-icon-circle-plus loading"></span>' + '<span class="text">Uploading</span>'); 
				this.disable();
				interval = window.setInterval(function(){
					var text = clickedObject.children('span.text').text();
					if (text.length < 13){	clickedObject.children('span.text').text(text + '.'); }
					else { clickedObject.children('span.text').text('Uploading'); }
				}, 200);
		  },
		  onComplete: function(file, response) {
		  	window.clearInterval(interval);
			clickedObject.html('<span class="ui-icon ui-icon-circle-plus"></span>' + '<span class="text">Upload</span>');
			this.enable();
			if(response.search('Upload Error') > -1){
				var buildReturn = '<span class="upload-error">' + response + '</span>';
				jQuery(".upload-error").remove();
				clickedObject.parent().after(buildReturn);
			}
			else{
				jQuery(".upload-error").remove();
				jQuery("#image_" + clickedID).remove();
				jQuery('img#image_'+clickedID).fadeIn();
				clickedObject.next('span').fadeIn();
				jQuery('#' + clickedID).val(response);
				var button_to_hide = jQuery('#reset_' + clickedID);
				var preview_to_hide = jQuery('#preview_' + clickedID);
				preview_to_hide.attr('href', '' + response + '');
				button_to_hide.removeClass('hide');
				preview_to_hide.removeClass('hide');
				button_to_hide.fadeIn();
				preview_to_hide.fadeIn();
			}
		  }
		});
	});
	//AJAX Remove (clear option value)
	jQuery('.image_reset_button').click(function(){
        var clickedObject = jQuery(this);
		var clickedID = jQuery(this).attr('id');
        var theIDElements = clickedID.split('_');
        theIDElements.shift();
        var theID = theIDElements.join('_');
		var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
		var data = {
			action: 'chimera_ajax_post_action',
			type: 'image_reset',
			data: theID
		};
		jQuery.post(ajax_url, data, function(response) {
			var image_to_remove = jQuery('#image_' + theID);
			var button_to_hide = jQuery('#reset_' + theID);
			var preview_to_hide = jQuery('#preview_' + theID);
			image_to_remove.fadeOut(500,function(){ jQuery(this).remove(); });
			button_to_hide.addClass('hide');
			preview_to_hide.addClass('hide');
			button_to_hide.fadeOut();
			preview_to_hide.fadeOut();
			jQuery('#' + theID).val('');
		});
		return false; 
	});
}
function chimera_make_images_selectable()
{
	jQuery('.img_radio li img').click(function(evt){
		jQuery(this).parent().parent().find('li').each(function() {
			jQuery(this).removeClass('active');
		});
		jQuery(this).parent().addClass('active');
	});
}
jQuery(document).ready(function(){
	<?php 
		$options = get_option('chimera_theme_options');
		foreach($options as $option)
		{
			if($option['type'] == 'color' OR $option['type'] == 'typography' OR $option['type'] == 'border')
			{
				if($option['type'] == 'typography' OR $option['type'] == 'border')
				{
					$option_id = $option['id'];
					$temp_color = get_option($option_id);
					$option_id = $option['id'] . '_color';
					$color = $temp_color['color'];
				} else {
					$option_id = $option['id'];
					$color = get_option($option_id);
				}
	?>
	jQuery('#<?php echo $option_id; ?>_picker').children('div').css('backgroundColor', '<?php echo $color; ?>');    
		jQuery('#<?php echo $option_id; ?>_picker').ColorPicker({
		color: '<?php echo $color; ?>',
		onShow: function (colpkr) {
			jQuery(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			jQuery(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			jQuery('#<?php echo $option_id; ?>_picker').children('div').css('backgroundColor', '#' + hex);
			jQuery('#<?php echo $option_id; ?>_picker').next('input').attr('value','#' + hex);
		}
	});
	<?php } } ?>
	chimera_toggle_element_by_value('chimera_teaser_st', 'custom_text_def', jQuery('#chimera_teaser_default_text').parent().parent().parent());
	chimera_toggle_element_by_value('chimera_teaser_cat', 'custom_text_def', jQuery('#chimera_teaser_cat_txt').parent().parent().parent());
	
	chimera_toggle_element_by_value('chimera_home_slider', 'val1', jQuery('#chimera_slider_cat').parent().parent().parent().parent().parent().parent());	
	chimera_toggle_element_by_value('chimera_home_slider', 'val2', jQuery('#chimera_dynamic_slider').parent().parent());
	chimera_toggle_element_by_value('chimera_home_slider', 'val3', jQuery('#chimera_slider_title').parent().parent().parent().parent().parent().parent());
	chimera_toggle_element_by_value('chimera_home_slider', 'val3', jQuery('#chimera_slider_title').parent().parent().parent().parent().parent().parent());
	chimera_toggle_element_by_value('teaser_text', 'custom', jQuery('#section_teaser_text_custom'));

	chimera_toggle_element_by_value('chimera_screenshot_type', 'embed_video', jQuery('#chimera_screenshot_embed_code').parent().parent().parent());
	chimera_toggle_element_by_value('chimera_screenshot_type', 'std_link', jQuery('#chimera_slider_link').parent().parent().parent());
	
	
	
	
	
	// add ajaxupload
	chimera_add_ajax_upload();
	chimera_make_images_selectable();
	jQuery('#chimeraform').live('submit', function(){
		function newValues() {
		  var serializedValues = jQuery("#chimeraform").serialize();
		  return serializedValues;
		}
		jQuery(":checkbox, :radio").click(newValues);
		jQuery("select").change(newValues);
		var serializedReturn = newValues();
		var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
		var data = {
			<?php if(isset($_REQUEST['page']) && $_REQUEST['page'] == 'chimerathemes_framework_settings'){ ?>
			type: 'framework',
			<?php } ?>
			action: 'chimera_ajax_post_action',
			data: serializedReturn
		};
		jQuery.post(ajax_url, data, function(response) {
			switch (response)
			{
				case 'sidebar_updated':
					jQuery('#opt_saved').html('Sidebar successfully added !');
					jQuery('#opt_saved').fadeIn('fast');
					jQuery('#opt_saved').blur();
					setTimeout(function(){
						jQuery('#opt_saved').fadeOut("slow");
					},1700);
					chimera_add_sidebar();
					break;
				case 'sidebar_exists':
					jQuery('#opt_saved').html('Sidebar already exists !');
					jQuery('#opt_saved').fadeIn('fast');
					jQuery('#opt_saved').blur();
					setTimeout(function(){
						jQuery('#opt_saved').fadeOut("slow");
					},1700);
					break;
				case 'sidebar_no_update':
					jQuery('#opt_saved').html('Sidebar could not be added!');
					jQuery('#opt_saved').fadeIn('fast');
					jQuery('#opt_saved').blur();
					setTimeout(function(){
						jQuery('#opt_saved').fadeOut("slow");
					},1700);
					break;
				case 'options_imported':
					jQuery('#opt_saved').html('Options successfully imported!');
					jQuery('#opt_saved').fadeIn('fast');
					jQuery('#opt_saved').blur();
					setTimeout(function(){
						jQuery('#opt_saved').fadeOut("slow");
					},1700);
					break;
				default:
					jQuery('#opt_saved').html('Theme options successfully saved !');
					jQuery('#opt_saved').fadeIn('fast');
					jQuery('#opt_saved').blur();
					setTimeout(function(){
						jQuery('#opt_saved').fadeOut("slow");
					},1700);
					break;
			}
		});
		return false; 
	});
});
</script>
