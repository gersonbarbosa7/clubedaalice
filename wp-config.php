<?php
//Begin Really Simple SSL Load balancing fix
$server_opts = array("HTTP_CLOUDFRONT_FORWARDED_PROTO" => "https", "HTTP_CF_VISITOR"=>"https", "HTTP_X_FORWARDED_PROTO"=>"https", "HTTP_X_FORWARDED_SSL"=>"on", "HTTP_X_FORWARDED_SSL"=>"1");
foreach( $server_opts as $option => $value ) {
if ( (isset($_ENV["HTTPS"]) && ( "on" == $_ENV["HTTPS"] )) || (isset( $_SERVER[ $option ] ) && ( strpos( $_SERVER[ $option ], $value ) !== false )) ) {
$_SERVER[ "HTTPS" ] = "on";
break;
}
}
//END Really Simple SSL

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
//define('DB_NAME', 'clubedaalice');
define('DB_NAME', 'gerso197_clubealice');

/** MySQL database username */
define('DB_USER', 'gerso197_clubeal');

/** MySQL database password */
define('DB_PASSWORD', 'q;y!wFGTsZh*');
//define('DB_PASSWORD', '427673de292e2f4116f0211d28ef08bed12a9d1cc180268f');

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
define('AUTH_KEY',         '1lEnU[{rDUf6_0}zm=}fOc%@Pv<JISbtyopBz.&HNK~TYALv%g~O3+&)88~Ir=7k');
define('SECURE_AUTH_KEY',  '@AFk:Qd|hooO2d8oEEoy_,bO*<:J]g8U3u(FX(W=|7*7[ I9KL;Sr81o.V3#(0$4');
define('LOGGED_IN_KEY',    'tp+|%Y|`>$[ozERCe<k/UcIQ>(!bSyuGlCR&j{OX=9}kj8C.8S~d[+ei>:^<^mAT');
define('NONCE_KEY',        'Yiq|pa6IPe+4[448(}}Q+1c2:#yuU-XrO0Lj|gJn0#1nEy~PKRi::4NyW#:B,0`a');
define('AUTH_SALT',        '%9_9ek:)742kIH~@!7f}v,a.aLOXm=Cxt>|*HJYg!v=^HYig!+Mszq[M|pGOpHLW');
define('SECURE_AUTH_SALT', 'k$0^jaFIRsZ|y K9sKp=E8HO!un5WA:d:.seX-PrJ}h;bk(NVt(WR>c-JeX}-|JA');
define('LOGGED_IN_SALT',   'QRT<#MES+Gpx&bzd8MsfO?_R_f?uUL/TY}*z+.JnY$gd0`s. 71=?O?Zye sG/U3');
define('NONCE_SALT',       ',$%n4S+;?tRDzaKXywN78e[uQCQXr?4Qv&8YY:rt?1v9?owtK[T6<|5};AHXdyQ&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'walpice_';

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
