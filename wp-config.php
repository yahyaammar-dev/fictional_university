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
define( 'DB_NAME', 'fictional_universitydb' );

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
define( 'AUTH_KEY',         'j064f_WgJBdFg{##VH4V/EKQ7;2YxCM:zUuW6UxGk7?D0;KBj^>gtVO+~K q,*RM' );
define( 'SECURE_AUTH_KEY',  'hj/wKs!0Rz##wkodv4(=im5tW@eDp//h~W@``JUKGTO7`[cFkvP{J&fZ:7;tm`B[' );
define( 'LOGGED_IN_KEY',    'A(Z0((92B3=j100h.nl<O+W3RJ9x)@H[D3SwHQ)parIl*ttv$?IseJW|?Tn7EB*=' );
define( 'NONCE_KEY',        'F.H|,91KN/[^wh_R;`;Qj=/oNIJ3ltV+^A3^ARJw=M?Sh9%KNPX`}/I]jycY4;7;' );
define( 'AUTH_SALT',        'dg66fY]$@9ZzsJ7q#pxg9@;/Dtn$F%5>8k~A.yx.bLx3BfM>`})Z?Ym8S4.h1{Nw' );
define( 'SECURE_AUTH_SALT', '<[Xjz%{uJhP<We+z<cKB*!ZP7]]BU&6hR<E[%-1%B.px6J!nu.}S3R:u)AG&^L5v' );
define( 'LOGGED_IN_SALT',   'My <C`{!f(4S<YA$=e;U^(~D`qATj0p5{WLdevNN!R]$$<,YUkJUBz#1ZGj20gK.' );
define( 'NONCE_SALT',       '%`LT&cmlR@59vNw2qP%]U{tr!9c@iOi>{yF9J|#Z1|:|TU(%fya4w3E$Q8L~NCvI' );

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
