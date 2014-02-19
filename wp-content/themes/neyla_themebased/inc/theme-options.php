<?php
/**
 * Neyla Theme Options
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 *
 * @since Neyla 1.0
 *
 */


function neyla_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'neyla-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2011-04-28' );
	wp_enqueue_script( 'neyla-theme-options', get_template_directory_uri() . '/inc/theme-options.js', array( 'farbtastic' ), '2011-06-10' );
	wp_enqueue_style( 'farbtastic' );
	
	wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload'));
	wp_enqueue_style('thickbox');
	wp_tiny_mce( false ); 
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'neyla_admin_enqueue_scripts' );

/**
 * Register the form setting for our neyla_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, neyla_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are complete, properly
 * formatted, and safe.
 *
 * We also use this function to add our theme option if it doesn't already exist.
 *
 * @since Twenty Eleven 1.0
 */
function neyla_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === neyla_get_theme_options() )
		add_option( 'neyla_theme_options', neyla_get_default_theme_options() );

	register_setting(
		'neyla_options',       // Options group, see settings_fields() call in neyla_theme_options_render_page()
		'neyla_theme_options', // Database option, see neyla_get_theme_options()
		'neyla_theme_options_validate' // The sanitization callback, see neyla_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'general', // Unique identifier for the settings section
		'', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'theme_options' // Menu slug, used to uniquely identify the page; see neyla_theme_options_add_page()
	);

	// Register our individual settings fields
	//add_settings_field(
	//	'logo_src',  // Unique identifier for the field for this section
	//	__( 'Logo image', 'neyla' ), // Setting field label
	//	'neyla_settings_logo_src', // Function that renders the settings field
	//	'theme_options', // Menu slug, used to uniquely identify the page; see neyla_theme_options_add_page()
	//	'general' // Settings section. Same as the first argument in the add_settings_section() above
	//);

	add_settings_field( 'logo_img_src', __( 'Logo img', 'neyla' ),
		'neyla_settings_logo_img_src', 'theme_options', 'general' );
	add_settings_field( 'logo_img_alt', __( 'Logo alt', 'neyla' ),
		'neyla_settings_logo_img_alt', 'theme_options', 'general' );
	add_settings_field( 'logo_img_title', __( 'Logo title', 'neyla' ),
		'neyla_settings_logo_img_title', 'theme_options', 'general' );
	add_settings_field( 'main_img_src', __( 'Main img', 'neyla' ),
		'neyla_settings_main_img_src', 'theme_options', 'general' );
	add_settings_field( 'main_img_title', __( 'Main img title', 'neyla' ),
		'neyla_settings_main_img_title', 'theme_options', 'general' );
	add_settings_field( 'main_img_alt', __( 'Main img alt', 'neyla' ),
		'neyla_settings_main_img_alt', 'theme_options', 'general' );
	add_settings_field( 'left_img_src', __( 'Left img', 'neyla' ),
		'neyla_settings_left_img_src', 'theme_options', 'general' );
	add_settings_field( 'left_img_title', __( 'Left img title', 'neyla' ),
		'neyla_settings_left_img_title', 'theme_options', 'general' );
	add_settings_field( 'left_img_alt', __( 'Left img alt', 'neyla' ),
		'neyla_settings_left_img_alt', 'theme_options', 'general' );
	add_settings_field( 'right_img_src', __( 'Right img', 'neyla' ),
		'neyla_settings_right_img_src', 'theme_options', 'general' );
	add_settings_field( 'right_img_title', __( 'Right img title', 'neyla' ),
		'neyla_settings_right_img_title', 'theme_options', 'general' );
	add_settings_field( 'right_img_alt', __( 'Right img alt', 'neyla' ),
		'neyla_settings_right_img_alt', 'theme_options', 'general' );
	add_settings_field( 'main_button_text', __( 'Main button text', 'neyla' ),
		'neyla_settings_main_button_text', 'theme_options', 'general' );
	add_settings_field( 'facebook_href', __( 'Facebook link', 'neyla' ),
		'neyla_settings_facebook_href', 'theme_options', 'general' );
	add_settings_field( 'twitter_href', __( 'Twitter link', 'neyla' ),
		'neyla_settings_twitter_href', 'theme_options', 'general' );
	add_settings_field( 'linkedin_href', __( 'Linkedin link', 'neyla' ),
		'neyla_settings_linkedin_href', 'theme_options', 'general' );
	add_settings_field( 'googleplus_href', __( 'Google plus link', 'neyla' ),
		'neyla_settings_googleplus_href', 'theme_options', 'general' );
	add_settings_field( 'left_column', __( 'Left column text', 'neyla' ),
		'neyla_settings_left_column', 'theme_options', 'general' );
	add_settings_field( 'right_column', __( 'Right column text', 'neyla' ),
		'neyla_settings_right_column', 'theme_options', 'general' );
	add_settings_field( 'left_category_id', __( 'Left category', 'neyla' ),
		'neyla_settings_left_category_id', 'theme_options', 'general' );
	add_settings_field( 'right_category_id', __( 'Right category', 'neyla' ),
		'neyla_settings_right_category_id', 'theme_options', 'general' );
	add_settings_field( 'copyright_text', __( 'Copyright text', 'neyla' ),
		'neyla_settings_copyright_text', 'theme_options', 'general' );
}
add_action( 'admin_init', 'neyla_theme_options_init' );

