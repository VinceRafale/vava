<div class="section section-radio selection_box">
	<h3 class="heading"><?php echo $name ?> <a class="ui-icon ui-icon-help info-icon tooltip ui-corner-all" title="<?php echo $name ?> - <?php echo $desc ?>" href="javascript:void(0);"></a></h3>
	<div class="option selection_box">
		<ul class="img_radio">
<?php
$i = 0;
foreach ($options as $key => $option) 
{ 
	$i++;
	$checked = '';
	$selected = '';
	if ( $selected_std == $key) { $checked = ' checked'; $selected = 'img-selected'; } 
?>
			<li <?php if (!empty($checked)) echo 'class="active"'?>>
				<input name="<?php echo $id ?>" id="<?php echo $id . $i ?>" type="radio" value="<?php echo $key ?>" class="hide" <?php echo $checked ?> />
				<img src="<?php echo $option ?>" alt="<?php echo $selected ?>" onClick="jQuery(this).prev().attr('checked', true);" />
				<div class="clear"></div>
			</li>
<?php } ?>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
