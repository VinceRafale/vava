<?php
/*
Plugin Name: Custom Post Templates
Plugin URI: http://wordpress.org/extend/plugins/custom-post-template/
Description: Provides a drop-down to select different templates for posts from the post edit screen. The templates are defined similarly to page templates, and will replace single.php for the specified post.
Author: Simon Wheatley
Version: 1.3
Author URI: http://simonwheatley.co.uk/wordpress/
*/

/*  Copyright 2008 Simon Wheatley

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

/*Begin added by prashant fix required issue */
function wp_link_pages( $args = '' ) {
	        $defaults = array(
	                'before'           => '<p>' . __( 'Pages:' ),
	                'after'            => '</p>',
	                'link_before'      => '',
	                'link_after'       => '',
	                'next_or_number'   => 'number',
	                'separator'        => ' ',
	                'nextpagelink'     => __( 'Next page' ),
	                'previouspagelink' => __( 'Previous page' ),
	                'pagelink'         => '%',
	                'echo'             => 1
	        );
	
	        $r = wp_parse_args( $args, $defaults );
	        $r = apply_filters( 'wp_link_pages_args', $r );
	        extract( $r, EXTR_SKIP );
	
	        global $page, $numpages, $multipage, $more;
	
	        $output = '';
	        if ( $multipage ) {
	                if ( 'number' == $next_or_number ) {
	                        $output .= $before;
	                        for ( $i = 1; $i <= $numpages; $i++ ) {
	                                $link = $link_before . str_replace( '%', $i, $pagelink ) . $link_after;
	                                if ( $i != $page || ! $more && 1 == $page )
	                                        $link = _wp_link_page( $i ) . $link . '</a>';
	                                $link = apply_filters( 'wp_link_pages_link', $link, $i );
	                                $output .= $separator . $link;
	                        }
	                        $output .= $after;
	                } elseif ( $more ) {
	                        $output .= $before;
	                        $i = $page - 1;
	                        if ( $i ) {
	                                $link = _wp_link_page( $i ) . $link_before . $previouspagelink . $link_after . '</a>';
	                                $link = apply_filters( 'wp_link_pages_link', $link, $i );
	                                $output .= $separator . $link;
	                        }
	                        $i = $page + 1;
	                        if ( $i <= $numpages ) {
	                                $link = _wp_link_page( $i ) . $link_before . $nextpagelink . $link_after . '</a>';
	                                $link = apply_filters( 'wp_link_pages_link', $link, $i );
	                                $output .= $separator . $link;
	                        }
	                        $output .= $after;
	                }
	        }
	
	        $output = apply_filters( 'wp_link_pages', $output, $args );
	
	        if ( $echo )
	                echo $output;
	
	        return $output;
	}
	
		function post_class( $class = '', $post_id = null ) {
	        // Separates classes with a single space, collates classes for post DIV
	        echo 'class="' . join( ' ', get_post_class( $class, $post_id ) ) . '"';
	}
function post_class( $class = '', $post_id = null ) {
	        // Separates classes with a single space, collates classes for post DIV
	        echo 'class="' . join( ' ', get_post_class( $class, $post_id ) ) . '"';
	}
	/*End by prashant fix required issue */
class CustomPostTemplates_Plugin
{
	/**
	 * Plugin name
	 * @var string
	 **/
	var $plugin_name;
	
	/**
	 * Plugin 'view' directory
	 * @var string Directory
	 **/
	var $plugin_base;
	
	
	/**
	 * Register your plugin with a name and base directory.  This <strong>must</strong> be called once.
	 *
	 * @param string $name Name of your plugin.  Is used to determine the plugin locale domain
	 * @param string $base Directory containing the plugin's 'view' files.
	 * @return void
	 **/
	
	function register_plugin ($name, $base)
	{
		$this->plugin_base = rtrim (dirname ($base), '/');
		$this->plugin_name = $name;

		$this->add_action ('init', 'load_locale');
	}
	
	function load_locale ()
	{
		// Here we manually fudge the plugin locale as WP doesnt allow many options
		$locale = get_locale ();
		if ( empty($locale) )
			$locale = 'en_US';

		$mofile = dirname (__FILE__)."/locale/$locale.mo";
		load_textdomain ($this->plugin_name, $mofile);
	}
	
	
	/**
	 * Register a WordPress action and map it back to the calling object
	 *
	 * @param string $action Name of the action
	 * @param string $function Function name (optional)
	 * @param int $priority WordPress priority (optional)
	 * @param int $accepted_args Number of arguments the function accepts (optional)
	 * @return void
	 **/
	
