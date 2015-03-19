<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jonathan_wordpress_db');

/** MySQL database username */
define('DB_USER', 'jonathan');

/** MySQL database password */
define('DB_PASSWORD', 'bydesign');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'O..8pG{c[o#mkIt(qpb_r;3qpX B[XpV~X@M]{[iSK0)b=Q&t?$XNWsm )PL:![g');
define('SECURE_AUTH_KEY',  'a|<f=k5?KGD9JPY|wL,L_Y@w9DygcT}?,=a(9I_E!##>b<;4O#O`hNK)SBqADnQ6');
define('LOGGED_IN_KEY',    'sa_?:Rd8H]h|69v.(uFwAy0-_J1=eDn/e{|.B35+:T0<>4}NVnZCRUc+=ax@ `D^');
define('NONCE_KEY',        'x<Kxif#Wy<WLXF9PupJ{)|fr%LRpm%d<-Yp@D~BK1@w`u{LW-/^kaIo+`G5f?|-[');
define('AUTH_SALT',        '_N;Gynpuv!%Cs9;Q!%CuCs(]{*])b!~NIk^q0rpvY=hG19X!*>#T:+gw,iKR5>)a');
define('SECURE_AUTH_SALT', 'zE8o^kE`4kfHLW?H|N(iEA!EQ4RGfcP=j<T$e4h1k5=@4A2+$.{:|3Mu)nJL{,31');
define('LOGGED_IN_SALT',   '=A>xk,!^%`)%cCc1Z48>YoO1xohEqs:36`lY<Be3R|Xv@aQ0h%B X+U:,0[gN[0S');
define('NONCE_SALT',       '{iT+;aty+DjQMYtoh6?[6}]2e8-62vp-e,z1`$ULR9rDfVlt:<:X>NsCS(CD( lZ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wwf_';

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
