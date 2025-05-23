<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'm,_2o10TK?o2N dNB>!j^m{$=)s0b?l}{ #&r>WX_8&m*sDD3/eEle+?-Y%sb<O*' );
define( 'SECURE_AUTH_KEY',   '(YG^UFKGcBSXLs]SoR]QbAhPx[f9#))Pb;tN&kh~UGyY=xq7ngW:<-v]K_M)nPoB' );
define( 'LOGGED_IN_KEY',     '@zW l&C(ZqO8,d@1!ggF1(o: 6~)70I ^d6kv(]BFpa6Dwy99?7>fax2eU1{xJC|' );
define( 'NONCE_KEY',         '.KuloArN!q[ywq>%xxukLZ->$$0<r|95gs/dc!SA7rp36Tb@v.h&#tCD%~!66+wO' );
define( 'AUTH_SALT',         'L82N*~m@5{6lCE/F{ch6qY*;3ySlOTA^mx&NL0;6hH?~tSAs;!JHl;cX4Y~w/=mw' );
define( 'SECURE_AUTH_SALT',  'UpGBNG2y*a%rTDMhx/1i}`9^9/w@IH&zERK]495_/bM9{$[%uAN=qdLfSh;z9^Ti' );
define( 'LOGGED_IN_SALT',    'BgJ(4w#o2VSRdj^ 4Y|OF< fU:+vWy%}wj)#^e03}4/7J`([d._LA2MRCP5PC&)D' );
define( 'NONCE_SALT',        '`op2?a#d-e3Osm[m#mCMw_R5cu<^dX}(7hjh}aQO4ZT;;GD1-q.VzuY1VN6Zjfg*' );
define( 'WP_CACHE_KEY_SALT', '/4K)?3l}+~>d-v_XZRQK. /?WiNe?_;5biAeXL7J?sl&#wJQb)WZ]-`y^+zE0C;<' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
