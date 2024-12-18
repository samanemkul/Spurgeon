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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'spurgeon' );

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
define( 'AUTH_KEY',         'fs=a@o-KXIemZC%ferdXZY;AM<,k7B`F?#@!k?|0>-op{ZH-}1u|Qj/PAS>3M:7`' );
define( 'SECURE_AUTH_KEY',  'G@5<ZOhUWV&H^_OBF}ni5<UlGeGG`CYEFkDgFN.TPDUOFj8u8%ukK+DRMRSBd9XB' );
define( 'LOGGED_IN_KEY',    'O<!+~7aj$wh!6 on^j fCX]M3!ML>%02!Rs) hFD*o+Kbt:_yVLVxCpba2PJvO!R' );
define( 'NONCE_KEY',        'Ay.)z^1xR7W.eDf7zxNw%IPc{#4aN$q]V}_aMPYATt@_EMU,|N<Md[W4o^aDOLkM' );
define( 'AUTH_SALT',        '2Kw3q!CeesrN*jX<<}Bt)P!!FD{,XE_w%r _OF.T`DUJxap$K#8x2(!apYS?!>Wg' );
define( 'SECURE_AUTH_SALT', 'rP>6{.ZAyT^ua+ZrAmm!6-K=x~EeP!k+U=.AXKA))ER1K*ebqR}_+&)/]Pkt`F<B' );
define( 'LOGGED_IN_SALT',   'b^0et!WlT}6Qqqsb;jkcInK$r1H&,{eVbOr.6? tMYS]??y4(P<<l]._AMSP]@W2' );
define( 'NONCE_SALT',       'K5nB];@RZ2@_wDA069e0{(n*s%Yc5spj5:u<t]0;Rj85kYw[hSr8ObU7;V*x7]fB' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