	function add_action ($action, $function = '', $priority = 10, $accepted_args = 1)
	{
		add_action ($action, array (&$this, $function == '' ? $action : $function), $priority, $accepted_args);
	}


	/**
	 * Register a WordPress filter and map it back to the calling object
	 *
	 * @param string $action Name of the action
	 * @param string $function Function name (optional)
	 * @param int $priority WordPress priority (optional)
	 * @param int $accepted_args Number of arguments the function accepts (optional)
	 * @return void
	 **/
	
	function add_filter ($filter, $function = '', $priority = 10, $accepted_args = 1)
	{
		add_filter ($filter, array (&$this, $function == '' ? $filter : $function), $priority, $accepted_args);
	}

	
	/**
	 * Register a WordPress meta box
	 *
	 * @param string $id ID for the box, also used as a function name if none is given
	 * @param string $title Title for the box
	 * @param int $page WordPress priority (optional)
	 * @param string $function Function name (optional)
	 * @param string $context e.g. 'advanced' or 'core' (optional)
	 * @param int $priority Priority, rough effect on the ordering (optional)
	 * @return void
	 **/
	
	function add_meta_box($id, $title, $function = '', $page, $context = 'advanced', $priority = 'default')
	{
		require_once( ABSPATH . 'wp-admin/includes/template.php' );
		add_meta_box( $id, $title, array( &$this, $function == '' ? $id : $function ), $page, $context, $priority );
	}

	/**
	 * Special activation function that takes into account the plugin directory
	 *
	 * @param string $pluginfile The plugin file location (i.e. __FILE__)
	 * @param string $function Optional function name, or default to 'activate'
	 * @return void
	 **/
	
	function register_activation ($pluginfile, $function = '')
	{
		add_action ('activate_'.basename (dirname ($pluginfile)).'/'.basename ($pluginfile), array (&$this, $function == '' ? 'activate' : $function));
	}
	
	
	/**
	 * Special deactivation function that takes into account the plugin directory
	 *
	 * @param string $pluginfile The plugin file location (i.e. __FILE__)
	 * @param string $function Optional function name, or default to 'deactivate'
	 * @return void
	 **/
	
	function register_deactivation ($pluginfile, $function = '')
	{
		add_action ('deactivate_'.basename (dirname ($pluginfile)).'/'.basename ($pluginfile), array (&$this, $function == '' ? 'deactivate' : $function));
	}
	
	
	/**
	 * Renders an admin section of display code
	 *
	 * @param string $ug_name Name of the admin file (without extension)
	 * @param string $array Array of variable name=>value that is available to the display code (optional)
	 * @return void
	 **/
	
	function render_admin ($ug_name, $ug_vars = array ())
	{
		global $plugin_base;
		foreach ($ug_vars AS $key => $val)
			$$key = $val;
?>
		<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>
		<label class="hidden" for="page_template"><?php _e( 'Post Template', 'custom-post-templates' ); ?></label>
		<?php if ( $templates ) : ?>

			<input type="hidden" name="custom_post_template_present" value="1" />
			<select name="custom_post_template" id="custom_post_template">
				<option 
					value='default'
					<?php
						if ( ! $custom_template ) {
							echo "selected='selected'";
						}
					?>><?php _e( 'Default Template' ); ?></option>
				<?php foreach( $templates AS $name => $filename ) { ?>
					<option 
						value='<?php echo $filename; ?>'
						<?php
							if ( $custom_template == $filename ) {
								echo "selected='selected'";
							}
						?>><?php echo $name; ?></option>
				<?php } ?>
			</select>

			<p><?php printf( __( 'Select a template for this post using the drop down above.', 'chimera' ), '' ); ?></p>

		<?php else : ?>

			<p><?php printf( __( 'This theme has no custom post templates available.', 'chimera' ), '' ); ?></p>

		<?php endif;
	}


	/**
	 * Renders a section of user display code.  The code is first checked for in the current theme display directory
	 * before defaulting to the plugin
	 *
	 * @param string $ug_name Name of the admin file (without extension)
	 * @param string $array Array of variable name=>value that is available to the display code (optional)
	 * @return void
	 **/
	
