<?php
	
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
        echo "You are registered - please log in below";
    }
    else{
        
    }

?>