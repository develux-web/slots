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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sn471259_slots' );

/** Database username */
define( 'DB_USER', 'sn471259_slots' );

/** Database password */
define( 'DB_PASSWORD', '+g(26UdC9s' );

/** Database hostname */
define( 'DB_HOST', 'sn471259.mysql.tools' );

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
define( 'AUTH_KEY',         '&[z]-UhF$QLQ8b,;)Ue(PiDJ=8$~fbA/Qy=5yj+~qEGJ|aiPH?TTLA{Xv:q.pFOW' );
define( 'SECURE_AUTH_KEY',  '4X8%F[a9AK`N!&[Qeq}X56J?&O.eLwwHt]ze;.g^Qh;`s[L|[eNr59lr5j|UT..7' );
define( 'LOGGED_IN_KEY',    'pTAHPz&6 E=JJl3Aek{RsdJhQ#d(I(dvKd}D<^R9+7u5C.!::_Z&Y)r.Zy@z8eL`' );
define( 'NONCE_KEY',        '^gY2[BgqcXMp1},|2/]7>h+[v&DZY,WIcq{rX!ek[MiLf@[l)$D5 M$Our>!Jn~|' );
define( 'AUTH_SALT',        '{!6f%sf;Q`fm<kmz!8%.6IaIc2Ekhk{$g~wJt+Rrx1#=wDlO6dP8n(m%mDx7ax9.' );
define( 'SECURE_AUTH_SALT', '@P>`cmFFN+K8`#7fZSxUP82W~)x*U/}UWh>_^v+Z*r+:0ksRg61; 1Wizq,&avFt' );
define( 'LOGGED_IN_SALT',   'ew3~kCZM&<;O|p,u@r/7KNAY.]zFid9P}h:7|i6o>e%C!#]WzhaCi?z}[)xPDzBJ' );
define( 'NONCE_SALT',       '5EvTyz]V:+AO`RCwE$fO.IA/&%guob=/6JTGt~wQ>NbR`A>{| N;*(Z+v!kBW$F6' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