	function render ($ug_name, $ug_vars = array ())
	{
		foreach ($ug_vars AS $key => $val)
			$$key = $val;

		if (file_exists (TEMPLATEPATH."/view/{$this->plugin_name}/$ug_name.php"))
			include (TEMPLATEPATH."/view/{$this->plugin_name}/$ug_name.php");
		else if (file_exists ("{$this->plugin_base}/view/{$this->plugin_name}/$ug_name.php"))
			include ("{$this->plugin_base}/view/{$this->plugin_name}/$ug_name.php");
		else
			echo "<p>Rendering of template $ug_name.php failed</p>";
	}
	
	
	/**
	 * Renders a section of user display code.  The code is first checked for in the current theme display directory
	 * before defaulting to the plugin
	 *
	 * @param string $ug_name Name of the admin file (without extension)
	 * @param string $array Array of variable name=>value that is available to the display code (optional)
	 * @return void
	 **/

	function capture ($ug_name, $ug_vars = array ())
	{
		ob_start ();
		$this->render ($ug_name, $ug_vars);
		$output = ob_get_contents ();
		ob_end_clean ();
		return $output;
	}
	

	/**
	 * Captures an admin section of display code
	 *
	 * @param string $ug_name Name of the admin file (without extension)
	 * @param string $array Array of variable name=>value that is available to the display code (optional)
	 * @return string Captured code
	 **/

	function capture_admin ($ug_name, $ug_vars = array ())
	{
		ob_start ();
		$this->render_admin ($ug_name, $ug_vars);
		$output = ob_get_contents ();
		ob_end_clean ();
		return $output;
	}
	
	
	/**
	 * Display a standard error message (using CSS ID 'message' and classes 'fade' and 'error)
	 *
	 * @param string $message Message to display
	 * @return void
	 **/
	
	function render_error ($message)
	{
	?>
<div class="fade error" id="message">
 <p><?php echo $message ?></p>
</div>
<?php
	}
	
	
	/**
	 * Display a standard notice (using CSS ID 'message' and class 'updated').
	 * Note that the notice can be made to automatically disappear, and can be removed
	 * by clicking on it.
	 *
	 * @param string $message Message to display
	 * @param int $timeout Number of seconds to automatically remove the message (optional)
	 * @return void
	 **/
	
	function render_message ($message, $timeout = 0)
	{
		?>
<div class="updated" id="message" onclick="this.parentNode.removeChild (this)">
 <p><?php echo $message ?></p>
</div>
	<?php	
	}


	/**
	 * Get the plugin's base directory
	 *
	 * @return string Base directory
	 **/
	
	function dir ()
	{
		return $this->plugin_base;
	}
	
	
	/**
	 * Get a URL to the plugin.  Useful for specifying JS and CSS files
	 *
	 * For example, <img src="<?php echo $this->url () ?>/myimage.png"/>
	 *
	 * @return string URL
	 **/
	
	function url ($url = '')
	{
		if ($url)
			return str_replace ('\\', urlencode ('\\'), str_replace ('&amp;amp', '&amp;', str_replace ('&', '&amp;', $url)));
		else
		{
			$root = ABSPATH;
			if (defined ('WP_PLUGIN_DIR'))
				$root = WP_PLUGIN_DIR;
				
			$url = substr ($this->plugin_base, strlen ($this->realpath ($root)));
			if (DIRECTORY_SEPARATOR != '/')
				$url = str_replace (DIRECTORY_SEPARATOR, '/', $url);

			if (defined ('WP_PLUGIN_URL'))
				$url = WP_PLUGIN_URL.'/'.ltrim ($url, '/');
			else
				$url = get_bloginfo ('wpurl').'/'.ltrim ($url, '/');
		
			// Do an SSL check - only works on Apache
			global $is_IIS;
			if (isset ($_SERVER['HTTPS']) && !$is_IIS)
				$url = str_replace ('http://', 'https://', $url);
		}
		return $url;
	}
	
	/**
	 * Performs a version update check using an RSS feed.  The function ensures that the feed is only
	 * hit once every given number of days, and the data is cached using the WordPress Magpie library
	 *
	 * @param string $url URL of the RSS feed
	 * @param int $days Number of days before next check
	 * @return string Text to display
	 **/
	
