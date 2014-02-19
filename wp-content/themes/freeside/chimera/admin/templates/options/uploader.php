<input name="<?php echo $id ?>" id="<?php echo $id ?>" type="text" value="<?php echo $selected_std ?>" />
<div class="upload_button_div">
	<a href="javascript:void(0);" class="btn ui-state-default ui-corner-all image_upload_button" id="<?php echo $id ?>" title="Upload <?php echo $id ?>">
		<span class="ui-icon ui-icon-circle-plus"></span>
		<span class="text">Upload</span>
	</a>
	<?php if (!empty($selected_std)) $hide = ''; else $hide = 'hide'; ?>
	<a href="javascript:void(0);" class="btn ui-state-default ui-corner-all image_reset_button <?php echo $hide ?>" id="reset_<?php echo $id ?>" title="Remove">
		<span class="ui-icon ui-icon-circle-close"></span>
		Remove
	</a>
	<a href="<?php echo $selected_std ?>" id="preview_<?php echo $id ?>" class="btn ui-state-default ui-corner-all preview <?php echo $hide ?>" target="_blank" title="">
		<span class="ui-icon ui-icon-circle-zoomin"></span>
		Preview
	</a>
</div>
<div class="clear"></div>
