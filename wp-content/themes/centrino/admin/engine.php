<?php 

define("centrino_THEME_DIR",dirname(dirname(__FILE__)));
define("centrino_THEME_URL",get_stylesheet_directory_uri());

global $centrino_wf_data;

//require(dirname(__FILE__).'/');

### SECTION
// LESS Processing
function enqueue_less_styles($tag, $handle) {
    global $wp_styles;
    $match_pattern = '/\.less$/U';
    if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
        $handle = $wp_styles->registered[$handle]->handle;
        $media = $wp_styles->registered[$handle]->args;
        $href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
        $rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
        $title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';

        $tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />";
    }
    return $tag;
}

add_filter( 'style_loader_tag', 'enqueue_less_styles', 5, 2);
// LESS Processing Ends ^^
 
 
### SECTION
//Theme admin css & js
function centrino_theme_admin_scripts($hook){
    if($hook!='appearance_page_multipurpose-themeopts') return;
    wp_enqueue_style('bootstrap-ui',get_stylesheet_directory_uri().'/admin/bootstrap/css/bootstrap.css');
    wp_enqueue_style('chosen-ui',get_stylesheet_directory_uri().'/admin/css/chosen.css');
    wp_enqueue_style('admincss',get_stylesheet_directory_uri().'/admin/css/base-admin-style.css');
    wp_enqueue_script('bootstrap-js',get_stylesheet_directory_uri().'/admin/bootstrap/js/bootstrap.min.js',array('jquery'));
    wp_enqueue_script('chosen-js',get_stylesheet_directory_uri().'/admin/js/chosen.jquery.js',array('jquery'));
    wp_enqueue_script('multipurpose-js',get_stylesheet_directory_uri().'/admin/js/wpeden.js',array('jquery','chosen-js'));
    wp_enqueue_script('media-upload');
    wp_enqueue_media();
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );
}

add_action( 'admin_enqueue_scripts', 'centrino_theme_admin_scripts');
//Theme admin css & js ends ^^
 
### SECTION
//Theme option menu function
function centrino_theme_opt_menu(){                                                                                             /*Theme Option Menu*/
      add_theme_page( "WPEden Theme Options", "Theme Options", 'edit_theme_options', 'multipurpose-themeopts', 'centrino_theme_options');
}


function centrino_setting_field($data) {
    
    switch($data['type']):
            case 'text':
                echo "<div class='controls'><input type='text' id='$data[id]' name='$data[name]' class='input span5' value='".esc_attr($data['value'])."' /></div></div>";
            break;
            case 'checkbox':
                echo "<div class='controls'><input type='checkbox' name='$data[name]' class='input' value='".esc_attr($data['value'])."' ".checked($data['sel'], $data['value'], false)." /></div></div>";
            break;
            case 'textarea':
                echo "<div class='controls'><textarea name='$data[name]' class='input span5'>".esc_html($data['value'])."</textarea></div></div>";
            break;
            case 'callback':
                echo "<div class='controls'>".call_user_func($data['dom_callback'], $data['dom_callback_params'])."</div></div>";
            break;
            case 'heading':
                echo "<div class='navbar'><div class='navbar-inner'><a href='#{$data['id']}' class='brand'>".$data['label']."</a></div></div></div>";
            break;
    endswitch;
}
global $wpede_data_fetched;
function centrino_get_theme_opts($index = null, $default = null){
    global $centrino_wf_data, $settings_sections, $wpede_data_fetched;
    if(!$wpede_data_fetched){
    $centrino_wf_data = array();
    foreach($settings_sections as $section_id => $section_name) {
    $centrino_wf_data = array_merge($centrino_wf_data,get_option($section_id,array()));
    }
    $wpede_data_fetched = 1;}
    
    if(!$index)
    return $centrino_wf_data;
    else
    return isset($centrino_wf_data[$index])&&$centrino_wf_data[$index]!=''?stripcslashes($centrino_wf_data[$index]):$default;
}

function centrino_subsection_heading($data){
    return "<h3>{$data}</h3>";
}


/**
 * Site Logo
 *
 * @param mixed $params
 */
