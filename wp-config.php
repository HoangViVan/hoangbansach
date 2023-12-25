<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hoangbansach' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's6g)_cypJ$(/$Kk%CAI:I]vD^DFZ-}_..ZJJ;-%,vn.o&jN;%aU|>L[`mVVBv0Dd' );
define( 'SECURE_AUTH_KEY',  'S<$dR~|uPaQA>A)S7:[akfu`#yk^Wy?K.~dDMHhK3c1?S/jP(1fW?2H5^cC0-GZ&' );
define( 'LOGGED_IN_KEY',    'l Tzxs?hZNcAK!TM8&YvIGaPXwP1<EicPTcEX<a$b^)Kk51PPeq)|_M+yj<69MGW' );
define( 'NONCE_KEY',        'rm_yH<F&tu:|9Csu@?DVZl$-udY<.Fur[(3MVrjF?yI^m7W<8E;)*8}9Vq6td+[G' );
define( 'AUTH_SALT',        'N$>J)WbJ:,P{#/o3nnI;/J5*=E3jSQeVHRTe>bx{p=Q.(.4n)b},cF,q7M+O)%12' );
define( 'SECURE_AUTH_SALT', 'gGyU/BweN%w&PUnTyDd+mRbl^Yt gT!m*&/rS|L`,p&Z[_hSiIco&nc_$uVIkSbg' );
define( 'LOGGED_IN_SALT',   'X],|,8]Sj@NzXX,IW]Ad*GL7lYA`T<7(kxHK|HGIVdvR:(Crw1a#U<TpA6`d1zK]' );
define( 'NONCE_SALT',       '}_h?Ix;<vbDP?^i{UlZRnP?fu=G`qGa-P| i4RxwOg*/FG>?O-/{G,ymnCoJgj)*' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
