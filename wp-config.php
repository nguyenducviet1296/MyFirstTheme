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
define('DB_NAME', 'gavin');

/** MySQL database username */
define('DB_USER', 'gavin');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'S(=HBpZaAtR:eH&^v3B*fN?Y!z3L>+|&q&wsFkt Ho)(@{#,%iJq-ezt]:}tU)5w');
define('SECURE_AUTH_KEY',  'BTmm++3Q_t[9<=7iqt!evI$pM#k/skr.h{hkI;BYEOHtx, )EleuJ)^0]9:LOJnZ');
define('LOGGED_IN_KEY',    'c3Tn52o9_+mzay0 XGim?)xGKx{nD:i .^$Q6ULtzj8|T^>+{vT#7h}D/<7(@wa*');
define('NONCE_KEY',        '+^dtPnz8C7VK@W*/VvpB{fx)Uy[%m k#^^%`=.Y.+|n{{PvgR35nD[{e/xj0I:*5');
define('AUTH_SALT',        'tc-D~UjS9?%NBp`PYv&c)}PnuH?V1,sY[{Z2dJa+Z 2}H``;v~LD&kn;V>qkco?x');
define('SECURE_AUTH_SALT', '%pk&6s/?L5,CK9tzAOetG[|``CG?z XXs@K/@^>+O1q2o$6*IKSOi=cfXfbI1@]]');
define('LOGGED_IN_SALT',   '{qVQr#rE%B[kOptZ_k-3|tQ0H9O}zN{P1j vIN&VHYc|?fAXi/v#+=kQMW_2vi!Q');
define('NONCE_SALT',       ' >m4(#ltFg$kN3?PPb_^idHpiRHQT>Tw8[Hzz]FE:m<*jF^oyHlGE?xVX;{sWTio');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
