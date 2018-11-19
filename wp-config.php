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
define('DB_NAME', 'cimbrapropieades-cm');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'gxs[?qa5ns8s<xei$w:PyeZmI?i&`&;Ik*EyVQlA!>Zt8FIL2vk,-A&&+d]lY:o(');
define('SECURE_AUTH_KEY',  'Q=o`]?[wN,CJCApf ?z@d:1;VZ,tz19xd:(-F&X!j@{`ldv-cY _N/zu3|L>Lr]O');
define('LOGGED_IN_KEY',    '4,i~VmR8be- x>3@`n.seSu[bK4fHD:wYF7?,K4oFUFK`|,Cb?//IP)0A>c!SLKu');
define('NONCE_KEY',        ';y(!t cp.1T (B^1J$0tb%>*<p8e+}#[])aW/3aR:KGj:ym(uT5r&@[p`u_LahwD');
define('AUTH_SALT',        'G0a7jh^>d#Nq#V1L;hvx[Y^]yPR%{]aI(fay#X(I-ti[CL#uNf1v1K,:_t~zx8H!');
define('SECURE_AUTH_SALT', 'Gm3/Sz(O2vtW9mpI?eV3C.GnzK-d gx}w#i(/aR}@]Ap(VH!|:8`?(Et|MAM#J-j');
define('LOGGED_IN_SALT',   'i&zJg[F17pH!5+b`b2@>k^K#kr}/m(qkjyYVvR]p9k<g#uu0dQz`1zXVyq2;BCs3');
define('NONCE_SALT',       'A6^Ghf>}D|CGH]&?n&XK&Ga%S-5DHPT}!,,wUe-?,3^G}_ _)_eC4m${=BT:;u60');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cm_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
