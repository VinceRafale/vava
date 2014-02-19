<select name="<?php echo $id ?>" id="<?php echo $id ?>">
<?php foreach($options as $value => $option) { ?>
	<?php 
		if ($selected_std == $value) {
			$selected = ' selected="selected"';
		} else {
			$selected = '';
		}
	?>
	<option<?php echo $selected ?> value="<?php echo $value ?>"><?php echo $option ?></option>
<?php } ?>
</select>