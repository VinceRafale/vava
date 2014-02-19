<?php
add_action('widgets_init', 'kopa_widgets_init');

function kopa_widgets_init() {
    register_widget('Kopa_Widget_ArticleList_Small_Thumbnail');
    register_widget('Kopa_Widget_ArticleList_Medium_Thumbnail');
    register_widget('Kopa_Widget_ArticleList_Large_Thumbnail');
    register_widget('Kopa_Widget_Flickr');
    register_widget('Kopa_Widget_Recent_Comments');
    register_widget('Kopa_Widget_Text');
    register_widget('Kopa_Widget_ArticleList_No_Thumbnail');
    register_widget('Kopa_Widget_Advertisement');
}

add_action('admin_enqueue_scripts', 'kopa_widget_admin_enqueue_scripts');

function kopa_widget_admin_enqueue_scripts($hook) {
    if ('widgets.php' === $hook) {
        $dir = get_template_directory_uri() . '/library';
        wp_enqueue_style('kopa_widget_admin', "{$dir}/css/widget.css");
        wp_enqueue_script('kopa_widget_admin', "{$dir}/js/widget.js", array('jquery'));
    }
}

function kopa_widget_article_build_query($query_args = array()) {
    $args = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'posts_per_page' => $query_args['number_of_article']
    );

    $tax_query = array();

    if (isset($query_args['categories']) && $query_args['categories']) {
        $tax_query[] = array(
            'taxonomy' => 'category',
            'field' => 'id',
            'terms' => $query_args['categories']
        );
    }
    if (isset($query_args['tags']) && $query_args['tags']) {
        $tax_query[] = array(
            'taxonomy' => 'post_tag',
            'field' => 'id',
            'terms' => $query_args['tags']
        );
    }
    if ($query_args['relation'] && count($tax_query) == 2)
        $tax_query['relation'] = $query_args['relation'];

    if ($tax_query) {
        $args['tax_query'] = $tax_query;
    }

    switch ($query_args['orderby']) {
        case 'popular':
            $args['meta_key'] = 'kopa_' . kopa_get_domain() . '_total_view';
            $args['orderby'] = 'meta_value_num';
            break;
        case 'most_comment':
            $args['orderby'] = 'comment_count';
            break;
        case 'random':
            $args['orderby'] = 'rand';
            break;
        default:
            $args['orderby'] = 'date';
            break;
    }
    if (isset($query_args['post__not_in']) && $query_args['post__not_in']) {
        $args['post__not_in'] = $query_args['post__not_in'];
    }    
    
    return new WP_Query($args);
}

function kopa_widget_posttype_build_query($query_args = array()) {
    $args = array(
        'post_type' => $query_args['post_type'],
        'posts_per_page' => $query_args['posts_per_page']
    );

    $tax_query = array();

    if ($query_args['categories']) {
        $tax_query[] = array(
            'taxonomy' => $query_args['cat_name'],
            'field' => 'id',
            'terms' => $query_args['categories']
        );
    }
    if ($query_args['tags']) {
        $tax_query[] = array(
            'taxonomy' => $query_args['tag_name'],
            'field' => 'id',
            'terms' => $query_args['tags']
        );
    }
    if ($query_args['relation'] && count($tax_query) == 2)
        $tax_query['relation'] = $query_args['relation'];

    if ($tax_query) {
        $args['tax_query'] = $tax_query;
    }

    switch ($query_args['orderby']) {
        case 'popular':
            $args['meta_key'] = 'kopa_' . kopa_get_domain() . '_total_view';
            $args['orderby'] = 'meta_value_num';
            break;
        case 'most_comment':
            $args['orderby'] = 'comment_count';
            break;
        case 'random':
            $args['orderby'] = 'rand';
            break;
        default:
            $args['orderby'] = 'date';
            break;
    }
    if (isset($query_args['post__not_in']) && $query_args['post__not_in']) {
        $args['post__not_in'] = $query_args['post__not_in'];
    }
    return new WP_Query($args);
}

