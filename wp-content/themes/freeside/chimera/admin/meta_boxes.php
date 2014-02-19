<?php
/**
 * Adds the Hybrid Settings meta box on the Write Post/Page screeens
 *
 * @package Hybrid
 * @subpackage Admin
 */

/* Add a new meta box to the admin menu. */
	add_action( 'admin_menu', 'hybrid_create_meta_box' );

/* Saves the meta box data. */
	add_action( 'save_post', 'hybrid_save_meta_data' );

/**
 * Function for adding meta boxes to the admin.
 * Separate the post and page meta boxes.
 *
 * @since 0.3
 */
function hybrid_create_meta_box() {
	add_meta_box( 'post-meta-boxes', __('Post options'), 'post_meta_boxes', 'post', 'normal', 'high' );
	add_meta_box( 'page-meta-boxes', __('Post options'), 'page_meta_boxes', 'page', 'normal', 'high' );
}

/**
 * Displays meta boxes on the Write Post panel.  Loops 
 * through each meta box in the $meta_boxes variable.
 * Gets array from hybrid_post_meta_boxes().
 *
 * @since 0.3
 */
function post_meta_boxes() {
	global $post;
	$meta_boxes = hybrid_post_meta_boxes(); ?>
	
	<?php foreach ( $meta_boxes as $meta ) :
		$value = get_post_meta( $post->ID, $meta['name'], true );
        $meta_type = $meta['type'];
        $meta_function = 'get_meta_' . $meta_type;
		if (function_exists($meta_function))
        {
            call_user_func_array($meta_function, array($meta, $value));
        }
	endforeach; ?>
<div class="clear"></div>
<?php
}

/**
 * Displays meta boxes on the Write Page panel.  Loops 
 * through each meta box in the $meta_boxes variable.
 * Gets array from hybrid_page_meta_boxes()
 *
 * @since 0.3
 */
function page_meta_boxes() {
	global $post;
	$meta_boxes = hybrid_page_meta_boxes(); ?>

	<?php foreach ( $meta_boxes as $meta ) :
		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );
        $meta_type = $meta['type'];
        $meta_function = 'get_meta_' . $meta_type;
        if (function_exists($meta_function))
        {
            call_user_func_array($meta_function, array($meta, $value));
        }
	endforeach; ?>

<?php
}

function get_meta_radio( $args = array(), $value = false ) {

	extract( $args ); ?>
	<div class="section">
			<h4 class="heading"><?php echo $title; ?><a href="javascript:void(0);" class="ui-icon ui-icon-help info-icon tooltip ui-corner-all" title="<?php echo $title; ?> - <?php echo $desc; ?>"></a></h4>
<div class="option selection_box">
<ul class="ul-radio">
<?php 
	$counter = 0;
	isset($default_value) or $default_value = null;
	$value == false and $value = $default_value;
	foreach ($options as $key => $option) { ?>
	<?php 
		if ($value == $key)
			$checked = ' checked="checked"';
		else
			$checked = '';
		$counter++;
		
		// $li_class = $counter % 2 ? ' class="float-right"' : '';
	?>
	<li<?php echo $li_class ?>>
		<input type="radio" class="styled" name="<?php echo $name ?>" id="<?php echo $name . '_' . $counter ?>" value="<?php echo $key ?>" <?php echo $checked ?>>
		<label class="descr" for="<?php echo $name . '_' . $counter ?>"><?php echo $option ?></label>
		<div class="clear"></div>
	</li>
<?php } ?>
</ul>
		<div class="clear"></div>

</div>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
</div>
	<?php
}

function get_meta_text_input( $args = array(), $value = false ) {

	extract( $args ); ?>

	<div class="section">
			<h4 class="heading"><?php echo $title; ?><a href="javascript:void(0);" class="ui-icon ui-icon-help info-icon tooltip ui-corner-all" title="<?php echo $title; ?> - <?php echo $desc; ?>"></a></h4>
<div class="option selection_box">
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_html( $value, 1 ); ?>" size="30" tabindex="30" style="width: 97%;" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>
</div>
	<?php
}

