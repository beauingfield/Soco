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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'soco_dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'XE]vgp} kx2{t>**{Y:,QH,EEB+%*!+@dH7SixwL>f&j +bgL&rBG>h7fG(8rbo~');
define('SECURE_AUTH_KEY',  'vxH{yk6qRL<}*1uDVjU%T:}Fx8=4N-jEDy+W,s8M]<p$5Lc0S(Kt[MMHND;|~VVt');
define('LOGGED_IN_KEY',    '8I!3K-a^3*mgajezz3={X_$DsE _Sl1+9}5OJ2Hv^pxin=SLtNxI5FCipJ#-fHMb');
define('NONCE_KEY',        '#d:.|g]:TD?:|8}}a3ARoi!*j:70:G8I LR Dy!rg|[@j^9T{S%*?Bk(!_0  +A{');
define('AUTH_SALT',        'i+Fat[1A}I#xX;;v]!H#k`Zrbo6Zt~,XcWYh.53N[CKEzc9!+(<(.+[>-Y/I-,n)');
define('SECURE_AUTH_SALT', 'f$jWCu0N@?>.S+JRo>SnpAIg-ST&&gG$nF|6EY=,ym%wbf7w?p0#-1o^ .N.t+-{');
define('LOGGED_IN_SALT',   'S3V{Ag:jKjJX.<+^4yXJ,,<&9SfN-%5!d_5?{+U`x+-7Ifx 7 W$LS7~ZEH_N&K]');
define('NONCE_SALT',       '-*6k/Ca|%.@tfE|/anjs(nc>r/O(ZiJ1p&x;qGx[GK>QL~mtqhX$cO}6`9#Iv1ak');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_sd_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
