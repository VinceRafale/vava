<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'd27808_testova');

/** MySQL database username */
define('DB_USER', 'a27808_testova');

/** MySQL database password */
define('DB_PASSWORD', '3pANGAH9');

/** MySQL hostname */
define('DB_HOST', 'wm49.wedos.net');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#?IU]j&sU8+WE`bJwPY;j 3aZOEkaN9_FA[(m8y2.t<4V(587@[ =fU!1?0(*54y');
define('SECURE_AUTH_KEY',  'sr_/y-01f p0#h :<#$=}/~4Xey5&-`klk<@_}ox<k!h$%$>o[~UC_*BO!Ep(+$#');
define('LOGGED_IN_KEY',    'xpKWt<X@o_2~_}AR7TYiyE>i-@H:9|(b(ePF-5oc!g/&arj4yltIZqmSxw9fl<@T');
define('NONCE_KEY',        'LWo8?hMcf]n$`ILduafz(Q#+Cbk)6@5L~<)B;)AJ[PC*H-/xbngcmw-R8uJHDX6V');
define('AUTH_SALT',        ';#-.L)=i,~X{#_bX)+|4IO8*eJ%z-y%A-*X}6K<%Dw0^yK}=REf_19u8N;Jx{=#~');
define('SECURE_AUTH_SALT', '&^4l8mW?Bq<U{zm8y=ikNP-hz+oLsn[e:-rlLx%ww+WWW*10|E4{d$m{|=+RBe |');
define('LOGGED_IN_SALT',   'G-j [ZO54O![-MyW=MUTw&/(2a.,+U3SSHI~FCwUj_jDGs>[[2(f;+,>L.ti`HXY');
define('NONCE_SALT',       'v|zuUC@0n}04gCQ$LyFgSTKs|ehzdH lx*M]k~95vZEWi:>h9{!+&0=S0tCtDXuV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'test_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'cs_CZ');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