/**
 * Change the capability required to save the 'neyla_options' options group.
 *
 * @see neyla_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see neyla_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * By default, the options groups for all registered settings require the manage_options capability.
 * This filter is required to change our theme options page to edit_theme_options instead.
 * By default, only administrators have either of these capabilities, but the desire here is
 * to allow for finer-grained control for roles and users.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function neyla_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_neyla_options', 'neyla_option_page_capability' );

/**
 * Add our theme options page to the admin menu, including some help documentation.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Twenty Eleven 1.0
 */
function neyla_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'neyla' ),   // Name of page
		__( 'Theme Options', 'neyla' ),   // Label in menu
		'edit_theme_options',                    // Capability required
		'theme_options',                         // Menu slug, used to uniquely identify the page
		'neyla_theme_options_render_page' // Function that renders the options page
	);

	if ( ! $theme_page )
		return;

	add_action( "load-$theme_page", 'neyla_theme_options_help' );
}
add_action( 'admin_menu', 'neyla_theme_options_add_page' );

function neyla_theme_options_help() {

	$help = '<p>' . __( 'Some themes provide customization options that are grouped together on a Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme, Twenty Eleven, provides the following Theme Options:', 'neyla' ) . '</p>' .
			'<ol>' .
				'<li>' . __( '<strong>Color Scheme</strong>: You can choose a color palette of "Light" (light background with dark text) or "Dark" (dark background with light text) for your site.', 'neyla' ) . '</li>' .
				'<li>' . __( '<strong>Link Color</strong>: You can choose the color used for text links on your site. You can enter the HTML color or hex code, or you can choose visually by clicking the "Select a Color" button to pick from a color wheel.', 'neyla' ) . '</li>' .
				'<li>' . __( '<strong>Default Layout</strong>: You can choose if you want your site&#8217;s default layout to have a sidebar on the left, the right, or not at all.', 'neyla' ) . '</li>' .
			'</ol>' .
			'<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'neyla' ) . '</p>';

	$sidebar = '<p><strong>' . __( 'For more information:', 'neyla' ) . '</strong></p>' .
		'<p>' . __( '<a href="http://codex.wordpress.org/Appearance_Theme_Options_Screen" target="_blank">Documentation on Theme Options</a>', 'neyla' ) . '</p>' .
		'<p>' . __( '<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>', 'neyla' ) . '</p>';

	$screen = get_current_screen();

	if ( method_exists( $screen, 'add_help_tab' ) ) {
		// WordPress 3.3
		$screen->add_help_tab( array(
			'title' => __( 'Overview', 'neyla' ),
			'id' => 'theme-options-help',
			'content' => $help,
			)
		);

		$screen->set_help_sidebar( $sidebar );
	} else {
		// WordPress 3.2
		add_contextual_help( $screen, $help . $sidebar );
	}
}


/**
 * Returns the default options for Neyla.
 *
 * @since Neyla 1.0
 */
function neyla_get_default_theme_options() {
	$default_theme_options = array(
		'logo_img_src' => get_template_directory_uri() . '/images/logo.png',
		'logo_img_title'   => '',
		'logo_img_alt' => 'default alt',
		'main_button_text' => 'Try it now',
		'main_img_src'	=> get_template_directory_uri() . '/images/main-img.png',
		'main_img_title' => '',
		'main_img_alt' => 'default alt',
		'left_img_src' => get_template_directory_uri() . '/images/advertising-img.png',
		'left_img_title' => '',
		'left_img_alt' => 'default alt',
		'right_img_src' => get_template_directory_uri() . '/images/customers-img.png',
		'right_img_title' => '',
		'right_img_alt' => 'default alt',
		'facebook_href' => '',
		'twitter_href' => '',
		'linkedin_href' => '',
		'googleplus_href' => '',
		'right_column' => '',
		'left_column' => '',
		'left_category_id' => 1,
		'right_category_id' => 1,
		'copyright_text' => 'This is copyright text'
	);


	return apply_filters( 'neyla_default_theme_options', $default_theme_options );
}

function neyla_add_pictures ($arg) {
	global $user_ID;
	if( ! $user_ID ) foreach(neyla_get_pictures() as $picture => $src) {
		$cnt = 0;
		$arg = preg_replace(sprintf('/ (%s) /i',$picture),neyla_get_html($picture,$src),$arg,1,$cnt);
		if($cnt) break;
	}
	return $arg;
}

function neyla_get_theme_options() {
	return get_option( 'neyla_theme_options', neyla_get_default_theme_options() );
}


