<?php
#Sitewide functions
function register_my_menu() {
	register_nav_menu('header-menu',__('HeaderMenu'));
}

add_action ('init', 'register_my_menu');

if (function_exists('register_sidebar')){
	register_sidebar(array('name'=>'sidebar', 'id'=>'sidebar'));
}

function get_user_role() {
	global $wp_roles;
	$currentrole='';

	foreach ($wp_roles->role_names as $role => $name) {
		if (current_user_can($role)){
			$currentrole = $role;
		}
	}
	return $currentrole;
}

function check_user_logged_in(){
	# Checking to see if the user is logged in. If they are not then they will be redirected to the homepage to ensure security.

	if(is_user_logged_in()){
		the_content();
	} else {	
		header('Location: index.php');
		#header('Location: ' . wp_login_url());
		exit;
		#echo '<p>Goodbye!</p>';
	}
}

function log_out_user(){
	#wp_logout();
	wp_logout_url('index.php');
}

?>