class Kopa_Widget_ArticleList extends WP_Widget {

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        $query_args['categories'] = $instance['categories'];
        $query_args['relation'] = esc_attr($instance['relation']);
        $query_args['tags'] = $instance['tags'];
        $query_args['number_of_article'] = (int) $instance['number_of_article'];
        $query_args['orderby'] = $instance['orderby'];

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }

        $this->display($query_args);

        echo $after_widget;
    }

    function display($query_args) {
        
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['categories'] = (empty($new_instance['categories'])) ? array() : array_filter($new_instance['categories']);
        $instance['relation'] = $new_instance['relation'];
        $instance['tags'] = (empty($new_instance['tags'])) ? array() : array_filter($new_instance['tags']);
        $instance['number_of_article'] = $new_instance['number_of_article'];
        $instance['orderby'] = $new_instance['orderby'];
        return $instance;
    }

    function form($instance) {
        $default = array(
            'title' => '',
            'categories' => array(),
            'relation' => 'OR',
            'tags' => array(),
            'number_of_article' => 4,
            'orderby' => 'lastest',
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = strip_tags($instance['title']);

        $form['categories'] = $instance['categories'];
        $form['relation'] = esc_attr($instance['relation']);
        $form['tags'] = $instance['tags'];
        $form['number_of_article'] = (int) $instance['number_of_article'];
        $form['orderby'] = $instance['orderby'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Categories:', kopa_get_domain()); ?></label>                
            <select class="widefat" id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>[]" multiple="multiple" size="5" autocomplete="off">
                <option value=""><?php _e('-- None --', kopa_get_domain()); ?></option>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                    printf('<option value="%1$s" %4$s>%2$s (%3$s)</option>', $category->term_id, $category->name, $category->count, (in_array($category->term_id, (isset($form['categories']) ? $form['categories'] : array())) ) ? 'selected="selected"' : '');
                }
                ?>
            </select>

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('relation'); ?>"><?php _e('Relation:', kopa_get_domain()); ?></label>                
            <select class="widefat" id="<?php echo $this->get_field_id('relation'); ?>" name="<?php echo $this->get_field_name('relation'); ?>" autocomplete="off">
                <?php
                $relation = array(
                    'AND' => __('And', kopa_get_domain()),
                    'OR' => __('Or', kopa_get_domain())
                );
                foreach ($relation as $value => $title) {
                    printf('<option value="%1$s" %3$s>%2$s</option>', $value, $title, ($value === $form['relation']) ? 'selected="selected"' : '');
                }
                ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e('Tags:', kopa_get_domain()); ?></label>                
            <select class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>[]" multiple="multiple" size="5" autocomplete="off">
                <option value=""><?php _e('-- None --', kopa_get_domain()); ?></option>
                <?php
                $tags = get_tags();
                foreach ($tags as $tag) {
                    printf('<option value="%1$s" %4$s>%2$s (%3$s)</option>', $tag->term_id, $tag->name, $tag->count, (in_array($tag->term_id, (isset($form['tags']) ? $form['tags'] : array()))) ? 'selected="selected"' : '');
                }
                ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_article'); ?>"><?php _e('Number of article:', kopa_get_domain()); ?></label>                
            <select class="widefat" id="<?php echo $this->get_field_id('number_of_article'); ?>" name="<?php echo $this->get_field_name('number_of_article'); ?>" autocomplete="off">
                <?php
                $number_of_article = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 20, 25, 30);
                foreach ($number_of_article as $value) {
                    printf('<option value="%1$s" %3$s>%2$s</option>', $value, $value, ($value == $form['number_of_article']) ? 'selected="selected"' : '');
                }
                ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Orderby:', kopa_get_domain()); ?></label>                
            <select class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" autocomplete="off">
                <?php
                $orderby = array(
                    'lastest' => __('Lastest', kopa_get_domain()),
                    'popular' => __('Popular by View Count', kopa_get_domain()),
                    'most_comment' => __('Popular by Comment Count', kopa_get_domain()),
                    'random' => __('Random', kopa_get_domain()),
                );
                foreach ($orderby as $value => $title) {
                    printf('<option value="%1$s" %3$s>%2$s</option>', $value, $title, ($value === $form['orderby']) ? 'selected="selected"' : '');
                }
                ?>
            </select>
        </p>
        <?php
    }

}

