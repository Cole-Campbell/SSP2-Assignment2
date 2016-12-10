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


if(isset($_POST["addExpense"])){
	
	$expense = (filter_var($_POST["expense"],FILTER_SANITIZE_NUMBER_INT));
	$type = $_POST["type"];
	$id = get_current_user_id();
	$data = get_user_meta($id);
	$name = $data['nickname'][0];

	//$website = 'localhost/LIT/SSP2/!Week%208/wordpress';

	$wpdb->insert ('expenses',
	array(
		'user_id' => $id,
		'name' => $name,
		'amount' => $expense,
		'status' => 'Pending',
		'type' => $type

		)
	);
}

add_filter('show_admin_bar', '__return_false');

if(isset($_POST["register"])){
	sanitize_text_field( $_POST['login_name'] );
	sanitize_text_field( $_POST['pass_word'] );
	sanitize_text_field( $_POST['e_mail'] );

	$login = $_POST['login_name'];
	$password = $_POST['pass_word'];
	$email = $_POST['e_mail'];
	
	$userData = array (
		'user_login' => $login,
		//'user_url' => $website,
		'user_email' => $email,
		'user_pass' => $password);

	$user_id = wp_insert_user ($userData);

	if(!is_wp_error($user_id)) {
        $pass = "You are now registered - Login button is above.";
    }
    else{
        $fail = "The information you have added is invalid.";
    }
}


/*if(isset($_POST["statusUpdate"])){
	$status = $_POST["status"];
	$id = $_POST['expenseID'];

	$wpdb->update(
	'expenses',
	array (
		'status' => $status
		),
	array( 'id' => $id),
	array(
		'%s' //Value 1 data type
		)
);

}*/




if(isset($_POST['approved'])){

	$id = $_POST['expenseID'];

$wpdb->update(
	'expenses',
	array (
		'status' => 'Approved'
		),
	array( 'id' => $id),
	array(
		'%s' //Value 1 data type
		)
);
}

if(isset($_POST['reject'])){

	$id = $_POST['expenseID'];

$wpdb->update(
	'expenses',
	array (
		'status' => 'Rejected'
		),
	array( 'id' => $id),
	array(
		'%s' //Value 1 data type
		)
);
}

if(isset($_POST['delete'])){

	$id = $_POST['expenseID'];

$wpdb->delete(
	'expenses',
	array( 'id' => $id),
	array(
		'%s' //Value 1 data type
		)
);
}

/*Attempting to create login
function custom_login() {
	$creds = array();
	$creds['user_login'] = 'example';
	$creds['user_password'] = 'plaintextpw';
	$creds['remember'] = true;
	$user = wp_signon( $creds, false );
	if ( is_wp_error($user) )
		echo $user->get_error_message();
}*/

#Removes the Admin bar provided by Wordpress, as it was coming up blank 
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

?>