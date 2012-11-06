<?php
/**
 * @package Hello_Dolly_Extended
 * @version 1.7
 */
/*
Plugin Name: Hello Dolly Extended
Plugin URI: http://www.sennza.com.au/
Description: This is not just a plugin, it symbolizes the hope that all WordPress developers will one day make their plugins extensible! This plugin is a demo plugin for an article on http://build.codepoet.com/
Author: Bronson Quick
Version: 0.1
Author URI: http://www.sennza.com.au/
*/

function dolly_extended() {
	/* Now we need to remove the action that adds the Hello Dolly lyrics in the dashboard so that only our plugin works */
	remove_action( 'admin_notices', array( Hello_Dolly::get_instance(), 'print_lyric' ) );
	/* Pull in the class we've written to extend the rewritten "Hello Dolly" plugin */
	require_once( dirname( __FILE__ ) . '/class-extended-dolly.php' );
}

add_action( 'plugins_loaded', 'dolly_extended' );