class Kopa_Widget_ArticleList_Large_Thumbnail extends Kopa_Widget_ArticleList {

    public function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_articlelist_large_thumbnail clearfix', 'description' => __('Display list of articles filter by categories (and/or) tags', kopa_get_domain()));
        $control_ops = array('width' => 'auto', 'height' => 'auto');
        parent::__construct('kopa_widget_articlelist_large_thumbnail', __('Kopa Article List Large Thumbnail', kopa_get_domain()), $widget_ops, $control_ops);
    }

    public function display($query_args) {
        $posts = kopa_widget_article_build_query($query_args);
        if ($posts->post_count > 0):
            $loop_index = 0;
            ?>
            <?php
            while ($posts->have_posts()):
                $posts->the_post();
                $post_url = get_permalink();
                $post_title = get_the_title();

                if (0 === $loop_index) {
                    ?>
                    <article class="entry-item standard-post clearfix">
                        <div class="entry-thumb hover-effect">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="mask">
                                    <a class="link-detail" href="<?php echo $post_url; ?>" data-icon="&#xe0c2;"></a>
                                </div>
                        <?php the_post_thumbnail('kopa-image-size-1'); ?> 
                    <?php endif; ?>
                        </div>
                        <div class="entry-content">
                            <p class="entry-meta">
                                <span class="entry-date"><span class="icon-clock-4 entry-icon"></span><?php echo get_the_date(); ?></span>
                                <span class="entry-comment"><span class="icon-bubbles-4 entry-icon"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                            </p>
                            <h3 class="entry-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Read more &raquo;', kopa_get_domain()); ?></a>
                        </div>
                    </article>
                    <?php
                    if ($posts->post_count > 1)
                        echo '<ul class="older-post">';
                } else {
                    ?>
                    <li>
                        <article class="entry-item standard-post clearfix">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="entry-thumb">
                                    <a href="<?php echo $post_url; ?>"><?php the_post_thumbnail('kopa-image-size-0'); ?></a>
                                </div>
                    <?php endif; ?>
                            <div class="entry-content">
                                <p class="entry-meta">
                                    <span class="entry-date"><span class="icon-clock-4 entry-icon"></span><?php echo get_the_date(); ?></span>
                                    <span class="entry-comment"><span class="icon-bubbles-4 entry-icon"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                </p>
                                <h3 class="entry-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Read more &raquo;', kopa_get_domain()); ?></a>
                            </div>
                        </article>
                    </li>
                    <?php
                }

                $loop_index++;
            endwhile;
            if ($posts->post_count > 1)
                echo '</ul>';
            ?>
            <?php
        endif;
        wp_reset_postdata();
    }

}

class Kopa_Widget_ArticleList_Medium_Thumbnail extends Kopa_Widget_ArticleList {

