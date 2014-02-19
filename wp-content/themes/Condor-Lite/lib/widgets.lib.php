<?php

/**
*	Begin Recent Posts Custom Widgets
**/

class WPCrown_Custom_Recent_Posts extends WP_Widget {
	function WPCrown_Custom_Recent_Posts()
	  {
	    $widget_ops = array('classname' => 'recent_posts_Widget', 'description' => 'WPCrown Recent Posts Widget' );
	    $this->WP_Widget('recent_posts_Widget', 'WPCrown Recent Posts Widget', $widget_ops);
	  }
	 
	  function form($instance)
	  {
	    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ));
	    $title = $instance['title'];
	?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
	<?php
	  }
	 
	  function update($new_instance, $old_instance)
	  {
	    $instance = $old_instance;
	    $instance['title'] = $new_instance['title'];
	    return $instance;
	  }
	 
	  function widget($args, $instance)
	  {
	    extract($args, EXTR_SKIP);
	 
	    echo $before_widget;
	    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	 
	    if (!empty($title))
	      echo $before_title . $title . $after_title;  
		
	    // popular_posts Widget Content
		echo '<ul>';
		
		$pc = new WP_Query('posts_per_page=5'); 
		while ($pc->have_posts()) : $pc->the_post();
		
			echo '<li><div class="header"><a href="';
			the_permalink();
			echo '">';
			the_title();
			echo '</a></div><p>';
			the_time('F jS, Y');
			echo '</p></li>';
			
		
		endwhile;
		
		echo '</ul>';
		
	    echo $after_widget;
	  }
	 
	}

register_widget('WPCrown_Custom_Recent_Posts');

/**
*	End Recent Posts Custom Widgets
**/


/**
*	Begin Category Posts Custom Widgets
**/

class WPCrown_Custom_Cat_Posts extends WP_Widget {
	function WPCrown_Custom_Cat_Posts() {
		$widget_ops = array('classname' => 'WPCrown_Custom_Cat_Posts', 'description' => 'Display category\'s post' );
		$this->WP_Widget('WPCrown_Custom_Cat_Posts', 'WPCrown Custom Category Posts', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$cat_id = empty($instance['cat_id']) ? 0 : $instance['cat_id'];
		$items = empty($instance['items']) ? 0 : $instance['items'];
		
		if(empty($items))
		{
			$items = 5;
		}
		
		if(!empty($cat_id))
		{
			wpcrown_cat_posts($cat_id, $items);
		}

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['cat_id'] = strip_tags($new_instance['cat_id']);
		$instance['items'] = strip_tags($new_instance['items']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'cat_id' => '', 'items' => '') );
		$cat_id = strip_tags($instance['cat_id']);
		$items = strip_tags($instance['items']);
		
		$categories = get_categories('hide_empty=0&orderby=name');
		$wp_cats = array(
			0		=> "Choose a category"
		);
		foreach ($categories as $category_list ) {
			$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
		}

?>
			
			<p><label for="<?php echo $this->get_field_id('cat_id'); ?>">Category: 
				<select  id="<?php echo $this->get_field_id('cat_id'); ?>" name="<?php echo $this->get_field_name('cat_id'); ?>">
				<?php
					foreach($wp_cats as $wp_cat_id => $wp_cat)
					{
				?>
						<option value="<?php echo $wp_cat_id; ?>" <?php if(esc_attr($cat_id) == $wp_cat_id) { echo 'selected="selected"'; } ?>><?php echo $wp_cat; ?></option>
				<?php
					}
				?>
				</select>
			</label></p>
			
			<p><label for="<?php echo $this->get_field_id('items'); ?>">Items (default 5): <input class="widefat" id="<?php echo $this->get_field_id('items'); ?>" name="<?php echo $this->get_field_name('items'); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('WPCrown_Custom_Cat_Posts');

/**
*	End Category Posts Custom Widgets
**/


/**
*	Begin Popular Posts Custom Widgets
**/

class WPCrown_Custom_Popular_Posts extends WP_Widget {
	  function WPCrown_Custom_Popular_Posts()
	  {
	    $widget_ops = array('classname' => 'popular_posts_Widget', 'description' => 'WPC Popular Posts Widget' );
	    $this->WP_Widget('popular_posts_Widget', 'WPCrown Popular Posts Widget', $widget_ops);
	  }
	 
	  function form($instance)
	  {
	    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ));
	    $title = $instance['title'];
	?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
	<?php
	  }
	 
	  function update($new_instance, $old_instance)
	  {
	    $instance = $old_instance;
	    $instance['title'] = $new_instance['title'];
	    return $instance;
	  }
	 
	  function widget($args, $instance)
	  {
	    extract($args, EXTR_SKIP);
	 
	    echo $before_widget;
	    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	 
	    if (!empty($title))
	      echo $before_title . $title . $after_title;  
		
	    // popular_posts Widget Content
		echo '<ul>';
		
		$pc = new WP_Query('orderby=comment_count&posts_per_page=5'); 
		while ($pc->have_posts()) : $pc->the_post();
		
			echo '<li><div class="header"><a href="';
			the_permalink();
			echo '">';
			the_title();
			echo '</a></div><p>';
			comments_number('No Comments', 'One Comment', '% Comments');
			echo '</p></li>';
			
		
		endwhile;
		
		echo '</ul>';
		
	    echo $after_widget;
	  }
	 
	}