	function version_update ($url, $days = 7)
	{
		if (!function_exists ('fetch_rss'))
		{
			if (!file_exists (ABSPATH.'wp-includes/rss.php'))
				return '';
			include (ABSPATH.'wp-includes/rss.php');
		}

		$now = time ();
		
		$checked = get_option ('plugin_urbangiraffe_rss');
	
		// Use built-in Magpie caching
		if (function_exists ('fetch_rss') && (!isset ($checked[$this->plugin_name]) || $now > $checked[$this->plugin_name] + ($days * 24 * 60 * 60)))
		{
			$rss = fetch_rss ($url);
			if (count ($rss->items) > 0)
			{
				foreach ($rss->items AS $pos => $item)
				{
					if (isset ($checked[$this->plugin_name]) && strtotime ($item['pubdate']) < $checked[$this->plugin_name])
						unset ($rss->items[$pos]);
				}
			}
		
			$checked[$this->plugin_name] = $now;
			update_option ('plugin_urbangiraffe_rss', $checked);
			return $rss;
		}
	}
	
	
	/**
	 * Version of realpath that will work on systems without realpath
	 *
	 * @param string $path The path to canonicalize
	 * @return string Canonicalized path
	 **/
	
	function realpath ($path)
	{
		if (function_exists ('realpath'))
			return realpath ($path);
		else if (DIRECTORY_SEPARATOR == '/')
		{
			$path = preg_replace ('/^~/', $_SERVER['DOCUMENT_ROOT'], $path);

	    // canonicalize
	    $path = explode (DIRECTORY_SEPARATOR, $path);
	    $newpath = array ();
	    for ($i = 0; $i < sizeof ($path); $i++)
			{
				if ($path[$i] === '' || $path[$i] === '.')
					continue;
					
				if ($path[$i] === '..')
				{
					array_pop ($newpath);
					continue;
				}
				
				array_push ($newpath, $path[$i]);
	    }
	
	    $finalpath = DIRECTORY_SEPARATOR.implode (DIRECTORY_SEPARATOR, $newpath);
      return $finalpath;
		}
		
		return $path;
	}
	
	
	function checked ($item, $field = '')
	{
		if ($field && is_array ($item))
		{
			if (isset ($item[$field]) && $item[$field])
				echo ' checked="checked"';
		}
		else if (!empty ($item))
			echo ' checked="checked"';
	}
	
	function select ($items, $default = '')
	{
		if (count ($items) > 0)
		{
			foreach ($items AS $key => $value)
			{
				if (is_array ($value))
				{
					echo '<optgroup label="'.$key.'">';
					foreach ($value AS $sub => $subvalue)
						echo '<option value="'.$sub.'"'.($sub == $default ? ' selected="selected"' : '').'>'.$subvalue.'</option>';
					echo '</optgroup>';
				}
				else
					echo '<option value="'.$key.'"'.($key == $default ? ' selected="selected"' : '').'>'.$value.'</option>';
			}
		}
	}
}

if (!function_exists ('pr'))
{
	function pr ($thing)
	{
		echo '<pre>';
		print_r ($thing);
		echo '</pre>';
	}
}

