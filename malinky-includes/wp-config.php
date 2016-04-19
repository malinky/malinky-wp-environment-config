<?php
if ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ) {

    $protocol = 'https://';

} else {

    $protocol = 'http://';

}

if ( ! defined( 'WP_SITEURL' ) ) {

    define( 'WP_SITEURL', $protocol . $hostname . '/' );

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
    define('DB_USER', '');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_CHARSET', 'utf8');
    define('DB_COLLATE', '');

} else {

    define('DB_NAME', '');
    define('DB_USER', '');
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

/**
 * Set new WP_CONTENT_DIR and WP_CONTENT_URL as they are outside of submodule wordpress/ folder.
 * They are actually in the root.
 */
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
define('WP_CONTENT_URL', $protocol . $hostname . '/wp-content');

/**
 * Disbale automatic updates locally so they can be done when chosing.
 * Dev and Prod environments have all update disbaled in admin so they can be pushed from version control.
 */
if ( WP_ENV == 'local' ) {

    define( 'AUTOMATIC_UPDATER_DISABLED', true );

} else {

    // Disallow file edit only.
    define( 'DISALLOW_FILE_EDIT', true );
    // Disallow file edit and plugin and theme updates.
    // define( 'DISALLOW_FILE_MODS', true );

}

/**
 * Limit the number of revisions.
 */
define( 'WP_POST_REVISIONS', 3 );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