function centrino_site_logo($params){
    extract($params);

    $html = "<div class='input-append'><input class='{$id}' type='text' name='{$name}' id='{$id}_image' value='{$selected}' /><button rel='#{$id}_image' class='btn btn-media-upload' type='button'><i class='icon icon-folder-open'></i></button></div>";
    $html .="<div style='clear:both'></div>";
    return $html;
}

function centrino_favicon(){
    ?>
    <link rel="icon" type="image/png" href="<?php echo centrino_get_theme_opts('favicon'); ?>" />
<?php
}


function centrino_get_site_logo(){
    $logourl = wpeden_get_theme_opts('site_logo');
    if($logourl) echo "<img src='{$logourl}' title='".get_bloginfo('sitename')."' alt='".get_bloginfo('sitename')."' />";
    else echo get_bloginfo('sitename');
}

$section = isset($_GET['section'])?$_GET['section']:'centrino_general_settings';
$settings_sections = array(
            'centrino_general_settings' => 'General Settings',
            'centrino_homepage_settings' => 'Homepage Settings',
            
);
$settings_fields = array(
            'logo_url' => array('id' => 'logo_url',
                                'section'=>'centrino_general_settings',
                                'label'=>'Logo URL',
                                'description'=>'Size: 140x25 px',
                                'name' => 'centrino_general_settings[logo_url]',
                                'type' => 'callback',
                                'value' => centrino_get_theme_opts('logo_url'),
                                'validate' => 'url',
                                'dom_callback' => 'centrino_site_logo',
                                'dom_callback_params' => array('name'=>'centrino_general_settings[logo_url]','id'=>'logo_url','selected'=>centrino_get_theme_opts('logo_url'))
                                ),
            'favicon' => array('id' => 'favicon',
                                'section'=>'centrino_general_settings',
                                'label'=>'FavIcon URL',
                                'description'=>'Size: 16x16 px',
                                'name' => 'centrino_general_settings[favicon]',
                                'type' => 'callback',
                                'value' => centrino_get_theme_opts('favicon'),
                                'validate' => 'url',
                                'dom_callback' => 'centrino_site_logo',
                                'dom_callback_params' => array('name'=>'centrino_general_settings[favicon]','id'=>'favicon','selected'=>centrino_get_theme_opts('favicon'))
                                ),
            'color_scheme' => array('id' => 'color_scheme',
                                'section'=>'centrino_general_settings',
                                'label'=>'Color Scheme',
                                'name' => 'centrino_general_settings[color_scheme]',
                                'type' => 'text',
                                'value' => centrino_get_theme_opts('color_scheme'),
                                'validate' => 'str'                                 
                                ),
            'footer_text' => array('id' => 'footer_text',
                                'section'=>'centrino_general_settings',
                                'label'=>'Footer Text',
                                'name' => 'centrino_general_settings[footer_text]',
                                'type' => 'text',
                                'value' => centrino_get_theme_opts('footer_text'),
                                'validate' => 'str'
                                ),
            'custom_homepage' => array('id' => 'custom_homepage',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Custom Homepage',
                                'name' => 'custom_homepage',
                                'type' => 'heading'                                
                                ),
            'centrino_home' => array('id' => 'centrino_home',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Show eCommerce Homepage',
                                'name' => 'centrino_homepage_settings[centrino_home]',
                                'type' => 'checkbox',
                                'value' => 1,
                                'validate' => 'str',
                                'sel' => centrino_get_theme_opts('centrino_home')
                                ),


            'featured_page_heading' => array('id' => 'featured_page_heading',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Featured Pages Section',
                                'name' => 'featured_page_heading',
                                'type' => 'heading'                                
                                ),
            'featured_section_1_title' => array('id' => 'featured_section_1_title',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Title',
                                'name' => 'centrino_homepage_settings[featured_section_1_title]',
                                'type' => 'text',
                                'value' => centrino_get_theme_opts('featured_section_1_title','Services'),
                                'validate' => 'str'
                                ),

            'featured_section_1_desc' => array('id' => 'featured_section_1_desc',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Tagline',
                                'name' => 'centrino_homepage_settings[featured_section_1_desc]',
                                'type' => 'text',
                                'value' => centrino_get_theme_opts('featured_section_1_desc','What we can do for you...'),
                                'validate' => 'str'
                                ),
            'home_featured_page_1' => array('id' => 'home_featured_page_1',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Featured Page 1',
                                'name' => 'centrino_homepage_settings[home_featured_page_1]',
                                'type' => 'callback',
                                'validate' => 'int',
                                'dom_callback'=> 'wp_dropdown_pages',
                                'dom_callback_params' => 'echo=0&name=centrino_homepage_settings[home_featured_page_1]&id=home_featured_page_1&selected='.centrino_get_theme_opts('home_featured_page_1')
                                ),
            'home_featured_page_2' => array('id' => 'home_featured_page_2',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Featured Page 2',
                                'name' => 'centrino_homepage_settings[home_featured_page_2]',
                                'type' => 'callback',
                                'validate' => 'int',
                                'dom_callback'=> 'wp_dropdown_pages',
                                'dom_callback_params' => 'echo=0&name=centrino_homepage_settings[home_featured_page_2]&id=home_featured_page_2&selected='.centrino_get_theme_opts('home_featured_page_2')
                                ),
            'home_featured_page_3' => array('id' => 'home_featured_page_3',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Featured Page 3',
                                'name' => 'centrino_homepage_settings[home_featured_page_3]',
                                'type' => 'callback',
                                'validate' => 'int',
                                'dom_callback'=> 'wp_dropdown_pages',
                                'dom_callback_params' => 'echo=0&name=centrino_homepage_settings[home_featured_page_3]&id=home_featured_page_3&selected='.centrino_get_theme_opts('home_featured_page_3')
                                ),
            'featured_page_heading2' => array('id' => 'featured_page_heading2',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'New Products Section',
                                'name' => 'featured_page_heading2',
                                'type' => 'heading'
                                ),
            'featured_section_2_title' => array('id' => 'featured_section_2_title',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Title',
                                'name' => 'centrino_homepage_settings[featured_section_2_title]',
                                'type' => 'text',
                                'value' => centrino_get_theme_opts('featured_section_2_title','New Products'),
                                'validate' => 'str'
                                ),

            'featured_section_2_desc' => array('id' => 'featured_section_1_desc',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Tagline',
                                'name' => 'centrino_homepage_settings[featured_section_2_desc]',
                                'type' => 'text',
                                'value' => centrino_get_theme_opts('featured_section_2_desc','Check out new products here...'),
                                'validate' => 'str'
                                ),


            'home_cat_heading' => array('id' => 'home_cat_heading',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Homepage Blog Section',
                                'name' => 'home_cat_heading',
                                'type' => 'heading'                                
                                ),
            'blog_section_title' => array('id' => 'blog_section_title',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Title',
                                'name' => 'centrino_homepage_settings[blog_section_title]',
                                'type' => 'text',
                                'value' => centrino_get_theme_opts('blog_section_title','From Blog'),
                                'validate' => 'str'
                                ),

            'blog_section_desc' => array('id' => 'blog_section_desc',
                                'section'=>'centrino_homepage_settings',
                                'label'=>'Tagline',
                                'name' => 'centrino_homepage_settings[blog_section_desc]',
                                'type' => 'text',
                                'value' => centrino_get_theme_opts('blog_section_desc','They are talking about...'),
                                'validate' => 'str'
                                ),

);



