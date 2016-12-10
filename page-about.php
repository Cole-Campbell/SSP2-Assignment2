<?php 
#Controls the display of the front page

/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Cole
 * @since Cole 1.0
 */

get_header();
get_sidebar();

?>
<p>Text goes right here, says the imp! About!</p>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1> <?php the_title(); ?> </h1>
<?php the_content();?>
<!--<?php #echo get_option('siteurl');?>-->
<?php echo get_option('cc_test', 'Cole');?>

<?php 

$check = get_option('page_views_test');

if(isset($check)){
	$check++;
	update_option('page_views_test', $check);
} else {
	update_option('page_views_test', 0);
}

echo get_current_user_id();

echo '<br/>';

echo get_option('page_views_test');

#Login
$args = array(
	'label_remember' => __(''),
	'label_log_in' => __('Login'),
	'redirect' => 'dev.colecampbell.design/Assignment2/wordpress/wp-admin',
	'remember' => true);

wp_login_form($args);

echo "<br/><br/>"
?>

<!--<?php/*

$userID = get_current_user_id();

update_user_meta($userID, 'favourite_song', 'Gypsy');

echo get_user_meta($userID, 'first_name', $single);

*/?>-->




<br/>
<br/>

<?php
#$wpdb contain a set of functions to interact with the database.

#<?php 

#Makes the wpdb variable available
global $wpdb;

#$user_data = $wpdb->get_var (
#$user_data = $wpdb->get_row (
$user_data = $wpdb->get_results (
#"SELECT COUNT(*) FROM $WPDB->users"

	#"SELECT * FROM wp_users WHERE ID = 1"
	"SELECT id, user_email FROM cc_users WHERE id>0"
);

#Breaks down the query and displays them individually
foreach($user_data as $udata){
	echo $udata->user_email . "<br/>";
}
#echo $rows -> id;


###############

#INSERT

/*$wpdb->insert ('table',
	array(
		'column1' => 'value 1',
		'column2' => 123)
	,
	array(
		'%s',
		'%d'
	),
);*/


/*
WORKS
$wpdb->insert('grades',
	array(
		'name' => 'Me',
		'subject' => 'Math',
		'grade' => 80
	),
	array(
		'%s',
		'%s',
		'%d'
	)
);


###############

#UPDATE

WORKS
$wpdb->update(
	'grades',
	array (
		'name' => 'Cole',
		'subject' => 'Math',
		'grade' => 90
		),
	array( 'ID' => 1),
	array(
		'%s', //Value 1 data type
		'%s', //Value 2 data type
		'%d' //Value 3 data type
	),
	array ('%d') //Value type for the database being called. Digit here
);

*/
#WORKS

/*$wpdb->delete(
	'grades',
	array(
		'ID'=>1)
	,
	array(
		'%d')
	);
*/

/*$wpdb->update(
	'table',
	array (
		'column1' => 'value1',
		'column2' => 'value2'
		),
	array( 'ID' = 1),
	array(
		'%s', //Value 1 data type
		'%d' //Value 2 data type
	),
	array ('%d') //Value type for the database being called. Digit here
);*/


###############
if (is_user_logged_in()) {
	$userID = get_current_user_id();
	$allData = get_user_meta($userID);
	$name = get_user_meta($userID, 'first_name', $single);
	echo 'Welcome '.$name;
	#var_dump($allData);

	#
	foreach ($allData as $key => $value) {
		echo "$key: $value[0]<br/>";
	}

	echo $allData['first_name'][0];


} else {
	echo "Hello!";

	echo 
		'<form method="post" action="../register/">
			<input type="text" name="login_name"/>
			<input type="password" name="pass_word"/>
			<input type="text" name="e_mail"/>
			<button type="submit" name="register">Register</button>
		</form>';
}



?>

<?php endwhile; endif; ?>
<p>End of the pages, IMPS!</p>