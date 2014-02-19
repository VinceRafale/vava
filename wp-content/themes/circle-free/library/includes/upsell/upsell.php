<?php
add_action('admin_menu', 'kopa_admin_menu_themes_introduction');

function kopa_admin_menu_themes_introduction() {
    // Kopatheme Introduction Page
    $page_kopa_cpanel_themes_introduction = add_theme_page(
            __('Kopatheme - Premium WordPress Themes and Web Templates', kopa_get_domain()), __('Kopatheme Premium Templates', kopa_get_domain()), 'edit_themes', 'kopa_cpanel_themes_introduction', 'kopa_cpanel_themes_introduction'
    );
    add_action('admin_print_styles-' . $page_kopa_cpanel_themes_introduction, 'kopa_admin_themes_introduction_print_styles');
}

function kopa_admin_themes_introduction_print_styles() {
    wp_enqueue_style('kopa-admin-bootstrap-style', get_template_directory_uri() . '/library/css/bootstrap/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('kopa-admin-bootstrap-responsive-style', get_template_directory_uri() . '/library/css/bootstrap/css/bootstrap-responsive.min.css', array(), null);
    wp_enqueue_style('kopa-admin-themes-introduction-style', get_template_directory_uri() . '/library/includes/upsell/css/themes-introduction.css', array(), null);
}

function kopa_cpanel_themes_introduction() {
    include trailingslashit(get_template_directory()) . '/library/includes/upsell/themes-introduction.php';
}


// update to premium notices
add_action('admin_notices', 'kopa_update_premium_version_notices');

function kopa_update_premium_version_notices() {
    $xml = kopa_get_theme_info(KOPA_UPDATE_TIMEOUT);
    if ( is_object($xml) && property_exists($xml, 'upsell') ) {
        $content = $xml->upsell;
    }

    if ( ! empty( $content ) ) {
        $out = '<div class="updated kopa_update_info">';
        $out .= sprintf('<p>%1$s - <a href="%2$s" target="_blank">%3$s</a></p>', $content->tagline, $content->button->url, $content->button->title);
        $out .= '</div>';

        echo $out;
    }
}