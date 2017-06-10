<?php
/*
Plugin Name: Fb Post Data
Description:   Publish posts automatically from your blog to Facebook.
Author: ICB Solution
*/
if ( !function_exists( 'add_action' ) ) {
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}
ob_start();
//error_reporting(E_ALL);
define('XYZ_FBAP_PLUGIN_FILE',__FILE__);
define('XYZ_FBAP_FB_API_VERSION','v2.0');

define('XYZ_FBAP_FB_api','https://api.facebook.com/'.XYZ_FBAP_FB_API_VERSION.'/');
define('XYZ_FBAP_FB_api_video','https://api-video.facebook.com/'.XYZ_FBAP_FB_API_VERSION.'/');
define('XYZ_FBAP_FB_api_read','https://api-read.facebook.com/'.XYZ_FBAP_FB_API_VERSION.'/');
define('XYZ_FBAP_FB_graph','https://graph.facebook.com/'.XYZ_FBAP_FB_API_VERSION.'/');
define('XYZ_FBAP_FB_graph_video','https://graph-video.facebook.com/'.XYZ_FBAP_FB_API_VERSION.'/');
define('XYZ_FBAP_FB_www','https://www.facebook.com/'.XYZ_FBAP_FB_API_VERSION.'/');

global $wpdb;
$wpdb->query('SET SQL_MODE=""');

require_once( dirname( __FILE__ ) . '/admin/install.php' );
require_once( dirname( __FILE__ ) . '/xyz-functions.php' );
require_once( dirname( __FILE__ ) . '/admin/menu.php' );
require_once( dirname( __FILE__ ) . '/admin/destruction.php' );

require_once( dirname( __FILE__ ) . '/api/facebook.php' );

require_once( dirname( __FILE__ ) . '/admin/metabox.php' );
require_once( dirname( __FILE__ ) . '/admin/publish.php' );
if(get_option('xyz_credit_link')=="fbap"){

	add_action('wp_footer', 'xyz_fbap_credit');

}
if(!function_exists('get_post_thumbnail_id'))
	add_theme_support( 'post-thumbnails' );
?>