function centrino_setup_theme_options(){
    global $settings_fields, $centrino_wf_data, $section, $settings_sections;
    foreach($settings_sections as $section_id=>$section_name){                 
        register_setting($section_id,$section_id,'centrino_validate_optdata');
    }
    foreach($settings_fields as $id=>$field){         
        if($field['type']=='heading')
        add_settings_field($id, '<div class="control-group">', 'centrino_setting_field', 'multipurpose-themeopts', $field['section'], $field);
        else
        add_settings_field($id, '<div class="control-group"><label for="ftrcat" class="control-label">'.$field['label'].'</label>', 'centrino_setting_field', 'multipurpose-themeopts', $field['section'], $field);
    }
}

add_action('admin_init','centrino_setup_theme_options');

function centrino_validate_optdata($data){
    global $settings_fields;  
    $error = array();
    
    foreach($settings_fields as $id=>$field){
         if(!isset($data[$id])) continue;              
         switch($field['validate']){
             case 'url':
                $data[$id] = esc_url($data[$id]);
             break;
             case 'int':
                $data[$id] = intval($data[$id]);
             break;
             case 'double':
                $data[$id] = doubleval($data[$id]);
             break;
             case 'str':
                $data[$id] = mysql_escape_string(strval($data[$id]));
             break;
             case 'email':
                $data[$id] = is_email($data[$id])?$data[$id]:'';
                $error[$id] = 'Invalid Email Address';
             break;
         }
    }
    if($error) return $data['__error__'] = $error;
    
    return $data;
}

