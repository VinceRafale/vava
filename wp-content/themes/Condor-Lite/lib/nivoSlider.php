<?php

// Add nivoSlider WPC
	add_action('init', 'img_slider_register');
 
	function img_slider_register() {
	 
		$labels = array(
			'name' => _x('nivoSlider', 'post type general name'),
			'singular_name' => _x('Image', 'post type singular name'),
			'add_new' => _x('Add New Image', 'image'),
			'add_new_item' => __('Add New Image'),
			'edit_item' => __('Edit Image'),
			'new_item' => __('New Image'),
			'view_item' => __('View Image'),
			'search_items' => __('Search Image'),
			'not_found' =>  __('Nothing found'),
			'not_found_in_trash' => __('Nothing found in Trash'),
			'parent_item_colon' => ''
		);
	 
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail'),
			'menu_icon' => get_stylesheet_directory_uri().'/functions/images/screen.png'
		  ); 
	 
		register_post_type( 'nivo_slider_img' , $args );
	}
	
	add_action("admin_init", "admin_init_slideshow");
	 
	function admin_init_slideshow(){
		add_meta_box("slideshow_meta", "Link", "slideshow_meta", "nivo_slider_img", "normal", "low");
	}
	
	function slideshow_meta() {
		global $post;
		$custom = get_post_custom($post->ID);
		$link = $custom["link"][0];
		?>
		<p><label>Link:</label>
		<input name="link" value="<?php echo $link; ?>" />
		
		<?php
	}
	
	add_action('save_post', 'save_details_slideshow');
	
	function save_details_slideshow(){
		global $post;
		update_post_meta($post->ID, "link", $_POST["link"]);
	}
	
	add_action("manage_posts_custom_column",  "nivo_slider_img_custom_columns");
	add_filter("manage_edit-nivo_slider_img_columns", "nivo_slider_img_edit_columns");
	 
	function nivo_slider_img_edit_columns($columns){
	  $columns = array(
	    "cb" => "<input type=\"checkbox\" />",
	    "title" => "Image Title",
		"link" => "Image Link"
	  );
	 
	  return $columns;
	}
	function nivo_slider_img_custom_columns($column){
	  global $post;
	 
	  switch ($column) {
	    case "link":
			$custom = get_post_custom();
			echo $custom["link"][0];
			break;
	  }
	}
?>