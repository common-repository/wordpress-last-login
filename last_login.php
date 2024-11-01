<?php
/*
 * Plugin Name: Wordpress Last Login
 * Plugin URI: http://patrick.bloggles.info/
 * Description: This feature provides information about the last login activity on your blog account and any concurrent activity. Sponsored by Violinesth <a href="http://violinesth.com">Violin</a>
 * Version: 1.0
 * Author: Patrick
 * Author URI: http://patrickchia.com/
 */

/*
 * Get your valueble Wordpress hosting at:
 * http://mu.bloggles.info/wordpress-hosting/
 */

function last_login() {
	$logip =  date_i18n('Y-m-d G:i:s') .'/'. $_SERVER['REMOTE_ADDR'];
	if ( $logip )
		update_option('last_login', $logip );
}

add_action( 'wp_logout', 'last_login' );

function get_last_login( $footer_text ) {
	$last_login = get_option( 'last_login' );

	if ( $last_login ) {
		$log = str_replace("/", " at this IP: ", $last_login );
		$lastlogin = ' | Last account activity: ' . $log;
	}
	return $footer_text . $lastlogin;

}

add_filter( 'admin_footer_text' , 'get_last_login');

?>