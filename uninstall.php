<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 */
// If uninstall not called from WordPress, then exit.
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$options = array(
	'lightning_fast_buttons_api_key',
	'lightning_fast_buttons_auto_embed',
);

foreach ( $options as $option ) {
	delete_option( $option );
}

$social_media = array(
	'tw', 'fb', 'pt', 'ln', 'gp', 'su'
);

foreach ( $social_media as $social ) {
	delete_option( 'lightning_fast_buttons_' . $social . '_display' );
	delete_option( 'lightning_fast_buttons_' . $social . '_counter' );
	delete_option( 'lightning_fast_buttons_' . $social . '_vb' );
	delete_option( 'lightning_fast_buttons_' . $social . '_path' );
	delete_option( 'lightning_fast_buttons_' . $social . '_transform' );
}
