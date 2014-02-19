<select name="<?php echo $id ?>" id="<?php echo $id ?>">
<?php foreach($options as $label => $label_options) { ?>
<optgroup label="<?php echo $label ?>">
<?php foreach($label_options as $value => $option) { ?>
	<?php 
		if ($selected_std == $value) {
			$selected = ' selected="selected"';
		} else {
			$selected = '';
		}
	?>
	<option<?php echo $selected ?> value="<?php echo $value ?>"><?php echo $option ?></option>
<?php } ?>
</optgroup>
<?php } ?>
</select>
