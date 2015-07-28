<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'circuloip');

/** MySQL database username */
define('DB_USER', 'upmedia');

/** MySQL database password */
define('DB_PASSWORD', 'upmedia8039876.,');

/** MySQL hostname */
define('DB_HOST', 'upmedia.crcq0jopmo84.us-west-2.rds.amazonaws.com:3306');

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
define('AUTH_KEY',         'LX|7Z;+-gk@i30&zQ@.gfJuAU]dE5D~]!MeKyM$`p6Fw#L|@OE!zt+ybd:Oh$Hn2');
define('SECURE_AUTH_KEY',  '#kM`!4]oNeT>+ref4{wonF[?#,e_S+$<(%rE-f|k1+Y:5*#y_T~{u^lCb=c7E9Q%');
define('LOGGED_IN_KEY',    '(W7+lX@?sg/rX(P<=o|wof|O<dG y0y)r{6q->9!t: 0[%wL[Gw`b^7Ff*$w<|BX');
define('NONCE_KEY',        '55fmB]PPqg}H.0;SgyGWm4n1_-Hc(+<-akFt*E~SD-+5%{wK`ex,n|.G6.gZy[;x');
define('AUTH_SALT',        '{%g?s?W!Al-$63Z#_ox*W1pTQuDS|6ehSDj5+N!p@Z!_ K*@D3~4mC{34w|Z+*9w');
define('SECURE_AUTH_SALT', '=@0[3~xQMvAC+:~Kd-wH_ec`%zm74uok{DK;c?|c!3IIV!gr<)?kVGx@!NO^xL,7');
define('LOGGED_IN_SALT',   'CWSxAHdwcJ&Nn80ZN`@Di7 mC|>Lo!NS_FXUK1_@K%LW?;a!A*B*[pF44v4RQLG{');
define('NONCE_SALT',       'qT0&gB4Qf5o8 KW_z/:IsA6an*x9zSw }49!vQrO|*Dn-BuX(Fft_Ep6XA~P|_i+');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
