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
define( 'DB_NAME', 'Gym' );

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'BuPi?ErNY% l#oL<;nDRk:<fa[y8Tbf1JEy&R~ k/7.D2z6 };3BW?ni]{9XZi%.' );
define( 'SECURE_AUTH_KEY',  ' GK@>.K1[7r;?%Lksr;Sal,V8#_eba_Wkb1zbUK1l2,7Vk*aYcr?K>UCbN>t*<1~' );
define( 'LOGGED_IN_KEY',    'f_=?rr/s[8 ;No*`]VO3&HTpqHO&L[Gg*sQ{/>;&N@sD.t> H>3wv}(OzF7IxU*5' );
define( 'NONCE_KEY',        'SG}l894^[x$:5kl+I_V@vE;D&c|aJ8#UwVvwK`jMU C:l:)~KV`Tz)+B&@7f+jG&' );
define( 'AUTH_SALT',        'WkhOa,p5]LlUiLi<N2<(9h@X+c#Yqzub#qBvS`<yyRUUBua|hB-l]F{]KDMQ<vh7' );
define( 'SECURE_AUTH_SALT', 'W;FuSn M/;PS}&+^cY_W$qfR|0@ZmQ:X?Xx%%/o#,vqtYt{QAKE2*l=mK2.J.u6R' );
define( 'LOGGED_IN_SALT',   'P-1>wF@uqQ;s!zbfAuZe[|&79~*0-)M+ PP,1owoxQ_Ig9R~-e.?<tMKF/szzW.K' );
define( 'NONCE_SALT',       '*a6nE!UuzfpBBs?!Le>d.WzJHm,4w:yT=Xw,TMC,fy=%kbw`NP cn_VZ$q$XI`i#' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define( 'FS_METHOD', 'direct' );
