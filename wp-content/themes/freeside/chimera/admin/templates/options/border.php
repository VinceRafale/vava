<div class="<?php echo $class ?>">
<?php
$border_style = array(
	'solid' => 'Solid',
	'dashed' => 'Dashed',
	'dotted' => 'Dotted',
);
?>
<select name="<?php echo $id ?>_width" id="<?php echo $id ?>_width">
<?php 
	for ($i = 0; $i < 21; $i++) { 
		if ($i == $selected_std['width'])
			$selected = 'selected="selected"';
		else
			$selected = '';
?>
	<option value="<?php echo $i ?>" <?php echo $selected ?>><?php echo $i ?>px</option>
<?php } ?>
</select>
<select name="<?php echo $id ?>_style" id="<?php echo $id ?>_style">
<?php 
	foreach($border_style as $key => $value) {
		if ($key == $selected_std['style'])
			$selected = 'selected="selected"';
		else
			$selected = '';
?>
	<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
<?php } ?>
</select>
<div id="<?php echo $id ?>_color_picker" class="colorSelector"><div></div></div>
<input name="<?php echo $id ?>_color" id="<?php echo $id ?>_color" type="text" value="<?php echo $selected_std['color'] ?>" />
</div>