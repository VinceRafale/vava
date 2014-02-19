<ul class="ul-radio">
<?php 
	$counter = 0;
	foreach ($options as $key => $option) { ?>
	<?php 
		if ($selected_std == $key)
			$checked = ' checked="checked"';
		else
			$checked = '';
		$counter++;
	?>
	<li>
		<input type="radio" class="styled" name="<?php echo $id ?>" id="<?php echo $id . '_' . $counter ?>" value="<?php echo $key ?>" <?php echo $checked ?>>
		<label class="descr" for="<?php echo $id . '_' . $counter ?>"><?php echo $option ?></label>
		<div class="clear"></div>
	</li>
<?php } ?>
</ul>