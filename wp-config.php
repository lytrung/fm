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
define( 'DB_NAME', 'fm' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'ssh2');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`oBUq05&)@WicYA&dwuYKBgojg*Y`&%<;scH}r-VD=6Cn6OW.kd9w[.x+#10NBTS' );
define( 'SECURE_AUTH_KEY',  ';$n#m4F%2PFnR}:mez#4h%Q43eZM?3h~8/+en2Hh?r|v(?I!OvHjWL66azhF$8&9' );
define( 'LOGGED_IN_KEY',    '^ozTxDQ=<k#s*[Z%UNuxUxYW)&B~BMd$R=:ZYo;PeFVa->AK!coj@FC>yBYkeq+T' );
define( 'NONCE_KEY',        'wmn&uvz&mO#OR=IzT[gx,@-rasJMSNS</cJ/zFr]qw`?O `x::]IX{^?|R}o?ll6' );
define( 'AUTH_SALT',        '!>:Ac_3QY3a>ng>,%!O-PU7,d%&(0u4(OI*~] r8/wsuPs?J[8vLVP681VMgPX8g' );
define( 'SECURE_AUTH_SALT', 'w:ggcrzS6BEDp5:%8Fy5]/)Gw|9@gz@t/@>1>kgSDW^~[GLrl<KeoWM~owl~7{g/' );
define( 'LOGGED_IN_SALT',   '_(kZWVqkz)0X0s8A|Z5yFwF?8v|)?H-[zSt7;))k2=%=dJ2!_P)^,/`Rq)S#(X1V' );
define( 'NONCE_SALT',       'oTXdaq)H0),WajZ.U[/|/ajpK&zra}>RF%c;OUYyL|g~T!,[1N|ff~&~%CBoPJB*' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