    public function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_articlelist_medium_thumbnail clearfix', 'description' => __('Display list of articles filter by categories (and/or) tags', kopa_get_domain()));
        $control_ops = array('width' => 'auto', 'height' => 'auto');
        parent::__construct('kopa_widget_articlelist_medium_thumbnail', __('Kopa Article List Medium Thumbnail', kopa_get_domain()), $widget_ops, $control_ops);
    }

    public function display($query_args) {

        $posts = kopa_widget_article_build_query($query_args);
        if ($posts->post_count > 0):
            global $post;
            ?>
            <ul>
                <?php
                while ($posts->have_posts()):
                    $posts->the_post();
                    $post_url = get_permalink();
                    $post_title = get_the_title();
                    $post_format = get_post_format();
                    $article_classes = array();

                    $post_format_icon = '&#xe034;';
                    switch ($post_format) {
                        case 'audio':
                            $post_format_icon = '&#xe020;';
                            break;
                        case 'video':
                            $post_format_icon = '&#xe023;';
                            break;
                        case 'gallery':
                            $post_format_icon = '&#xe01c;';
                            break;
                        case 'quote':
                            $post_format_icon = '&#xe075;';
                            $article_classes[] = 'article-no-thumb';
                            break;
                        case 'aside':
                            $post_format_icon = '&#xe034;';
                            $article_classes[] = 'article-no-thumb';
                            break;
                        default:
                            $post_format_icon = '&#xe034;';
                            if (!has_post_thumbnail()) {
                                $article_classes[] = 'article-no-thumb';
                            }
                            break;
                    }
                    $article_classes[] = 'entry-item';
                    $article_classes[] = 'standard-post';
                    $article_classes[] = 'clearfix';
                    ?>
                    <li>
                        <article class="<?php echo implode(' ', $article_classes); ?>">
                            <?php
                            switch ($post_format):
                                case 'gallery':
                                    $gallery = kopa_content_get_gallery($post->post_content);
                                    if ($gallery) {
                                        echo '<div class="entry-thumb">';
                                        echo do_shortcode($gallery[0]['shortcode']);
                                        echo '</div>';
                                    }
                                    break;
                                case 'video':
                                    $video = kopa_content_get_video($post->post_content);
                                    if ($video) {
                                        echo '<div class="entry-thumb hover-effect">';
                                        if ('disable' === get_option('kopa_theme_options_play_video_in_lightbox', 'disable')) {
                                            echo do_shortcode($video[0]['shortcode']);
                                        } else {
                                            ?>                                
                                            <div class="mask">
                                                <a class="link-detail" data-icon="<?php echo $post_format_icon; ?>" rel="prettyPhoto[blog-videos]" href="<?php echo $video[0]['url']; ?>"></a>
                                            </div>
                                            <?php
                                            if (has_post_thumbnail()):
                                                the_post_thumbnail('kopa-image-size-1');
                                            else:
                                                printf('<img src="%1$s">', kopa_get_video_thumbnails_url($video[0]['type'], $video[0]['url']));
                                            endif;
                                        }
                                        echo '</div>';
                                    }
                                    break;
                                case 'audio':
                                    $audio = kopa_content_get_audio($post->post_content);
                                    if ($audio) {
                                        echo '<div class="entry-thumb hover-effect">';
                                        echo do_shortcode($audio[0]['shortcode']);
                                        echo '</div>';
                                    }
                                    break;
                                default:
                                    if (has_post_thumbnail()):
                                        ?>
                                        <div class="entry-thumb hover-effect">
                                            <div class="mask">
                                                <a class="link-detail" data-icon="&#xe0c2;" href="<?php echo $post_url; ?>"></a>
                                            </div>
                                        <?php the_post_thumbnail('kopa-image-size-1'); ?>
                                        </div>
                                        <?php
                                    endif;
                                    break;
                            endswitch;
                            ?>                         
                            <div class="entry-content">
                                <p class="entry-meta">
                                    <span class="entry-date"><span class="icon-clock-4 entry-icon"></span><?php echo get_the_date(); ?></span>
                                    <span class="entry-comment"><span class="icon-bubbles-4 entry-icon"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                </p>
                                <h3 class="entry-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                                <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Read more &raquo;', kopa_get_domain()); ?></a>
                            </div>
                        </article>
                    </li>
                <?php
            endwhile;
            ?>
            </ul>
            <?php
        endif;
        wp_reset_postdata();
    }

}

