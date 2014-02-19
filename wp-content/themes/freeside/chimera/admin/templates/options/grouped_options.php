<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#<?php echo $id ?>_sortable').sortable({
			revert: true,
			stop: function() {
				chimera_rename_options_from_group('<?php echo $id ?>');
			}
		});
	});
</script>

<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
	<div class="portlet-header ui-widget-header">
		<h3 class="head"><?php echo $name; ?><span class="ui-icon ui-icon-circle-arrow-n"></span></h3>
		<div class="clear"></div>
<div id="<?php echo $id ?>_template" style="display:none">
	<?php 
		$tmp = $options;
		foreach ($tmp as $key => $_option) {
			$tmp[$key]['id'] .= '_t';
		}
?>
	<?php echo chimera_generate_options($tmp); ?>
</div>
<a title="Add new item" href="javascript:void(0);" onclick="chimera_add_option_to_group('<?php echo $id ?>', '<?php echo $id ?>_template')" class="btn ui-state-default ui-corner-all add_new">
	<span class="ui-icon ui-icon-circle-plus"></span>
	Add new slide
</a>
<a title="Save options" href="javascript:void(0);" class="btn ui-state-default ui-corner-all add_new save_but_trigger">
	<span class="ui-icon ui-icon-circle-check"></span>
	Save options
</a>
<a title="Minimize slides" href="javascript:void(0);" class="btn ui-state-default ui-corner-all add_new minimize float-right">
	<span class="ui-icon ui-icon-carat-2-n-s"></span>
	Minimize slides
</a>
<div class="clear"></div>
<div id="<?php echo $id ?>">
	<div id="<?php echo $id ?>_sortable" class="chimera_sort ui-corner-all">
	<?php
		$selected_values = array();
		$total_groups = ceil($selected_std / count($options));
		for($i = 1; $i <= $total_groups; $i++) {
			$tmp = $options;
			foreach ($tmp as $key => $_option) {
				$tmp[$key]['id'] .= '_' . $i;
			}
			$selected_values[] = $tmp;
		}
		foreach ($selected_values as $key => $values)
		{
			$i = $key + 1;
	?>
		<div id="option_<?php echo $i ?>" class="ui-state-default sort_item">
			<div class="position"><?php echo $i; ?></div>
			<div class="remove">
				<a title="Remove" href="javascript:void(0)" onclick="chimera_remove_option_from_group(this, '<?php echo $id ?>')" class="btn ui-state-default ui-corner-all">
					<span class="ui-icon ui-icon-circle-plus"></span>
					Remove
				</a>
			</div>
			<div class="clear"></div>
			<div class="ctrl"><?php echo chimera_generate_options($values); ?><div class="clear"></div></div>
			<div class="clear"></div>
		</div>
	<?php
		}
	?>
	</div>
</div>
	<a title="Add new item" href="javascript:void(0);" onclick="chimera_add_option_to_group('<?php echo $id ?>', '<?php echo $id ?>_template')" class="btn ui-state-default ui-corner-all add_new_last">
		<span class="ui-icon ui-icon-circle-plus"></span>
		Add new item
	</a>
	<a title="Save options" href="javascript:void(0);" class="btn ui-state-default ui-corner-all add_new_last add_new_last_last save_but_trigger">
		<span class="ui-icon ui-icon-circle-check"></span>
		Save options
	</a>
		<div class="clear"></div>
	</div>
</div>