register_widget('WPCrown_Custom_Popular_Posts');

/**
*	End Popular Posts Custom Widgets
**/

class WPCrown_Custom_Twitter extends WP_Widget {
	function WPCrown_Custom_Twitter() {
		$widget_ops = array('classname' => 'WPCrown_Custom_Twitter', 'description' => 'Display your recent Twitter feed' );
		$this->WP_Widget('WPCrown_Custom_Twitter', 'WPCrown Custom Twitter', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$twitter_username = empty($instance['twitter_username']) ? ' ' : apply_filters('widget_title', $instance['twitter_username']);
		$title = $instance['title'];
		$items = empty($instance['items']) ? ' ' : apply_filters('widget_title', $instance['items']);
		
		if(!is_numeric($items))
		{
			$items = 5;
		}
		
		if(empty($title))
		{
			$title = 'Recent Tweets';
		}
		
		if(!empty($items) && !empty($twitter_username))
		{
			// Begin get user timeline
			include_once (TEMPLATEPATH . "/lib/twitter.lib.php");
			$obj_twitter = new Twitter($twitter_username); 
			$tweets = $obj_twitter->get($items);

			if(!empty($tweets))
			{
				echo '<span class="widget-title">'.$title.'</span><div class="hr-stripe full" style="margin-bottom: 20px;"></div>';
				echo '<ul class="twitter">';
				
				foreach($tweets as $tweet)
				{
					echo '<li><p>'.$tweet[0].'</p></li>';
				}
				
				echo '</ul>';
			}
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter_username'] = strip_tags($new_instance['twitter_username']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'twitter_username' => '', 'title' => '') );
		$items = strip_tags($instance['items']);
		$twitter_username = strip_tags($instance['twitter_username']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo $this->get_field_id('twitter_username'); ?>">Twitter Username: <input class="widefat" id="<?php echo $this->get_field_id('twitter_username'); ?>" name="<?php echo $this->get_field_name('twitter_username'); ?>" type="text" value="<?php echo esc_attr($twitter_username); ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('items'); ?>">Items (default 5): <input class="widefat" id="<?php echo $this->get_field_id('items'); ?>" name="<?php echo $this->get_field_name('items'); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('WPCrown_Custom_Twitter');

/**
*	End Twitter Feed Custom Widgets
**/

/**
*	Begin Social Media Widgets
**/
	class social_media_Widget extends WP_Widget
	{
	  function social_media_Widget()
	  {
	    $widget_ops = array('classname' => 'social_media_Widget', 'description' => 'WPCrown Social Media Widget' );
	    $this->WP_Widget('social_media_Widget', 'WPCrown Social Media Widget', $widget_ops);
	  }
	 
	  function form($instance)
	  {
	    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ), array( 'facebook' => '' ), array( 'facebook_text' => '' ), array( 'twitter' => '' ), array( 'twitter_text' => '' ), array( 'rss' => '' ), array( 'rss-text' => '' ), array( 'linkedin' => '' ), array( 'linkedin_text' => '' ), array( 'email' => '' ), array( 'email_text' => '' ) );
	    $title = $instance['title'];
		$facebook = $instance['facebook'];
		$facebook_text = $instance['facebook_text'];
		$twitter = $instance['twitter'];
		$twitter_text = $instance['twitter_text'];
		$rss = $instance['rss'];
		$rss_text = $instance['rss_text'];
		$email = $instance['email'];
		$email_text = $instance['email_text'];
		$linkedin = $instance['linkedin'];
		$linkedin_text = $instance['linkedin_text'];
	?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook URL: <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo attribute_escape($facebook); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('facebook_text'); ?>">Facebook Text: <input class="widefat" id="<?php echo $this->get_field_id('facebook_text'); ?>" name="<?php echo $this->get_field_name('facebook_text'); ?>" type="text" value="<?php echo attribute_escape($facebook_text); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter URL: <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo attribute_escape($twitter); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('twitter_text'); ?>">Twitter Text: <input class="widefat" id="<?php echo $this->get_field_id('twitter_text'); ?>" name="<?php echo $this->get_field_name('twitter_text'); ?>" type="text" value="<?php echo attribute_escape($twitter_text); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('rss'); ?>">RSS URL: <input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo attribute_escape($rss); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('rss_text'); ?>">RSS Text: <input class="widefat" id="<?php echo $this->get_field_id('rss_text'); ?>" name="<?php echo $this->get_field_name('rss_text'); ?>" type="text" value="<?php echo attribute_escape($rss_text); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('linkedin'); ?>">Linkedin URL: <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo attribute_escape($linkedin); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('linkedin_text'); ?>">Linkedin Text: <input class="widefat" id="<?php echo $this->get_field_id('linkedin_text'); ?>" name="<?php echo $this->get_field_name('linkedin_text'); ?>" type="text" value="<?php echo attribute_escape($linkedin_text); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('email'); ?>">Email Address: <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo attribute_escape($email); ?>" /></label></p>
	  
	  <p><label for="<?php echo $this->get_field_id('email_text'); ?>">Email Text: <input class="widefat" id="<?php echo $this->get_field_id('email_text'); ?>" name="<?php echo $this->get_field_name('email_text'); ?>" type="text" value="<?php echo attribute_escape($email_text); ?>" /></label></p>
	  
	<?php
	  }
	 
	  function update($new_instance, $old_instance)
	  {
	    $instance = $old_instance;
	    $instance['title'] = $new_instance['title'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['facebook_text'] = $new_instance['facebook_text'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['twitter_text'] = $new_instance['twitter_text'];
		$instance['rss'] = $new_instance['rss'];
		$instance['rss_text'] = $new_instance['rss_text'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['linkedin_text'] = $new_instance['linkedin_text'];
		$instance['email'] = $new_instance['email'];
		$instance['email_text'] = $new_instance['email_text'];
	    return $instance;
	  }
	 
	  function widget($args, $instance)
	  {
	    extract($args, EXTR_SKIP);
	 
	    echo $before_widget;
	    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$facebook = $instance['facebook'];
		$facebook_text = $instance['facebook_text'];
		$twitter = $instance['twitter'];
		$twitter_text = $instance['twitter_text'];
		$linkedin = $instance['linkedin'];
		$linkedin_text = $instance['linkedin_text'];
		$rss = $instance['rss'];
		$rss_text = $instance['rss_text'];
		$email = $instance['email'];
		$email_text = $instance['email_text'];
	 
	    if (!empty($title))
			echo '<div id="media_widget">';
			echo $before_title . $title . $after_title;
			echo '</div>';
			
			echo '<div id="media_widget_icons">';

		if (!empty($twitter)) :
			echo '<div class="social-icon"><a href="' . $twitter . '"><span class="sm_twitter">' . $twitter_text . '</span></a></div>';
		endif;	
			
		if (!empty($facebook)) :
			echo '<div class="social-icon"><a href="' . $facebook . '"><span class="sm_facebook">' . $facebook_text . '</span></a></div>';
		endif;	
		
		if (!empty($rss)) :
			echo '<div class="social-icon"><a href="' . $rss . '"><span class="sm_rss">' . $rss_text . '</span></a></div>';
		endif;	
		
		if (!empty($email)) :
			echo '<div class="social-icon"><a href="' . $email . '"><span class="sm_email">' . $email_text . '</span></a></div>';
		endif;	
		
		if (!empty($linkedin)) :
			echo '<div class="social-icon"><a href="' . $linkedin . '"><span class="sm_linkedin">' . $linkedin_text . '</span></a></div>';
		endif;
			
			echo '</div>';

		
	    echo $after_widget;
	  }
	 
	}
	register_widget('social_media_Widget');
	
/**
*	End Social Media Widgets
**/	


/**
*	Begin Flickr Feed Custom Widgets
**/

class WPCrown_Custom_Flickr extends WP_Widget {
	function WPCrown_Custom_Flickr() {
		$widget_ops = array('classname' => 'WPCrown_Custom_Flickr', 'description' => 'Display your recent Flickr photos' );
		$this->WP_Widget('WPCrown_Custom_Flickr', 'WPCrown Custom Flickr', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo '<div class="widgetflickr">';
		$flickr_id = empty($instance['flickr_id']) ? ' ' : apply_filters('widget_title', $instance['flickr_id']);
		$title = $instance['title'];
		$items = $instance['items'];
		
		if(!is_numeric($items))
		{
			$items = 9;
		}
		
		if(empty($title))
		{
			$title = 'Photostream';
		}
		
		if(!empty($items) && !empty($flickr_id))
		{
			$photos_arr = get_flickr(array('type' => 'user', 'id' => $flickr_id, 'items' => $items));
			
			if(!empty($photos_arr))
			{
				echo '<span class="widget-title">'.$title.'</span><div class="hr-stripe full" style="margin-bottom: 20px;"></div>';
				echo '<ul class="flickr">';
				
				foreach($photos_arr as $photo)
				{
					echo '<li>';
					echo '<a class="image" href="'.$photo['url'].'" title="'.$photo['title'].'"><img src="'.$photo['thumb_url'].'" alt="" /></a>';
					echo '</li>';
				}
				
				echo '</ul><br class="clear"/><br class="clear"/>';
			}
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'flickr_id' => '', 'title' => '') );
		$items = strip_tags($instance['items']);
		$flickr_id = strip_tags($instance['flickr_id']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo $this->get_field_id('flickr_id'); ?>">Flickr ID <a href="http://idgettr.com/">Find your Flickr ID here</a>: <input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo esc_attr($flickr_id); ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('items'); ?>">Items (default 9): <input class="widefat" id="<?php echo $this->get_field_id('items'); ?>" name="<?php echo $this->get_field_name('items'); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

register_widget('WPCrown_Custom_Flickr');

/**
*	End Flickr Feed Custom Widgets
**/

?>