function centrino_logo(){
    $logo = esc_url(centrino_get_theme_opts('logo_url'));
    $sitename = get_bloginfo('sitename');
    if($logo!='')
    echo "<img src='{$logo}' title='{$sitename}' alt='{$sitename}' />";
    else 
    echo $sitename;
}
    
//theme option     
function centrino_theme_options(){
global $settings_sections, $section;                                                                                                  /*Theme Option Function*/      
?>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" />
    <div class="wrap wpeden-theme-options w3eden">
        <div class="container-fluid">
            <div class="row-fluid theader">
                <div class="span12">

                    <h2 class="thm_heading"><img src="<?php echo get_template_directory_uri(); ?>/admin/images/logo-min.png" /></h2>
                </div>

            </div>
            <div class="row-fluid">
                <div class="span12">

                    <div class=" tabbable tabs-left">
                        <!-- Theme Option Sections -->
                        <ul class="nav nav-tabs smn">
                            <<?php foreach($settings_sections as $section_id=>$section_name){ ?>
                                <li class="<?php echo $section==$section_id?'active':''; ?>"><a href="#<?php echo $section_id; ?>" data-toggle='tab'><?php echo $section_name; ?></a></li>
                            <?php } ?>
                        </ul>
                        <!-- Theme Option Sections Ends -->


                        <!-- Theme Option Fields for section # -->
                        <div class="tab-content">
                            <?php foreach($settings_sections as $section_id=>$section_name){ ?>
                                <div class="tab-pane <?php echo $section_id==$section?'active':''; ?>" id="<?php echo $section_id; ?>">

                                    <form id="theme-admin-form" class="form-horizontal" action="options.php" method="post" enctype="multipart/form-data">
                                        <?php
                                        settings_fields( $section_id );
                                        do_settings_fields( 'multipurpose-themeopts',$section_id );
                                        ?>
                                        <div class="control-group">

                                            <div class="controls">
                                                <?php submit_button(); ?>
                                                <hr/>
                                                <span id="loading" style="display: none;"><img src="images/loading.gif" alt=""> saving...</span>
                                                <b>If you like this theme please consider:</b><Br/> <Br/>
                                                <a class="button button-primary" target="_blank" href="http://wordpress.org/support/view/plugin-reviews/wpmarketplace?rate=5#postform">A 5&#9733; rating will inspire me a lot :)</a><br><br>
                                                <hr/><br/>
                                                Please Like this theme in FB:<br/>
                                                <div id="fb-root"></div>
                                                <script>(function(d, s, id) {
                                                        var js, fjs = d.getElementsByTagName(s)[0];
                                                        if (d.getElementById(id)) return;
                                                        js = d.createElement(s); js.id = id;
                                                        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=185450134846732";
                                                        fjs.parentNode.insertBefore(js, fjs);
                                                    }(document, 'script', 'facebook-jssdk'));</script>
                                                <div class="fb-like" data-href="http://wpeden.com/" data-send="true" data-width="450" data-show-faces="false"></div>

                                                <hr/><br/>
                                                Need More?<br/>
                                                <a class="button button-primary" href="http://wpmarketplaceplugin.com/marketplace/" target="_blank">More Themes & Add-ons</a>

                                            </div>

                                        </div>
                                        <div class="clear"></div>
                                    </form>
                                    <div class="clear"></div>
                                </div>
                            <?php } ?>


                        </div>
                        <!-- Theme Option Fields for section # Ends -->
                    </div>
                </div>
                <script>jQuery('.ttip').tooltip({placement:'right',animation:false, container:'ul.nav-pills'}); jQuery('.nav-pills a').click(function(e){e.preventDefault(); jQuery('.nav-tabs li').slideUp();jQuery(jQuery(this).attr('rel')).slideDown(); });</script>
            </div>
        </div>

    </div>

<?php
        
}
  
 
add_action('admin_menu', 'centrino_theme_opt_menu');
add_action('wp_head', 'centrino_favicon');