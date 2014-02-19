<?php
$cols = isset($options['cols']) ? $options['cols'] : 8;
?>
<textarea name="<?php echo $id ?>" id="<?php echo $id ?>" cols="<?php echo $cols ?>"><?php echo stripslashes($selected_std) ?></textarea>