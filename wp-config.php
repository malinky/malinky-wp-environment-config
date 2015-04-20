<?php
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


/* ------------------------------------------------------------------------ *
 * Load Include
 * ------------------------------------------------------------------------ */

if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

if ( WP_ENV == 'local' ) {

    require_once(ABSPATH . '../malinky-includes/wp-config.php');

} elseif ( WP_ENV == 'dev' ) {

    require_once(ABSPATH . '../../../malinky-includes/wp-config.php');    

} else {

    require_once(ABSPATH . '../../malinky-includes/wp-config.php');

}
