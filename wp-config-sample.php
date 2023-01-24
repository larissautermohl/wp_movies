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
define( 'DB_NAME', 'wp_movies' );

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
define( 'AUTH_KEY',         '0`CRY7w5vk]0KB5,oV{}2<Efcr_Bu(6/8Y.}fcEdIFhIfdM;7D?wa/U;rZ[fMv}L' );
define( 'SECURE_AUTH_KEY',  '%f<m9:7b`j43?)ChIb1MP<hj}58x3?U4z:[@7+<h(95)Uu2*1V7YXS$I&]A^:(ZW' );
define( 'LOGGED_IN_KEY',    'nuLIfT9K$|SOzKrda9GOuq1>zg+ZF;&{&H)HMwGYHH49De<[x0=Xn#>f52suQTf%' );
define( 'NONCE_KEY',        'WUs QHz5,ZQ,O3Zu8T[ir[Q5p<&uE0<S( ~{MkM9HJUr6&-Giml?~X=8r~`~-|7T' );
define( 'AUTH_SALT',        '0.hGM)}<G#nB)J /@A>lZ/?ks5Wn}cB/M<kZK]z[%?L%({GBirYhlI[!R_<BPIf9' );
define( 'SECURE_AUTH_SALT', 'i2#~JCXq]D(%t6W6:UrwW !q_<K4 ,($lw>){}J%M6|OHVuWQ<+5z+4}rorAbOm+' );
define( 'LOGGED_IN_SALT',   'xwr%bvU#[|r*wS+.`y%r^A)_=Q~3uKOO>_Xl)m5lYt3z~r?c|YM$_O.U#CKzVLpa' );
define( 'NONCE_SALT',       '<^/<zx [& 0/-#CG(RlCX[x1$0~et7%g0KG.JNbPwAZ/fB-MDEg<p59[03|U-h~s' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
