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
define('DB_NAME', 'cl47-moco');

/** MySQL database username */
define('DB_USER', 'cl47-moco');

/** MySQL database password */
define('DB_PASSWORD', '4mNTV3N.k');

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
define('AUTH_KEY',         '&?]*wyb_H<:-AI<ufJ2P?x94ho90U[%p`ub:>@$I%!<8h@L UCK)n3K{=>JAvFE7');
define('SECURE_AUTH_KEY',  'CW z=ZNKM0gF_jn9+VCp7~O$=^U]PcwPzopIQcVI#bT]XIuk5q#6.&fzcmzu{w&}');
define('LOGGED_IN_KEY',    'W!MvNj{Zul[s4wL!fW#bx<MzfSG=HtBllmc{]k*=_@n-PEi{1MYHlGK?t//yMX;o');
define('NONCE_KEY',        ':[08)$dq~X_:PL5_c^oT0G!|8ScO/z7o2Fv.)!O=(g`yQF68~>56($LQ;~;1U9/R');
define('AUTH_SALT',        '0X3-}0|EM$hSd|v$7d#%-lj,4m4xJvn<[h*W$$a0bBWo=T@?vsD2 M11gP6auI@&');
define('SECURE_AUTH_SALT', 'kkjmFA|]cJHqb%4*t@cZ4;v~(RULG1W3pn{~]Dq<*hvniUx:O,>IkUKb@=HPN;wc');
define('LOGGED_IN_SALT',   '30Chj#Xm+3Z><xzq5;#Oz[hVM6A`wz67+!YdVD)c6rVC/nk/UJt<iu6.G &m>.fD');
define('NONCE_SALT',       '[^A&UkZ[z!o?O33k&$b@34(n*n_#a>fFpUjMT2glNkyoS!WccZdO0_3?I<VzYV+Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'moco_';

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
