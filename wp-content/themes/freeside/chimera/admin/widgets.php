<?php
/*
Plugin Name: Sub Pages widget
Description: Show only the sub pages, if the current page has sub pages
*/
$GLOBALS['themename'] = get_option('chimera_theme_name');

/**
 * Subpages widget
 */
if (class_exists('WP_Widget'))
{
    class Chimera_Subpages_Widget extends WP_Widget
    {
        function Chimera_Subpages_Widget()
        {
            global $themename;
            parent::WP_Widget(false, $name = $themename . ' - Subpages');
        }
        
        function widget($args, $instance) {
			global $post;
            extract( $args );
			$title = apply_filters('widget_title', $instance['title']);
			$rootPost = $post;
			while ($rootPost->post_parent != 0) {
				$rootPost = & get_post($rootPost->post_parent);
			}
			$output = wp_list_pages('sort_column=menu_order&depth=1&title_li=&echo=0&parent=' . $rootPost->ID);
			?>
                  <div id="<?php echo $args['widget_id']; ?>" class="widget widget_subpages">
                      <ul>
					  	<?php echo $output ?>
					  </ul>
                  </div>
            <?php
        }
        
        function update($new_instance, $old_instance) {				
            $instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
        }
		
		function form($instance) {
			$title = esc_attr($instance['title']);
			?>
				<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<?php 
		}
        
    }
    
    add_action('widgets_init', create_function('', 'return register_widget("Chimera_Subpages_Widget");'));
    
      
    class Chimera_Popular_Posts_Widget extends WP_Widget
    {
        function Chimera_Popular_Posts_Widget()
        {
            global $themename;
            parent::WP_Widget(false, $name = $themename . ' - Popular Posts');
        }
        
        function widget($args, $instance) {
			chimera_popular_widget($args);
        }
        
        function update($new_instance, $old_instance) {				
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
			return $instance;
        }
		
		function form($instance) {
            $title = esc_attr($instance['title']);
			?>
				<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<?php 
		}
        
    }
    
    add_action('widgets_init', create_function('', 'return register_widget("Chimera_Popular_Posts_Widget");'));
    
    class Chimera_Recent_Posts_Widget extends WP_Widget
    {
        function Chimera_Recent_Posts_Widget()
        {
            global $themename;
            parent::WP_Widget(false, $name = $themename . ' - Recent Posts');
        }
        
        function widget($args, $instance) {
			chimera_recent_widget($args);
        }
        
        function update($new_instance, $old_instance) {				
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
			return $instance;
        }
		
		function form($instance) {
            $title = esc_attr($instance['title']);
			?>
				<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<?php 
		}
        
    }
    
    add_action('widgets_init', create_function('', 'return register_widget("Chimera_Recent_Posts_Widget");'));
    
    class Chimera_Flickr_Widget extends WP_Widget
    {
        function Chimera_Flickr_Widget()
        {
            global $themename;
            parent::WP_Widget(false, $name = $themename . ' - Flickr');
        }
        
        function widget($args, $instance) {
            extract($args);
            $id = $instance['id'];
            $number = $instance['number'];
            echo $args['before_widget'];
        ?>

            <h3 class="widgettitle flickr_ft"><?php _e('Photos on <span>flick<span>r</span></span>', 'chimera') ?></h3>
            <div class="content">
                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>
                <div class="clear"></div>

        <?php
            echo $args['after_widget'];
        }
        
        function update($new_instance, $old_instance) {				
            $instance = $old_instance;
			$instance['id'] = strip_tags($new_instance['id']);
            $instance['number'] = strip_tags($new_instance['number']);
			return $instance;
        }
		
		function form($instance) {
            $id = esc_attr($instance['id']);
            $number = esc_attr($instance['number']);
            ?>
            <p style="text-align:right;">
                    <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Flickr ID', 'chimera') ?> (<a href="http://www.idgettr.com" target="_blank">idGettr</a>)
                    <input style="width: 200px;" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id ?>" />
                    </label></p>
            <p style="text-align:right;">
                    <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of photos:') ?>
                    <input style="width: 200px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number ?>" />
                    </label></p>
            <?php
		}
        
    }
    
    add_action('widgets_init', create_function('', 'return register_widget("Chimera_Flickr_Widget");'));
}



