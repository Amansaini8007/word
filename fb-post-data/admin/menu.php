<?php
add_action('admin_menu', 'xyz_fbap_menu');

function xyz_fbap_add_admin_scripts()
{
	wp_enqueue_script('jquery');

	wp_register_script( 'xyz_notice_script', plugins_url('fb-post-data/js/notice.js') );
	wp_enqueue_script( 'xyz_notice_script' );
	
	wp_register_style('xyz_fbap_style', plugins_url('fb-post-data/admin/style.css'));
	wp_enqueue_style('xyz_fbap_style');
}

add_action("admin_enqueue_scripts","xyz_fbap_add_admin_scripts");



function xyz_fbap_menu()
{
	add_menu_page('Fb Post Data - Manage settings', 'Fb Post Data', 'manage_options', 'fb-post-data-settings', 'xyz_fbap_settings');
	$page=add_submenu_page('fb-post-data-settings', 'Fb Post Data - Manage settings', ' Settings', 'manage_options', 'fb-post-data-settings' ,'xyz_fbap_settings'); // 8 for admin
}


function xyz_fbap_settings()
{
	$_POST = stripslashes_deep($_POST);
	$_GET = stripslashes_deep($_GET);	
	$_POST = xyz_trim_deep($_POST);
	$_GET = xyz_trim_deep($_GET);
	
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
}
?>