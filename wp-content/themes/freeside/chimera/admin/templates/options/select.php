<select name="<?php echo $id ?>" id="<?php echo $id ?>">
<?php foreach($options as $option) { ?>
	<?php 
		if ($selected_std == $option) {
			$selected = ' selected="selected"';
		} else {
			$selected = '';
		}
	?>
	<option<?php echo $selected ?>><?php echo $option ?></option>
<?php } ?>
</select>