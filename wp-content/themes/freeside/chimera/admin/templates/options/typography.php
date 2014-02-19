<div class="<?php echo $class ?>">
<?php
$fonts = array(
	'' => 'Default',
	'Arial, sans-serif' => 'Arial',
	'Verdana, Geneva, sans-serif' => 'Verdana',
	'&quot;Trebuchet MS&quot;, Tahoma, sans-serif' => 'Trebuchet',
	'Georgia, serif' => 'Georgia',
	'&quot;Times New Roman&quot;, serif' => 'Times New Roman',
	'Tahoma, Geneva, Verdana, sans-serif' => 'Tahoma',
	'Palatino, &quot;Palatino Linotype&quot;, serif' => 'Palatino',
	'&quot;Helvetica Neue&quot;, Helvetica, sans-serif' => 'Helvetica*',
	'Calibri, Candara, Segoe, Optima, sans-serif' => 'Calibri*',
	'&quot;Myriad Pro&quot;, Myriad, sans-serif' => 'Myriad Pro*',
	'&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, sans-serif' => 'Lucida',
	'&quot;Arial Black&quot;, sans-serif' => 'Arial Black',
	'&quot;Gill Sans&quot;, &quot;Gill Sans MT&quot;, Calibri, sans-serif' => 'Gill Sans*',
	'Geneva, Tahoma, Verdana, sans-serif' => 'Geneva*',
	'Impact, Charcoal, sans-serif' => 'Impact',
	'Segoe UI",Frutiger,Tahoma,Helvetica,"Helvetica Neue",Arial,sans-serif' => 'Segoe UI*',
);
$font_styles = array(
	'normal' => 'Normal',
	'italic' => 'Italic',
);
$font_weights = array(
    'normal' => 'Normal',
    'bold' => 'Bold'
);
?>
<select name="<?php echo $id ?>_size" id="<?php echo $id ?>_size">
<?php 
	for ($i = 9; $i < 71; $i++) { 
		if ($i == $selected_std['size'])
			$selected = 'selected="selected"';
		else
			$selected = '';
?>
	<option value="<?php echo $i ?>" <?php echo $selected ?>><?php echo $i ?>px</option>
<?php } ?>
</select>
<select name="<?php echo $id ?>_face" id="<?php echo $id ?>_face">
<?php 
	foreach($fonts as $key => $value) {
		if ($key == $selected_std['face'])
			$selected = 'selected="selected"';
		else
			$selected = '';
?>
	<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
<?php } ?>
</select>
<select name="<?php echo $id ?>_style" id="<?php echo $id ?>_style">
<?php 
	foreach($font_styles as $key => $value) {
		if ($key == $selected_std['style'])
			$selected = 'selected="selected"';
		else
			$selected = '';
?>
	<option value="<?php echo $key ?>" <?php echo $selected ?>><?php echo $value ?></option>
<?php } ?>
</select>
<select name="<?php echo $id ?>_weight" id="<?php echo $id ?>_weight">
<?php 
	foreach($font_weights as $key => $value) {
		if ($key == $selected_std['weight'])
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
