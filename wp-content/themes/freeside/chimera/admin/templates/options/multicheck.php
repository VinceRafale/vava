<div class="<?php echo $class ?>">
<?php foreach($options as $key => $option) {
	$new_key = $id . '_' . $key;
	$saved_key_value = get_option($new_key);
	if (!empty($saved_key_value))
	{
		if ($saved_key_value == 'true')
			$checked = 'checked="checked"';
		else
			$checked = '';
	} elseif ( $std == $key ) {
		$checked = 'checked="checked"';
	} else {
		$checked = '';
	}
?>
<input type="checkbox" name="<?php echo $new_key ?>" id="<?php echo $new_key ?>" value="true" <?php echo $checked ?> /><label for="<?php echo $new_key ?>"><?php echo $option ?></label><br />
<?php } ?>
</div>