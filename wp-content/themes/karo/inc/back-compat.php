<?php
/**
 * Karo back compat functionality
 *
 * Prevents Karo from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Karo
 * @since Karo 1.0
 */

/**
 * Prevent switching to Karo on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Karo 1.0
 */
function ftc_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'ftc_upgrade_notice' );
}
add_action( 'after_switch_theme', 'ftc_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Karo on WordPress versions prior to 4.7.
 *
 * @since Karo 1.0
 *
 * @global string $wp_version WordPress version.
 */
function ftc_upgrade_notice() {
	$message = sprintf( esc_html__( 'Karo requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'karo' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Karo 1.0
 *
 * @global string $wp_version WordPress version.
 */
function ftc_customize() {
	wp_die( sprintf( esc_html__( 'Karo requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'karo' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'ftc_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Karo 1.0
 *
 * @global string $wp_version WordPress version.
 */
function ftc_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Karo requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'karo' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'ftc_preview' );