function get_meta_uploader( $args = array(), $value = false ) {

	extract( $args ); ?>

	<div class="section">
			<h4 class="heading"><?php echo $title; ?><a href="javascript:void(0);" class="ui-icon ui-icon-help info-icon tooltip ui-corner-all" title="<?php echo $title; ?> - <?php echo $desc; ?>"></a></h4>
			<input name="<?php echo $name ?>" id="<?php echo $name ?>" type="text" value="<?php echo esc_html( $value, 1 ); ?>" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			<div class="upload_button_div">
				<a href="javascript:void(0);" class="btn ui-state-default ui-corner-all image_upload_button" id="<?php echo $name ?>" title="<?php echo $name ?>">
					<span class="ui-icon ui-icon-circle-plus"></span>
					<span class="text">Upload</span>
				</a>
				<?php if (!empty($value)) $hide = ''; else $hide = 'hide'; ?>
				<a href="javascript:void(0);" class="btn ui-state-default ui-corner-all image_reset_button <?php echo $hide ?>" id="reset_<?php echo $name ?>" title="<?php echo $name ?>">
					<span class="ui-icon ui-icon-circle-close"></span>
					Remove
				</a>
				<a href="<?php echo $value ?>" id="preview_<?php echo $name ?>" class="btn ui-state-default ui-corner-all <?php echo $hide ?>" title="" target="_blank">
					<span class="ui-icon ui-icon-circle-zoomin"></span>
					Preview
				</a>
				<div class="clear"></div>
	</div>
</div>
	<?php
}

function get_meta_images( $args = array(), $value = false ) {

	extract( $args );

	 ?>

	<div class="section">
			<h4 class="heading"><?php echo $title; ?><a href="javascript:void(0);" class="ui-icon ui-icon-help info-icon tooltip ui-corner-all" title="<?php echo $title; ?> - <?php echo $desc; ?>"></a></h4>
				<div class="option selection_box">
					<ul class="img_radio">
			<?php
			$i = 0;
			isset($default_value) or $default_value = null;
			$value == false and $value = $default_value;
			foreach ($options as $key => $option) 
			{ 
				$i++;
				$checked = '';
				$selected = '';
				if($value != '') {
					if ($value == $key) { $checked = ' checked'; $selected = 'img-selected'; } 
				}
			?>
						<li <?php if (!empty($checked)) echo 'class="active"'?>>
							<input name="<?php echo $name ?>" type="radio" id="chimera-radio-img-<?php echo $name . $i ?>" value="<?php echo $key ?>" class="hide" <?php echo $checked ?> />
							<img src="<?php echo $option ?>" alt="<?php echo $selected ?>" onClick="chimera_check_radio_by_name_and_value('<?php echo $name ?>', '<?php echo $key ?>');" />
							<div class="clear"></div>
						</li>
			<?php } ?>
					</ul>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />			

				<div class="clear"></div>
			</div>

	</div>
	<?php
}

function get_meta_selected_sidebar( $args = array(), $value = false ) {

	extract( $args );
	
	 ?>

	<div class="section">
			<h4 class="heading"><?php echo $title; ?><a href="javascript:void(0);" class="ui-icon ui-icon-help info-icon tooltip ui-corner-all" title="<?php echo $title; ?> - <?php echo $desc; ?>"></a></h4>
				<div class="option selection_box">
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
				<option value=""<?php if($value == ''){ echo " selected";} ?>>Select A Sidebar</option>
			<?php 
		
			$sidebars = sidebar_generator_chimera::get_sidebars();
			if(is_array($sidebars) && !empty($sidebars)){
				foreach($sidebars as $sidebar){
					if($value == $sidebar){
						echo "<option value='$sidebar' selected>$sidebar</option>\n";
					}else{
							echo "<option value='$sidebar'>$sidebar</option>\n";
					}
				}
			}
			
			?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />			
	
		</div>
	</div>
	<?php
}


/**
 * Outputs a select box with arguments from the 
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_select( $args = array(), $value = false ) {

	extract( $args ); ?>

	<div class="section">
			<h4 class="heading"><?php echo $title; ?><a href="javascript:void(0);" class="ui-icon ui-icon-help info-icon tooltip ui-corner-all" title="<?php echo $title; ?> - <?php echo $desc; ?>"></a></h4>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $options as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>
	<?php
}

/**
 * Outputs a textarea with arguments from the 
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_textarea( $args = array(), $value = false ) {

	extract( $args ); ?>

	<div class="section" id="section_<?php echo $name; ?>">
			<h4 class="heading"><?php echo $title; ?><a href="javascript:void(0);" class="ui-icon ui-icon-help info-icon tooltip ui-corner-all" title="<?php echo $title; ?> - <?php echo $desc; ?>"></a></h4>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 99%;"><?php echo esc_html( $value, 1 ); ?></textarea>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />

	</div>
	<?php
}

/**
 * Loops through each meta box's set of variables.
 * Saves them to the database as custom fields.
 *
 * @since 0.3
 * @param int $post_id
 */
function hybrid_save_meta_data( $post_id ) {
	global $post;

	if ( 'page' == $_POST['post_type'] )
		$meta_boxes = array_merge( hybrid_page_meta_boxes() );
	else
		$meta_boxes = array_merge( hybrid_post_meta_boxes() );
	
	foreach ( $meta_boxes as $meta_box ) :

		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

		elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$data = stripslashes( $_POST[$meta_box['name']] );

		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );

		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );

		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

	endforeach;
}
?>