/**
 * ***********  Popular Post Widget
 */
function chimera_popular_widget($args) {
    global $wpdb;
    global $template_url;
    if (empty($pop_posts) || $pop_posts < 1) $pop_posts = 3;
    $now = gmdate("Y-m-d H:i:s", time());
    $lastmonth = gmdate("Y-m-d H:i:s", gmmktime(date("H"), date("i"), date("s"), date("m") - 12, date("d"), date("Y")));
    $popularposts = "SELECT ID, post_title, post_date, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT " . $pop_posts;
    $posts = $wpdb->get_results($popularposts);
    $popular = '';
    echo $args['before_widget'];
    echo $args['before_title'] . 'Popular Posts' . $args['after_title'];
    if ($posts) { ?>
		
<ul class="thumbnail_list">
	<?php foreach ($posts as $post) {
            $post_title = stripslashes($post->post_title);
            $post_date = $post->post_date;
            $post_date = mysql2date('F j, Y', $post_date, false);
            $permalink = get_permalink($post->ID);
            $meta_image = get_post_meta($post->ID, "post_image", true);
            $meta_video = get_post_meta($post->ID, "post_video", true);
            if ($meta_image) {
                $meta_image = get_post_meta($post->ID, "post_image", true);
            }
?>
<li>
	<?php if ($meta_image) { ?>					
		<div class="float-left thumb_img">
			<?php

		if (get_option('chimera_fancybox') != 'false') { ?>

			<?php if ( $meta_image ) { ?>

				<?php if ( $meta_video ) { ?>
					<a class="img mVideo" rel="gal_5" href="#video_modal_<?php echo $post_id; ?>" title="<?php echo $post_title; ?>">
				<?php } else { ?>

					<a class="img mPreview" rel="gal_5" href="<?php echo $meta_image; ?>" title="<?php echo $post_title; ?>">

				<?php } ?>

			<?php } else { ?>

					<a class="img" href="<?php echo $permalink; ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php echo $post_title; ?>">

			<?php } ?>

		<?php } else { ?>

					<a class="img" href="<?php echo $permalink; ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php echo $post_title; ?>">

		<?php } ?>

				<?php 
						$imgurl = chimera_get_image_path($meta_image); 
						$image = aq_resize( $imgurl, 45, 45, true );				      
				?> 
			 <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />			

		</a>
		<?php if ( $meta_video ) { ?>
		<div style="display:none">
			<div class="inline" id="video_modal_<?php echo $post_id; ?>">
				<?php echo $meta_video; ?>
			</div>
		</div>
		<?php } ?>
		</div>
	<div class="float-left thumb_title">
		<a class="title" href="<?php echo $permalink; ?>" rel="bookmark"><?php echo $post_title; ?></a>
		<span class="date <?php if (!$meta_image) { ?>no_pad<?php
    } ?>"><?php echo $post_date; ?></span>
	</div>
	<div class="clear"></div>
	<?php } else { ?>
		<div class="float-left thumb_title thumb_no_img">
			<a class="title <?php if (!$meta_image) { ?>no_pad<?php
        } ?>" href="<?php echo $permalink; ?>" rel="bookmark"><?php echo $post_title; ?></a>
			<span class="date <?php if (!$meta_image) { ?>no_pad<?php
        } ?>"><?php echo $post_date; ?></span>
		</div>
		<div class="clear"></div>
	<?php } ?>
</li>
		<?php
        } ?>
</ul>
	<?php
    }
    echo $args['after_widget'];
}
/**
 * ***  Recent Post Widget
 */