if (!class_exists ('Widget_SU'))
{
	class Widget_SU
	{
		function Widget_SU ($name, $max = 1, $id = '', $args = '')
		{
			$this->name        = $name;
			$this->id          = $id;
			$this->widget_max  = $max;
			$this->args        = $args;
			
			if ($this->id == '')
				$this->id = strtolower (preg_replace ('/[^A-Za-z]/', '-', $this->name));

			$this->widget_available = 1;
			if ($this->widget_max > 1)
			{
				$this->widget_available = get_option ('widget_available_'.$this->id ());
				if ($this->widget_available === false)
					$this->widget_available = 1;
			}
			
			add_action ('init', array (&$this, 'initialize'));
		}
		
		function initialize ()
		{
			// Compatability functions for WP 2.1
			if (!function_exists ('wp_register_sidebar_widget'))
			{
				function wp_register_sidebar_widget ($id, $name, $output_callback, $classname = '')
				{
					wp_register_sidebar_widget($name, $output_callback, $classname);
				}
			}

			if (!function_exists ('wp_register_widget_control'))
			{
				function wp_register_widget_control($name, $control_callback, $width = 300, $height = 200)
				{
					wp_register_widget_control($name, $control_callback, $width, $height);
				}
			}
			
			if (function_exists ('wp_register_sidebar_widget'))
			{
				if ($this->widget_max > 1)
				{
					add_action ('sidebar_admin_setup', array (&$this, 'setup_save'));
					add_action ('sidebar_admin_page', array (&$this, 'setup_display'));
				}

				$this->load_widgets ();
			}
		}
		
		function load_widgets ()
		{
			for ($pos = 1; $pos <= $this->widget_max; $pos++)
			{
				wp_register_sidebar_widget ($this->id ($pos), $this->name ($pos), $pos <= $this->widget_available ? array (&$this, 'show_display') : '', $this->args (), $pos);
			
				if ($this->has_config ())
					wp_register_widget_control ($this->id ($pos), $this->name ($pos), $pos <= $this->widget_available ? array (&$this, 'show_config') : '', $this->args (), $pos);
			}
		}
		
		function args ()
		{
			if ($this->args)
				return $args;
			return array ('classname' => '');
		}
		
		function name ($pos)
		{
			if ($this->widget_available > 1)
				return $this->name.' ('.$pos.')';
			return $this->name;
		}
		
		function id ($pos = 0)
		{
			if ($pos == 0)
				return $this->id;
			return $this->id.'-'.$pos;
		}
		
		function show_display ($args, $number = 1)
		{
			$config = get_option ('widget_config_'.$this->id ($number));
			if ($config === false)
				$config = array ();
				
			$this->load ($config);
			$this->display ($args);
		}
		
		function show_config ($position)
		{
			if (isset ($_POST['widget_config_save_'.$this->id ($position)]))
			{
				$data = $_POST[$this->id ()];
				if (count ($data) > 0)
				{
					$newdata = array ();
					foreach ($data AS $item => $values)
						$newdata[$item] = $values[$position];
					$data = $newdata;
				}
				
				update_option ('widget_config_'.$this->id ($position), $this->save ($data));
			}

			$options = get_option ('widget_config_'.$this->id ($position));
			if ($options === false)
				$options = array ();
				
			$this->config ($options, $position);
			echo '<input type="hidden" name="widget_config_save_'.$this->id ($position).'" value="1" />';
		}
		
		function has_config () { return false; }
		function save ($data)
		{
			return array ();
		}
		
		function setup_save ()
		{
			if (isset ($_POST['widget_setup_save_'.$this->id ()]))
			{
				$this->widget_available = intval ($_POST['widget_setup_count_'.$this->id ()]);
				if ($this->widget_available < 1)
					$this->widget_available = 1;
				else if ($this->widget_available > $this->widget_max)
					$this->widget_available = $this->widget_max;

				update_option ('widget_available_'.$this->id (), $this->widget_available);
				
				$this->load_widgets ();
			}
		}
		
		function config_name ($field, $pos)
		{
			return $this->id ().'['.$field.']['.$pos.']';
		}
		
		function setup_display ()
		{
			?>
			<div class="wrap">
				<form method="post">
					<h2><?php echo $this->name ?></h2>
					<p style="line-height: 30px;"><?php _e('How many widgets would you like?', $this->id); ?>
						<select name="widget_setup_count_<?php echo $this->id () ?>" value="<?php echo $options; ?>">
							<?php for ( $i = 1; $i <= $this->widget_max; ++$i ) : ?>
							 <option value="<?php echo $i ?>"<?php if ($this->widget_available == $i) echo ' selected="selected"' ?>><?php echo $i ?></option>
							<?php endfor; ?>
						</select>
						<span class="submit">
							<input type="submit" name="widget_setup_save_<?php echo $this->id () ?>" value="<?php echo esc_attr(__('Save', $this->id)); ?>" />
						</span>
					</p>
				</form>
			</div>
			<?php
		}
	}
}
function is_post_template($template = '') {
	if (!is_single()) {
		return false;
	}

	global $wp_query;

	$post = $wp_query->get_queried_object();
	$post_template = get_post_meta( $post->ID, 'custom_post_template', true );

	// We have no argument passed so just see if a page_template has been specified
	if ( empty( $template ) ) {
		if (!empty( $post_template ) ) {
			return true;
		}
	} elseif ( $template == $post_template) {
		return true;
	}

	return false;
}


/**
 *
 * @package default
 * @author Simon Wheatley
 **/