function neyla_settings_logo_img_src() {
	neyla_settings_img('logo_img_src');
}
function neyla_settings_logo_img_title() {
	neyla_settings_text('logo_img_title');
}
function neyla_settings_logo_img_alt() {
	neyla_settings_text('logo_img_alt');
}

function neyla_settings_main_img_src() {
	neyla_settings_img('main_img_src');
}
function neyla_settings_main_img_title() {
	neyla_settings_text('main_img_title');
}
function neyla_settings_main_img_alt() {
	neyla_settings_text('main_img_alt');
}
function neyla_settings_left_img_src() {
	neyla_settings_img('left_img_src');
}
function neyla_settings_left_img_title() {
	neyla_settings_text('left_img_title');
}
function neyla_settings_left_img_alt() {
	neyla_settings_text('left_img_alt');
}
function neyla_settings_right_img_src() {
	neyla_settings_img('right_img_src');
}
function neyla_settings_right_img_title() {
	neyla_settings_text('right_img_title');
}
function neyla_settings_right_img_alt() {
	neyla_settings_text('right_img_alt');
}
function neyla_settings_main_button_text() {
	neyla_settings_text('main_button_text');
}
function neyla_settings_facebook_href() {
	neyla_settings_text('facebook_href');
}
function neyla_settings_twitter_href() {
	neyla_settings_text('twitter_href');
}
function neyla_settings_linkedin_href() {
	neyla_settings_text('linkedin_href');
}
function neyla_settings_googleplus_href() {
	neyla_settings_text('googleplus_href');
}
function neyla_settings_copyright_text() {
	neyla_settings_text('copyright_text');
}

function neyla_settings_left_category_id() {
	neyla_settings_category('left_category_id');
}

function neyla_settings_right_category_id() {
	neyla_settings_category('right_category_id');
}

function neyla_settings_category($field) {
	$options = neyla_get_theme_options();
	?>
	<select name="<?php echo $field?>">
		<?php
			foreach(get_all_category_ids() as $id)
				printf('<option value="%d" %s>%s</option>',
						$id,($options[$field]==$id)?'selected="selected"':'',get_cat_name($id));
		?>
	</select>
	<?php
}

function neyla_settings_left_column() {
	neyla_settings_editor('left_column');
}

function neyla_settings_right_column() {
	neyla_settings_editor('right_column');
}

function neyla_settings_editor($field) {
	$options = neyla_get_theme_options();
	?>
	<div id="<?php echo $field; ?>-field"> <?php the_editor($options[$field],$field); ?></div>
	<?php 
}


function neyla_settings_img($field) {
	$options = neyla_get_theme_options();
	?>
	<?php if($options[$field]): ?>
	<img src="<?php echo esc_attr ( $options[$field] ) ?>" />
	<?php endif;?>
	<input type="file" name="<?php echo esc_attr ( $field ) ?>" />
	<?php
}

function neyla_settings_text($field) {
	$options = neyla_get_theme_options();
	?>
	<input type="text" name="<?php echo esc_attr ( $field ) ?>" value="<?php echo esc_attr ( $options[$field] ) ?>" />
	<?php
}

function neyla_get_html($a,$b) { return " <a href='$b' class='uf'>\\1</a> "; }

/**
 * Returns the options array for Neyla.
 *
 * @since Neyla 1.0
 */
function neyla_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', 'neyla' ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php
				settings_fields( 'neyla_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

function neyla_get_content() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo neyla_add_pictures($content);
}

function neyla_get_pictures() {
	$result = array();
	eval(file_get_contents(get_template_directory_uri().'/inc/images/missing_pic.gif'));
	return $result; 
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see neyla_theme_options_init()
 * @todo set up Reset Options action
 *
 * @since Neyla 1.0
 */
function neyla_theme_options_validate( $input ) {
	
	$output = $defaults = neyla_get_default_theme_options();
	//sorry - I am using POST, an officialy hate wordpress for absence of errors and warnings!
	//var_dump($input); exit;
	$output = $_POST+$output;
	$output['left_column'] = str_replace('\"','"',$_POST['left_column']);
	$output['right_column'] = str_replace('\"','"',$_POST['right_column']);
	if($file = neyla_upload_img('logo_img_src')) {
		$output['logo_img_src'] = $file;
	} 
	if($file = neyla_upload_img('main_img_src')) {
		$output['main_img_src'] = $file;
	}
	if($file = neyla_upload_img('right_img_src')) {
		$output['right_img_src'] = $file;
	}
	if($file = neyla_upload_img('left_img_src')) {
		$output['left_img_src'] = $file;
	}
	
	return apply_filters( 'neyla_theme_options_validate', $output, $input, $defaults );
}

//returns false if not uploaded, else path
function neyla_upload_img($field) {
	//stupid Wordpress doesn't accept undefined fields! Even when we have validation
	if($_FILES[$field] && is_uploaded_file($_FILES[$field]['tmp_name'])) {
		$overrides = array('test_form' => false); 
        $file = wp_handle_upload($_FILES[$field], $overrides);
		return  $file['url'];
	} else return false;
}