function chimera_recent_widget($args) {
    global $wpdb, $shortname;
    $get_options = get_option($shortname . '_general_settings');
    $blog_excludecats = $get_options['blog_excludecats'];
    $exclude_blog_cats = preg_replace("!(\d)+!", "-${0}$0", $blog_excludecats);
    $posts = get_posts("cat=$exclude_blog_cats&numberposts=5&offset=0");
    echo $args['before_widget'];
    echo $args['before_title'] . 'Recent Posts' . $args['after_title'];
    if ($posts) { ?>

<ul class="thumbnail_list">
	<?php foreach ($posts as $post) {
            $post_title = stripslashes($post->post_title);
            $post_date = $post->post_date;
			$post_id = $post->ID;
            $post_date = mysql2date('F j, Y', $post_date, false);
            $permalink = get_permalink($post->ID);
            $meta_image = get_post_meta($post->ID, "post_image", true);
            $meta_video = get_post_meta($post->ID, "post_video", true);
            if ($meta_image) {
                $meta_image = get_post_meta($post->ID, "post_image", true);
            }
?>
			<li>
				<?php if ($meta_image) { ?>					
					<div class="float-left thumb_img">
						<?php

					if (get_option('chimera_fancybox') != 'false') { ?>

						<?php if ( $meta_image ) { ?>

							<?php if ( $meta_video ) { ?>
								<a class="img mVideo" rel="gal_5" href="#video_modal_<?php echo $post_id; ?>" title="<?php echo $post_title; ?>">
							<?php } else { ?>

								<a class="img mPreview" rel="gal_5" href="<?php echo $meta_image; ?>" title="<?php echo $post_title; ?>">

							<?php } ?>

						<?php } else { ?>

								<a class="img" href="<?php echo $permalink; ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php echo $post_title; ?>">

						<?php } ?>

					<?php } else { ?>

								<a class="img" href="<?php echo $permalink; ?>" title="<?php _e( 'Read more about ', 'chimera' ); ?><?php echo $post_title; ?>">

					<?php } ?>

					<?php 
						$imgurl = chimera_get_image_path($meta_image); 
						$image = aq_resize( $imgurl, 45, 45, true );				      
					?> 
						 <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />

					</a>
					<?php if ( $meta_video ) { ?>
					<div style="display:none">
						<div class="inline" id="video_modal_<?php echo $post_id; ?>">
							<?php echo $meta_video; ?>
						</div>
					</div>
					<?php } ?>
					</div>
				<div class="float-left thumb_title">
					<a class="title" href="<?php echo $permalink; ?>" rel="bookmark"><?php echo $post_title; ?></a>
					<span class="date <?php if (!$meta_image) { ?>no_pad<?php
                } ?>"><?php echo $post_date; ?></span>
				</div>
				<div class="clear"></div>
				<?php } else { ?>
					<div class="float-left thumb_title thumb_no_img">
						<a class="title <?php if (!$meta_image) { ?>no_pad<?php
	                } ?>" href="<?php echo $permalink; ?>" rel="bookmark"><?php echo $post_title; ?></a>
						<span class="date <?php if (!$meta_image) { ?>no_pad<?php
	                } ?>"><?php echo $post_date; ?></span>
					</div>
					<div class="clear"></div>
				<?php } ?>
			</li>
		<?php
        } ?>
</ul>

	<?php
    }
    echo $args['after_widget'];
}
/**
 * ***********  Contact Form Widget
 */