class Kopa_Widget_ArticleList_Small_Thumbnail extends Kopa_Widget_ArticleList {

    public function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_articlelist_small_thumbnail clearfix', 'description' => __('Display list of articles filter by categories (and/or) tags', kopa_get_domain()));
        $control_ops = array('width' => 'auto', 'height' => 'auto');
        parent::__construct('kopa_widget_articlelist_small_thumbnail', __('Kopa Article List Small Thumbnail', kopa_get_domain()), $widget_ops, $control_ops);
    }

    public function display($query_args) {
        $posts = kopa_widget_article_build_query($query_args);
        if ($posts->post_count > 0):
            ?>
            <ul class="kp-popular-post">                        
                <?php
                while ($posts->have_posts()):
                    $posts->the_post();
                    $post_url = get_permalink();
                    $post_title = get_the_title();
                    ?>
                    <li>
                        <article class="clearfix">
                <?php if (has_post_thumbnail()): ?>
                                <a href="<?php echo $post_url; ?>" class="entry-thumb"><?php the_post_thumbnail('kopa-image-size-0'); ?></a>
                <?php endif; ?>
                            <div class="entry-content">
                                <h4 class="entry-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h4>
                                <span class="entry-date"><span class="icon-clock-4 entry-icon"></span><?php echo get_the_date(); ?></span>
                                <span class="entry-comment"><span class="icon-bubbles-4 entry-icon"></span><?php comments_popup_link(__('0 Comments', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                            </div>
                        </article>
                    </li>       
                <?php
            endwhile;
            ?>
            </ul>
            <?php
        endif;
        wp_reset_postdata();
    }

}

class Kopa_Widget_Recent_Comments extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_recent_comments', 'description' => __('Display recent comments', kopa_get_domain()));
        $control_ops = array('width' => 'auto', 'height' => 'auto');
        parent::__construct('kopa_widget_recent_comments', __('Kopa Recent Comments', kopa_get_domain()), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $number = !empty($instance['number']) ? (int) $instance['number'] : 5;
        $limit = !empty($instance['limit']) ? (int) $instance['limit'] : 100;
        $show_avatar = $instance['show_avatar'];

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }

        $comments = get_comments(array('number' => $number));

        if ($comments) {
            ?>
            <ul class="kp-latest-comment">
                <?php
                foreach ($comments as $comment):
                    $comment_content = $comment->comment_content;
                    if (strlen($comment_content) > $limit)
                        $comment_content = substr(strip_tags($comment->comment_content), 0, $limit);
                    ?>
                    <li>
                        <article class="clearfix">
                            <?php if ('true' == $show_avatar): ?>
                                <a class="entry-thumb" href="<?php echo get_permalink($comment->comment_post_ID); ?>">
                    <?php echo get_avatar($comment->comment_author_email, 60); ?>                                
                                </a>
                <?php endif; ?>

                            <div class="entry-content clearfix">
                                <a class="comment-name" href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php printf(__('%1$s says:', kopa_get_domain()), $comment->comment_author); ?></a>
                                <p><?php echo $comment_content; ?></p>
                            </div>
                        </article>
                    </li>
                <?php
            endforeach;
            ?>
            </ul>
            <?php
        }

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) strip_tags($new_instance['number']);
        $instance['limit'] = (int) strip_tags($new_instance['limit']);
        $instance['show_avatar'] = isset($new_instance['show_avatar']) ? $new_instance['show_avatar'] : 'false';
        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'number' => 5, 'limit' => 100, 'show_avatar' => 'true'));
        $title = strip_tags($instance['title']);
        $number = (int) strip_tags($instance['number']);
        $limit = (int) strip_tags($instance['limit']);
        $show_avatar = $instance['show_avatar'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>  
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p> 
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Character limit of comment content', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo esc_attr($limit); ?>" />
        </p>   
        <p>
            <input class="" id="<?php echo $this->get_field_id('show_avatar'); ?>" name="<?php echo $this->get_field_name('show_avatar'); ?>" type="checkbox" value="true" <?php echo ('true' === $show_avatar) ? 'checked="checked"' : ''; ?> />
            <label for="<?php echo $this->get_field_id('show_avatar'); ?>"><?php _e('Show Avatar', kopa_get_domain()); ?></label>                                
        </p>
        <?php
    }

}

