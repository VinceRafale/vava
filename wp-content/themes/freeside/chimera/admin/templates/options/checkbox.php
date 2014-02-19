<?php 
	if ($selected_std == 'true') 
		$checked = 'checked="checked"'; 
	else 
		$checked = '';
?>
<?php 
	if (!$disabled == 'trueSmall') 
		$checked = 'checked="checked"'; 
	else 
		$checked = '';
?>    		

<input type="checkbox" class="styled" name="<?php echo $id ?>" id="<?php echo $id ?>" value="true" <?php echo $checked ?> />