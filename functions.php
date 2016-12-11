<?php
#Removes the default WP Admin bar
add_filter('show_admin_bar', '__return_false');

#Registers the menu within the backend as a main menu for the website
function register_my_menu() {
	register_nav_menu('header-menu',__('HeaderMenu'));
}

add_action ('init', 'register_my_menu');

if (function_exists('register_sidebar')){
	register_sidebar(array('name'=>'sidebar', 'id'=>'sidebar'));
}


function check_user_logged_in(){
	# Checking to see if the user is logged in. If they are not then they will be redirected to the homepage to ensure security.
	if(!is_user_logged_in()){
		header('Location: ' . wp_login_url());
	} else {	
		
		#exit;
	}
}

#If the post passed is addExpense then the function below is run. The data passed is sanitized and then pushed into the database.
if(isset($_POST["addExpense"])){
	
	$expense = (filter_var($_POST["expense"],FILTER_SANITIZE_NUMBER_INT));
	$type = $_POST["type"];
	$id = get_current_user_id();
	$data = get_user_meta($id);
	$name = $data['nickname'][0];


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

#If the post passed is register, then the function below is run. The data is sanitized and then pushed to the database. Error may occur if the name is taken.
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
        $fail = "Username is taken";
    }
}

#Functions which approve, reject and delete expenses
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

?>