<form action="" enctype="multipart/form-data" id="chimeraform" method="post">
	<?php echo chimera_generate_options(get_option('chimera_theme_options')); ?>
</form>
<form action="<?php echo esc_html( $_SERVER['REQUEST_URI'] ) ?>" method="post" style="display:inline" id="chimeraform-reset">
	<input name="reset" type="submit" value="Reset Options" class="button reset-button hide" />
	<input type="hidden" name="chimera_save" value="reset" /> 
</form>
<div class="clear"></div>
</div>