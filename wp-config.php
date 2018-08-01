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
define('DB_NAME', 'wpdevrix');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '8404');

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
define('AUTH_KEY',         '`CB9$n~f[Y1VZB<r>CPFx]l*|ieVxC0K*F.i<AjS;m&h~%`zGcD8xAzN~Q7D),vY');
define('SECURE_AUTH_KEY',  'E,1g*)wHGuP0Lm+pBZZBj=3j&NG{l)kh-vReoq_Qxoa4@UYJ&97KWcW-d_y;I0@l');
define('LOGGED_IN_KEY',    '107>-[Ew*;P*hd!>T)<DfML=bO,ZbF5oTyQ^_i2wB@Kz>i5CT&zxE)#G~Nxgj_.J');
define('NONCE_KEY',        '=X>tAiRWI;/~)c[^S//B8-3}HV !HR///mA&4 QpeUc./wO@>0H3/F-+}/xO?<Is');
define('AUTH_SALT',        'iRELu4jA~N1oWAc%^o24qi)pUYjt^a.mcKM;sI^xDgIi{8ci(mFAmpg%W]s$Qm0O');
define('SECURE_AUTH_SALT', '/E)[XMI[eW;(;l[BqpwKbAtxt5*0jZ%V]w7_?hi}i9gHx?J|r8`*,2j6#q[ iTmo');
define('LOGGED_IN_SALT',   '+vVEQ5/Yu9#fDo o8OCz2D%FrCNj?*uZr.nH0p(CMo%B[qJJ}r`dFwOn?2}Q)5xz');
define('NONCE_SALT',       'C3w].&y`-A#%B.ri._t>9E1R_2PUG!OU:Mh3BI?I}j,YCcmJ6_%Tp1Cn=j-hrM>G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dvrx_';

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
