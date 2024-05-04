<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'wordpress_ostad' );

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
define( 'AUTH_KEY',         'HI9J@J&bMz3a)Sn*GY}pspkIr]LsULjO:Roj@H8t:K59 OepRdcxc]JZ]}?@%+d>' );
define( 'SECURE_AUTH_KEY',  '}9y e=JJ[B_[m`Jy+8,G6:CtHHirpx4wtrfe;1A_K*tQWht/G>n%#FJquy_:OVLf' );
define( 'LOGGED_IN_KEY',    '=^6x A8TH_GY`#O5/ffWgorj`fVtE*(RSy(>6-w7H]F`;AOai&5Hj`TN<UX4=CzT' );
define( 'NONCE_KEY',        'p4n]6aiwq}B#^_3jH@$wO7l*}w:5@[W{fra(UPLytwK,r&G9QB^tIB~D]DI?aY0i' );
define( 'AUTH_SALT',        '|=|{~Oe8uozy=RY.>P,H7!oo):=${0Nm8(qx ?MK(s,FydlIpj<iuUl8EMH-YhQq' );
define( 'SECURE_AUTH_SALT', 'RX!5p-b#m|O.b,Rs}pYR^qsqF0Q{>O}kH];O{+B&,,gh m(<yFyv4Z|:5a)IF@.:' );
define( 'LOGGED_IN_SALT',   '}L-YVl|2qU_g%#s*j9&6?H}HtgTJk%FLn;E^|JknXo!1E7`5C!<N@Q7U]CbP_&BA' );
define( 'NONCE_SALT',       '-/DE3yq%gy]MLW8l1l1)zEZ+E)pO(?2GL$v!-~emdh;6FM4~}n-N(W]F,?p^cUdj' );

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
