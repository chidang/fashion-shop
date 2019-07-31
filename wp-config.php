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
define( 'DB_NAME', 'db_karo' );

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
define( 'AUTH_KEY',         'MxtLLEC2Vp [uHY/yPSWaHutTm_&uY 7a6?NH&GhX{ml0R|Y` x6In@T=JiXdrx>' );
define( 'SECURE_AUTH_KEY',  'D(=cH|%<5HrG,#7neA3,Y`k?QY[EvMahW*8w_Q|caXHyJEo<KD&lna;EVEQF0Bms' );
define( 'LOGGED_IN_KEY',    'Rc r1R$yuo8}hxpCdJeB^%E/!AEp4J/%e:o4jL8A%9BM!XAs<0Q(#YeK}s2xUrBC' );
define( 'NONCE_KEY',        'P(@3NEsvy$L/^iP3S=Mh4enwRG#w6eQs6La$ hqT5e}7Y3Es#W$pVo<2%VkPeB%0' );
define( 'AUTH_SALT',        '<ikLHlY3oeC/|Nou_S0nxe2{d{064iLca>Zc9$ll(it`-m{6N,C;gVjwUf&<XP>!' );
define( 'SECURE_AUTH_SALT', 'M[.M4[K}4 sBZ%R56[&vTZ8u9.7;:1QY<ak5j&>_ZK/LspV*5@3+,=*1J#{AsX +' );
define( 'LOGGED_IN_SALT',   ':Mh{~5^1m-dGu1bzAd|go<Ldy^q3:(ucv{eE.[.*zYaMT7Z2,(TNz&u|MJ&mG,cm' );
define( 'NONCE_SALT',       'v}IfkV:$c&@  U1CUrh0b-K>R8]:H*Y+%4Hd8Lqh:@u.3LLo^0ZtN+$cd2dN*b@&' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kro_';

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
