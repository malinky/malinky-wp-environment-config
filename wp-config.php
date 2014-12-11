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

/* ------------------------------------------------------------------------ *
 * Environment Setup
 * ------------------------------------------------------------------------ */

if (isset($_SERVER['X_FORWARDED_HOST']) && !empty($_SERVER['X_FORWARDED_HOST'])) {

    $hostname = $_SERVER['X_FORWARDED_HOST'];
    $subdomain = array_shift( ( explode( ".", $_SERVER['X_FORWARDED_HOST'] ) ) );

} else {

    $hostname = $_SERVER['HTTP_HOST'];
    $subdomain = array_shift( ( explode( ".",$_SERVER['HTTP_HOST'] ) ) );

}

if ( ! defined( 'WP_ENV' ) ) {

    switch ( $subdomain ) {
        case 'local':
            define( 'WP_ENV', 'local' );
            break;
        case 'dev':
            define( 'WP_ENV', 'dev' );
            break;
        case 'www':
        default: 
            define( 'WP_ENV', 'prod' );
    }
}

if ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ) {

    $protocol = 'https://';

} else {

    $protocol = 'http://';

}

if ( ! defined( 'WP_SITEURL' ) ) {

    define( 'WP_SITEURL', $protocol . rtrim( $hostname, '/' ) );

}

if ( ! defined( 'WP_HOME' ) ) {

    define( 'WP_HOME', $protocol . rtrim( $hostname, '/' ) );

}

if ( WP_ENV == 'local' ) {

    define('DB_NAME', '');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_CHARSET', 'utf8');
    define('DB_COLLATE', '');

} elseif ( WP_ENV == 'dev' ) {

    define('DB_NAME', '');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_CHARSET', 'utf8');
    define('DB_COLLATE', '');

} else {

    define('DB_NAME', '');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_CHARSET', 'utf8');
    define('DB_COLLATE', '');

}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if ( WP_ENV == 'local' || WP_ENV == 'dev' ) {

    define('WP_DEBUG', true);

} else {

    define('WP_DEBUG', false);

}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');