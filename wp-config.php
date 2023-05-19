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
define( 'DB_NAME', 'admin-submenu' );

/** Database username */
define( 'DB_USER', 'adminD' );

/** Database password */
define( 'DB_PASSWORD', 'adminsubmenu' );

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
define( 'AUTH_KEY',         'gu!ouvUYe<ME99cq^DI<W;*at}T^eXb[L*q;6Vs,=}Wc2+#gA^)vH:V{eoM}Cz~d' );
define( 'SECURE_AUTH_KEY',  'P**<ny><%5v[CwrZ.u}L$Hzrwqk[8$-p&HzDS)4SN)5<8yz@9MKSN6Ep=PP)SA{K' );
define( 'LOGGED_IN_KEY',    'g|%52<^(]BvOItFp(%RAV*!TEcxGaNqbEI/Zry&*X-giKN(:e8PWbsh004j6nR[]' );
define( 'NONCE_KEY',        'C_BJ}cwdQn 1&>wV?`&0|~n8$)5*?o>$v<sSu~.&/G|-D.sircbw8uY m#{4WQEg' );
define( 'AUTH_SALT',        '3YXJ- xNcW|Wv|vHl}j7;2~HUS.{c%y)Z=>8X8ahb!@X`kEc`D_KDq}XE~be@#H3' );
define( 'SECURE_AUTH_SALT', '0UjgutYffse[6[n9>p ls>f@lR>F6]?Q5PaZ)`<dXS-l)3HODW9vd.6kwn]=.Z=a' );
define( 'LOGGED_IN_SALT',   'u.YKB1y9aZT>U.t,SkK}wo0sE8Rg(L,*dt@j&U#[xa&tq #%g9?u [h!#D-7LZ5(' );
define( 'NONCE_SALT',       'B0&]NY9`![PusyRI<urqxH-X(kyzhOW:.u*qO?F+]Yn|ZgfQx#$?X7! ,u^}:5JF' );

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
