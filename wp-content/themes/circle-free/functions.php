<?php

define('KOPA_THEME_NAME', 'Circle');
define('KOPA_DOMAIN', 'circle-free');
define('KOPA_CPANEL_IMAGE_DIR', get_template_directory_uri() . '/library/images/layout/');
define('KOPA_UPDATE_TIMEOUT', 1);
define('KOPA_UPDATE_URL', 'http://kopatheme.com/notifier/circle-free.xml');
define('KOPA_LATEST_UPSELL_URL', 'http://kopatheme.com/notifier/latest-items-upsell.xml');

require trailingslashit(get_template_directory()) . '/library/kopa.php';
require trailingslashit(get_template_directory()) . '/library/ini.php';
require trailingslashit(get_template_directory()) . '/library/includes/google-fonts.php';
require trailingslashit(get_template_directory()) . '/library/includes/ajax.php';
require trailingslashit(get_template_directory()) . '/library/includes/metabox/post.php';
require trailingslashit(get_template_directory()) . '/library/includes/metabox/category.php';
require trailingslashit(get_template_directory()) . '/library/includes/metabox/page.php';
require trailingslashit(get_template_directory()) . '/library/front.php';

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'kopa_register_required_plugins');

function kopa_register_required_plugins() {
    $plugins = array(
        array(
            'name'               => 'Kopa Shortcodes',
            'slug'               => 'kopa-shortcodes',
            'source'             => get_template_directory() . '/plugins/kopa-shortcodes.zip',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => true,              
        )
    );

    tgmpa( $plugins );
}