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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wpuser1');

/** MySQL database password */
define('DB_PASSWORD', 'wpadmin');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_general_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Bnr,Ox+Tiv=E@77f![0sK+GR_p=eeizD<QP*a]K<*Y HJ,7pZ#2vN5QlGL<2-;,j');
define('SECURE_AUTH_KEY',  'U:X|qLoJ&33-bP~8{R(rsjW@V<XXDlJlm8v.j2 G;|u-dN&$D5l,WoJBN?x!ZNz`');
define('LOGGED_IN_KEY',    '8|Jmz^uu,Z#_rOmIqk}qH+RQZBCWn(bAd}7Y*Eu,rx+,t{(0H|@-)QEXVv5;@9%B');
define('NONCE_KEY',        'y;pXo-Hnp[#Y[%yZ>;*Q<*8%+Gg%huLx(p*WC|o3|K|^y.p2FalV^+*QdHt 8;p|');
define('AUTH_SALT',        '@ET?eI(p4$l8U9++}ch<fEQ.Xk)]1n9*lZs8+*PB41H>z&|x$FvAn5.Wh*6RZ6w-');
define('SECURE_AUTH_SALT', '5ivxI#gUsL!Wp`S!6b[WSwmyX+_/cXoM:;lZ0ZVCvf_Jv)KbcFUSio/mQVgq]>t?');
define('LOGGED_IN_SALT',   'M9 F4<yC=n.~UhErx5^QWUFZ6yn*6M`j^X{c>_Z)Zf2PKZf+1<fR?aYu)o7hUiYs');
define('NONCE_SALT',       'y7 am|]yTOIlJ-}ugUOn$-Nk@Utpz|@ck24K]YJf|)MK#]>n7;%%@LN6TMeL AnR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);
define('SAVEQUERIES', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