class Kopa_Widget_Text extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_text', 'description' => __('Arbitrary text, HTML or shortcodes', kopa_get_domain()));
        $control_ops = array('width' => 600, 'height' => 400);
        parent::__construct('kopa_widget_text', __('Kopa Text', kopa_get_domain()), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $text = apply_filters('widget_text', empty($instance['text']) ? '' : $instance['text'], $instance);

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
        ?>
        <?php echo!empty($instance['filter']) ? wpautop($text) : $text; ?>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        if (current_user_can('unfiltered_html'))
            $instance['text'] = $new_instance['text'];
        else
            $instance['text'] = stripslashes(wp_filter_post_kses(addslashes($new_instance['text'])));
        $instance['filter'] = isset($new_instance['filter']);
        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'text' => ''));
        $title = strip_tags($instance['title']);
        $text = esc_textarea($instance['text']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>        
        <ul class="kopa_shortcode_icons">
            <?php
            $shortcodes = array(
                'one_half' => 'One Half Column',
                'one_third' => 'One Thirtd Column',
                'two_third' => 'Two Third Column',
                'one_fourth' => 'One Fourth Column',
                'three_fourth' => 'Three Fourth Column',
                'dropcaps' => 'Add Dropcaps Text',
                'button' => 'Add A Button',
                'alert' => 'Add A Alert Box',
                'tabs' => 'Add A Tabs Content',
                'accordions' => 'Add A Accordions Content',
                'toggle' => 'Add A Toggle Content',
                'contact_form' => 'Add A Contact Form',
                'posts_lastest' => 'Add A List Lastest Post',
                'posts_popular' => 'Add A List Popular Post',
                'posts_most_comment' => 'Add A List Most Comment Post',
                'posts_random' => 'Add A List Random Post',
                'youtube' => 'Add A Yoube Video Box',
                'vimeo' => 'Add A Vimeo Video Box'
            );
            foreach ($shortcodes as $rel => $title):
                ?>
                <li>
                    <a onclick="return kopa_shortcode_icon_click('<?php echo $rel; ?>', jQuery('#<?php echo $this->get_field_id('text'); ?>'));" href="#" class="<?php echo "kopa-icon-{$rel}"; ?>" rel="<?php echo $rel; ?>" title="<?php echo $title; ?>"></a>
                </li>
        <?php endforeach; ?>
        </ul>        
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
        <p>
            <input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs', kopa_get_domain()); ?></label>
        </p>
        <?php
    }

}

class Kopa_Widget_Flickr extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_flickr', 'description' => __('Display lastets flickr photos', kopa_get_domain()));
        $control_ops = array('width' => 'auto', 'height' => 'auto');
        parent::__construct('kopa_widget_flickr', __('Kopa Flickr', kopa_get_domain()), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $account = strip_tags($instance['account']);
        $limit = (int) $instance['limit'];

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
        ?>
        <div class="flickr-wrap clearfix">       
            <input type='hidden' class='flickr_id' value='<?php echo $account; ?>'>
            <input type='hidden' class='flickr_limit' value='<?php echo $limit; ?>'>
            <ul class="kopa-flickr-widget clearfix"></ul>
        </div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['account'] = strip_tags($new_instance['account']);
        $instance['limit'] = (int) $new_instance['limit'];
        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'account' => '', 'limit' => 4));
        $title = strip_tags($instance['title']);
        $account = strip_tags($instance['account']);
        $limit = (int) $instance['limit'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>     
        <p>
            <label for="<?php echo $this->get_field_id('account'); ?>"><?php _e('Account ID:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('account'); ?>" name="<?php echo $this->get_field_name('account'); ?>" type="text" value="<?php echo esc_attr($account); ?>" />
        </p>  
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit:', kopa_get_domain()); ?></label>                
            <select class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" autocomplete="off">
                <?php
                $limits = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 20, 25, 30);
                foreach ($limits as $value) {
                    printf('<option value="%1$s" %3$s>%2$s</option>', $value, $value, ($value == $limit) ? 'selected="selected"' : '');
                }
                ?>
            </select>
        </p>
        <?php
    }

}