function chimera_contact_form_widget($args) {
    global $chimera_admin_path;
    $email_address = get_option("widget_contactform");
    $email_adress_reciever = $email_address['email'] != "" ? $email_address['email'] : get_option('admin_email');
    $loader_style = $args['name'] == "Sidebar" ? 'loadingImgWidgetSb' : 'loadingImgWidgetFt';
    echo $args['before_widget'];
    echo $args['before_title'];
	_e('Email Us', 'chimera');
	echo $args['after_title'];
    //If the form is submitted
    if (isset($_POST['submittedWidget'])) {
        require ($chimera_admin_path . 'submit_contact_widget.php');
    }
?>

<?php if (isset($emailSent) && $emailSent == true) { ?>
	<a name="_contact"></a> 
		<p class="thanks"><?php _e('<strong>Thanks!</strong> Your email was successfully sent.', 'chimera'); ?></p>

<?php
    } else { ?>
	
		<?php if (isset($captchaError)) { ?>
			<a name="_contact"></a>
			<p class="error"><?php _e('There was an error submitting the form.', 'chimera'); ?><p>
		<?php
        } ?>
		<a name="_contact"></a> 
		<form action="<?php the_permalink(); ?>#_contact" id="contactFormWidget" method="post">
			<p><label class="textfield_label" for="contactNameWidget"><?php _e('Name *', 'chimera'); ?></label><input type="text" name="contactNameWidget" id="contactNameWidget" value="<?php if (isset($_POST['contactNameWidget'])) echo $_POST['contactNameWidget']; ?>" class="requiredField textfield<?php if ($nameError != '') {
            echo ' inputError';
        } ?>" size="22" tabindex="5" /></p>

			<p><label class="textfield_label" for="emailWidget"><?php _e('Email *', 'chimera'); ?></label><input type="text" name="emailWidget" id="emailWidget" value="<?php if (isset($_POST['emailWidget'])) echo $_POST['emailWidget']; ?>" class="requiredField email textfield<?php if ($emailError != '') {
            echo ' inputError';
        } ?>" size="22" tabindex="6" /></p>

			<p><textarea name="commentsWidget" id="commentsTextWidget" rows="20" cols="30" tabindex="7" class="requiredField textarea<?php if ($commentError != '') {
            echo ' inputError';
        } ?>"><?php if (isset($_POST['commentsWidget'])) {
            if (function_exists('stripslashes')) {
                echo stripslashes($_POST['commentsWidget']);
            } else {
                echo $_POST['commentsWidget'];
            }
        } ?></textarea></p>

			<p class="screenReader"><label for="checkingWidget" class="screenReader"><?php _e('If you want to submit this form, do not enter anything in this field', 'chimera'); ?></label><input type="text" name="checkingWidget" id="checkingWidget" class="screenReader" value="<?php if (isset($_POST['checking'])) echo $_POST['checking']; ?>" /></p>

			<p class="<?php echo $loader_style; ?>"></p>
			
			<p><input name="submittedWidget" id="submittedWidget" class="button<?php if ($args['name'] != "Sidebar") {
            echo ' in_footer';
        } ?>" tabindex="8" value="<?php _e('Send now', 'chimera'); ?>" type="submit" /></p>
			<p class="screenReader"><input id="submitUrlWidget" type="hidden" name="submitUrlWidget" value="<?php echo get_template_directory_uri() . '/chimera/admin/submit_contact_widget.php'; ?>" /></p>
			<p class="screenReader"><input id="emailAddressWidget" type="hidden" name="emailAddressWidget" value="<?php echo $email_adress_reciever; ?>" /></p>
			<div class="clear"></div>
		</form>
<?php
    }
    echo $args['after_widget'];
}
function chimera_contact_form_widget_admin() {
    $settings = get_option("widget_contactform");
    // check if anything's been sent
    if (isset($_POST['update_email'])) {
        $settings['email'] = strip_tags(stripslashes($_POST['contact_email']));
        update_option("widget_contactform", $settings);
    }
    echo '<p>
			<label for="contact_email">';
			 _e('Email Address:', 'chimera');
	echo '<input id="contact_email" name="contact_email" type="text" class="widefat" value="' . $settings['email'] . '" /></label></p>';
    echo '<input type="hidden" id="update_email" name="update_email" value="1" />';
}
wp_register_sidebar_widget('contact-form-widget', $themename . ' - Contact Form', 'chimera_contact_form_widget', array('description' => __('Email contact form for sidebar', 'chimera')));
wp_register_widget_control('contact-form-widget', 'chimera_contact_form_widget_admin', 400, 200);

/**
 * Sociable Bookmarks for Post Page
 */
