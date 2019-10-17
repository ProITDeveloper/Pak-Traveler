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
define( 'DB_NAME', 'PakTraveler' );

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
define( 'AUTH_KEY',         's9XTCv 0ZZ[u9xN&F+kp11*Pz+7g4i2!An:RySzSNtbP>ISr9ghEfPbR^A)]]!L*' );
define( 'SECURE_AUTH_KEY',  'OE1>kHYzEuGt9;<<-rX9dSctxS0d]cv,mf?eI^La3!:u_ty[!GK12P*66A@bP+xi' );
define( 'LOGGED_IN_KEY',    'eH_,b%}D7_PScl MkX9$_M X3GN4bW[XqsHaVhG;xcPw=k7S7C=~P=LR <Gb;5U_' );
define( 'NONCE_KEY',        'w&::Z,ojZdip|*E}SwGvejz%lJv7uCC_P:{1&8p6E2XA{wO6LbPCI-5wbBHwVE+l' );
define( 'AUTH_SALT',        '.y)yLe%7re{]}jIp=Df0JCBJ}2Z(If73f>ZxhjZtvJhf=Au@am:xYj^H)6Hgk5YM' );
define( 'SECURE_AUTH_SALT', 'm0;/386k[|Mx&nTWXN`PU#>@i]Ec%|WzkV<Qc[&VUB,=O7f+y2/(Vze+v%v<ngL=' );
define( 'LOGGED_IN_SALT',   'oJRWENI%lX$ >O$kGe4a[%f]Vv1g-fDU[QzF,cl&CBH_,`LInQc~|9)U*G.xe(q8' );
define( 'NONCE_SALT',       'Zxy>qh[ebw<dIL4<8MNzQ#iW(yH@OB5T7]#`n<hSj}5w&j2iVxt(&Zz&QR!^Q(bo' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