class Kopa_Widget_Advertisement extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_adv', 'description' => __('Display Banner in sidebar', kopa_get_domain()));
        $control_ops = array('width' => '500', 'height' => '500');
        parent::__construct('kopa_widget_adv', __('Kopa Banner', kopa_get_domain()), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $image = strip_tags($instance['image']);
        $link = strip_tags($instance['link']);

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
        ?>
        <div class="adv-300-300">
            <a href="<?php echo $link; ?>"><img alt="" src="<?php echo $image; ?>"></a>
        </div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['image'] = strip_tags($new_instance['image']);
        $instance['link'] = strip_tags($new_instance['link']);

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'image' => '', 'link' => ''));
        $title = strip_tags($instance['title']);
        $image = strip_tags($instance['image']);
        $link = strip_tags($instance['link']);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>  

        <div class="clearfix">
            <input class="kopa_adv_upload_image left" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="text" value="<?php echo esc_attr($image); ?>" />
            <button class="left btn btn-success widget_upload_image_button" alt="kopa_adv_upload_image"><i class="icon-circle-arrow-up"></i><?php _e('Upload', kopa_get_domain()); ?></button>
        </div>
        <p>
            <br>
            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('URL:', kopa_get_domain()); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
        </p>  

        <?php
    }

}

class Kopa_Widget_ArticleList_No_Thumbnail extends Kopa_Widget_ArticleList {

    function __construct() {
        $widget_ops = array('classname' => 'kopa_widget_blog', 'description' => __('Display list of articles filter by categories (and/or) tags ', kopa_get_domain()));
        $control_ops = array('width' => 'auto', 'height' => 'auto');
        parent::__construct('kopa_widget_blog', __('Kopa Article List No Thumbnail', kopa_get_domain()), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        $query_args['categories'] = $instance['categories'];
        $query_args['relation'] = esc_attr($instance['relation']);
        $query_args['tags'] = $instance['tags'];
        $query_args['number_of_article'] = (int) $instance['number_of_article'];
        $query_args['orderby'] = $instance['orderby'];

        $posts = kopa_widget_article_build_query($query_args);

        if ($posts->post_count <= 0)
            return;

        echo $before_widget;
        if (!empty($title))
            echo $before_title . $title . $after_title;
        ?>            

        <?php while ($posts->have_posts()) : $posts->the_post(); ?>

            <article class="entry-item clearfix">
                <div class="entry-date">
                    <p><?php the_time('j'); ?></p>
                    <strong><?php the_time('M'); ?></strong>
                </div>
                <div class="entry-content">
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="entry-meta">
                        <span class="entry-category"><span class="icon-book entry-icon" aria-hidden="true"></span>In: <?php the_category(', '); ?></span>
                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><a href="<?php comments_link(); ?>"><?php comments_number(__('No comments', kopa_get_domain()), '1', '%'); ?></a></span>
                    </p>
                    <p><?php echo strip_tags(get_the_excerpt()); ?></p>
                    <a href="<?php the_permalink(); ?>" class="more-link"><?php _e('Read more &raquo;', kopa_get_domain()); ?></a>
                </div>
            </article>    

        <?php endwhile; ?>

        <?php
        echo $after_widget;
    }

}