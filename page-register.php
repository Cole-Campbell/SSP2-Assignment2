<?php
	
	$login = $_POST['login_name'];
	$password = $_POST['pass_word'];
	$email = $_POST['e_mail'];

	echo "Hello<br/>".$password;

	//$website = 'localhost/LIT/SSP2/!Week%208/wordpress';
	
	$userData = array (
		'user_login' => $login,
		//'user_url' => $website,
		'user_email' => $email,
		'user_pass' => $password,
		$userData['role'] => 'administrator');

	$user_id = wp_insert_user ($userData);

	//$user_id->remove_role('subscriber');
	//$user_id->add_role('administrator');

	/*if(!isset('role')){
		wp_update_user(array ('ID' => $user_id, 'role' => 'Administrator'));
	}*/

	//register_new_user( $login, $password );

	if( !is_wp_error($user_id)) {
		echo "User created: ".$user_id;
	}

?>