function chimera_save_tweet_link($id) {
    $url = wp_remote_retrieve_body(wp_remote_get('http://bit.ly/api?url=' . get_permalink($id)));
    if (!$url) {
        return sprintf('%s?p=%s', get_bloginfo('url'), $id);
    }
    add_post_meta($id, 'tweet_trim_url', $url);
    return $url;
}
function chimera_the_tweet_link() {
    if (!$url = get_post_meta(get_the_ID(), 'tweet_trim_url', true)) {
        $url = chimera_save_tweet_link(get_the_ID());
    }
    $output_url = sprintf('http://twitter.com/home?status=%s%s%s', urlencode(get_the_title()), urlencode(' - '), $url);
    $output_url = str_replace('+', '%20', $output_url);
    return $output_url;
}
// http://twitter.com/share?_=1300324625866&count=vertical&text=Create%20Bit.ly%20Short%20URLs%20Using%20PHP%3A%20API%20Version%203&url=PERMALINK
function chimera_sociable_bookmarks() {
    global $wp_query, $post;
    $sociable_sites = array(array("name" => "Twitter", 'icon' => 'twitter.png', 'class' => 'twitter_icon', 'url' => 'http://twitter.com/share?text=TITLE&url=PERMALINK',), array("name" => "StumbleUpon", 'icon' => 'stumbleupon.png', 'class' => 'stumbleupon_icon', 'url' => 'http://www.stumbleupon.com/submit?url=PERMALINK&amp;title=TITLE',), array("name" => "Reddit", 'icon' => 'reddit-logo.png', 'class' => 'reddit_icon', 'url' => 'http://reddit.com/submit?url=PERMALINK&amp;title=TITLE',), array("name" => "Digg", 'icon' => 'digg-logo.png', 'class' => 'digg_icon', 'url' => 'http://digg.com/submit?phase=2&amp;url=PERMALINK&amp;title=TITLE&amp;bodytext=EXCERPT',), array("name" => "del.icio.us", 'icon' => 'delicious.png', 'class' => 'delicious_icon', 'url' => 'http://delicious.com/post?url=PERMALINK&amp;title=TITLE&amp;notes=EXCERPT',), array("name" => "Facebook", 'icon' => 'facebook-logo-square.png', 'class' => 'facebook_icon', 'url' => 'http://www.facebook.com/share.php?u=PERMALINK&amp;t=TITLE',), array("name" => "LinkedIn", 'icon' => 'linkedin-square.png', 'class' => 'linkedin_icon', 'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url=PERMALINK&amp;title=TITLE&amp;source=BLOGNAME&amp;summary=EXCERPT',),);
    // Load the post's and blog's data
    $blogname = urlencode(get_bloginfo('name') . " " . get_bloginfo('description'));
    $post = $wp_query->post;
    // Grab the excerpt, if there is no excerpt, create one
    $excerpt = urlencode(strip_tags(strip_shortcodes($post->post_excerpt)));
    if ($excerpt == "") {
        $excerpt = urlencode(substr(strip_tags(strip_shortcodes($post->post_content)), 0, 250));
    }
    // Clean the excerpt for use with links
    $excerpt = str_replace('+', '%20', $excerpt);
    $excerpt = str_replace('%0D%0A', '', $excerpt);
    $permalink = urlencode(get_permalink($post->ID));
    $title = str_replace('+', '%20', urlencode($post->post_title));
	$output="";
    foreach ($sociable_sites as $bookmark) {
        $url = $bookmark['url'];
        $url = str_replace('TITLE', $title, $url);
        $url = str_replace('BLOGNAME', $blogname, $url);
        $url = str_replace('EXCERPT', $excerpt, $url);
        $url = str_replace('PERMALINK', $permalink, $url);
        $output.= '<div class="' . $bookmark['class'] . '">';
        $output.= '<a title="' . $bookmark['name'] . '" href="' . $url . '">';
        $output.= '</a>';
        $output.= '</div>';
    }
    if (!$output = "") {
		return $output;
		}
}
?>