class CustomPostTemplates extends CustomPostTemplates_Plugin
{
	private $tpl_meta_key;
	private $post_ID;
	
	function __construct()
	{
		// Init properties
		$this->tpl_meta_key = 'custom_post_template';
		// Init hooks and all that
		$this->register_plugin ( 'custom-post-templates', __FILE__ );
		$this->add_meta_box( 'select_post_template', __( 'Post Template', 'custom-post-templates' ), 'select_post_template', 'post', 'side', 'default' );
		$this->add_action( 'save_post' );
		$this->add_filter( 'single_template', 'filter_single_template' );
		$this->add_filter( 'body_class' );
	}
	
	/*
	 *  FILTERS & ACTIONS
	 * *******************
	 */
	
	/**
	 * Hooks the WP body_class function to add a class to single posts using a post template.
	 *
	 * @param array $classes An array of strings 
	 * @return array An array of strings
	 * @author Simon Wheatley
	 **/
	public function body_class( $classes ) {
		if ( ! is_post_template() )
			return $classes;
		global $wp_query;
		// We distrust the global $post object, as it can be substituted in any
		// number of different ways.
		$post = $wp_query->get_queried_object();
		$post_template = get_post_meta( $post->ID, 'custom_post_template', true );
		$classes[] = 'post-template';
		$classes[] = 'post-template-' . str_replace( '.php', '-php', $post_template );
		return $classes;
	}

	public function select_post_template( $post )
	{
		$this->post_ID = $post->ID;

		$template_vars = array();
		$template_vars[ 'templates' ] = $this->get_post_templates();
		$template_vars[ 'custom_template' ] = $this->get_custom_post_template();

		// Render the template
		$this->render_admin ( 'select_post_template', $template_vars );
	}

	public function save_post( $post_ID )
	{
		$action_needed = (bool) @ $_POST[ 'custom_post_template_present' ];
		if ( ! $action_needed ) return;

		$this->post_ID = $post_ID;

		$template = (string) @ $_POST[ 'custom_post_template' ];
		$this->set_custom_post_template( $template );
	}

	public function filter_single_template( $template ) 
	{
		global $wp_query;

		$this->post_ID = $wp_query->post->ID;

		// No template? Nothing we can do.
		$template_file = $this->get_custom_post_template();

		if ( ! $template_file )
			return $template;

		// If there's a tpl in a (child theme or theme with no child)
		if ( file_exists( trailingslashit( STYLESHEETPATH ) . $template_file ) )
			return STYLESHEETPATH . DIRECTORY_SEPARATOR . $template_file;
		// If there's a tpl in the parent of the current child theme
		else if ( file_exists( TEMPLATEPATH . DIRECTORY_SEPARATOR . $template_file ) )
			return TEMPLATEPATH . DIRECTORY_SEPARATOR . $template_file;

		return $template;
	}

	/*
	 *  UTILITY METHODS
	 * *****************
	 */
	
	protected function set_custom_post_template( $template )
	{
		delete_post_meta( $this->post_ID, $this->tpl_meta_key );
		if ( ! $template || $template == 'default' ) return;

		add_post_meta( $this->post_ID, $this->tpl_meta_key, $template );
	}
	
	protected function get_custom_post_template()
	{
		$custom_template = get_post_meta( $this->post_ID, $this->tpl_meta_key, true );
		return $custom_template;
	}

	protected function get_post_templates() 
	{
		$themes = get_themes();
		$theme = get_current_theme();
		$templates = $themes[ $theme ][ 'Template Files' ];

		$post_templates = array();

		if ( is_array( $templates ) ) {
			$base = array( trailingslashit(get_template_directory()), trailingslashit(get_stylesheet_directory()) );

			foreach ( $templates as $template ) {
				$basename = str_replace($base, '', $template);

				// don't allow template files in subdirectories
				if ( false !== strpos($basename, '/') )
					continue;

				// Get the file data and collapse it into a single string
				$template_data = implode( '', file( $template ));

				$name = '';
				if ( preg_match( '|Template Name Posts:(.*)$|mi', $template_data, $name ) )
					$name = _cleanup_header_comment( $name[1] );

				if ( !empty( $name ) )
					$post_templates[trim( $name )] = $basename;
			}
		}

		return $post_templates;
	}
}

/**
 * Instantiate the plugin
 *
 * @global
 **/

$CustomPostTemplates = new CustomPostTemplates();

?>